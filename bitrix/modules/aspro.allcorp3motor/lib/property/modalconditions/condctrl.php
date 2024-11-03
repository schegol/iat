<?
namespace Aspro\Allcorp3Motor\Property\ModalConditions;

use \Bitrix\Main\Localization\Loc,
	\Bitrix\Main\Config\Option,
	\Aspro\Allcorp3Motor\ModalConditions;

Loc::loadMessages(__FILE__);
@include_once(__DIR__.'/../../catalog_cond.php');

class CondCtrl extends \Aspro\Allcorp3Motor\CGlobalCondCtrlComplex{
	public static function GetClassName(){
		return __CLASS__;
	}

	public static function GetControlDescr()
	{
		$description = parent::GetControlDescr();
		$description['SORT'] = 300;
		return $description;
	}

	public static function GetControlID(){
		return array('CondModal');
	}

	public static function GetControlShow($arParams){
		$arControls = static::GetControls();
		$arResult = array(
			'controlgroup' => true,
			'group' =>  false,
			'label' => Loc::getMessage('MODAL_CONDITION_CONTROL_PROPERTY_GROUP'),
			'showIn' => static::GetShowIn($arParams['SHOW_IN_GROUPS']),
			'children' => array()
		);
		foreach ($arControls as $arOneControl)
		{
			$arResult['children'][] = array(
				'controlId' => $arOneControl['ID'],
				'group' => false,
				'label' => $arOneControl['LABEL'],
				'showIn' => static::GetShowIn($arParams['SHOW_IN_GROUPS']),
				'control' => array(
					array(
						'id' => 'prefix',
						'type' => 'prefix',
						'text' => $arOneControl['PREFIX']
					),
					static::GetLogicAtom($arOneControl['LOGIC']),
					static::GetValueAtom($arOneControl['JS_VALUE'])
				)
			);
		}
		unset($arOneControl);

		return $arResult;
	}

	public static function GetControls($strControlID = false){
		$arControlList = array(
			'CondPage' => array(
				'ID' => 'CondPage',
				'FIELD' => 'PAGE',
				'FIELD_TYPE' => 'string',
				'FIELD_LENGTH' => 255,
				'CLASS_ID' => 'CondModal',
				'LABEL' => Loc::getMessage('COND_PAGE_LABEL'),
				'PREFIX' => Loc::getMessage('COND_PAGE_PREFIX'),
				'LOGIC' => static::GetLogic(array(AS_COND_LOGIC_EQ, AS_COND_LOGIC_NOT_EQ, AS_COND_LOGIC_CONT, AS_COND_LOGIC_NOT_CONT)),
				'JS_VALUE' => array(
					'type' => 'input'
				),
				'PHP_VALUE' => ''
			),
			'CondServerName' => array(
				'ID' => 'CondServerName',
				'FIELD' => 'SERVER_NAME',
				'FIELD_TYPE' => 'string',
				'FIELD_LENGTH' => 255,
				'CLASS_ID' => 'CondModal',
				'LABEL' => Loc::getMessage('COND_SERVER_NAME_LABEL'),
				'PREFIX' => Loc::getMessage('COND_SERVER_NAME_PREFIX'),
				'LOGIC' => static::GetLogic(array(AS_COND_LOGIC_EQ, AS_COND_LOGIC_NOT_EQ, AS_COND_LOGIC_CONT, AS_COND_LOGIC_NOT_CONT)),
				'JS_VALUE' => array(
					'type' => 'input'
				),
				'PHP_VALUE' => ''
			),
		);

		if($strControlID) {
			return isset($arControlList[$strControlID]) ? $arControlList[$strControlID] : false;
		}

		return $arControlList;
    }
}
