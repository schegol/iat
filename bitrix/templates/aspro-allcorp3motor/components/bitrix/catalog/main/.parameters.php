<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

global $USER_FIELD_MANAGER;
use Bitrix\Main\Loader,
	Bitrix\Main\ModuleManager,
	Bitrix\Main\Web\Json,
	Bitrix\Iblock;
	
require_once __DIR__ . '/../../../../vendor/php/solution.php';
if(
	!Loader::includeModule('iblock') || !class_exists('TSolution') || !CModule::IncludeModule(TSolution::moduleID)
){
	return;
}

CBitrixComponent::includeComponentClass('bitrix:catalog.section');

$arSKU = $boolSKU = false;
$arPropertySort = $arPropertySortDefault = $arPropertyDefaultSort = array();
$arPrice = $arProperty = $arProperty_N = $arProperty_X = $arProperty_F = array();

$arAscDesc = array(
	'asc' => GetMessage('IBLOCK_SORT_ASC'),
	'desc' => GetMessage('IBLOCK_SORT_DESC'),
);
$arSort = CIBlockParameters::GetElementSortFields(
	array('SHOWS', 'SORT', 'TIMESTAMP_X', 'NAME', 'ID', 'ACTIVE_FROM', 'ACTIVE_TO'),
	array('KEY_LOWERCASE' => 'Y')
);
$arPropertySortDefault = array('name', 'sort');
$arPropertySort = array(
	'name' => GetMessage('V_NAME'),
	'sort' => GetMessage('V_SORT')
);

