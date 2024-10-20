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
<?$APPLICATION->IncludeComponent("aspro:wrapper.block.allcorp3motor", "front_map", Array(
	"CACHE_FILTER" => "Y",	// Кешировать при установленном фильтре
		"CACHE_GROUPS" => "N",	// Учитывать права доступа
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"AJAX_OPTION_STYLE" => "Y",
		"IBLOCK_TYPE" => "aspro_allcorp3motor_content",	// Тип инфоблока
		"IBLOCK_ID" => "32",	// Инфоблок
		"TITLE" => "Контакты",	// Заголовок блока
		"SHOW_TITLE" => $paramShowTitle,
		"TITLE_POSITION" => $paramTitlePosition,
		"RIGHT_TITLE" => "Перейти в раздел",	// Название ссылки на все элементы
		"RIGHT_LINK" => "contacts/",	// Ссылка на все элементы
		"CODE_BLOCK" => "MAPS",	// Символьный код блока
		"WIDE" => "FROM_THEME",	// На всю ширину экрана
		"OFFSET" => "FROM_THEME",
		"COMPONENT_TEMPLATE" => "front_map",
		"ELEMENT_SORT_FIELD" => "sort",	// По какому полю сортируем элементы
		"ELEMENT_SORT_ORDER" => "asc",	// Порядок сортировки элементов
		"ELEMENT_SORT_FIELD2" => "id",	// Поле для второй сортировки элементов
		"ELEMENT_SORT_ORDER2" => "desc",	// Порядок второй сортировки элементов
		"FILTER_NAME" => "arRegionLink",	// Имя массива со значениями фильтра для фильтрации элементов
		"MAP_TYPE" => "0",	// Тип карты
		"SUBTITLE" => "",	// Дополнительный заголовок над основным заголовком блока
		"SHOW_PREVIEW_TEXT" => "Y",	// Отображать текст под заголовком
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "Y"
	)
);?>