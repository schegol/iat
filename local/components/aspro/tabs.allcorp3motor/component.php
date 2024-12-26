<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if (!class_exists('TSolution') || !CModule::IncludeModule(TSolution::moduleID)) {
	ShowError(GetMessage('ASPRO_MODULE_NOT_INSTALLED'));
	return;
}
?>

<?\Bitrix\Main\Loader::includeModule('iblock');
$arTabs = $arShowProp = array();

if (strlen($arParams["FILTER_NAME"])<=0 || !preg_match("/^[A-Za-z_][A-Za-z01-9_]*$/", $arParams["FILTER_NAME"])) {
	$arrFilter = array();
	$arFilter = array("ACTIVE" => "Y",  "IBLOCK_ID" => $arParams["IBLOCK_ID"], "SECTION_GLOBAL_ACTIVE" => "Y", "!PROPERTY_SHOW_ON_INDEX_PAGE" => false);
} else {
	$arrFilter = $GLOBALS[$arParams["FILTER_NAME"]];
	if(!is_array($arrFilter))
		$arrFilter = array();

	if (empty($arrFilter)) {
		$arFilter = array("ACTIVE" => "Y",  "IBLOCK_ID" => $arParams["IBLOCK_ID"], "SECTION_GLOBAL_ACTIVE" => "Y", "!PROPERTY_SHOW_ON_INDEX_PAGE" => false);
	} else {
		$arFilter = array();
	}
}

if ($arParams["SECTION_ID"]) {
	$arFilter[]=array("SECTION_ID"=>$arParams["SECTION_ID"],"INCLUDE_SUBSECTIONS"=>"Y" );
} elseif($arParams["SECTION_CODE"]) {
	$arFilter[]=array("SECTION_CODE"=>$arParams["SECTION_CODE"],"INCLUDE_SUBSECTIONS"=>"Y" );
}
	
global $arTheme, $bCatalogIndex;
$bOrderViewBasket = (trim($arTheme["ORDER_VIEW"]["VALUE"]) === "Y");

$bCatalogIndex = isset($arTheme["INDEX_TYPE"]["SUB_PARAMS"][$arTheme["INDEX_TYPE"]["VALUE"]]) ? $arTheme["INDEX_TYPE"]["SUB_PARAMS"][$arTheme["INDEX_TYPE"]["VALUE"]]['CATALOG_TAB']['VALUE'] : true;

$arParams["ORDER_VIEW"] = $bOrderViewBasket;
$arParams["DISPLAY_TOP_PAGER"] = $arParams["DISPLAY_BOTTOM_PAGER"] = "N";
$arParams["ID_FOR_TABS"] = "Y";
$arParams["NO_USE_SHCEMA_ORG"] = "Y";
$arParams["MOBILE_SCROLLED"] = true;
$arParams["SHOW_PROPS"] = TSolution::GetFrontParametrValue('SHOW_PROPS_BLOCK');
$arParams["SHOW_ONE_CLICK_BUY"] = TSolution::GetFrontParametrValue('SHOW_ONE_CLICK_BUY');
$arParams["SHOW_GALLERY"] = TSolution::GetFrontParametrValue('SHOW_CATALOG_GALLERY_IN_LIST');
$arParams["MAX_GALLERY_ITEMS"] = TSolution::GetFrontParametrValue('MAX_GALLERY_ITEMS');
$arParams["ADD_PICT_PROP"] = TSolution::GetFrontParametrValue('GALLERY_PROPERTY_CODE');
$arParams["USE_FAST_VIEW_PAGE_DETAIL"] = TSolution::GetFrontParametrValue('USE_FAST_VIEW_PAGE_DETAIL');
$arParams["DISPLAY_COMPARE"] = TSolution::GetFrontParametrValue('CATALOG_COMPARE');
$arParams["PICTURE_RATIO"] = strtolower(TSolution::GetFrontParametrValue('ELEMENTS_IMG_TYPE'));

$indexPageOptions = $GLOBALS['arTheme']['INDEX_TYPE']['SUB_PARAMS'][ $GLOBALS['arTheme']['INDEX_TYPE']['VALUE'] ];
$blockOptions = $indexPageOptions['CATALOG_TAB'];
$blockTemplateOptions = $blockOptions['TEMPLATE']['LIST'][ $blockOptions['TEMPLATE']['VALUE'] ];

$rowsCount = $arParams["COUNT_ROWS"];
$bShowMore = $arParams["COUNT_ROWS"] === 'SHOW_MORE';
if ($arParams["COUNT_ROWS"] === 'FROM_THEME') {
	$rowsCount = $blockTemplateOptions["ADDITIONAL_OPTIONS"]["LINES_COUNT"]["VALUE"];
	$bShowMore = $blockTemplateOptions["ADDITIONAL_OPTIONS"]["LINES_COUNT"]["VALUE"] === 'SHOW_MORE';
}

$linesCount = $bShowMore ? 1 : (intval($rowsCount) ?: 1);

$arParams["SHOW_TITLE"] = $blockOptions["INDEX_BLOCK_OPTIONS"]["BOTTOM"]["SHOW_TITLE"]["VALUE"]=="Y";

