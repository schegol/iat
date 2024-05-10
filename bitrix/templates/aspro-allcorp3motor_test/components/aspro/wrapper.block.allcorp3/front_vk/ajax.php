<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$codeBlock = 'VK';
$indexType = TSolution::GetFrontParametrValue('INDEX_TYPE');
$blockType = TSolution::GetFrontParametrValue($indexType.'_'.$codeBlock.'_TEMPLATE');

if($arParams['WIDE'] === 'FROM_THEME'){
	$arParams['WIDE'] = TSolution::GetFrontParametrValue($indexType.'_'.$codeBlock.'_WIDE_'.$blockType);
}

if($arParams['ITEMS_OFFSET'] === 'FROM_THEME'){
	$arParams['ITEMS_OFFSET'] = TSolution::GetFrontParametrValue($indexType.'_'.$codeBlock.'_ITEMS_OFFSET_'.$blockType);
}

if($arParams['SHOW_TITLE'] === "FROM_THEME"){
	$arParams['SHOW_TITLE'] = TSolution::GetFrontParametrValue('SHOW_TITLE_'.$codeBlock.'_'.$indexType);
}

if($arParams['LINE_ELEMENT_COUNT'] === "FROM_THEME"){
	$arParams['LINE_ELEMENT_COUNT'] = TSolution::GetFrontParametrValue($indexType.'_'.$codeBlock.'_ELEMENTS_COUNT_'.$blockType);
}
if($arParams['TITLE_POSITION'] === 'FROM_THEME'){
	$arParams['TITLE_POSITION'] = TSolution::GetFrontParametrValue('TITLE_POSITION_'.$codeBlock.'_'.$indexType);
}

foreach($arParams as $code => $value){
	if ( $value === 'FROM_THEME' && strpos($code, "~") === false ) {
		$arParams[$code] = TSolution::GetFrontParametrValue($code);
	}
}

$arParams['RIGHT_LINK_EXTERNAL'] = true;
?>
<?$APPLICATION->IncludeComponent(
	"aspro:vk.".VENDOR_SOLUTION_NAME,
	"",
	Array(
		"COMPOSITE_FRAME_MODE" => $arParams['COMPOSITE_FRAME_MODE'],
		"COMPOSITE_FRAME_TYPE" => $arParams['COMPOSITE_FRAME_TYPE'],
		"API_TOKEN_VK" => $arParams['API_TOKEN_VK'],
		"GROUP_ID_VK" => $arParams['GROUP_ID_VK'],
		"TITLE" => $arParams['VK_TITLE_BLOCK'],
		"SHOW_TITLE" => $arParams["SHOW_TITLE"],
		"RIGHT_TITLE" => $arParams['VK_TITLE_ALL_BLOCK'],
		"ELEMENTS_ROW" => $arParams['LINE_ELEMENT_COUNT'],
		"VK_TEXT_LENGTH" => $arParams['VK_TEXT_LENGTH'],
		"CACHE_TYPE" => $arParams['CACHE_TYPE'],
		"CACHE_TIME" => $arParams['CACHE_TIME'],
		"CACHE_GROUPS" => $arParams['CACHE_GROUPS'],
		"RIGHT_LINK_EXTERNAL" => $arParams['RIGHT_LINK_EXTERNAL'],
		"WIDE" =>  $arParams["WIDE"],
		"TITLE_POSITION" => $arParams['TITLE_POSITION'],
	)
);?>