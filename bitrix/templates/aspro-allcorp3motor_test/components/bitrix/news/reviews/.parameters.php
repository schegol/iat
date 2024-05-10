<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/* get component template pages & params array */
$arPageBlocksParams = array();
if(\Bitrix\Main\Loader::includeModule(VENDOR_MODULE_ID)){
	$arPageBlocks = TSolution::GetComponentTemplatePageBlocks(__DIR__);
	$arPageBlocksParams = TSolution::GetComponentTemplatePageBlocksParams($arPageBlocks);
}

$arTemplateParameters = array_merge($arPageBlocksParams, array(
	'SHOW_SECTION_PREVIEW_DESCRIPTION' => array(
		'PARENT' => 'LIST_SETTINGS',
		'SORT' => 500,
		'NAME' => GetMessage('SHOW_SECTION_PREVIEW_DESCRIPTION'),
		'TYPE' => 'CHECKBOX',
		'DEFAULT' => 'Y',
	),
));
?>