if ($arParams["NARROW"] === 'FROM_THEME') {
	$arParams["NARROW"] = $blockTemplateOptions["ADDITIONAL_OPTIONS"]["WIDE"]["VALUE"]!="Y";
} else {
	$arParams["NARROW"] = $arParams["NARROW"] === 'Y' ? false : true;
}

if ($arParams["ITEMS_OFFSET"] === 'FROM_THEME') {
	$arParams["ITEMS_OFFSET"] = $blockTemplateOptions["ADDITIONAL_OPTIONS"]["ITEMS_OFFSET"]["VALUE"]=="Y";
} else {
	$arParams["ITEMS_OFFSET"] = $arParams["ITEMS_OFFSET"] === 'Y' ? true : false;
}

if ($arParams["ELEMENT_IN_ROW"] === 'FROM_THEME') {
	$arParams["ELEMENT_IN_ROW"] = $blockTemplateOptions["ADDITIONAL_OPTIONS"]["ELEMENTS_COUNT"]["VALUE"];
}

if ($arParams["IMG_CORNER"] === 'FROM_THEME') {
	$arParams["IMG_CORNER"] = $blockTemplateOptions["ADDITIONAL_OPTIONS"]["IMG_CORNER"]["VALUE"];
}

if ($arParams["TEXT_CENTER"] === 'FROM_THEME') {
	$arParams["TEXT_CENTER"] = $blockTemplateOptions["ADDITIONAL_OPTIONS"]["TEXT_CENTER"]["VALUE"] == "Y";
} else {
	$arParams["TEXT_CENTER"] = $arParams["TEXT_CENTER"] === 'Y' ? true : false;
}

if ($arParams["PAGE_ELEMENT_COUNT"] == 'FROM_THEME') {
	if ($blockTemplateOptions["ADDITIONAL_OPTIONS"]["ELEMENTS_COUNT"]["VALUE"]) {
		$arParams["PAGE_ELEMENT_COUNT"] = $linesCount * $blockTemplateOptions["ADDITIONAL_OPTIONS"]["ELEMENTS_COUNT"]["VALUE"];
	} else {
		$arParams["PAGE_ELEMENT_COUNT"] = $linesCount;

		if ($bShowMore) {
			$arParams["PAGE_ELEMENT_COUNT"] = 3;
		}
	}
}
if ($arParams["IMAGES_POSITION"] == 'FROM_THEME') {
	$arParams["IMAGES_POSITION"] = $blockTemplateOptions["ADDITIONAL_OPTIONS"]["IMAGES_POSITION"]["VALUE"];
}
$arParams["DISPLAY_BOTTOM_PAGER"] = $bShowMore ? "Y" : "N";
$arParams["PAGER_TEMPLATE"] = "ajax";

$arParams["TYPE_TEMPLATE"] = $arParams["TYPE_TEMPLATE"] ? $arParams["TYPE_TEMPLATE"] : "catalog_block";

foreach ($arParams as $key => $value) {
	if (strpos($key, "~")) {
		unset($arParams[$key]);
	}
}

$arParams["CHECK_REQUEST_BLOCK"] = TSolution::checkRequestBlock('catalog_tab');
$arParams["AJAX_REQUEST"] = TSolution::checkAjaxRequest() && $arParams["CHECK_REQUEST_BLOCK"] ? 'Y' : 'N';

if ($arParams['AJAX_REQUEST'] == 'Y') {
	// $APPLICATION->ShowCss();
	// $APPLICATION->ShowHeadScripts();

	// $APPLICATION->ShowAjaxHead();
	
	// not load core.js in CJSCore:Init()
	CJSCore::markExtensionLoaded('core');
	
	// not load main.popup.bundle.js, ui.font.opensans.css
	$arParams["DISABLE_INIT_JS_IN_COMPONENT"] = "Y";
	$arParams["ajax"] = "y";
}
if ($bCatalogIndex && $arParams["HIT_PROP"]) {
	$rsProp = CIBlockPropertyEnum::GetList(Array("sort" => "asc", "id" => "desc"), Array("ACTIVE" => "Y", "IBLOCK_ID" => $arParams["IBLOCK_ID"], "CODE" => $arParams["HIT_PROP"]));
	while ($arProp = $rsProp->Fetch()) {
		$arShowProp[$arProp["EXTERNAL_ID"]] = $arProp["VALUE"];
	}

	if ($arShowProp) {
		foreach ($arShowProp as $key => $prop) {
			$arItems = array();
			if (empty($arrFilter)) {
				$arFilterProp = array("PROPERTY_".$arParams["HIT_PROP"]."_VALUE" => array($prop));
			} else {
				$arFilterProp = array();
			}

			$arItems = TSolution\Cache::CIBLockElement_GetList(array('CACHE' => array("MULTI" => "N", "TAG" => TSolution\Cache::GetIBlockCacheTag($arParams["IBLOCK_ID"]))), array_merge($arFilter, $arrFilter, $arFilterProp), false, array("nTopCount" => 1), array("ID"));
			if ($arItems) {
				$arTabs[$key] = array(
					"CODE" => $key,
					"TITLE" => $prop,
					"FILTER" => array_merge($arFilterProp, $arFilter)
				);
			}
		}
	} else {
		return;
	}

	$arParams["PROP_CODE"] = $arParams["HIT_PROP"];
	$arResult["TABS"] = $arTabs;

	$this->IncludeComponentTemplate();
} else {
	return;
}?>