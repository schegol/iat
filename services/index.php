<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Услуги");
?>

<?
global $USER;
if ($USER->IsAdmin()):?>
    <?$APPLICATION->SetPageProperty("robots", "noindex, nofollow");?>

    <?$APPLICATION->IncludeComponent(
        "bitrix:news",
        "services",
        array(
            "ADD_ELEMENT_CHAIN" => "Y",
            "ADD_SECTIONS_CHAIN" => "Y",
            "AJAX_MODE" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "BIG_GALLERY_PROP_CODE" => "PHOTOS",
            "BROWSER_TITLE" => "-",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "Y",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "CHECK_DATES" => "Y",
            "COMPOSITE_FRAME_MODE" => "A",
            "COMPOSITE_FRAME_TYPE" => "AUTO",
            "DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
            "DETAIL_BLOCKS_ALL_ORDER" => "order_form,desc,char,tizers,reviews,big_gallery,video,faq,services,sale,articles,docs,goods,dops,comments",
            "DETAIL_BLOCKS_ORDER" => "order_form,tabs,tizers,big_gallery,sale,services,goods,articles,comments",
            "DETAIL_BLOCKS_TAB_ORDER" => "desc,char,docs,faq,video,reviews,dops",
            "DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
            "DETAIL_DISPLAY_TOP_PAGER" => "N",
            "DETAIL_FIELD_CODE" => array(
                0 => "PREVIEW_TEXT",
                1 => "PREVIEW_PICTURE",
                2 => "DETAIL_TEXT",
                3 => "DETAIL_PICTURE",
                4 => "",
            ),
            "DETAIL_PAGER_SHOW_ALL" => "Y",
            "DETAIL_PAGER_TEMPLATE" => "",
            "DETAIL_PAGER_TITLE" => "Страница",
            "DETAIL_PROPERTY_CODE" => array(
                0 => "PRICE_CURRENCY",
                1 => "FORM_ORDER",
                2 => "PRICE",
                3 => "PRICEOLD",
                4 => "ECONOMY",
                5 => "PHOTOPOS",
                6 => "VIDEO_IFRAME",
                7 => "VIDEO",
                8 => "LINK_ARTICLES",
                9 => "LINK_TIZERS",
                10 => "LINK_SERVICES",
                11 => "LINK_GOODS_FILTER",
                12 => "LINK_GOODS",
                13 => "LINK_REVIEWS",
                14 => "LINK_SALE",
                15 => "LINK_FAQ",
                16 => "DISEGHNER_AT_PLACE",
                17 => "FOR_SHOW_4",
                18 => "FORM_QUESTION",
                19 => "GARANTIYA",
                20 => "AUTHOR_CONTROL",
                21 => "PROP2",
                22 => "FOR_SHOW_1",
                23 => "FOR_SHOW_5",
                24 => "MATERIAL_PICK",
                25 => "FOR_SHOW_2",
                26 => "FOR_SHOW_3",
                27 => "FOR_SHOW_6",
                28 => "TYPE_OF_BUILD",
                29 => "LINK_VACANCY",
                30 => "LINK_PARTNERS",
                31 => "LINK_STUDY",
                32 => "FOR_SHOW_7",
                33 => "FOR_SHOW_8",
                34 => "DOCUMENTS",
                35 => "PHOTOS",
                36 => "STATUS",
                37 => "ARTICLE",
                38 => "DATE_COUNTER",
                39 => "LINK_SKU",
                40 => "DEPTH",
                41 => "GRUZ_STRELI",
                42 => "GRUZ",
                43 => "DLINA_STRELI",
                44 => "VOLUME",
                45 => "RECOMMEND",
                46 => "SPEED",
                47 => "WIDTH_PROHOD",
                48 => "WIDTH_PROEZD",
                49 => "",
            ),
            "DETAIL_SET_CANONICAL_URL" => "N",
            "DETAIL_USE_COMMENTS" => "Y",
            "DISPLAY_BOTTOM_PAGER" => "Y",
            "DISPLAY_DATE" => "Y",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "Y",
            "DISPLAY_PREVIEW_TEXT" => "Y",
            "DISPLAY_TOP_PAGER" => "N",
            "DOCS_PROP_CODE" => "DOCUMENTS",
            "ELEMENT_TYPE_VIEW" => "FROM_MODULE",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "IBLOCK_ID" => "47",
            "IBLOCK_TYPE" => "aspro_allcorp3motor_content",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "INCLUDE_SUBSECTIONS" => "Y",
            "LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
            "LIST_FIELD_CODE" => array(
                0 => "ID",
                1 => "NAME",
                2 => "PREVIEW_TEXT",
                3 => "PREVIEW_PICTURE",
                4 => "DETAIL_PICTURE",
                5 => "",
            ),
            "LIST_PROPERTY_CODE" => array(
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
                10 => "",
            ),
            "MESSAGE_404" => "",
            "META_DESCRIPTION" => "-",
            "META_KEYWORDS" => "-",
            "NEWS_COUNT" => "20",
            "PAGER_BASE_LINK_ENABLE" => "N",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "N",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => "main",
            "PAGER_TITLE" => "Новости",
            "PREVIEW_TRUNCATE_LEN" => "",
            "SECTIONS_TYPE_VIEW" => "FROM_MODULE",
            "SECTION_ELEMENTS_TYPE_VIEW" => "FROM_MODULE",
            "SECTION_TYPE_VIEW" => "FROM_MODULE",
            "SEF_FOLDER" => "/services/",
            "SEF_MODE" => "Y",
            "SET_LAST_MODIFIED" => "N",
            "SET_STATUS_404" => "N",
            "SET_TITLE" => "Y",
            "SHOW_404" => "N",
            "SHOW_BIG_GALLERY" => "Y",
            "SHOW_BUY" => "N",
            "SHOW_CHILD_ELEMENTS" => "Y",
            "SHOW_CHILD_SECTIONS" => "Y",
            "SHOW_DELIVERY" => "N",
            "SHOW_DETAIL_LINK" => "Y",
            "SHOW_DOPS" => "Y",
            "SHOW_PAYMENT" => "N",
            "SHOW_SECTION" => "Y",
            "SHOW_SECTION_DESCRIPTION" => "Y",
            "SHOW_SECTION_PREVIEW_DESCRIPTION" => "Y",
            "SORT_BY1" => "ACTIVE_FROM",
            "SORT_BY2" => "SORT",
            "SORT_ORDER1" => "DESC",
            "SORT_ORDER2" => "ASC",
            "STRICT_SECTION_CHECK" => "N",
            "T_ARTICLES" => "",
            "T_BIG_GALLERY" => "",
            "T_CHAR" => "",
            "T_COMMENTS" => "comm",
            "T_DESC" => "",
            "T_DOCS" => "",
            "T_GOODS" => "Вам может понравиться",
            "T_PARTNERS" => "",
            "T_REVIEWS" => "",
            "T_SALE" => "",
            "T_SERVICES" => "",
            "T_VACANCY" => "",
            "T_VIDEO" => "",
            "USE_CATEGORIES" => "N",
            "USE_FILTER" => "N",
            "USE_PERMISSIONS" => "N",
            "USE_RATING" => "N",
            "USE_RSS" => "Y",
            "USE_SEARCH" => "N",
            "USE_SHARE" => "Y",
            "COMPONENT_TEMPLATE" => "services",
            "TYPE_BIG_GALLERY" => "SMALL",
            "USE_DETAIL_TABS" => "FROM_MODULE",
            "S_ASK_QUESTION" => "",
            "S_ORDER_SERVISE" => "",
            "FORM_ID_ORDER_SERVISE" => "aspro_lite_order_services",
            "T_DOPS" => "",
            "DETAIL_BLOG_USE" => "N",
            "DETAIL_BLOG_URL" => "catalog_comments",
            "COMMENTS_COUNT" => "5",
            "DETAIL_BLOG_TITLE" => "Комментарии",
            "DETAIL_BLOG_EMAIL_NOTIFY" => "N",
            "DETAIL_VK_USE" => "Y",
            "DETAIL_FB_USE" => "Y",
            "PROPERTIES_DISPLAY_TYPE" => "TABLE",
            "DETAIL_VK_TITLE" => "ВКонтакте",
            "DETAIL_VK_API_ID" => "API_ID",
            "DETAIL_FB_TITLE" => "Facebook",
            "DETAIL_FB_APP_ID" => "APP_ID",
            "DETAIL_USE_TAGS" => "N",
            "SHOW_CATEGORY" => "N",
            "SHOW_ELEMENTS_IN_LAST_SECTION" => "N",
            "SKU_IBLOCK_ID" => "16",
            "SKU_PROPERTY_CODE" => array(
                0 => "FORM_ORDER",
                1 => "STATUS",
                2 => "PRICE_CURRENCY",
                3 => "PRICE",
                4 => "PRICEOLD",
                5 => "ECONOMY",
            ),
            "SKU_TREE_PROPS" => "",
            "SKU_SORT_FIELD" => "sort",
            "SKU_SORT_ORDER" => "asc",
            "SKU_SORT_FIELD2" => "name",
            "SKU_SORT_ORDER2" => "asc",
            "USE_REVIEW" => "Y",
            "T_FAQ" => "",
            "MESSAGES_PER_PAGE" => "10",
            "USE_CAPTCHA" => "Y",
            "REVIEW_AJAX_POST" => "Y",
            "PATH_TO_SMILE" => "/bitrix/images/forum/smile/",
            "FORUM_ID" => "",
            "URL_TEMPLATES_READ" => "",
            "SHOW_LINK_TO_FORUM" => "Y",
            "SHOW_ELEMENT_PREVIEW_DESCRIPTION" => "N",
            "TITLE_BLOCK_QUESTION" => "Заказать услугу",
            "NUM_NEWS" => "20",
            "NUM_DAYS" => "30",
            "YANDEX" => "N",
            "SEF_URL_TEMPLATES" => array(
                "news" => "",
                "section" => "#SECTION_CODE_PATH#/",
                "detail" => "#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
            )
        ),
        false
    );?>
<?else:?>
    <p>Ремонт и сервисное обслуживание мототехники и снегоходов.</p>

    <table>
        <tbody>
        <tr>
            <td>Работа</td>
            <td>Стоимость</td>
        </tr>
        <tr>
            <td>ТО-25 часов</td>
            <td>от 3700</td>
        </tr>
        <tr>
            <td>ТО-50 часов</td>
            <td>от 5550</td>
        </tr>
        <tr>
            <td>ТО-100 часов</td>
            <td>от 7400</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        </tbody>
    </table><br>
<?endif?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>