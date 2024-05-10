<?$APPLICATION->IncludeComponent(
	"bitrix:search.title", 
	"corp", 
	array(
		"NUM_CATEGORIES" => "1",
		"TOP_COUNT" => "10",
		"ORDER" => "date",
		"USE_LANGUAGE_GUESS" => "Y",
		"CHECK_DATES" => "Y",
		"SHOW_OTHERS" => "Y",
		"PAGE" => SITE_DIR."search/",
		"CATEGORY_OTHERS_TITLE" => GetMessage("S_OTHER"),
		"CATEGORY_0_TITLE" => GetMessage("S_CONTENT"),
		"CATEGORY_0_iblock_aspro_".VENDOR_SOLUTION_NAME."_catalog" => array("all"),
		"CATEGORY_0_iblock_aspro_".VENDOR_SOLUTION_NAME."_content" => array("all"),
		"SHOW_INPUT" => "Y",
		"INPUT_ID" => "title-search-input",
		"CONTAINER_ID" => "title-search",
		"PREVIEW_TRUNCATE_LEN" => "",
		"SHOW_PREVIEW" => "Y",
		"PREVIEW_WIDTH" => "25",
		"PREVIEW_HEIGHT" => "25"
	),
	false
);?>
