<?
namespace Aspro\Allcorp3Motor\Property;

use Bitrix\Main\Localization\Loc,
	Bitrix\Iblock,
	Bitrix\Main\Loader,
	CAllcorp3Motor as Solution,
	CAllcorp3MotorCache as Cache;

Loc::loadMessages(__FILE__);

class ListWebForms{
	static function OnIBlockPropertyBuildList(){
		return array(
			'PROPERTY_TYPE' => 'S',
			'USER_TYPE' => 'SAsproAllcorp3MotorListWebForms',
			'DESCRIPTION' => Loc::getMessage('WEBFORMS_LINK_PROP_ALLCORP3_TITLE', array("#MODULE#" => "Allcorp3Motor")),
			'GetPropertyFieldHtml' => array(__CLASS__, 'GetPropertyFieldHtml'),
			'GetPropertyFieldHtmlMulty' => array(__CLASS__, 'GetPropertyFieldHtmlMulty'),
			'GetSettingsHTML' => array(__CLASS__, 'GetSettingsHTML'),
		);
	}

	protected static function _getSites($arProperty){
		return Cache::$arIBlocksInfo[$arProperty['IBLOCK_ID']] ? Cache::$arIBlocksInfo[$arProperty['IBLOCK_ID']]['LID'] : array();
	}

	static function getWebForms($arSites){
		$arResult = array(
			'MERGE' => array(),
			'FORM' => array(),
			'IBLOCK' => array(),
		);

		if(Loader::includeModule('iblock')){
			foreach(Cache::$arIBlocks as $siteId => $arSiteIBlocks){
				if(!$arSites || in_array($siteId, $arSites)){
					foreach(Cache::$arIBlocks[$siteId]['aspro_'.Solution::themesSolutionName.'_form'] as $arIblocks){
						foreach($arIblocks as $iblockId){
							$arResult['IBLOCK'][Cache::$arIBlocksInfo[$iblockId]['CODE']] = Cache::$arIBlocksInfo[$iblockId]['NAME'];
						}
					}
				}
			}
		}

		if(Loader::includeModule('form')){
			$arFilter = array();
			if($arSites){
				$arFilter['SITE'] = (array)$arSites;
			}

			$rsForms = \CForm::GetList($by = "s_id", $order = "desc", $arFilter, $is_filtered);
			while ($arForm = $rsForms->Fetch()){
				$arResult['FORM'][preg_replace('/^(.*)_(.*)$/i', '$1', $arForm['SID'])] = $arForm['NAME'];
			}
		}

		foreach(array_intersect(array_keys($arResult['IBLOCK']), array_keys($arResult['FORM'])) as $code){
			$arResult['MERGE'][$code] = $arResult['FORM'][$code];
			unset($arResult['FORM'][$code], $arResult['IBLOCK'][$code]);
		}

		asort($arResult['MERGE']);
		asort($arResult['FORM']);
		asort($arResult['IBLOCK']);

		return $arResult;
	}

	static function GetPropertyFieldHtml($arProperty, $value, $strHTMLControlName){
		$bEditProperty = $strHTMLControlName['MODE'] === 'EDIT_FORM';
		$bDetailPage = $strHTMLControlName['MODE'] === 'FORM_FILL';

		$arSites = self::_getSites($arProperty);
		$arWebForms = self::getWebForms($arSites);
		$val = ($value['VALUE'] ? $value['VALUE'] : $arProperty['DEFAULT_VALUE']);

		ob_start();
		?>
		<select name="<?=$strHTMLControlName['VALUE']?>">
			<option value="" <?=($val == "" ? ' selected' : '')?>><?=Loc::getMessage('WEBFORMS_LINK_EMPTY_TITLE')?></option>

			<?foreach($arWebForms as $type => $arWebFormsOfType):?>
				<?if($arWebFormsOfType):?>
					<optgroup label="<?=Loc::getMessage('WEBFORMS_GROUP_'.$type)?>">
						<?foreach($arWebFormsOfType as $code => $name):?>
							<option value="<?=$code?>"<?=($val == $code ? ' selected' : '')?>><?=$name?></option>
						<?endforeach;?>
					</optgroup>
				<?endif;?>
			<?endforeach;?>
		</select>

		<?=BeginNote('align="left"');?>
		<?=Loc::getMessage('WEBFORMS_NOTE', array('THEMES_SOLUTION_NAME' => Solution::themesSolutionName))?>
		<?=EndNote();?>
		<?
		return ob_get_clean();
	}

	static function GetPropertyFieldHtmlMulty($arProperty, $value, $strHTMLControlName){
		$bEditProperty = $strHTMLControlName['MODE'] === 'EDIT_FORM';
		$bDetailPage = $strHTMLControlName['MODE'] === 'FORM_FILL';

		$arSites = self::_getSites($arProperty);
		$arWebForms = self::getWebForms($arSites);
		$arValues = ($value && is_array($value) ? array_column($value, 'VALUE') : array($arProperty['DEFAULT_VALUE']));
		
		ob_start();
		?>
		<select name="<?=$strHTMLControlName['VALUE']?>[]" multiple size="<?=$arProperty['MULTIPLE_CNT']?>">
			<?foreach($arWebForms as $type => $arWebFormsOfType):?>
				<?if($arWebFormsOfType):?>
					<optgroup label="<?=Loc::getMessage('WEBFORMS_GROUP_'.$type)?>">
						<?foreach($arWebFormsOfType as $code => $name):?>
							<option value="<?=$code?>"<?=($val == $code ? ' selected' : '')?>><?=$name?></option>
						<?endforeach;?>
					</optgroup>
				<?endif;?>
			<?endforeach;?>
		</select>
		<?
		return ob_get_clean();
	}

	static function GetSettingsHTML($arProperty, $strHTMLControlName, &$arPropertyFields){
		$arPropertyFields = array(
            'HIDE' => array(
            	'SMART_FILTER',
            	'SEARCHABLE',
            	'COL_COUNT',
            	'ROW_COUNT',
            	'FILTER_HINT',
            	'WITH_DESCRIPTION'
            ),
            'SET' => array(
            	'SMART_FILTER' => 'N',
            	'SEARCHABLE' => 'N',
            	'ROW_COUNT' => '10',
            	'WITH_DESCRIPTION' => 'N',
            ),
        );

		return $html;
	}
}
