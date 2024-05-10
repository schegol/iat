<?global $arTheme;?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.detail",
	"news",
	Array(
		"S_ASK_QUESTION" => $arParams["S_ASK_QUESTION"],
		"S_ORDER_SERVISE" => $arParams["S_ORDER_SERVISE"],
		"GRUPPER_PROPS" => $arParams["GRUPPER_PROPS"],
		"USE_DETAIL_TABS" => 'N',
		"SHOW_CATEGORY" => $arParams['SHOW_CATEGORY'],
		"DETAIL_USE_TAGS" => $arParams['DETAIL_USE_TAGS'],
		"T_DESC" => ($arParams["T_DESC"] ? $arParams["T_DESC"] : GetMessage("T_DESC")),
		"T_CHAR" => ($arParams["T_CHAR"] ? $arParams["T_CHAR"] : GetMessage("T_CHARACTERISTICS")),
		"T_DOCS" => ($arParams["T_DOCS"] ? $arParams["T_DOCS"] : GetMessage("T_DOCS")),
		"T_FAQ" => ($arParams["T_FAQ"] ? $arParams["T_FAQ"] : GetMessage("T_FAQ")),
		"T_REVIEWS" => ($arParams["T_REVIEWS"] ? $arParams["T_REVIEWS"] : GetMessage("T_REVIEWS")),
		"T_SALE" => ($arParams["T_SALE"] ? $arParams["T_SALE"] : GetMessage("T_SALE")),
		"T_SERVICES" => ($arParams["T_SERVICES"] ? $arParams["T_SERVICES"] : GetMessage("T_SERVICES")),
		"T_NEWS" => ($arParams["T_NEWS"] ? $arParams["T_NEWS"] : GetMessage("T_NEWS")),
		"T_ARTICLES" => ($arParams["T_ARTICLES"] ? $arParams["T_ARTICLES"] : GetMessage("T_ARTICLES")),
		"T_PROJECTS" => ($arParams["T_PROJECTS"] ? $arParams["T_PROJECTS"] : GetMessage("T_PROJECTS")),
		"T_STAFF" => ($arParams["T_STAFF"] ? $arParams["T_STAFF"] : GetMessage("T_STAFF2")),
		"T_PARTNERS" => ($arParams["T_PARTNERS"] ? $arParams["T_PARTNERS"] : GetMessage("T_PARTNERS")),
		"T_VACANCY" => ($arParams["T_VACANCY"] ? $arParams["T_VACANCY"] : GetMessage("T_VACANCY")),
		"T_VIDEO" => ($arParams["T_VIDEO"] ? $arParams["T_VIDEO"] : GetMessage("T_VIDEO")),
		"T_GOODS" => ($arParams["T_GOODS"] ? $arParams["T_GOODS"] : GetMessage("T_GOODS")),
		"SHOW_DOPS" => $arParams["SHOW_DOPS"],
		"T_DOPS" => ($arParams["T_DOPS"] ? $arParams["T_DOPS"] : GetMessage("T_DOPS")),
		"T_MAP" => ($arParams["T_MAP"] ? $arParams["T_MAP"] : GetMessage("T_MAP")),

		"T_LANDINGS" => $arParams["T_LANDINGS"],
		"LANDING_SECTION_COUNT" => $arParams["LANDING_SECTION_COUNT"] < 1 ? 1 : $arParams["LANDING_SECTION_COUNT"],
		"LANDING_SECTION_COUNT_VISIBLE" => $arParams["LANDING_SECTION_COUNT_VISIBLE"] < 1 ? 1 : $arParams["LANDING_SECTION_COUNT_VISIBLE"],

		"TAB_DOPS_NAME" => $arParams["TAB_DOPS_NAME"],

		"CATALOG_IBLOCK_ID" => $arParams["CATALOG_IBLOCK_ID"],

		"SKU_IBLOCK_ID"	=>	$arParams["SKU_IBLOCK_ID"],
		"SKU_TREE_PROPS"	=>	$arParams["SKU_TREE_PROPS"],
		"SKU_PROPERTY_CODE"	=>	$arParams["SKU_PROPERTY_CODE"],
		"SKU_SORT_FIELD" => $arParams["SKU_SORT_FIELD"],
		"SKU_SORT_ORDER" => $arParams["SKU_SORT_ORDER"],
		"SKU_SORT_FIELD2" => $arParams["SKU_SORT_FIELD2"],
		"SKU_SORT_ORDER2" =>$arParams["SKU_SORT_ORDER2"],
		
		"SORT_PROP" => $arParams["SORT_PROP"],
		"SORT_PROP_DEFAULT" => $arParams["SORT_PROP_DEFAULT"],
		"SORT_DIRECTION" => $arParams["SORT_DIRECTION"],
		"VIEW_TYPE" => $arParams["VIEW_TYPE"],

		"OPT_BUY" => $arParams["OPT_BUY"],
		"SHOW_DISCOUNT" => $arParams["SHOW_DISCOUNT"],
		"SECTION_LIST_DISPLAY_TYPE" => $arParams["SECTION_LIST_DISPLAY_TYPE"],


		"FORM_ID_ORDER_SERVISE" => ($arParams["FORM_ID_ORDER_SERVISE"] ? $arParams["FORM_ID_ORDER_SERVISE"] : "aspro_".VENDOR_SOLUTION_NAME."_order_service"),
		"VISIBLE_PROP_COUNT" => $arParams["VISIBLE_PROP_COUNT"],
		"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
		"DISPLAY_NAME" => $arParams["DISPLAY_NAME"],
		"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
		"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
		"DETAIL_DOCS_PROP" => $arParams["DOCS_PROP_CODE"],
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"FIELD_CODE" => $arParams["DETAIL_FIELD_CODE"],
		"PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
		"DETAIL_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
		"SECTION_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"META_KEYWORDS" => $arParams["META_KEYWORDS"],
		"META_DESCRIPTION" => $arParams["META_DESCRIPTION"],
		"BROWSER_TITLE" => $arParams["BROWSER_TITLE"],
		"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
		"SET_CANONICAL_URL" => $arParams["DETAIL_SET_CANONICAL_URL"],
		'STRICT_SECTION_CHECK' => (isset($arParams['STRICT_SECTION_CHECK']) ? $arParams['STRICT_SECTION_CHECK'] : ''),
		"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
		"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
		"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
		"SET_TITLE" => $arParams["SET_TITLE"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
		"ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
		"ADD_ELEMENT_CHAIN" => $arParams["ADD_ELEMENT_CHAIN"],
		"ACTIVE_DATE_FORMAT" => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
		"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
		"DISPLAY_TOP_PAGER" => $arParams["DETAIL_DISPLAY_TOP_PAGER"],
		"DISPLAY_BOTTOM_PAGER" => $arParams["DETAIL_DISPLAY_BOTTOM_PAGER"],
		"PAGER_TITLE" => $arParams["DETAIL_PAGER_TITLE"],
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => $arParams["DETAIL_PAGER_TEMPLATE"],
		"PAGER_SHOW_ALL" => $arParams["DETAIL_PAGER_SHOW_ALL"],
		"CHECK_DATES" => $arParams["CHECK_DATES"],
		"ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
		"ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
		"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
		"USE_SHARE" 			=> $arParams["USE_SHARE"],
		"SHARE_HIDE" 			=> $arParams["SHARE_HIDE"],
		"SHARE_TEMPLATE" 		=> $arParams["SHARE_TEMPLATE"],
		"SHARE_HANDLERS" 		=> $arParams["SHARE_HANDLERS"],
		"SHARE_SHORTEN_URL_LOGIN"	=> $arParams["SHARE_SHORTEN_URL_LOGIN"],
		"SHARE_SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
		"GALLERY_TYPE" => $arParams["GALLERY_TYPE"],
		"NEWS_IBLOCK_ID" => $arParams["NEWS_IBLOCK_ID"],
		"SALES_IBLOCK_ID" => $arParams["SALES_IBLOCK_ID"],
		"PROJECTS_IBLOCK_ID" => $arParams["PROJECTS_IBLOCK_ID"],
		"FAQ_IBLOCK_ID" => $arParams["FAQ_IBLOCK_ID"],
		"REVIEWS_IBLOCK_ID" => $arParams["REVIEWS_IBLOCK_ID"],
		"STAFF_IBLOCK_ID" => $arParams["STAFF_IBLOCK_ID"],
		"CATALOG_IBLOCK_ID" => $arParams["CATALOG_IBLOCK_ID"],
		"SERVICES_IBLOCK_ID" => $arParams["SERVICES_IBLOCK_ID"],
		"ARTICLES_IBLOCK_ID" => $arParams["ARTICLES_IBLOCK_ID"],
		"SALE_IBLOCK_ID" => ($arParams["SALE_IBLOCK_ID"] ? $arParams["SALE_IBLOCK_ID"] : TSolution\Cache::$arIBlocks[SITE_ID]["aspro_".VENDOR_SOLUTION_NAME."_content"]["aspro_".VENDOR_SOLUTION_NAME."_sales"][0]),
		"STUDY_IBLOCK_ID" => $arParams["STUDY_IBLOCK_ID"],
		"SHOW_ADDITIONAL_TAB" => $arParams["SHOW_ADDITIONAL_TAB"],
		"GOODS_TEMPLATE" => ($arParams["ELEMENTS_TABLE_TYPE_VIEW"] ? ($arParams["ELEMENTS_TABLE_TYPE_VIEW"] == "FROM_MODULE" ? $arTheme["ELEMENTS_TABLE_TYPE_VIEW"]["VALUE"] : $arParams["ELEMENTS_TABLE_TYPE_VIEW"]) : "catalog_linked"),

		"DETAIL_BLOCKS_ORDER" => ($arParams["DETAIL_BLOCKS_ORDER"] ? $arParams["DETAIL_BLOCKS_ORDER"] : 'tabs,big_gallery,services,sale,projects,news,articles,licenses,staff,partners,vacancy,goods,comments'),
		"DETAIL_BLOCKS_TAB_ORDER" => ($arParams["DETAIL_BLOCKS_TAB_ORDER"] ? $arParams["DETAIL_BLOCKS_TAB_ORDER"] : 'desc,char,docs,faq,video,reviews,custom_tab'),
		"DETAIL_BLOCKS_ALL_ORDER" => ($arParams["DETAIL_BLOCKS_ALL_ORDER"] ? $arParams["DETAIL_BLOCKS_ALL_ORDER"] : 'desc,char,reviews,big_gallery,video,services,sale,news,articles,docs,licenses,staff,faq,projects,partners,vacancy,goods,custom_tab,comments'),

		"PROPERTIES_DISPLAY_TYPE" => $arParams["PROPERTIES_DISPLAY_TYPE"],
		"SHOW_BIG_GALLERY" => $arParams["SHOW_BIG_GALLERY"],
		"TYPE_BIG_GALLERY" => $arParams["TYPE_BIG_GALLERY"],
		"BIG_GALLERY_PROP_CODE" => $arParams["BIG_GALLERY_PROP_CODE"],
		"TOP_GALLERY_PROP_CODE" => $arParams["TOP_GALLERY_PROP_CODE"],
		"T_BIG_GALLERY" => ($arParams["T_BIG_GALLERY"] ? $arParams["T_BIG_GALLERY"] : GetMessage("T_BIG_GALLERY")),

		"COMMENTS_COUNT" => $arParams['COMMENTS_COUNT'],
		"DETAIL_USE_COMMENTS" => $arParams['DETAIL_USE_COMMENTS'],
		"FB_USE" => $arParams["DETAIL_FB_USE"],
		"VK_USE" => $arParams["DETAIL_VK_USE"],
		"BLOG_USE" => $arParams["DETAIL_BLOG_USE"],
		"BLOG_TITLE" => $arParams["DETAIL_BLOG_TITLE"],
		"BLOG_URL" => $arParams["DETAIL_BLOG_URL"],
		"BLOG_EMAIL_NOTIFY" => $arParams["DETAIL_BLOG_EMAIL_NOTIFY"],
		"FB_TITLE" => $arParams["DETAIL_FB_TITLE"],
		"FB_APP_ID" => $arParams["DETAIL_FB_APP_ID"],
		"VK_TITLE" => $arParams["DETAIL_VK_TITLE"],
		"VK_API_ID" => $arParams["DETAIL_VK_API_ID"],
		
		"ORDER_VIEW" => $bOrderViewBasket,
		"ORDER_BASKET" => false,
	),
	$component
);?>