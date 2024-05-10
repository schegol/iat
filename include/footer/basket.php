<?
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/vendor/php/solution.php');

\Bitrix\Main\Loader::includeModule(VENDOR_MODULE_ID);

$template = strtolower(TSolution::GetFrontParametrValue('ORDER_BASKET_VIEW'));
if($bUseBasket = TSolution::GetFrontParametrValue('ORDER_VIEW') === 'Y'){
	$arBasketItems = TSolution::processBasket();
}
?>
<?$APPLICATION->IncludeComponent(
	"aspro:basket.".VENDOR_SOLUTION_NAME, 
	$template, 
	array(
		"COMPONENT_TEMPLATE" => $template,
		"SHOW_404" => "N",
		"HIDE_ON_CART_PAGE" => "Y",
	),
	false, array("HIDE_ICONS" => "Y")
);?>