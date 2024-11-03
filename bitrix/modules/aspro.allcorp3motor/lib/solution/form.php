<?
namespace Aspro\Allcorp3Motor\Solution;

use Bitrix\Main\Localization\Loc,
	Bitrix\Main\SystemException,
	CAllcorp3Motor as Solution,
	CAllcorp3MotorCache as Cache,
	\Bitrix\Main\Type\DateTime;

Loc::loadMessages(__FILE__);	

class Form{

	private static $contactsLink = [];
	

    public static function BeforeAsproDrawFormFieldHandler($FIELD_SID, &$arQuestion, &$type, &$arParams)
	{
		if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] === 'date') {
			$arQuestion["HTML_CODE"] = preg_replace('/(<input.*?>).*/s', '${1}', $arQuestion["HTML_CODE"]);
			if (strpos($arQuestion['HTML_CODE'], 'class="') !== false) {
				$arQuestion["HTML_CODE"] = str_replace('class="', 'readonly class="date', $arQuestion["HTML_CODE"]);
			} else {
				$arQuestion["HTML_CODE"] = str_replace('id="', 'class="date" readonly id="', $arQuestion["HTML_CODE"]);
			}
		}
	}

	public static function OnAsproTemplateFormHandler(string &$template, string $id)
	{
		
		if(static::bOrderServicesScheduleForm($id)){
			$template = 'popup_motor';
		} else {
			if($id == Cache::$arIBlocks[SITE_ID]["aspro_".Solution::themesSolutionName."_form"]['aspro_allcorp3motor_order_services_schedule'][0]) {
				$template = 'popup_motor';
			}
		}
	}

	public static function getContacts(array $arIdContacts = []) : array
	{
		$contactsIblockId = \Bitrix\Main\Config\Option::get(Solution::moduleID, 'CONTACTS_IBLOCK_ID', Cache::$arIBlocks[SITE_ID]['aspro_'.Solution::themesSolutionName.'_content']['aspro_'.Solution::themesSolutionName.'_contact'][0]);

		if(!$contactsIblockId) return [];

		$arFilter = ['IBLOCK_ID' => $contactsIblockId, 'ACTIVE' => 'Y', 'GLOBAL_ACTIVE' => 'Y', 'ACTIVE_DATE' => 'Y'];

		if (!empty($arIdContacts)) {
			$arFilter['ID'] = $arIdContacts;
		}

		$arContacts = Cache::CIBLockElement_GetList(array('SORT' => 'ASC', 'NAME' => 'ASC', 'CACHE' => array('TAG' => Cache::GetIBlockCacheTag($contactsIblockId), 'MULTI' => 'Y')), $arFilter, false, false, array('ID', 'NAME', 'PROPERTY_ADDRESS', 'PROPERTY_HOUR_SCHEDULE'));
		
		static::modifierHourShedule($arContacts);
		
		return $arContacts;
	}

	public static function modifierHourShedule(&$arContacts) {
		foreach($arContacts as $key => $contact) {
			foreach($contact['PROPERTY_HOUR_SCHEDULE_VALUE'] as $keyhourSchedule => $hourSchedule) {
				$hourScheduleValue = strtotime($hourSchedule);
				if ($hourScheduleValue) {
					$h = date('H', $hourScheduleValue);
					$m = date('i', $hourScheduleValue);
					if($h && $m) {
						$arContacts[$key]['PROPERTY_HOUR_SCHEDULE_VALUE'][$keyhourSchedule] = $h.':'.$m;
					} else {
						unset($arContacts[$key]['PROPERTY_HOUR_SCHEDULE_VALUE'][$keyhourSchedule]);
					}
				} else {
					unset($arContacts[$key]['PROPERTY_HOUR_SCHEDULE_VALUE'][$keyhourSchedule]);
				}
			}
		}
		
	}

	public static function getServiceId() : string
	{
		$context = \Bitrix\Main\Application::getInstance()->getContext();
		$request = $context->getRequest();
		return $request['item-id'] ?: '';
	}

	public static function getFormId() : string
	{
		$context = \Bitrix\Main\Application::getInstance()->getContext();
		$request = $context->getRequest();
		return $request['id'] ?: '';
	}

	public static function getContactsLink() : array
	{
		if (!static::$contactsLink) {
			$servicesId = static::getServiceId();
			$arService = [];
			$arIdContacts = [];
			
			$arService = Cache::CIBLockElement_GetList(array('SORT' => 'ASC', 'NAME' => 'ASC', 'CACHE' => array('TAG' => Cache::GetIBlockCacheTag($servicesId), 'MULTI' => 'N')), array('ID' => $servicesId, 'ACTIVE' => 'Y', 'GLOBAL_ACTIVE' => 'Y', 'ACTIVE_DATE' => 'Y', '!PROPERTY_LINK_CONTACTS' => false), false, false, array('ID', 'NAME',  'PROPERTY_LINK_CONTACTS'));

			if (!empty($arService)) {
				$arIdContacts = $arService['PROPERTY_LINK_CONTACTS_VALUE'];
			}

			static::$contactsLink = static::getContacts($arIdContacts);
		}
		
		return static::$contactsLink;
	}

	public static function getAddress(array $arContacts) : array
	{
		$arAddress = [];
		foreach ($arContacts as $contact) {
			$arAddress[$contact['ID']] = $contact['NAME'] . ', ' . $contact['PROPERTY_ADDRESS_VALUE'];
		}

		return $arAddress;
	}

	public static function bUseBitrixForm() : bool
	{
		return Solution::GetFrontParametrValue('USE_BITRIX_FORM') == 'Y' && \Bitrix\Main\Loader::includeModule('form');
	}

	public static function modifierQuestionsContacts(array $arResult) : array
	{

		$typeForm = static::bUseBitrixForm() ? 'POPUP_' : '';
		$name = static::bUseBitrixForm() ? 'form_text_' .$arResult['QUESTIONS']['CONTACTS']['STRUCTURE'][0]['ID'] : $arResult['QUESTIONS']['CONTACTS']['CODE'];

		if (!$arResult['QUESTIONS']['SERVICE'] && $arResult['QUESTIONS']['CONTACTS']) return [];

		$htmlCode = '<select id="'.$typeForm.'CONTACTS" class="form-control' . ($arResult['QUESTIONS']['CONTACTS']['IS_REQUIRED'] == 'Y' ? ' required' : '') . '" name="'.$name.'">';

		$arContacts = static::getContactsLink();
		$arAddress = static::getAddress($arContacts);

		foreach ($arAddress as $id => $address) {
			$htmlCode  .= '<option value="' . $address . '" data-id="' . $id . '">' . $address . '</option>';
		}

		$htmlCode .= '</select>';

		$arResult['QUESTIONS']['CONTACTS']['HTML_CODE'] = $htmlCode;

		if (count($arContacts) == 1) {
			$arResult['QUESTIONS']['CONTACTS']['HIDDEN'] = true;
		}
		
		return $arResult['QUESTIONS']['CONTACTS'];
	}

	public static function getRecordTime(array $arContactsLink, $formId = '', $date = '', $serviceId = '') : array
	{
		if(!$arContactsLink) return [];

		$arTime = [];
		$contactId = $arContactsLink[0]['ID'];

		$serviceId = $serviceId ?: static::getServiceId();
		$today = FormatDateFromDB('','SHORT');
		$currentTime = FormatDateFromDB(new DateTime(), 'HH:MI');
		$date = $date ?: $today;
		$formId = $formId ?: static::getFormId();

		if(!empty($arContactsLink[0]['PROPERTY_HOUR_SCHEDULE_VALUE'])) {
			foreach($arContactsLink[0]['PROPERTY_HOUR_SCHEDULE_VALUE'] as $time) {
				if($time < $currentTime && $date == $today) {
					continue;
				}
				$arTime[] = [
					'VALUE' => $time,
					'DISABLED' => static::checkFreeTime($serviceId, $contactId, $date, $time, $formId) ? '' : 'disabled'
				];
			}
		}else {
			foreach (range(0, 23) as $number) {
				$time = str_pad($number, 2, 0, STR_PAD_LEFT) . ':00';
				$arTime[] = [
					'VALUE' => $time,
					'DISABLED' => static::checkFreeTime($serviceId, $contactId, $date, $time, $formId) ? '' : 'disabled'
				];
			}
		} 
		return $arTime;
	}



	public static function modifierQuestionsRecordTime(array $arResult) : string
	{
		$typeForm = static::bUseBitrixForm() ? 'POPUP_' : '';
		$name = static::bUseBitrixForm() ? 'form_text_' .$arResult['QUESTIONS']['RECORD_TIME']['STRUCTURE'][0]['ID'] : $arResult['QUESTIONS']['RECORD_TIME']['CODE'];

		$htmlCode = '<select id="'.$typeForm.'RECORD_TIME" class="form-control checkFreeTime' . ($arResult['QUESTIONS']['RECORD_TIME']['IS_REQUIRED'] == 'Y' ? ' required' : '') . '" name="'.$name.'">';

		$arHourSchedule = static::getRecordTime(static::getContactsLink());

		foreach($arHourSchedule as $key => $hourSchedule) {
			$htmlCode  .= '<option value="' . $hourSchedule['VALUE'] . '" '.$hourSchedule['DISABLED'].' data-id="' . $key . '">' . $hourSchedule['VALUE'] . '</option>';
		}
		
		$htmlCode .= '</select>';

		return $htmlCode;
	}

	public static function checkFreeTime($SERVICE_ID, $CONTACT_ID, $DATE, $RECORD_TIME, $FORM_ID) : bool
	{

		if(!$SERVICE_ID || !$CONTACT_ID || !$DATE || !$RECORD_TIME || !$FORM_ID) return false;

		if(static::bUseBitrixForm()) {
			$arFields = array();

			$arFields[] = array(
				"CODE" => "SERVICE_ID",
				"VALUE" => $SERVICE_ID,
			);

			$arFields[] = array(
				"CODE" => "CONTACT_ID",
				"VALUE" => $CONTACT_ID,
			);

			$arFields[] = array(
				"CODE" => "DATE",    
				"VALUE" => $DATE,
			);

			$arFields[] = array(
				"CODE" => "RECORD_TIME",
				"VALUE" => $RECORD_TIME,
			);

			$arFilter["FIELDS"] = $arFields;

			if(\CFormResult::GetList($FORM_ID, ($by="s_timestamp"), ($order="desc"), $arFilter, true, "N", 1)->Fetch()){
				return false;
			} 
		} else {

			$arFilter = array(
				"IBLOCK_ID"=> $FORM_ID, 
				"ACTIVE_DATE"=>"Y", 
				"ACTIVE"=>"Y",
				'PROPERTY_SERVICE_ID' => $SERVICE_ID,
				'PROPERTY_CONTACT_ID' => $CONTACT_ID,
				'PROPERTY_DATE' => ConvertDateTime($DATE, "YYYY-MM-DD", "ru"),
				'PROPERTY_RECORD_TIME' => $RECORD_TIME,
				
			);

			$res = \CIBlockElement::GetList(array(), $arFilter, false, array ("nTopCount" => 1), array('ID'));

			if($res->GetNextElement()) return false;
		}
       
        return true;
    }

	public function getFieldCode(string $formId) : array
	{
		if (\CForm::GetDataByID($formId, 
			$form, 
			$questions, 
			$answers, 
			$dropdown, 
			$multiselect) && $formId) {
			
			foreach($answers as $key=>$answer){
				$arFieldCode[$key] = 'form_' . $answer[0]['FIELD_TYPE'] . '_' . $answer[0]['ID'];
			}

			return $arFieldCode;
		}

		return [];
	}
	
	public function OnAsproBeforeResultAddHandler(string $webFormId, array $arValues)
	{
		if(static::bOrderServicesScheduleForm($webFormId)) { 
			global $APPLICATION;
		
			$arFieldCode = static::getFieldCode($webFormId);

			if(!$arFieldCode) {
				$APPLICATION->ThrowException(Loc::getMessage('EMPTY_FIELDS'));
			}

			$checkFreeTime = static::checkFreeTime($arValues[$arFieldCode['SERVICE_ID']], $arValues[$arFieldCode['CONTACT_ID']], $arValues[$arFieldCode['DATE']], $arValues[$arFieldCode['RECORD_TIME']], $webFormId);

			if(!$checkFreeTime){
				$APPLICATION->ThrowException(Loc::getMessage('CHOOSE_FREE_TIME'));
			}
		}
	}

	public static function bOrderServicesScheduleForm($formId) : bool
	{	

		if(static::bUseBitrixForm()) {
			$rsForm = \CForm::GetList($by = 'id', $order = 'asc', array('ACTIVE' => 'Y', 'ID' => $formId, 'SITE' => SITE_ID, 'SID_EXACT_MATCH' => 'N'), false);

			if($item = $rsForm->Fetch()){
				if($item['SID'] == 'aspro_' . Solution::themesSolutionName . '_order_services_schedule_' . SITE_ID){
					return true;
				}
			} 

			return false;

		} else {
			$res = \CIBlock::GetByID($formId);
			$iblock = $res->GetNext();

			if($iblock && strpos($iblock['CODE'], 'order_services_schedule') !== false) return true;
		}
		
		return false;
	}

	public function OnBeforeFormSendHandler(array &$arFields) 
	{
		if(static::bOrderServicesScheduleForm($arFields['IBLOCK_ID'])) {
			
			$checkFreeTime = static::checkFreeTime($arFields['PROPERTY_VALUES']['SERVICE_ID'], $arFields['PROPERTY_VALUES']['CONTACT_ID'], $arFields['PROPERTY_VALUES']['DATE']['VALUE'], $arFields['PROPERTY_VALUES']['RECORD_TIME'], $arFields['IBLOCK_ID']);

			if(!$checkFreeTime){
				 throw new SystemException(Loc::getMessage('CHOOSE_FREE_TIME'));
			}

		}
	}

	public static function OnAsproIBlockFormDrawFieldsHandler($FIELD_CODE, &$arQuestion) {
		if (
			in_array($arQuestion["FIELD_TYPE"], ['date', 'datetime']) 
			&& strpos($arQuestion['HTML_CODE'], 'readonly') === false
		) {
			$arQuestion['HTML_CODE'] = str_replace('type=', 'readonly type=', $arQuestion['HTML_CODE']);
		}
	}
}