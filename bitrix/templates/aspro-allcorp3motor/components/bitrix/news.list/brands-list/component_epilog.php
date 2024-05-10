<?
if (!$templateData['ITEMS']) {
	$GLOBALS['APPLICATION']->SetPageProperty('BLOCK_BRANDS', 'hidden');
}

$arExtensions = ['swiper'];
if ($arExtensions) {
	TSolution\Extensions::init($arExtensions);
}
?>