<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Каталог CFMOTO представлен на сайте официального дилера ИАТ Спортив в Санкт-Петербурге. В нашем центре вы можете подобрать любой квадроцикл, мотоцикл или снегоход различных моделей и комплектаций");
$APPLICATION->SetPageProperty("title", "Каталог CFMOTO купить по выгодной цене в Санкт-Петербурге");

if (!$_GET['PAGEN_1']) {
	$APPLICATION->SetPageProperty("canonical", $APPLICATION->GetCurPage(false));
}
$APPLICATION->SetTitle("Каталог");
?><?$APPLICATION->IncludeComponent(
	"bitrix:catalog", 
	"main", 
	array(
		"ACTION_VARIABLE" => "action",
		"ADD_ELEMENT_CHAIN" => "Y",
		"ADD_PICT_PROP" => "PHOTOS",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"ASK_FORM_ID" => "",
		"BASKET_URL" => "/personal/basket.php",
		"BIG_GALLERY_PROP_CODE" => "GALLEY_BIG",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMMENTS_COUNT" => "5",
		"COMPARE_ELEMENT_SORT_FIELD" => "sort",
		"COMPARE_ELEMENT_SORT_ORDER" => "asc",
		"COMPARE_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"COMPARE_NAME" => "CATALOG_COMPARE_LIST",
		"COMPARE_PROPERTY_CODE" => array(
			0 => "ARTICLE",
			1 => "PRICE",
			2 => "START",
			3 => "SUPPLIED",
			4 => "VISCOSITY",
			5 => "THREAD",
			6 => "DIAMETER",
			7 => "DLINA",
			8 => "CAPACITY",
			9 => "CATEGORY",
			10 => "CLASS",
			11 => "CLIMAT_CLASS",
			12 => "FRICTION",
			13 => "MASS",
			14 => "MATERIAL",
			15 => "ELECTROD",
			16 => "MODEL",
			17 => "APPLICATION_AREA",
			18 => "VOLUME",
			19 => "FEATURES",
			20 => "FIT_FOR",
			21 => "START_VOLT",
			22 => "SIZE",
			23 => "PLACE",
			24 => "SERIES",
			25 => "PROIZVODSTVO",
			26 => "POUR_TEMP",
			27 => "TEMPERATURE",
			28 => "TEMP_REGIME",
			29 => "TYPE",
			30 => "THICKNESS_STEEL",
			31 => "MARK",
			32 => "SWALLOW",
			33 => "SHAPE",
			34 => "COLOR",
			35 => "WIDTH",
			36 => "",
		),
		"COMPATIBLE_MODE" => "Y",
		"COMPONENT_TEMPLATE" => "main",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"DETAIL_BACKGROUND_IMAGE" => "-",
		"DETAIL_BLOCKS_ALL_ORDER" => "sale,desc,char,reviews,big_gallery,video,sku,tariffs,services,projects,news,articles,docs,staff,faq,partners,vacancy,goods,buy,payment,delivery,dops,comments",
		"DETAIL_BLOCKS_ORDER" => "tabs,sku,sale,big_gallery,services,projects,news,articles,staff,partners,vacancy,goods,comments",
		"DETAIL_BLOCKS_TAB_ORDER" => "desc,delivery,complects,char,tariffs,video,docs,faq,reviews,buy,payment,dops",
		"DETAIL_BLOG_EMAIL_NOTIFY" => "N",
		"DETAIL_BLOG_TITLE" => "Отзывы",
		"DETAIL_BLOG_URL" => "catalog_comments",
		"DETAIL_BLOG_USE" => "Y",
		"DETAIL_BROWSER_TITLE" => "-",
		"DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
		"DETAIL_FB_APP_ID" => "APP_ID",
		"DETAIL_FB_TITLE" => "Facebook",
		"DETAIL_FB_USE" => "N",
		"DETAIL_META_DESCRIPTION" => "-",
		"DETAIL_META_KEYWORDS" => "-",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "BLOG_POST_ID",
			1 => "POPUP_VIDEO",
			2 => "BLOG_COMMENTS_CNT",
			3 => "SHOW_ON_INDEX_PAGE",
			4 => "LINK_REGION",
			5 => "STATUS",
			6 => "LINK_SKU",
			7 => "ARTICLE",
			8 => "FORM_QUESTION",
			9 => "PRICE",
			10 => "FORM_ORDER",
			11 => "PRICE_CURRENCY",
			12 => "PRICEOLD",
			13 => "ECONOMY",
			14 => "FILTER_PRICE",
			15 => "BNR_TOP",
			16 => "DATE_COUNTER",
			17 => "INCLUDE_TEXT",
			18 => "VIDEO",
			19 => "HIT",
			20 => "VIDEO_IFRAME",
			21 => "BEST_ITEM",
			22 => "LINK_STUDY",
			23 => "LINK_PARTNERS",
			24 => "LINK_PROJECTS",
			25 => "LINK_STAFF",
			26 => "LINK_ARTICLES",
			27 => "BRAND",
			28 => "LINK_TARIF",
			29 => "LINK_TIZERS",
			30 => "LINK_VACANCY",
			31 => "LINK_REVIEWS",
			32 => "LINK_NEWS",
			33 => "LINK_SERVICES",
			34 => "LINK_FAQ",
			35 => "LINK_SALE",
			36 => "LINK_GOODS_FILTER",
			37 => "LINK_GOODS",
			38 => "LINK_COMPLECT",
			39 => "SALE_TEXT",
			40 => "START",
			41 => "SUPPLIED",
			42 => "VISCOSITY",
			43 => "THREAD",
			44 => "DIAMETER",
			45 => "DLINA",
			46 => "CAPACITY",
			47 => "CATEGORY",
			48 => "CLASS",
			49 => "CLIMAT_CLASS",
			50 => "FRICTION",
			51 => "MARK_STEEL",
			52 => "MASS",
			53 => "MATERIAL",
			54 => "ELECTROD",
			55 => "MODEL",
			56 => "APPLICATION_AREA",
			57 => "VOLUME",
			58 => "FEATURES",
			59 => "FIT_FOR",
			60 => "START_VOLT",
			61 => "SIZE",
			62 => "PLACE",
			63 => "SERIES",
			64 => "PROIZVODSTVO",
			65 => "POUR_TEMP",
			66 => "TEMPERATURE",
			67 => "TEMP_REGIME",
			68 => "TYPE",
			69 => "THICKNESS_STEEL",
			70 => "MARK",
			71 => "SWALLOW",
			72 => "SHAPE",
			73 => "COLOR",
			74 => "WIDTH",
			75 => "RECOMMEND",
			76 => "DEMO_URL",
			77 => "AGE",
			78 => "KARTOPR",
			79 => "HEIGHT",
			80 => "DEPTH",
			81 => "DEEP",
			82 => "GRUZ_STRELI",
			83 => "GRUZ",
			84 => "DIAGONAL",
			85 => "DLINA_STRELI",
			86 => "KOL_FORMULA",
			87 => "USERS",
			88 => "EXTENSION",
			89 => "POWER",
			90 => "UPDATES",
			91 => "EDITION_1C",
			92 => "RESOLUTION",
			93 => "LIGHTS_LOCATION",
			94 => "SPEED",
			95 => "DURATION",
			96 => "TYPE_TUR",
			97 => "THICKNESS",
			98 => "INCREASE",
			99 => "FREQUENCY",
			100 => "FREQUENCE",
			101 => "WIDTH_PROHOD",
			102 => "WIDTH_PROEZD",
			103 => "LANGUAGES",
			104 => "CODE_TEXT",
			105 => "MORE_PHOTO",
			106 => "",
		),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DETAIL_STRICT_SECTION_CHECK" => "Y",
		"DETAIL_USE_COMMENTS" => "Y",
		"DETAIL_VK_API_ID" => "API_ID",
		"DETAIL_VK_TITLE" => "ВКонтакте",
		"DETAIL_VK_USE" => "N",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_ELEMENT_SELECT_BOX" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"DOCS_PROP_CODE" => "DOCUMENTS",
		"ELEMENTS_LIST_TYPE_VIEW" => "FROM_MODULE",
		"ELEMENTS_PRICE_TYPE_VIEW" => "FROM_MODULE",
		"ELEMENTS_TABLE_TYPE_VIEW" => "FROM_MODULE",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "asc",
		"ELEMENT_TYPE_VIEW" => "FROM_MODULE",
		"FILE_404" => "",
		"FILTER_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"FILTER_PRICE_CODE" => array(
			0 => "FILTER_PRICE",
		),
		"FILTER_PROPERTY_CODE" => array(
			0 => "STATUS",
			1 => "",
		),
		"FORUM_ID" => "",
		"IBLOCK_ID" => "38",
		"IBLOCK_TYPE" => "aspro_allcorp3motor_catalog",
		"INCLUDE_SUBSECTIONS" => "Y",
		"LANDING_IBLOCK_ID" => "36",
		"LANDING_SECTION_COUNT" => "20",
		"LANDING_SECTION_COUNT_VISIBLE" => "3",
		"LANDING_TIZER_IBLOCK_ID" => "16",
		"LINE_ELEMENT_COUNT" => "4",
		"LINKED_ELEMENT_TAB_SORT_FIELD" => "sort",
		"LINKED_ELEMENT_TAB_SORT_FIELD2" => "id",
		"LINKED_ELEMENT_TAB_SORT_ORDER" => "asc",
		"LINKED_ELEMENT_TAB_SORT_ORDER2" => "asc",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"LINK_IBLOCK_ID" => "38",
		"LINK_IBLOCK_TYPE" => "aspro_allcorp3motor_catalog",
		"LINK_PROPERTY_SID" => "LINK_COMPLECT",
		"LIST_BROWSER_TITLE" => "-",
		"LIST_META_DESCRIPTION" => "-",
		"LIST_META_KEYWORDS" => "-",
		"LIST_PROPERTY_CODE" => array(
			0 => "PROIZVODSTVO",
			1 => "RECOMMEND",
			2 => "DEPTH",
			3 => "GRUZ_STRELI",
			4 => "GRUZ",
			5 => "DLINA_STRELI",
			6 => "SPEED",
			7 => "WIDTH_PROHOD",
			8 => "WIDTH_PROEZD",
			9 => "",
		),
		"MAX_GALLERY_ITEMS" => "5",
		"MESSAGES_PER_PAGE" => "10",
		"MESSAGE_404" => "",
		"OPT_BUY" => "Y",
		"PAGER_BASE_LINK" => "",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_PARAMS_NAME" => "arrPager",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "main",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => "",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PATH_TO_SMILE" => "/bitrix/images/forum/smile/",
		"PRICE_CODE" => array(
			0 => "FILTER_PRICE",
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => "",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PROPERTIES_DISPLAY_TYPE" => "TABLE",
		"REVIEW_AJAX_POST" => "Y",
		"SALE_STIKER" => "-",
		"SECTIONS_LIST_PREVIEW_DESCRIPTION" => "Y",
		"SECTIONS_TYPE_VIEW" => "FROM_MODULE",
		"SECTION_BACKGROUND_IMAGE" => "-",
		"SECTION_COUNT_ELEMENTS" => "Y",
		"SECTION_DISPLAY_PROPERTY" => "UF_VIEWTYPE",
		"SECTION_ELEMENTS_TYPE_VIEW" => "FROM_MODULE",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_ITEM_LIST_IMG_CORNER" => "N",
		"SECTION_ITEM_LIST_OFFSET_CATALOG" => "Y",
		"SECTION_ITEM_LIST_TEXT_CENTER" => "N",
		"SECTION_LIST_DISPLAY_TYPE" => "3",
		"SECTION_LIST_PREVIEW_DESCRIPTION" => "Y",
		"SECTION_TOP_BLOCK_TITLE" => "Лучшие предложения",
		"SECTION_TOP_DEPTH" => "2",
		"SECTION_TYPE_VIEW" => "FROM_MODULE",
		"SEF_FOLDER" => "/product/",
		"SEF_MODE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "Y",
		"SHOW_404" => "Y",
		"SHOW_ASK_BLOCK" => "Y",
		"SHOW_BIG_GALLERY" => "N",
		"SHOW_BUY" => "N",
		"SHOW_CHILD_SECTIONS" => "Y",
		"SHOW_DEACTIVATED" => "N",
		"SHOW_DELIVERY" => "Y",
		"SHOW_DOPS" => "Y",
		"SHOW_GALLERY" => "Y",
		"SHOW_HINTS" => "Y",
		"SHOW_LANDINGS" => "N",
		"SHOW_LINK_TO_FORUM" => "Y",
		"SHOW_LIST_TYPE_SECTION" => "Y",
		"SHOW_ONE_CLINK_BUY" => "Y",
		"SHOW_PAYMENT" => "Y",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_SECTION_DESC" => "Y",
		"SHOW_SKU_DESCRIPTION" => "Y",
		"SHOW_TOP_ELEMENTS" => "N",
		"SKU_IBLOCK_ID" => "23",
		"SKU_PROPERTY_CODE" => array(
			0 => "FORM_ORDER",
			1 => "STATUS",
			2 => "ARTICLE",
			3 => "PRICE_CURRENCY",
			4 => "PRICE",
			5 => "PRICEOLD",
			6 => "ECONOMY",
			7 => "COLOR",
			8 => "GOST",
			9 => "DLINA",
			10 => "VYLET_STRELY",
			11 => "MARK_STEEL",
			12 => "WIDTH",
		),
		"SKU_SORT_FIELD" => "sort",
		"SKU_SORT_FIELD2" => "name",
		"SKU_SORT_ORDER" => "asc",
		"SKU_SORT_ORDER2" => "asc",
		"SKU_TREE_PROPS" => array(
			0 => "COLOR",
			1 => "DIAMETER",
			2 => "DLINA",
			3 => "VYLET_STRELY",
			4 => "THICKNESS_STEEL",
			5 => "WIDTH",
		),
		"SORT_DIRECTION" => "asc",
		"SORT_PROP" => array(
			0 => "name",
			1 => "sort",
			2 => "FILTER_PRICE",
		),
		"SORT_PROP_DEFAULT" => "sort",
		"TOP_ELEMENT_COUNT" => "9",
		"TOP_ELEMENT_SORT_FIELD" => "sort",
		"TOP_ELEMENT_SORT_FIELD2" => "id",
		"TOP_ELEMENT_SORT_ORDER" => "asc",
		"TOP_ELEMENT_SORT_ORDER2" => "desc",
		"TOP_LINE_ELEMENT_COUNT" => "3",
		"TOP_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"TYPE_BIG_GALLERY" => "BIG",
		"T_ARTICLES" => "",
		"T_BIG_GALLERY" => "Фотогалерея",
		"T_BUY" => "",
		"T_CHAR" => "",
		"T_COMPLECTS" => "",
		"T_DELIVERY" => "Аксессуары",
		"T_DESC" => "",
		"T_DOCS" => "",
		"T_DOPS" => "Фотогалерея",
		"T_FAQ" => "",
		"T_GOODS" => " ",
		"T_NEWS" => "",
		"T_PARTNERS" => "",
		"T_PAYMENT" => "",
		"T_PROJECTS" => "",
		"T_REVIEWS" => "",
		"T_SALE" => "",
		"T_SERVICES" => "",
		"T_SKU" => "",
		"T_STAFF" => "",
		"T_TARIFFS" => "",
		"T_VACANCY" => "",
		"T_VIDEO" => "",
		"URL_TEMPLATES_READ" => "",
		"USER_CONSENT" => "N",
		"USER_CONSENT_ID" => "0",
		"USER_CONSENT_IS_CHECKED" => "Y",
		"USER_CONSENT_IS_LOADED" => "N",
		"USE_CAPTCHA" => "Y",
		"USE_COMPARE" => "Y",
		"USE_COMPARE_GROUP" => "N",
		"USE_DETAIL_TABS" => "FROM_MODULE",
		"USE_ELEMENT_COUNTER" => "Y",
		"USE_FILTER" => "N",
		"USE_MAIN_ELEMENT_SECTION" => "Y",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"USE_REVIEW" => "Y",
		"USE_SHARE" => "Y",
		"USE_STORE" => "N",
		"VIEW_TYPE" => "table",
		"VISIBLE_PROP_COUNT" => "6",
		"SEF_URL_TEMPLATES" => array(
			"sections" => "",
			"section" => "#SECTION_CODE_PATH#/",
			"element" => "#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
			"compare" => "compare.php?action=#ACTION_CODE#",
			"smart_filter" => "#SECTION_CODE_PATH#/filter/#SMART_FILTER_PATH#/apply/",
		),
		"VARIABLE_ALIASES" => array(
			"compare" => array(
				"ACTION_CODE" => "action",
			),
		)
	),
	false
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>