$propertyIterator = Iblock\PropertyTable::getList(array(
	'select' => array('ID', 'IBLOCK_ID', 'NAME', 'CODE', 'PROPERTY_TYPE', 'MULTIPLE', 'LINK_IBLOCK_ID', 'USER_TYPE', 'SORT'),
	'filter' => array(
		'=IBLOCK_ID' => $arCurrentValues['IBLOCK_ID'],
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
	$arPropertySort[$propertyCode] = $propertyName;

	if($property['PROPERTY_TYPE'] != Iblock\PropertyTable::TYPE_FILE){
		$arProperty[$propertyCode] = $propertyName;

		if($property['MULTIPLE'] == 'Y'){
			$arProperty_X[$propertyCode] = $propertyName;
		}
		elseif($property['PROPERTY_TYPE'] == Iblock\PropertyTable::TYPE_LIST){
			$arProperty_X[$propertyCode] = $propertyName;
		}
		elseif($property['PROPERTY_TYPE'] == Iblock\PropertyTable::TYPE_ELEMENT &&(int)$property['LINK_IBLOCK_ID'] > 0){
			$arProperty_X[$propertyCode] = $propertyName;
		}
	}
	else{
		$arProperty_F[$propertyCode] = $propertyName;
	}

	if($property['PROPERTY_TYPE'] == Iblock\PropertyTable::TYPE_NUMBER){
		$arProperty_N[$propertyCode] = $propertyName;
	}

	if($property['PROPERTY_TYPE'] == Iblock\PropertyTable::TYPE_STRING){
		$arProperty_S[$propertyCode] = $propertyName;
	}
}

unset($propertyCode, $propertyName, $property, $propertyIterator);

if($arCurrentValues['SORT_PROP']){
	foreach($arCurrentValues['SORT_PROP'] as $code){
		$arPropertyDefaultSort[$code] = $arPropertySort[$code];
	}
}
else {
	foreach($arPropertySortDefault as $code){
		$arPropertyDefaultSort[$code] = $arPropertySort[$code];
	}
}

$arUserFields_S = $arUserFields_E = array();
$arUserFields = $USER_FIELD_MANAGER->GetUserFields("IBLOCK_".$arCurrentValues["IBLOCK_ID"]."_SECTION");
foreach($arUserFields as $FIELD_NAME=>$arUserField){
	if($arUserField["USER_TYPE"]["BASE_TYPE"] == "enum"){
		$arUserFields_E[$FIELD_NAME] = $arUserField["LIST_COLUMN_LABEL"]? $arUserField["LIST_COLUMN_LABEL"]: $FIELD_NAME;
	}

	if($arUserField["USER_TYPE"]["BASE_TYPE"] == "string"){
		$arUserFields_S[$FIELD_NAME] = $arUserField["LIST_COLUMN_LABEL"]? $arUserField["LIST_COLUMN_LABEL"]: $FIELD_NAME;
	}
}
$arIBlocks = [];
$rsIBlock = CIBlock::GetList(
	[
		'ID' => 'ASC'
	],
	[
		'TYPE' => $arCurrentValues['IBLOCK_TYPE'],
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

			// if($property['MULTIPLE'] != 'Y' && $property['PROPERTY_TYPE'] == Iblock\PropertyTable::TYPE_LIST){
			if (
				'L' == $property['PROPERTY_TYPE']
				|| 'E' == $property['PROPERTY_TYPE']
				|| ('S' == $property['PROPERTY_TYPE'] && 'directory' == $property['USER_TYPE'])
			) {
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

// $arTemplateParameters["SKU_IBLOCK_ID"] = array(
// 	"NAME" => GetMessage("T_SKU_IBLOCK_ID"),
// 	"TYPE" => "LIST",
// 	"VALUES" => $arIBlocks,
// 	"DEFAULT" => "",
// 	"PARENT" => "BASE",
// 	"REFRESH" => "Y",
// );

$arTemplateParametersParts = array();

TSolution\ExtComponentParameter::init(__DIR__, $arCurrentValues);
TSolution\ExtComponentParameter::addBaseParameters(array(
	array(
		array('SECTION' => 'CATALOG_PAGE', 'OPTION' => 'SECTIONS_TYPE_VIEW_CATALOG'),
		'SECTIONS_TYPE_VIEW',
	),
	array(
		array('SECTION' => 'CATALOG_PAGE', 'OPTION' => 'SECTION_TYPE_VIEW_CATALOG'),
		'SECTION_TYPE_VIEW',
	),
	array(
		array('SECTION' => 'CATALOG_PAGE', 'OPTION' => 'ELEMENTS_CATALOG'),
	),
	array(
		array('SECTION' => 'CATALOG_PAGE', 'OPTION' => 'CATALOG'),
	),
	array(
		array('SECTION' => 'CATALOG_PAGE', 'OPTION' => 'ELEMENTS_TABLE_TYPE_VIEW'),
	),
	array(
		array('SECTION' => 'CATALOG_PAGE', 'OPTION' => 'ELEMENTS_LIST_TYPE_VIEW'),
	),
	array(
		array('SECTION' => 'CATALOG_PAGE', 'OPTION' => 'ELEMENTS_PRICE_TYPE_VIEW'),
	),
));

TSolution\ExtComponentParameter::addRelationBlockParameters(array(
	TSolution\ExtComponentParameter::RELATION_BLOCK_DESC,
	TSolution\ExtComponentParameter::RELATION_BLOCK_CHAR,
	array(
		TSolution\ExtComponentParameter::RELATION_BLOCK_GALLERY,
		'additionalParams' => array(
			'toggle' => true,
			'type' => array(
				TSolution\ExtComponentParameter::GALLERY_TYPE_BIG,
				TSolution\ExtComponentParameter::GALLERY_TYPE_SMALL,
			)
		),
	),
	TSolution\ExtComponentParameter::RELATION_BLOCK_VIDEO,
	TSolution\ExtComponentParameter::RELATION_BLOCK_DOCS,
	TSolution\ExtComponentParameter::RELATION_BLOCK_FAQ,
	TSolution\ExtComponentParameter::RELATION_BLOCK_REVIEWS,
	TSolution\ExtComponentParameter::RELATION_BLOCK_VACANCY,
	TSolution\ExtComponentParameter::RELATION_BLOCK_STAFF,
	TSolution\ExtComponentParameter::RELATION_BLOCK_SALE,
	TSolution\ExtComponentParameter::RELATION_BLOCK_NEWS,
	TSolution\ExtComponentParameter::RELATION_BLOCK_ARTICLES,
	TSolution\ExtComponentParameter::RELATION_BLOCK_SERVICES,
	TSolution\ExtComponentParameter::RELATION_BLOCK_PROJECTS,
	TSolution\ExtComponentParameter::RELATION_BLOCK_PARTNERS,
	TSolution\ExtComponentParameter::RELATION_BLOCK_SKU,
	TSolution\ExtComponentParameter::RELATION_BLOCK_GOODS,
	TSolution\ExtComponentParameter::RELATION_BLOCK_TARIFFS,
	TSolution\ExtComponentParameter::RELATION_BLOCK_COMPLECTS,
	array(
		TSolution\ExtComponentParameter::RELATION_BLOCK_BUY,
		'additionalParams' => array(
			'toggle' => false,
		),
	),
	array(
		TSolution\ExtComponentParameter::RELATION_BLOCK_PAYMENT,
		'additionalParams' => array(
			'toggle' => false,
		),
	),
	array(
		TSolution\ExtComponentParameter::RELATION_BLOCK_DELIVERY,
		'additionalParams' => array(
			'toggle' => false,
		),
	),
	array(
		TSolution\ExtComponentParameter::RELATION_BLOCK_DOPS,
		'additionalParams' => array(
			'toggle' => false,
		),
	),
	TSolution\ExtComponentParameter::RELATION_BLOCK_COMMENTS,
));

TSolution\ExtComponentParameter::addOrderBlockParameters(array(
	TSolution\ExtComponentParameter::ORDER_BLOCK_SALE,
	TSolution\ExtComponentParameter::ORDER_BLOCK_TABS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_GALLERY,
	TSolution\ExtComponentParameter::ORDER_BLOCK_SKU,
	TSolution\ExtComponentParameter::ORDER_BLOCK_SERVICES,
	TSolution\ExtComponentParameter::ORDER_BLOCK_PROJECTS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_NEWS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_ARTICLES,
	TSolution\ExtComponentParameter::ORDER_BLOCK_STAFF,
	TSolution\ExtComponentParameter::ORDER_BLOCK_PARTNERS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_VACANCY,
	TSolution\ExtComponentParameter::ORDER_BLOCK_GOODS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_COMMENTS,
));

TSolution\ExtComponentParameter::addOrderTabParameters(array(
	TSolution\ExtComponentParameter::ORDER_BLOCK_DESC,
	TSolution\ExtComponentParameter::ORDER_BLOCK_CHAR,
	TSolution\ExtComponentParameter::ORDER_BLOCK_TARIFFS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_VIDEO,
	TSolution\ExtComponentParameter::ORDER_BLOCK_DOCS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_FAQ,
	TSolution\ExtComponentParameter::ORDER_BLOCK_REVIEWS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_BUY,
	TSolution\ExtComponentParameter::ORDER_BLOCK_PAYMENT,
	TSolution\ExtComponentParameter::ORDER_BLOCK_DELIVERY,
	TSolution\ExtComponentParameter::ORDER_BLOCK_DOPS,
	TSolution\ExtComponentParameter::RELATION_BLOCK_COMPLECTS,
));

TSolution\ExtComponentParameter::addOrderAllParameters(array(
	TSolution\ExtComponentParameter::ORDER_BLOCK_SALE,
	TSolution\ExtComponentParameter::ORDER_BLOCK_DESC,
	TSolution\ExtComponentParameter::ORDER_BLOCK_CHAR,
	TSolution\ExtComponentParameter::ORDER_BLOCK_REVIEWS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_GALLERY,
	TSolution\ExtComponentParameter::ORDER_BLOCK_VIDEO,
	TSolution\ExtComponentParameter::ORDER_BLOCK_SKU,
	TSolution\ExtComponentParameter::ORDER_BLOCK_TARIFFS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_SERVICES,
	TSolution\ExtComponentParameter::ORDER_BLOCK_PROJECTS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_NEWS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_ARTICLES,
	TSolution\ExtComponentParameter::ORDER_BLOCK_DOCS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_STAFF,
	TSolution\ExtComponentParameter::ORDER_BLOCK_FAQ,
	TSolution\ExtComponentParameter::ORDER_BLOCK_PARTNERS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_VACANCY,
	TSolution\ExtComponentParameter::ORDER_BLOCK_GOODS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_BUY,
	TSolution\ExtComponentParameter::ORDER_BLOCK_PAYMENT,
	TSolution\ExtComponentParameter::ORDER_BLOCK_DELIVERY,
	TSolution\ExtComponentParameter::ORDER_BLOCK_DOPS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_COMMENTS,
));

TSolution\ExtComponentParameter::addUseTabParameter('USE_DETAIL_TABS');

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

TSolution\ExtComponentParameter::addCheckBoxParameter('USE_SHARE', [
	"DEFAULT" => "N"
]);

TSolution\ExtComponentParameter::appendTo($arTemplateParameters);

if(strpos($arCurrentValues['SECTIONS_TYPE_VIEW'], 'sections_1') !== false){
	$arTemplateParametersParts[] = array(
		'SECTIONS_ITEMS_OFFSET' => array(
			'PARENT' => 'SECTIONS_SETTINGS',
			'NAME' => GetMessage('SECTIONS_ITEMS_OFFSET'),
			'TYPE' => 'CHECKBOX',
			'DEFAULT' => 'Y',
			'SORT' => 1300
		),
		'SECTIONS_ELEMENTS_COUNT' => array(
			'PARENT' => 'SECTIONS_SETTINGS',
			'NAME' => GetMessage('SECTIONS_ELEMENTS_COUNT'),
			'TYPE' => 'LIST',
			'VALUES' => array(
				'3' => '3',
				'4' => '4',
			),
			'DEFAULT' => '4',
			'SORT' => 1301
		),
		'SECTIONS_TEXT_POSITION' => array(
			'PARENT' => 'SECTIONS_SETTINGS',
			'NAME' => GetMessage('SECTIONS_TEXT_POSITION'),
			'TYPE' => 'LIST',
			'VALUES' => array(
				'BOTTOM' => GetMessage('TEXT_POSITION_BOTTOM'),
				'BG' => GetMessage('TEXT_POSITION_BG'),
			),
			'DEFAULT' => 'BOTTOM',
			'SORT' => 1302
		),
	);
}

if(strpos($arCurrentValues['SECTIONS_TYPE_VIEW'], 'sections_2') !== false){
	$arTemplateParametersParts[] = array(
		'SECTIONS_ITEMS_OFFSET' => array(
			'PARENT' => 'SECTIONS_SETTINGS',
			'NAME' => GetMessage('SECTIONS_ITEMS_OFFSET'),
			'TYPE' => 'CHECKBOX',
			'DEFAULT' => 'Y',
			'SORT' => 1300
		),
		'SECTIONS_ELEMENTS_COUNT' => array(
			'PARENT' => 'SECTIONS_SETTINGS',
			'NAME' => GetMessage('SECTIONS_ELEMENTS_COUNT'),
			'TYPE' => 'LIST',
			'VALUES' => array(
				'2' => '2',
				'3' => '3',
			),
			'DEFAULT' => '3',
			'SORT' => 1301
		),
		'SECTIONS_IMAGES' => array(
			'PARENT' => 'SECTIONS_SETTINGS',
			'NAME' => GetMessage('SECTIONS_IMAGES'),
			'TYPE' => 'LIST',
			'VALUES' => array(
				'ICONS' => GetMessage('IMAGES_ICONS'),
				'ROUND_PICTURES' => GetMessage('IMAGES_ROUND_PICTURES'),
				'TRANSPARENT_PICTURES' => GetMessage('IMAGES_TRANSPARENT_PICTURES'),
			),
			'DEFAULT' => 'ROUND_PICTURES',
			'SORT' => 1302
		),
		'SECTIONS_IMAGE_POSITION' => array(
			'PARENT' => 'SECTIONS_SETTINGS',
			'NAME' => GetMessage('SECTIONS_IMAGE_POSITION'),
			'TYPE' => 'LIST',
			'VALUES' => array(
				'RIGHT' => GetMessage('IMAGE_POSITION_RIGHT'),
				'LEFT' => GetMessage('IMAGE_POSITION_LEFT'),
			),
			'DEFAULT' => 'RIGHT',
			'SORT' => 1303
		),
	);
}

if(strpos($arCurrentValues['SECTIONS_TYPE_VIEW'], 'sections_3') !== false){
	$arTemplateParametersParts[] = array(
		'SECTIONS_ITEMS_OFFSET' => array(
			'PARENT' => 'SECTIONS_SETTINGS',
			'NAME' => GetMessage('SECTIONS_ITEMS_OFFSET'),
			'TYPE' => 'CHECKBOX',
			'DEFAULT' => 'Y',
			'SORT' => 1300
		),
		'SECTIONS_IMAGES' => array(
			'PARENT' => 'SECTIONS_SETTINGS',
			'NAME' => GetMessage('SECTIONS_IMAGES'),
			'TYPE' => 'LIST',
			'VALUES' => array(
				'ICONS' => GetMessage('IMAGES_ICONS'),
				'ROUND_PICTURES' => GetMessage('IMAGES_ROUND_PICTURES'),
				'BIG_PICTURES' => GetMessage('IMAGES_BIG_PICTURES'),
				'TRANSPARENT_PICTURES' => GetMessage('IMAGES_TRANSPARENT_PICTURES'),
			),
			'DEFAULT' => 'ROUND_PICTURES',
			'SORT' => 1301
		),
		'SECTIONS_IMAGE_POSITION' => array(
			'PARENT' => 'SECTIONS_SETTINGS',
			'NAME' => GetMessage('SECTIONS_IMAGE_POSITION'),
			'TYPE' => 'LIST',
			'VALUES' => array(
				'RIGHT' => GetMessage('IMAGE_POSITION_RIGHT'),
				'LEFT' => GetMessage('IMAGE_POSITION_LEFT'),
			),
			'DEFAULT' => 'RIGHT',
			'SORT' => 1302
		),
	);
}

if(strpos($arCurrentValues['SECTION_TYPE_VIEW'], 'section_1') !== false){
	$arTemplateParametersParts[] = array(
		'SECTION_ITEMS_OFFSET' => array(
			'PARENT' => 'LIST_SETTINGS',
			'NAME' => GetMessage('SECTIONS_ITEMS_OFFSET'),
			'TYPE' => 'CHECKBOX',
			'DEFAULT' => 'Y',
			'SORT' => 1400
		),
		'SECTION_IMAGES' => array(
			'PARENT' => 'LIST_SETTINGS',
			'NAME' => GetMessage('SECTIONS_IMAGES'),
			'TYPE' => 'LIST',
			'VALUES' => array(
				'ICONS' => GetMessage('IMAGES_ICONS'),
				'ROUND_PICTURES' => GetMessage('IMAGES_ROUND_PICTURES'),
				'TRANSPARENT_PICTURES' => GetMessage('IMAGES_TRANSPARENT_PICTURES'),
			),
			'DEFAULT' => 'ICONS',
			'SORT' => 1401
		),
	);
}

if(strpos($arCurrentValues['SECTION_TYPE_VIEW'], 'section_2') !== false){
	$arTemplateParametersParts[] = array(
		'SECTION_ITEMS_OFFSET' => array(
			'PARENT' => 'LIST_SETTINGS',
			'NAME' => GetMessage('SECTIONS_ITEMS_OFFSET'),
			'TYPE' => 'CHECKBOX',
			'DEFAULT' => 'Y',
			'SORT' => 1400
		),
		'SECTION_ELEMENTS_COUNT' => array(
			'PARENT' => 'LIST_SETTINGS',
			'NAME' => GetMessage('SECTIONS_ELEMENTS_COUNT'),
			'TYPE' => 'LIST',
			'VALUES' => array(
				'3' => '3',
				'4' => '4',
			),
			'DEFAULT' => '4',
			'SORT' => 1401
		),
		'SECTION_TEXT_POSITION' => array(
			'PARENT' => 'LIST_SETTINGS',
			'NAME' => GetMessage('SECTIONS_TEXT_POSITION'),
			'TYPE' => 'LIST',
			'VALUES' => array(
				'BOTTOM' => GetMessage('TEXT_POSITION_BOTTOM'),
				'BG' => GetMessage('TEXT_POSITION_BG'),
			),
			'DEFAULT' => 'BOTTOM',
			'SORT' => 1402
		),
	);
}

if(strpos($arCurrentValues['SECTION_TYPE_VIEW'], 'section_3') !== false){
	$arTemplateParametersParts[] = array(
		'SECTION_ITEMS_OFFSET' => array(
			'PARENT' => 'LIST_SETTINGS',
			'NAME' => GetMessage('SECTIONS_ITEMS_OFFSET'),
			'TYPE' => 'CHECKBOX',
			'DEFAULT' => 'Y',
			'SORT' => 1400
		),
		'SECTION_ELEMENTS_COUNT' => array(
			'PARENT' => 'LIST_SETTINGS',
			'NAME' => GetMessage('SECTIONS_ELEMENTS_COUNT'),
			'TYPE' => 'LIST',
			'VALUES' => array(
				'2' => '2',
				'3' => '3',
			),
			'DEFAULT' => '3',
			'SORT' => 1401
		),
		'SECTION_IMAGES' => array(
			'PARENT' => 'LIST_SETTINGS',
			'NAME' => GetMessage('SECTIONS_IMAGES'),
			'TYPE' => 'LIST',
			'VALUES' => array(
				'ICONS' => GetMessage('IMAGES_ICONS'),
				'ROUND_PICTURES' => GetMessage('IMAGES_ROUND_PICTURES'),
				'TRANSPARENT_PICTURES' => GetMessage('IMAGES_TRANSPARENT_PICTURES'),
			),
			'DEFAULT' => 'ROUND_PICTURES',
			'SORT' => 1402
		),
		'SECTION_IMAGE_POSITION' => array(
			'PARENT' => 'LIST_SETTINGS',
			'NAME' => GetMessage('SECTIONS_IMAGE_POSITION'),
			'TYPE' => 'LIST',
			'VALUES' => array(
				'RIGHT' => GetMessage('IMAGE_POSITION_RIGHT'),
				'LEFT' => GetMessage('IMAGE_POSITION_LEFT'),
			),
			'DEFAULT' => 'RIGHT',
			'SORT' => 1403
		),
	);
}

if(strpos($arCurrentValues['SECTION_TYPE_VIEW'], 'section_4') !== false){
	$arTemplateParametersParts[] = array(
		'SECTION_ITEMS_OFFSET' => array(
			'PARENT' => 'LIST_SETTINGS',
			'NAME' => GetMessage('SECTIONS_ITEMS_OFFSET'),
			'TYPE' => 'CHECKBOX',
			'DEFAULT' => 'Y',
			'SORT' => 1400
		),
		'SECTION_IMAGES' => array(
			'PARENT' => 'LIST_SETTINGS',
			'NAME' => GetMessage('SECTIONS_IMAGES'),
			'TYPE' => 'LIST',
			'VALUES' => array(
				'ICONS' => GetMessage('IMAGES_ICONS'),
				'ROUND_PICTURES' => GetMessage('IMAGES_ROUND_PICTURES'),
				'BIG_PICTURES' => GetMessage('IMAGES_BIG_PICTURES'),
				'TRANSPARENT_PICTURES' => GetMessage('IMAGES_TRANSPARENT_PICTURES'),
			),
			'DEFAULT' => 'ROUND_PICTURES',
			'SORT' => 1401
		),
		'SECTION_IMAGE_POSITION' => array(
			'PARENT' => 'LIST_SETTINGS',
			'NAME' => GetMessage('SECTIONS_IMAGE_POSITION'),
			'TYPE' => 'LIST',
			'VALUES' => array(
				'RIGHT' => GetMessage('IMAGE_POSITION_RIGHT'),
				'LEFT' => GetMessage('IMAGE_POSITION_LEFT'),
			),
			'DEFAULT' => 'RIGHT',
			'SORT' => 1402
		),
	);
}

if($arCurrentValues['ELEMENTS_TABLE_TYPE_VIEW'] !== 'FROM_MODULE'){
	$arTemplateParametersParts[] = array(
		'SECTION_ITEM_LIST_OFFSET_CATALOG' => array(
			'PARENT' => 'LIST_SETTINGS',
			'NAME' => GetMessage('SECTION_ITEM_LIST_OFFSET'),
			'TYPE' => 'CHECKBOX',
			'DEFAULT' => 'Y',
			'SORT' => 1500
		),
		'SECTION_ITEM_LIST_IMG_CORNER' => array(
			'PARENT' => 'LIST_SETTINGS',
			'NAME' => GetMessage('SECTION_ITEM_LIST_IMG_CORNER'),
			'TYPE' => 'CHECKBOX',
			'DEFAULT' => 'N',
			'SORT' => 1501
		),
		'SECTION_ITEM_LIST_TEXT_CENTER' => array(
			'PARENT' => 'LIST_SETTINGS',
			'NAME' => GetMessage('SECTION_ITEM_LIST_TEXT_CENTER'),
			'TYPE' => 'CHECKBOX',
			'DEFAULT' => 'N',
			'SORT' => 1502
		),
	);
}

$arTemplateParameters["LANDING_IBLOCK_ID"] = array(
	"NAME" => GetMessage("T_LANDING_IBLOCK_ID"),
	"TYPE" => "STRING",
	"DEFAULT" => "",
	"PARENT" => "LIST_SETTINGS",
);

$arTemplateParameters["LANDING_TIZER_IBLOCK_ID"] = array(
	"NAME" => GetMessage("T_LANDING_TIZER_IBLOCK_ID"),
	"TYPE" => "STRING",
	"DEFAULT" => "",
	"PARENT" => "LIST_SETTINGS",
);

$arTemplateParameters["LANDING_SECTION_COUNT"] = array(
	"NAME" => GetMessage("T_LANDING_SECTION_COUNT"),
	"TYPE" => "STRING",
	"DEFAULT" => "20",
	"PARENT" => "LIST_SETTINGS",
);

$arTemplateParameters["LANDING_SECTION_COUNT_VISIBLE"] = array(
	"NAME" => GetMessage("T_LANDING_SECTION_COUNT_VISIBLE"),
	"TYPE" => "STRING",
	"DEFAULT" => "3",
	"PARENT" => "LIST_SETTINGS",
);

$arTemplateParameters['SORT_PROP'] = array(
	'PARENT' => 'LIST_SETTINGS',
	'NAME' => GetMessage('T_SORT_PROP'),
	'TYPE' => 'LIST',
	'VALUES' => $arPropertySort,
	'SIZE' => 3,
	'MULTIPLE' => 'Y',
	'REFRESH' => 'Y'
);

$arTemplateParameters['SORT_PROP_DEFAULT'] = array(
	'PARENT' => 'LIST_SETTINGS',
	'NAME' => GetMessage('T_SORT_PROP_DEFAULT'),
	'TYPE' => 'LIST',
	'VALUES' => $arPropertyDefaultSort,
);

$arTemplateParameters['SORT_DIRECTION'] = array(
	'PARENT' => 'LIST_SETTINGS',
	'NAME' => GetMessage('T_SORT_DIRECTION'),
	'TYPE' => 'LIST',
	'VALUES' => $arAscDesc
);

$arTemplateParameters["VIEW_TYPE"] = array(
	"NAME" => GetMessage("DEFAULT_LIST_TEMPLATE"),
	"TYPE" => "LIST",
	"VALUES" => array(
		"table" => GetMessage("DEFAULT_LIST_TEMPLATE_BLOCK"),
		"list" => GetMessage("DEFAULT_LIST_TEMPLATE_LIST"),
		"price" => GetMessage("DEFAULT_LIST_TEMPLATE_TABLE")),
	"DEFAULT" => "table",
	"PARENT" => "LIST_SETTINGS",
);

$arTemplateParameters["SHOW_LIST_TYPE_SECTION"] = array(
	"PARENT" => "LIST_SETTINGS",
	"NAME" => GetMessage("T_SHOW_LIST_TYPE_SECTION"),
	"TYPE" => "CHECKBOX",
	"DEFAULT" => "Y",
);

$arTemplateParameters["SECTION_DISPLAY_PROPERTY"] = array(
	"NAME" => GetMessage("SECTION_DISPLAY_PROPERTY"),
	"TYPE" => "LIST",
	"VALUES" => $arUserFields_E,
	"DEFAULT" => "list",
	"MULTIPLE" => "N",
	"PARENT" => "LIST_SETTINGS",
);

$arTemplateParameters["SECTION_TOP_BLOCK_TITLE"] = array(
	"NAME" => GetMessage("SECTION_TOP_BLOCK_TITLE"),
	"TYPE" => "STRING",
	"DEFAULT" => GetMessage("SECTION_TOP_BLOCK_TITLE_VALUE"),
	"PARENT" => "TOP_SETTINGS",
);

$arTemplateParameters["SHOW_ASK_BLOCK"] = array(
	"NAME" => GetMessage("SHOW_ASK_BLOCK"),
	"TYPE" => "CHECKBOX",
	"DEFAULT" => "Y",
	"PARENT" => "DETAIL_SETTINGS",
);

$arTemplateParameters["ASK_FORM_ID"] = array(
	"NAME" => GetMessage("ASK_FORM_ID"),
	"TYPE" => "STRING",
	"DEFAULT" => "",
	"PARENT" => "DETAIL_SETTINGS",
);

$arTemplateParameters["SHOW_HINTS"] = array(
	"NAME" => GetMessage("SHOW_HINTS"),
	"TYPE" => "CHECKBOX",
	"DEFAULT" => "Y",
);

$arTemplateParameters["SECTIONS_LIST_PREVIEW_DESCRIPTION"] = array(
	"NAME" => GetMessage("SHOW_SECTION_ROOT_PREVIEW"),
	"TYPE" => "CHECKBOX",
	"DEFAULT" => "Y",
	"PARENT" => "SECTIONS_SETTINGS"
);

$arTemplateParameters["SHOW_CHILD_SECTIONS"] = array(
	"NAME" => GetMessage("SHOW_CHILD_SECTIONS"),
	"TYPE" => "CHECKBOX",
	"DEFAULT" => "Y",
	"PARENT" => "SECTIONS_SETTINGS"
);

$arTemplateParameters["SHOW_SECTION_DESC"] = array(
	"PARENT" => "LIST_SETTINGS",
	"NAME" => GetMessage("SHOW_SECTION_DESC"),
	"TYPE" => "CHECKBOX",
	"DEFAULT" => "Y",
);

$arTemplateParameters["SECTION_LIST_PREVIEW_DESCRIPTION"] = array(
	"PARENT" => "LIST_SETTINGS",
	"NAME" => GetMessage("T_SECTION_LIST_PREVIEW_DESCRIPTION"),
	"TYPE" => "CHECKBOX",
	"DEFAULT" => "Y",
);

$arTemplateParameters["SHOW_LANDINGS"] = array(
	'PARENT' => 'LIST_SETTINGS',
	'NAME' => GetMessage('SHOW_LANDINGS_TITLE'),
	'TYPE' => 'CHECKBOX',
	'DEFAULT' => 'Y',
	'REFRESH' => 'Y',
);

$arTemplateParameters["SECTION_LIST_DISPLAY_TYPE"] = array(
	"PARENT" => "LIST_SETTINGS",
	"NAME" => GetMessage("T_SECTION_LIST_DISPLAY_TYPE"),
	"TYPE" => "LIST",
	"MULTIPLE" => "N",
	"VALUES" => array(
		3=> GetMessage("SECTION_LIST_DISPLAY_TYPE_BIG"),
		4=> GetMessage("SECTION_LIST_DISPLAY_TYPE_SMALL")),
	"DEFAULT" => 3,
);

$arTemplateParameters["OPT_BUY"] = array(
	"PARENT" => "LIST_SETTINGS",
	"NAME" => GetMessage("T_OPT_BUY"),
	"TYPE" => "CHECKBOX",
	"DEFAULT" => "Y",
);

$arTemplateParameters["PROPERTIES_DISPLAY_TYPE"] = array(
	"PARENT" => "DETAIL_SETTINGS",
	"NAME" => GetMessage("PROPERTIES_DISPLAY_TYPE"),
	"TYPE" => "LIST",
	"MULTIPLE" => "N",
	"VALUES" => array(
		"BLOCK" => GetMessage("PROPERTIES_DISPLAY_TYPE_BLOCK"),
		"TABLE" => GetMessage("PROPERTIES_DISPLAY_TYPE_TABLE")
	),
	"DEFAULT" => "TABLE",
);

$arTemplateParameters["VISIBLE_PROP_COUNT"] = array(
	"PARENT" => "DETAIL_SETTINGS",
	"NAME" => GetMessage("VISIBLE_PROP_COUNT_TITLE"),
	"TYPE" => "STRING",
	"DEFAULT" => "6",
);

$arTemplateParameters["LINKED_ELEMENT_TAB_SORT_FIELD"] = array(
	"PARENT" => "DETAIL_SETTINGS",
	"NAME" => GetMessage("LINKED_ELEMENT_TAB_SORT_FIELD"),
	"TYPE" => "LIST",
	"VALUES" => $arSort,
	"ADDITIONAL_VALUES" => "Y",
	"DEFAULT" => "sort",
);

$arTemplateParameters["LINKED_ELEMENT_TAB_SORT_ORDER"] = array(
	"PARENT" => "DETAIL_SETTINGS",
	"NAME" => GetMessage("LINKED_ELEMENT_TAB_SORT_ORDER"),
	"TYPE" => "LIST",
	"VALUES" => $arAscDesc,
	"DEFAULT" => "asc",
	"ADDITIONAL_VALUES" => "Y",
);

$arTemplateParameters["LINKED_ELEMENT_TAB_SORT_FIELD2"] = array(
	"PARENT" => "DETAIL_SETTINGS",
	"NAME" => GetMessage("LINKED_ELEMENT_TAB_SORT_FIELD2"),
	"TYPE" => "LIST",
	"VALUES" => $arSort,
	"ADDITIONAL_VALUES" => "Y",
	"DEFAULT" => "id",
);

$arTemplateParameters["LINKED_ELEMENT_TAB_SORT_ORDER2"] = array(
	"PARENT" => "DETAIL_SETTINGS",
	"NAME" => GetMessage("LINKED_ELEMENT_TAB_SORT_ORDER2"),
	"TYPE" => "LIST",
	"VALUES" => $arAscDesc,
	"DEFAULT" => "desc",
	"ADDITIONAL_VALUES" => "Y",
);

$arTemplateParameters['ADD_PICT_PROP'] = array(
	'PARENT' => 'VISUAL',
	'NAME' => GetMessage('CP_BC_TPL_ADD_PICT_PROP'),
	'TYPE' => 'LIST',
	'MULTIPLE' => 'N',
	'ADDITIONAL_VALUES' => 'N',
	'REFRESH' => 'N',
	'DEFAULT' => '-',
	'VALUES' => $arProperty_F
);

$arTemplateParameters["SALE_STIKER"] = array(
	"PAREN" => "ADDITIONAL_SETTINGS",
	"NAME" => GetMessage("SALE_STIKER"),
	"TYPE" => "LIST",
	"VALUES" => array_merge(Array("-"=>" "), $arProperty_S),
	"DEFAULT" => "",
);

$arTemplateParameters["USE_COMPARE_GROUP"] = array(
	"PARENT" => "COMPARE_SETTINGS",
	"NAME" => GetMessage("T_USE_COMPARE_GROUP"),
	"TYPE" => "CHECKBOX",
	"DEFAULT" => "N",
);

// merge parameters
foreach($arTemplateParametersParts as $i => $part){
	$arTemplateParameters = array_merge($arTemplateParameters, $part);
}
?>
