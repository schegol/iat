<?
$bFromModule = (isset($arParams['FROM_MODULE']) && $arParams['FROM_MODULE'] == 'Y');
if (!$bFromModule) {
	require $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";
}
require_once( $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/vendor/php/solution.php');

$APPLICATION->IncludeComponent(
	"bitrix:catalog.compare.list",
	"compare_top",
	array(
		"IBLOCK_TYPE" => "aspro_".VENDOR_SOLUTION_NAME."_catalog",
		"IBLOCK_ID" => \Bitrix\Main\Config\Option::get(VENDOR_MODULE_ID, "CATALOG_IBLOCK_ID", "252"),
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"DETAIL_URL" => "/catalog/#SECTION_CODE_PATH#/#ELEMENT_ID#/",
		"COMPARE_URL" => str_replace('/', SITE_DIR, TSolution::GetFrontParametrValue("COMPARE_PAGE_URL")),
		"CLASS_LINK" => (isset($arParams["CLASS_LINK"]) ? $arParams["CLASS_LINK"] : ""),
		"CLASS_ICON" => (isset($arParams["CLASS_ICON"]) ? $arParams["CLASS_ICON"] : ""),
		"MESSAGE" => (isset($arParams["MESSAGE"]) ? $arParams["MESSAGE"] : ""),
		"NAME" => "CATALOG_COMPARE_LIST",
		"AJAX_OPTION_ADDITIONAL" => ""
	)
);

if (!$bFromModule) {
	require $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php";
}
