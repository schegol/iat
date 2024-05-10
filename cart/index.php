<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Корзина");
?>
<?$APPLICATION->IncludeComponent(
	"aspro:basket.allcorp3motor", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>