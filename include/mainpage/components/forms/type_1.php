<?
$indexPageOptions = $GLOBALS['arTheme']['INDEX_TYPE']['SUB_PARAMS'][ $GLOBALS['arTheme']['INDEX_TYPE']['VALUE'] ];
$blockOptions = $indexPageOptions['FORMS'];
$blockTemplateOptions = $blockOptions['TEMPLATE']['LIST'][ $blockOptions['TEMPLATE']['VALUE'] ];
?>

<?$APPLICATION->IncludeComponent(
	"aspro:form.allcorp3motor", 
	"form-list", 
	array(
		"IBLOCK_TYPE" => "aspro_allcorp3motor_form",
		"IBLOCK_ID" => "14",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "100000",
		"AJAX_OPTION_ADDITIONAL" => "",
		"SEND_BUTTON_NAME" => "Отправить",
		"SEND_BUTTON_CLASS" => "btn btn-default btn-lg",
		"COMPONENT_TEMPLATE" => "form-list",
		"WEBFORM_ID" => "aspro_allcorp3motor_vin",
		"DISPLAY_CLOSE_BUTTON" => "Y",
		"CLOSE_BUTTON_NAME" => "Отправить еще",
		"CACHE_GROUPS" => "Y",
		"CENTERED" => $blockTemplateOptions["ADDITIONAL_OPTIONS"]["CENTERED"]["VALUE"],
		"LIGHT_TEXT" => $blockTemplateOptions["ADDITIONAL_OPTIONS"]["LIGHT_TEXT"]["VALUE"],
		"LIGHTEN_DARKEN" => $blockTemplateOptions["ADDITIONAL_OPTIONS"]["LIGHTEN_DARKEN"]["VALUE"],
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"SUBTITLE" => "Перезвоним и ответим на любой вопрос!",
		"TITLE" => "Оставьте заявку",
		"TYPE_BLOCK" => "BG_IMG",
		"SHOW_PREVIEW_TEXT" => "Y"
	),
	false
);?>
