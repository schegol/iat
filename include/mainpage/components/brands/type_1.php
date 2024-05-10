<?
$indexPageOptions = $GLOBALS['arTheme']['INDEX_TYPE']['SUB_PARAMS'][ $GLOBALS['arTheme']['INDEX_TYPE']['VALUE'] ];
$blockOptions = $indexPageOptions['BRANDS'];
$blockTemplateOptions = $blockOptions['TEMPLATE']['LIST'][ $blockOptions['TEMPLATE']['VALUE'] ];

$bShowMore = $blockTemplateOptions["ADDITIONAL_OPTIONS"]["LINES_COUNT"]["VALUE"] === 'SHOW_MORE';
$linesCount = $bShowMore ? 1 : (intval($blockTemplateOptions["ADDITIONAL_OPTIONS"]["LINES_COUNT"]["VALUE"]) ?: 1);

$APPLICATION->IncludeComponent("bitrix:news.list", "brands-list", array(
	"IBLOCK_ID" => "29",
		"IBLOCK_TYPE" => "aspro_allcorp3motor_content",
		"NEWS_COUNT" => $linesCount*"5",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "arRegionLinkFront",
		"FIELD_CODE" => array(
			0 => "PREVIEW_PICTURE",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
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
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "ajax",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "3600",
		"PAGER_SHOW_ALL" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => "brands-list",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"STRICT_SECTION_CHECK" => "N",
		"TITLE" => "Надежные поставщики",
		"RIGHT_TITLE" => "Все производители",
		"RIGHT_LINK" => "company/brands/",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"FRONT_PAGE" => TSolution::IsMainPage(),
		"ITEMS_OFFSET" => $blockTemplateOptions["ADDITIONAL_OPTIONS"]["ITEMS_OFFSET"]["VALUE"]=="Y",
		"NARROW" => $blockTemplateOptions["ADDITIONAL_OPTIONS"]["WIDE"]["VALUE"]!="Y",
		"SHOW_TITLE" => $blockOptions["INDEX_BLOCK_OPTIONS"]["BOTTOM"]["SHOW_TITLE"]["VALUE"]=="Y",
		"TITLE_POSITION" => $blockOptions["INDEX_BLOCK_OPTIONS"]["BOTTOM"]["TITLE_POSITION"]["VALUE"],
		"BORDER" => $blockTemplateOptions["ADDITIONAL_OPTIONS"]["ITEMS_BORDER"]["VALUE"]=="Y",
		"ITEMS_WHITE" => $blockTemplateOptions["ADDITIONAL_OPTIONS"]["ITEMS_BORDER"]["VALUE"]=="Y",
		"ITEM_PADDING" => $blockTemplateOptions["ADDITIONAL_OPTIONS"]["ITEMS_BORDER"]["VALUE"]=="Y"?"":"SMALL",
		"WRAPPER_OFFSET" => false,
		"SUBTITLE" => "Производители",
		"SHOW_PREVIEW_TEXT" => "Y",
		"CHECK_REQUEST_BLOCK" => TSolution::checkRequestBlock("brands"),
		"IS_AJAX" => TSolution::checkAjaxRequest()
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "N"
	)
);?>