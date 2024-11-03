<?
namespace Aspro\Allcorp3Motor\Property;

use Bitrix\Main\Localization\Loc,
	Bitrix\Main\Loader,
	CAllcorp3Motor as Solution;

Loc::loadMessages(__FILE__);

class ConditionType{
	static function OnIBlockPropertyBuildList(){
		return array(
			'PROPERTY_TYPE' => 'L',
			'USER_TYPE' => 'SAsproModalConditionsTypeAllcorp3Motor',
			'DESCRIPTION' => Loc::getMessage('ALLCORP3_MODAL_CONDITIONS_TYPES_PROP_TITLE', array("#MODULE#" => "Allcorp3Motor")),
			'GetPropertyFieldHtml' => array(__CLASS__, 'GetPropertyFieldHtml'),
			'GetAdminListViewHTML' => array(__CLASS__, 'GetAdminListViewHTML'),
			'GetSettingsHTML' => array(__CLASS__, 'GetSettingsHTML'),
			'PrepareSettings' => array(__CLASS__, 'PrepareSettings'),
		);
	}

	static function GetAdminListViewHTML($arProperty, $value, $strHTMLControlName){
        return '';
	}

	static function GetPropertyFieldHtml($arProperty, $value, $strHTMLControlName){
		static $list, $cache;

		if( !isset($list[$arProperty['ID']]) ) {
			$list[$arProperty['ID']] = array();
			$res = \CIBlockPropertyEnum::GetList(array(), array('PROPERTY_ID' => $arProperty['ID'], 'IBLOCK_ID' => $arProperty['IBLOCK_ID']) );
			while($val = $res->Fetch()) {
				$list[$arProperty['ID']][] = $val;
			}
		}

		$dependProps = array(
			'ALL' => array(
				'FIELDS' => array(
					'PREVIEW_PICTURE',
				),
				'PROPS' => array(
					'HIDE_TITLE' => '',
					'POSITION' => '',
					'LINK_WEB_FORM' => '',
				),
			),
			'MAIN' => array(
				'FIELDS' => array(
					'PREVIEW_PICTURE',
				),
				'PROPS' => array(
				),
			),
			'TEXT' => array(
				'FIELDS' => array(
				),
				'PROPS' => array(
					'HIDE_TITLE',
					'POSITION',
				),
			),
			'WEBFORM' => array(
				'FIELDS' => array(
					'PREVIEW_PICTURE',
				),
				'PROPS' => array(
					'LINK_WEB_FORM',
				),
			),
		);

		if($dependProps['ALL']['PROPS']) {
			foreach ($dependProps['ALL']['PROPS'] as $code => &$val) {
				$prop = \CIBlockProperty::GetList(array(), array('IBLOCK_ID' => $arProperty['IBLOCK_ID'], 'CODE' => $code))->Fetch();
				if( $prop ) {
					$val = $prop['ID'];
				}
			}
		}

		if($cache !== true) {
			self::addCss($arProperty);
			self::addJs($arProperty, $dependProps);

			$cache = true;
		}

		$html = '';

		$bEditProperty = $strHTMLControlName['MODE'] === 'EDIT_FORM';
		$bDetailPage = $strHTMLControlName['MODE'] === 'FORM_FILL';

		if($bDetailPage){
			$values = $list[$arProperty['ID']];

			$html .= '<select class="modal_cond_type" name="PROP['.$arProperty['ID'].'][]" size="1">';

			$html .= '<option data-xmlid="ALL" value="" '.($value['VALUE'] ? '' : 'selected=""').'>'.Loc::getMessage('DEFAULT').'</option>';
			if($values) {
				foreach ($values as $val) {
					$html .= '<option data-xmlid="'.$val['XML_ID'].'" value="'.$val['ID'].'" '.($value['VALUE'] == $val['ID'] ? 'selected=""' : '').'>'.$val['VALUE'].'</option>';
				}
			}

			$html .= '</select>';
		}

		return $html;
	}

	static function PrepareSettings($arFields){
		$arFields['MULTIPLE_CNT'] = 1;

        return $arFields;
	}

	static function GetSettingsHTML($arProperty, $strHTMLControlName, &$arPropertyFields){
		$arPropertyFields = array(
            'HIDE' => array(
            	'SMART_FILTER',
            	'FILTRABLE',
            	'DEFAULT_VALUE',
            	'SEARCHABLE',
            	'MULTIPLE_CNT',
            	'COL_COUNT',
            	'MULTIPLE',
            	'WITH_DESCRIPTION',
            	'FILTER_HINT',
            ),
            'SET' => array(
            	'SMART_FILTER' => 'N',
            	'FILTRABLE' => 'N',
            	'SEARCHABLE' => 'N',
            	'MULTIPLE_CNT' => '1',
            	'MULTIPLE' => 'N',
            	'WITH_DESCRIPTION' => 'N',
            ),
        );
		return $html;
	}

	private static function addCss($arProperty){
		$GLOBALS['APPLICATION']->SetAdditionalCss('/bitrix/css/'.Solution::moduleID.'/property/conditiontype.css');
	}

	private static function addJs($arProperty, $dependProps){
		?>
		<script>
			window.dependProps = <?=\CUtil::PhpToJSObject($dependProps);?>;
		</script>

		<?

		$GLOBALS['APPLICATION']->AddHeadScript('/bitrix/js/main/jquery/jquery-2.1.3.min.js');
		$GLOBALS['APPLICATION']->AddHeadScript('/bitrix/js/'.Solution::moduleID.'/property/conditiontype.js');
	}
}
