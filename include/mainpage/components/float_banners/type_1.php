<?
$indexPageOptions = $GLOBALS['arTheme']['INDEX_TYPE']['SUB_PARAMS'][ $GLOBALS['arTheme']['INDEX_TYPE']['VALUE'] ];
$blockOptions = $indexPageOptions['FLOAT_BANNERS'];
$blockTemplateOptions = $blockOptions['TEMPLATE']['LIST'][ $blockOptions['TEMPLATE']['VALUE'] ];

$bShowAll = $blockTemplateOptions["ADDITIONAL_OPTIONS"]["LINES_COUNT"]["VALUE"] === 'ALL';
$linesCount = $bShowAll ? 9999 : (intval($blockTemplateOptions["ADDITIONAL_OPTIONS"]["LINES_COUNT"]["VALUE"]) ?: 1);
?>

<?$APPLICATION->IncludeComponent("aspro:com.banners.allcorp3motor", "banners-fon", array(
	"IBLOCK_TYPE" => "aspro_allcorp3motor_adv",
		"IBLOCK_ID" => "35",
		"TYPE_BANNERS_IBLOCK_ID" => "20",
		"BANNER_TYPE_THEME" => "BANNER_IMG_FON1",
		"NEWS_COUNT" => $linesCount,
		"SET_BANNER_FROM_TYPE" => "Y",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "ID",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "PREVIEW_PICTURE",
			3 => "DETAIL_PICTURE",
			4 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "TOP_TEXT",
			1 => "BANNERTYPE",
			2 => "URL",
			3 => "BTN_TEXT",
			4 => "BTN_LINK",
			5 => "BTN_FORM_ID",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600000",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "3600000",
		"PAGER_SHOW_ALL" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => "banners-fon",
		"WIDE" => "FROM_THEME",
		"ITEMS_OFFSET" => "FROM_THEME",
		"LINES_COUNT" => "FROM_THEME",
		"CODE_BLOCK" => "FLOAT_BANNERS",
		"TYPE_BLOCK" => "BIG_BANNER",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_LAST_MODIFIED" => "N",
		"STRICT_SECTION_CHECK" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => ""
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "N"
	)
);?>