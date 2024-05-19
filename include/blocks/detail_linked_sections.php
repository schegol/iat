<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true ) die();

global $arTheme;
$arParams = $arConfig['PARAMS'];
$moduleID = VENDOR_MODULE_ID;
?>
<?$APPLICATION->IncludeComponent(
	// "bitrix:catalog.section.list", 
	"aspro:catalog.section.list.".VENDOR_SOLUTION_NAME, 
	".default", 
	array(
		"IBLOCK_TYPE" => "aspro_allcorp3motor_catalog",
		"IBLOCK_ID"	=> \Bitrix\Main\Config\Option::get($moduleID, 'CATALOG_IBLOCK_ID', '38'),
		"CACHE_TYPE"	=>	$arParams["CACHE_TYPE"],
		"CACHE_TIME"	=>	$arParams["CACHE_TIME"],
		"CACHE_FILTER"	=>	$arParams["CACHE_FILTER"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
		"FILTER_ELEMENTS_CNT" => $arParams["FILTER_ELEMENTS_CNT"],
		"USE_FILTER_SECTION" => $arParams["USE_FILTER_SECTION"],
		"BRAND_NAME" => $arParams["BRAND_NAME"],
		"BRAND_CODE" => $arParams["BRAND_CODE"],
		"FILTER_NAME"	=>	'arrFilterSectionsBrand',
		"TOP_DEPTH" => $arParams["DEPTH_LEVEL_BRAND"] ?? 2,
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"ADD_SECTIONS_CHAIN" => 'N',
		"COMPONENT_TEMPLATE" => ".default",
		"SECTION_ID" => '',
		"SECTION_CODE" => '',
		"SECTION_FIELDS" => array(
			0 => "NAME",
			1 => "DESCRIPTION",
			2 => "PICTURE",
			3 => "",
		),
		"SECTION_USER_FIELDS" => array(
			0 => "UF_TOP_SEO",
			1 => "UF_SECTION_ICON",
			2 => "UF_MIN_PRICE",
			3 => "UF_TRANSPARENT_PICTURE",
			4 => "",
		),
		"ROW_VIEW" => true,
		"BORDER" => true,
		"ITEM_HOVER_SHADOW" => true,
		"DARK_HOVER" => false,
		"ROUNDED" => true,
		"ROUNDED_IMAGE" => true,
		"ITEM_PADDING" => true,
		"SECTION_COUNT" => "999",
		"ELEMENTS_ROW" => 4,
		"COMPACT" => true,
		"MAXWIDTH_WRAP" => false,
		"MOBILE_SCROLLED" => false,
		"NARROW" => true,
		"ITEMS_OFFSET" => $bItemsOffset,
		"IMAGES" => $images,
		"IMAGE_POSITION" => 'LEFT',
		"SHOW_PREVIEW" => false,
		"SHOW_CHILDS" => false,
		"MOBILE_SCROLLED" => $bMobileSectionsCompact,
		"CHECK_REQUEST_BLOCK" => TSolution::checkRequestBlock("catalog_sections"),
		"IS_AJAX" => TSolution::checkAjaxRequest(),
		"NAME_SIZE" => "16",
		"GRID_GAP" => "20",
		"LINKED" => true,
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false, array('HIDE_ICONS' => 'Y')
);?>