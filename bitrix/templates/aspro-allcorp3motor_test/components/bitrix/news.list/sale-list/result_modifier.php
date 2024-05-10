<?
foreach($arResult['ITEMS'] as $key => &$arItem){
	$arItem['DETAIL_PAGE_URL'] = TSolution::FormatNewsUrl($arItem);

	TSolution::getFieldImageData($arResult['ITEMS'][$key], array('PREVIEW_PICTURE'));
}
unset($arItem);
?>