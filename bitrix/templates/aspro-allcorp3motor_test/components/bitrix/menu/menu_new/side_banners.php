<?
$bannersHTML = '';
ob_start();
$APPLICATION->IncludeComponent(
"aspro:com.banners.".VENDOR_SOLUTION_NAME, 
"wide_menu",
array(
    "IBLOCK_TYPE" => "aspro_".VENDOR_SOLUTION_NAME."_adv",
    "IBLOCK_ID" => TSolution\Cache::$arIBlocks[SITE_ID]["aspro_".VENDOR_SOLUTION_NAME."_adv"]["aspro_".VENDOR_SOLUTION_NAME."_advtbig"][0],
    "TYPE_BANNERS_IBLOCK_ID" => TSolution\Cache::$arIBlocks[SITE_ID]["aspro_".VENDOR_SOLUTION_NAME."_adv"]["aspro_".VENDOR_SOLUTION_NAME."_banner_types"][0],
    'TIZERS_IBLOCK_ID' => TSolution\Cache::$arIBlocks[SITE_ID]['aspro_'.VENDOR_SOLUTION_NAME.'_content']['aspro_'.VENDOR_SOLUTION_NAME.'_front_tizers'][0],
    'BANNER_TYPE_THEME' => 'HEADER_WIDE_MENU',
    "NEWS_COUNT" => "30",
    "SORT_BY1" => "SORT",
    "SORT_ORDER1" => "ASC",
    "SORT_BY2" => "ID",
    "SORT_ORDER2" => "ASC",
    "FILTER_NAME" => "rightBannersFilter",
    "FIELD_CODE" => array(
        0 => "NAME",
        1 => "PREVIEW_TEXT",
        2 => "PREVIEW_PICTURE",
        3 => "DETAIL_PICTURE",
        4 => "DATE_CREATE",
    ),
    "PROPERTY_CODE" => array(
        0 => "",
        1 => "BANNERTYPE",
        2 => "TEXTCOLOR",
        3 => "LINKIMG",
        4 => "BUTTON1TEXT",
        5 => "BUTTON1CLASS",
        6 => "BUTTON2TEXT",
        7 => "BUTTON2LINK",
        8 => "",
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
    "ACTIVE_DATE_FORMAT" => "j F Y",
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
    "PAGER_TITLE" => "�������",
    "PAGER_SHOW_ALWAYS" => "N",
    "PAGER_DESC_NUMBERING" => "N",
    "PAGER_DESC_NUMBERING_CACHE_TIME" => "3600000",
    "PAGER_SHOW_ALL" => "N",
    "AJAX_OPTION_ADDITIONAL" => "",
    "COMPONENT_TEMPLATE" => "front-banners-big-short_mix",
    "IBLOCK_SMALL_BANNERS_TYPE" => "aspro_".VENDOR_SOLUTION_NAME."_adv",
    "IBLOCK_SMALL_BANNERS_ID" => TSolution\Cache::$arIBlocks[SITE_ID]["aspro_".VENDOR_SOLUTION_NAME."_adv"]["aspro_".VENDOR_SOLUTION_NAME."_smbanners"][0],
    "SET_BROWSER_TITLE" => "Y",
    "SET_META_KEYWORDS" => "Y",
    "SET_META_DESCRIPTION" => "Y",
    "SET_LAST_MODIFIED" => "N",
    "STRICT_SECTION_CHECK" => "N",
    "PAGER_BASE_LINK_ENABLE" => "N",
    "SHOW_404" => "N",
    "MESSAGE_404" => "",
    'HEADER_OPACITY' => true,
    'WIDE_TEXT' => true,
    'TITLE_LARGE' => true,
),
false,
array('HIDE_ICONS'=>'Y')
);
$bannersHTML = ob_get_clean();
$bannersHTML = trim($bannersHTML);
?>