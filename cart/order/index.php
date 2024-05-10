<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Оформление заказа");
?>
<?$APPLICATION->IncludeComponent(
	"aspro:basket.allcorp3motor",
	"order",
	Array(
		"COMPONENT_TEMPLATE" => "order",
	)
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>