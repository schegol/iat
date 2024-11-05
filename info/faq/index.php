<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Вопросы и ответы о компании марки CFMOTO на сайте официального дилера ИАТ Спортив в Санкт-Петербурге");
$APPLICATION->SetPageProperty("title", "Вопросы и ответы – ИАТ Спортив");
$APPLICATION->SetTitle("Вопросы и ответы");
?>

<?
global $USER;
if (!$USER->IsAdmin()) {
    header('Location: /', true, 301);
    exit();
}
?>

<div>В данном разделе приведены ответы на часто задаваемые вопросы посетителей вашего будущего сайта. Использование данного раздела позволит сократить нагрузку на операторов и повысить удовлетворенность ваших клиентов. </div>
<div>
	<br />
</div>
<?$APPLICATION->IncludeComponent(
	"bitrix:news", 
	"faq", 
	array(
		"IBLOCK_ID" => "28",
		"IBLOCK_TYPE" => "aspro_allcorp3motor_content",
		"NEWS_COUNT" => "20",
		"USE_SEARCH" => "N",
		"USE_RSS" => "N",
		"USE_RATING" => "N",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "N",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "ID",
		"SORT_ORDER2" => "DESC",
		"CHECK_DATES" => "Y",
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "/company/faq/",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "100000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"SET_TITLE" => "Y",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"USE_PERMISSIONS" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(
			0 => "PREVIEW_TEXT",
			1 => "PREVIEW_PICTURE",
			2 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "TITLE_BUTTON",
			1 => "LINK_BUTTON",
			2 => "",
		),
		"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
		"DISPLAY_NAME" => "Y",
		"META_KEYWORDS" => "-",
		"META_DESCRIPTION" => "-",
		"BROWSER_TITLE" => "-",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_PROPERTY_CODE" => array(
			0 => "TITLE_BUTTON",
			1 => "LINK_BUTTON",
			2 => "",
		),
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"VIEW_TYPE" => "accordion",
		"SHOW_TABS" => "Y",
		"SHOW_SECTION_PREVIEW_DESCRIPTION" => "Y",
		"SHOW_SECTION_NAME" => "N",
		"USE_SHARE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"USE_REVIEW" => "N",
		"ADD_ELEMENT_CHAIN" => "N",
		"SHOW_DETAIL_LINK" => "Y",
		"COUNT_IN_LINE" => "3",
		"IMAGE_POSITION" => "left",
		"COMPONENT_TEMPLATE" => "faq",
		"SECTION_ELEMENTS_TYPE_VIEW" => "list_elements_1",
		"SET_LAST_MODIFIED" => "N",
		"STRICT_SECTION_CHECK" => "N",
		"SHOW_ASK_QUESTION_BLOCK" => "Y",
		"S_ASK_QUESTION" => "",
		"DETAIL_SET_CANONICAL_URL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
			"section" => "",
			"detail" => "",
		)
	),
	false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>