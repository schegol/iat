<?
use \Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
global $arTheme, $APPLICATION;

CJSCore::Init('aspro_fancybox');

$arExtensions = [];

// top banner
\TSolution\Banner\Transparency::setHeaderClasses($templateData);

// can order?
$bOrderViewBasket = $templateData["ORDER"];

// use tabs?
if($arParams['USE_DETAIL_TABS'] === 'Y'){
    $bUseDetailTabs = true;
}
else{
    $bUseDetailTabs = false;
}

if ($arTheme['SHOW_PROJECTS_MAP_DETAIL']['VALUE'] == 'N') {
    unset($templateData['MAP']);
}

// blocks order
if(
    !$bUseDetailTabs &&
    array_key_exists('DETAIL_BLOCKS_ALL_ORDER', $arParams) &&
    $arParams["DETAIL_BLOCKS_ALL_ORDER"]
){
    $arBlockOrder = explode(",", $arParams["DETAIL_BLOCKS_ALL_ORDER"]);
}
else{
    $arBlockOrder = explode(",", $arParams["DETAIL_BLOCKS_ORDER"]);
    $arTabOrder = explode(",", $arParams["DETAIL_BLOCKS_TAB_ORDER"]);
}
?>
<div class="services-detail__bottom-info">
    <?foreach($arBlockOrder as $blockCode):?>
        <?include 'epilog_blocks/'.$blockCode.'.php';?>
    <?endforeach;?>
    <?include 'epilog_blocks/tags.php';?>

    <div class="new-service-additional">
        <h2 class="new-service-additional__heading">Дополнительные услуги</h2>

        <?
        global $arrFilterMoreServices;
        $arrFilterMoreServices = array('!ID' => $arResult['ID']);
        $APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "services-list_new",
            Array(
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "ADD_SECTIONS_CHAIN" => "N",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
                "CACHE_TIME" => "36000000",
                "CACHE_TYPE" => "A",
                "CHECK_DATES" => "Y",
                "DETAIL_URL" => "",
                "DISPLAY_BOTTOM_PAGER" => "Y",
                "DISPLAY_DATE" => "Y",
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "Y",
                "DISPLAY_TOP_PAGER" => "N",
                "FIELD_CODE" => array(
                    0 => "ID",
                    1 => "NAME",
                    2 => "PREVIEW_TEXT",
                    3 => "PREVIEW_PICTURE",
                    4 => "DETAIL_PICTURE",
                ),
                "FILTER_NAME" => "arrFilterMoreServices",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "IBLOCK_ID" => $arResult['IBLOCK_ID'],
                "IBLOCK_TYPE" => $arResult['IBLOCK_TYPE'],
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "INCLUDE_SUBSECTIONS" => "Y",
                "MESSAGE_404" => "",
                "NEWS_COUNT" => "300",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_TEMPLATE" => ".default",
                "PAGER_TITLE" => "Новости",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "PREVIEW_TRUNCATE_LEN" => "",
                "PROPERTY_CODE" => array(
                    0 => "FORM_ORDER",
                    1 => "PRICE",
                    2 => "PRICEOLD",
                    3 => "ECONOMY",
                    4 => "FILTER_PRICE",
                    5 => "for_show_1",
                    6 => "for_show_2",
                    7 => "for_show_3",
                    8 => "ICON",
                    9 => "TRANSPARENT_PICTURE",
                ),
                "SET_BROWSER_TITLE" => "N",
                "SET_LAST_MODIFIED" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_STATUS_404" => "N",
                "SET_TITLE" => "N",
                "SHOW_404" => "N",
                "SORT_BY1" => "SORT",
                "SORT_BY2" => "SORT",
                "SORT_ORDER1" => "ASC",
                "SORT_ORDER2" => "ASC",
                "STRICT_SECTION_CHECK" => "N",
                "ELEMENTS_ROW" => 3,
                "IMAGES" => "TRANSPARENT_PICTURES",
            )
        );?>
    </div>
</div>

<?
if($templateData['PHOTO_BEFORE']){
    $arExtensions[] = 'before_after_image';
}
if ($arExtensions) {
    TSolution\Extensions::init($arExtensions);
}
?>