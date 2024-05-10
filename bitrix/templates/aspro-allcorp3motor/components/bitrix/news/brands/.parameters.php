<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}

use Bitrix\Main\Loader,
	Bitrix\Main\ModuleManager,
	Bitrix\Main\Web\Json,
	Bitrix\Iblock,
	Bitrix\Main\Localization\Loc;

require_once __DIR__ . '/../../../../vendor/php/solution.php';	
if(
	!Loader::includeModule('iblock') || !class_exists('TSolution') || !CModule::IncludeModule(TSolution::moduleID)
){
	return;
}

$arAscDesc = array(
	'asc' => GetMessage('IBLOCK_SORT_ASC'),
	'desc' => GetMessage('IBLOCK_SORT_DESC'),
);

$arIBlocks = [];
$rsIBlock = CIBlock::GetList(
	[
		'ID' => 'ASC'
	],
	[
		// 'TYPE' => $arCurrentValues['IBLOCK_TYPE'], 
		'ACTIVE' => 'Y'
	]
);
while ($arIBlock = $rsIBlock->Fetch()) {
	$arIBlocks[$arIBlock['ID']] = "[{$arIBlock['ID']}] {$arIBlock['NAME']}";
}

$arSKUProperty = $arSKUProperty_X = [];
if ($arCurrentValues['SKU_IBLOCK_ID']) {
	$propertyIterator = Iblock\PropertyTable::getList(array(
		'select' => array('ID', 'IBLOCK_ID', 'NAME', 'CODE', 'PROPERTY_TYPE', 'MULTIPLE', 'LINK_IBLOCK_ID', 'USER_TYPE', 'SORT'),
		'filter' => array(
			'=IBLOCK_ID' => $arCurrentValues['SKU_IBLOCK_ID'],
			'=ACTIVE' => 'Y'
		),
		'order' => array(
			'SORT' => 'ASC',
			'NAME' => 'ASC'
		)
	));
	while($property = $propertyIterator->fetch()){
		$propertyCode =(string)$property['CODE'];

		if($propertyCode == '')
			$propertyCode = $property['ID'];

		$propertyName = '['.$propertyCode.'] '.$property['NAME'];

		if($property['PROPERTY_TYPE'] != Iblock\PropertyTable::TYPE_FILE){
			$arSKUProperty[$propertyCode] = $propertyName;

			if($property['MULTIPLE'] != 'Y' && $property['PROPERTY_TYPE'] == Iblock\PropertyTable::TYPE_LIST){
				$arSKUProperty_X[$propertyCode] = $propertyName;
			}
		}
	}
	unset($propertyCode, $propertyName, $property, $propertyIterator);

	$arSkuSort = CIBlockParameters::GetElementSortFields(
		array('SHOWS', 'SORT', 'TIMESTAMP_X', 'NAME', 'ID', 'ACTIVE_FROM', 'ACTIVE_TO'),
		array('KEY_LOWERCASE' => 'Y')
	);
}

TSolution\ExtComponentParameter::init(__DIR__, $arCurrentValues);

TSolution\ExtComponentParameter::addBaseParameters(array(
	array(
		array('SECTION' => 'SECTION', 'OPTION' => 'BRANDS_PAGE'),
		'SECTION_ELEMENTS_TYPE_VIEW'
	),
	array(
		array('SECTION' => 'SECTION', 'OPTION' => 'BRANDS_DETAIL_PAGE'),
		'ELEMENT_TYPE_VIEW'
	),
));

TSolution\ExtComponentParameter::addRelationBlockParameters([
	TSolution\ExtComponentParameter::RELATION_BLOCK_DOCS,
	TSolution\ExtComponentParameter::RELATION_BLOCK_LINK_GOODS,
	TSolution\ExtComponentParameter::RELATION_BLOCK_LINK_SECTIONS,
	TSolution\ExtComponentParameter::RELATION_BLOCK_COMMENTS,
]);

TSolution\ExtComponentParameter::addTextParameter('DEPTH_LEVEL_BRAND', [
	"NAME" => GetMessage('T_DEPTH_LEVEL_BRAND'),
	"DEFAULT" => 2
]);

// TSolution\ExtComponentParameter::addSelectParameter('SKU_IBLOCK_ID', [
// 	'PARENT' => TSolution\ExtComponentParameter::PARENT_GROUP_BASE,
// 	"VALUES" => $arIBlocks,
// 	"DEFAULT" => "",
// 	"PARENT" => "BASE",
// 	"REFRESH" => "Y",
// 	'SORT' => 999
// ]);
// TSolution\ExtComponentParameter::addSelectParameter('SKU_PROPERTY_CODE', [
// 	'PARENT' => TSolution\ExtComponentParameter::PARENT_GROUP_ADDITIONAL,
// 	'VALUES' => $arSKUProperty,
// 	'MULTIPLE' => 'Y',
// 	'SORT' => 999
// ]);
// TSolution\ExtComponentParameter::addSelectParameter('SKU_TREE_PROPS', [
// 	'PARENT' => TSolution\ExtComponentParameter::PARENT_GROUP_ADDITIONAL,
// 	'VALUES' => $arSKUProperty_X,
// 	'MULTIPLE' => 'Y',
// 	'SORT' => 999
// ]);
TSolution\ExtComponentParameter::addSelectParameter('SKU_SORT_FIELD', [
	'PARENT' => TSolution\ExtComponentParameter::PARENT_GROUP_ADDITIONAL,
	'VALUES' => $arSkuSort,
	'DEFAULT' => 'name',
	'ADDITIONAL_VALUES' => 'Y',
	'SORT' => 999
]);
TSolution\ExtComponentParameter::addSelectParameter('SKU_SORT_ORDER', [
	'PARENT' => TSolution\ExtComponentParameter::PARENT_GROUP_ADDITIONAL,
	'VALUES' => $arAscDesc,
	'SORT' => 999
]);
TSolution\ExtComponentParameter::addSelectParameter('SKU_SORT_FIELD2', [
	'PARENT' => TSolution\ExtComponentParameter::PARENT_GROUP_ADDITIONAL,
	'VALUES' => $arSkuSort,
	'ADDITIONAL_VALUES' => 'Y',
	'DEFAULT' => 'sort',
	'SORT' => 999
]);
TSolution\ExtComponentParameter::addSelectParameter('SKU_SORT_ORDER2', [
	'PARENT' => TSolution\ExtComponentParameter::PARENT_GROUP_ADDITIONAL,
	'VALUES' => $arAscDesc,
	'SORT' => 999
]);

TSolution\ExtComponentParameter::appendTo($arTemplateParameters);

$arTemplateParameters['SHOW_DETAIL_LINK'] = [
	'PARENT' => TSolution\ExtComponentParameter::PARENT_GROUP_LIST,
	'NAME' => Loc::getMessage('SHOW_DETAIL_LINK'),
	'TYPE' => 'CHECKBOX',
	'DEFAULT' => 'Y',
];

$arTemplateParameters['USE_SHARE'] = [
	'PARENT' => TSolution\ExtComponentParameter::PARENT_GROUP_LIST,
	'NAME' => Loc::getMessage('USE_SHARE'),
	'TYPE' => 'CHECKBOX',
	'DEFAULT' => 'Y',
];

?>