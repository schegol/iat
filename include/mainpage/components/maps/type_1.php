<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	define("STATISTIC_SKIP_ACTIVITY_CHECK", "true");
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/vendor/php/solution.php');

	$indexType = TSolution::GetFrontParametrValue('INDEX_TYPE');
	$paramShowTitle = TSolution::GetFrontParametrValue('SHOW_TITLE_MAPS_'.$indexType) == 'Y';
	$paramTitlePosition = TSolution::GetFrontParametrValue('TITLE_POSITION_MAPS_'.$indexType);
}
?>
<?$APPLICATION->IncludeComponent(
	"aspro:wrapper.block.allcorp3motor", 
	".default", 
	array(
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"AJAX_OPTION_STYLE" => "Y",
		"IBLOCK_TYPE" => "aspro_allcorp3motor_content",
		"IBLOCK_ID" => "32",
		"TITLE" => "Контакты",
		"SHOW_TITLE" => $paramShowTitle,
		"TITLE_POSITION" => $paramTitlePosition,
		"SHOW_PREVIEW_TEXT" => "Y",
		"RIGHT_TITLE" => "Перейти в раздел",
		"RIGHT_LINK" => "contacts/",
		"CODE_BLOCK" => "MAPS",
		"WIDE" => "FROM_THEME",
		"OFFSET" => "FROM_THEME",
		"COMPONENT_TEMPLATE" => ".default",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER2" => "desc",
		"FILTER_NAME" => "arRegionLink",
		"MAP_TYPE" => "0",
		"SUBTITLE" => ""
	),
	false
);?>