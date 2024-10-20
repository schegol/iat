<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Контакты мотосалона CFMOTO – официального дилера ИАТ Спортив в Санкт-Петербурге");
$APPLICATION->SetPageProperty("title", "Контакты – ИАТ Спортив");
$APPLICATION->SetPageProperty("canonical", $APPLICATION->GetCurPage(false));
$APPLICATION->SetTitle("Контакты");
?>
<script type="application/ld+json">
        {
         "@context": "https://schema.org",
         "@type": "MotorcycleDealer",
         "name": "ИАТ Спортив",
         "url": "https://iat-sportive.ru/",
         "logo": "https://iat-sportive.ru/upload/CAllcorp3Motor/782/0nz2c4xs8xakalib1u0wa7nhv93dq11o.png",
         "description": "Официальный дилер мототехники CFMOTO в Санкт-Петербурге",
         "address": {
          "@type": "PostalAddress",
          "streetAddress": "ул. Торговая, 22",
          "addressLocality": "Санкт-Петербург",
          "postalCode": "188660",
          "addressCountry": "RU"
         },
         "telephone": "+7 (812) 337 08 87",
         "openingHoursSpecification": [
          {
           "@type": "OpeningHoursSpecification",
           "dayOfWeek": [
            "Monday",
            "Tuesday",
            "Wednesday",
            "Thursday",
            "Friday",
            "Saturday",
            "Sunday"
           ],
           "opens": "09:00",
           "closes": "21:00"
          }
         ]
        }
</script>

<?$APPLICATION->IncludeComponent(
	"bitrix:news", 
	"contacts", 
	array(
		"IBLOCK_TYPE" => "aspro_allcorp3motor_content",
		"IBLOCK_ID" => "32",
		"NEWS_COUNT" => "999",
		"USE_SEARCH" => "N",
		"USE_RSS" => "N",
		"USE_RATING" => "N",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "Y",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "ID",
		"SORT_ORDER2" => "ASC",
		"CHECK_DATES" => "Y",
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "/contacts/",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "N",
		"SET_TITLE" => "Y",
		"SET_STATUS_404" => "Y",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"USE_PERMISSIONS" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"LIST_ACTIVE_DATE_FORMAT" => "j F Y",
		"LIST_FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "PREVIEW_PICTURE",
			3 => "DETAIL_PICTURE",
			4 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "ADDRESS",
			1 => "METRO",
			2 => "PHONE",
			3 => "EMAIL",
			4 => "SCHEDULE",
			5 => "PAY_TYPE",
			6 => "MAP",
			7 => "",
		),
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"DISPLAY_NAME" => "Y",
		"META_KEYWORDS" => "-",
		"META_DESCRIPTION" => "-",
		"BROWSER_TITLE" => "-",
		"DETAIL_ACTIVE_DATE_FORMAT" => "j F Y",
		"DETAIL_FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "DETAIL_TEXT",
			3 => "DETAIL_PICTURE",
			4 => "DATE_ACTIVE_FROM",
			5 => "",
		),
		"DETAIL_PROPERTY_CODE" => array(
			0 => "ADDRESS",
			1 => "METRO",
			2 => "PHONE",
			3 => "EMAIL",
			4 => "SCHEDULE",
			5 => "PAY_TYPE",
			6 => "MAP",
			7 => "MORE_PHOTOS",
			8 => "",
		),
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "N",
		"DETAIL_PAGER_TITLE" => "",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_SHOW_ALL" => "N",
		"PAGER_TEMPLATE" => "main",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"USE_SHARE" => "N",
		"USE_REVIEW" => "N",
		"ADD_ELEMENT_CHAIN" => "Y",
		"SHOW_DETAIL_LINK" => "Y",
		"COMPONENT_TEMPLATE" => "contacts",
		"SET_LAST_MODIFIED" => "Y",
		"DETAIL_SET_CANONICAL_URL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "Y",
		"MESSAGE_404" => "",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"INCLUDE_SUBSECTIONS" => "Y",
		"FILTER_NAME" => "arFilterContacts",
		"FILTER_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_STRICT_SECTION_CHECK" => "N",
		"STRICT_SECTION_CHECK" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"СHOOSE_REGION_TEXT" => "",
		"FILE_404" => "",
		"SECTIONS_TYPE_VIEW" => "FROM_MODULE",
		"SECTION_ELEMENTS_TYPE_VIEW" => "list_elements_1",
		"ELEMENT_TYPE_VIEW" => "element_1",
		"CHOOSE_REGION_TEXT" => "",
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
			"section" => "#SECTION_CODE#/",
			"detail" => "#SECTION_CODE#/#ELEMENT_ID#/",
		)
	),
	false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>