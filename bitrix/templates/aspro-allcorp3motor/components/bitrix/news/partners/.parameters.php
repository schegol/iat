<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}

use Bitrix\Main\Loader,
	Bitrix\Main\ModuleManager,
	Bitrix\Main\Web\Json,
	Bitrix\Main\Localization\Loc;

require_once __DIR__ . '/../../../../vendor/php/solution.php';	
if(
	!Loader::includeModule('iblock') || !class_exists('TSolution') || !CModule::IncludeModule(TSolution::moduleID)
){
	return;
}

TSolution\ExtComponentParameter::init(__DIR__, $arCurrentValues);

TSolution\ExtComponentParameter::addBaseParameters();

TSolution\ExtComponentParameter::addRelationBlockParameters([
	TSolution\ExtComponentParameter::RELATION_BLOCK_DOCS,
	TSolution\ExtComponentParameter::RELATION_BLOCK_PROJECTS,
	TSolution\ExtComponentParameter::RELATION_BLOCK_SERVICES,
	TSolution\ExtComponentParameter::RELATION_BLOCK_COMMENTS,
]);

TSolution\ExtComponentParameter::appendTo($arTemplateParameters);

$arTemplateParameters['SHOW_DETAIL_LINK'] = [
	'PARENT' => TSolution\ExtComponentParameter::PARENT_GROUP_LIST,
	'NAME' => Loc::getMessage('SHOW_DETAIL_LINK'),
	'TYPE' => 'CHECKBOX',
	'DEFAULT' => 'Y',
];

$arTemplateParameters['SHOW_SECTION_PREVIEW_DESCRIPTION'] = [
	'PARENT' => TSolution\ExtComponentParameter::PARENT_GROUP_LIST,
	'NAME' => Loc::getMessage('SHOW_SECTION_PREVIEW_DESCRIPTION'),
	'TYPE' => 'CHECKBOX',
	'DEFAULT' => 'Y',
];

$arTemplateParameters['USE_SHARE'] = [
	'PARENT' => TSolution\ExtComponentParameter::PARENT_GROUP_LIST,
	'NAME' => Loc::getMessage('USE_SHARE'),
	'TYPE' => 'CHECKBOX',
	'DEFAULT' => 'Y',
];