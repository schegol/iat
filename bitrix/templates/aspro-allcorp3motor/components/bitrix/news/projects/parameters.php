<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

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

CBitrixComponent::includeComponentClass('bitrix:catalog.section');

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

$arTemplateParametersParts = [];

TSolution\ExtComponentParameter::init(__DIR__, $arCurrentValues);
TSolution\ExtComponentParameter::addBaseParameters([
	[
		 'EXT_PARAMS' => ['SECTION' => 'PROJECT_PAGE', 'OPTION' => 'PROJECTS_PAGE'],
		 'LIST_PARAMS' => 'SECTION_ELEMENTS_TYPE_VIEW',
	],
	[
		'EXT_PARAMS' => ['SECTION' => 'PROJECT_PAGE', 'OPTION' => 'PROJECTS_PAGE_DETAIL'],
		'LIST_PARAMS' => 'ELEMENT_TYPE_VIEW'
	],
]);

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
	TSolution\ExtComponentParameter::RELATION_BLOCK_GOODS,
	array(
		TSolution\ExtComponentParameter::RELATION_BLOCK_DOPS,
		'additionalParams' => [
			'toggle' => false,
		],		
	),
	TSolution\ExtComponentParameter::RELATION_BLOCK_COMMENTS,
	TSolution\ExtComponentParameter::RELATION_BLOCK_TOP_GALLERY,
));

TSolution\ExtComponentParameter::addOrderBlockParameters(array(
	TSolution\ExtComponentParameter::ORDER_BLOCK_TIZERS ,
	TSolution\ExtComponentParameter::ORDER_BLOCK_ORDER_FORM,
	TSolution\ExtComponentParameter::ORDER_BLOCK_SALE,
	TSolution\ExtComponentParameter::ORDER_BLOCK_TABS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_GALLERY,
	TSolution\ExtComponentParameter::ORDER_BLOCK_SERVICES,
	TSolution\ExtComponentParameter::ORDER_BLOCK_PROJECTS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_NEWS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_ARTICLES,
	TSolution\ExtComponentParameter::ORDER_BLOCK_STAFF,
	TSolution\ExtComponentParameter::ORDER_BLOCK_PARTNERS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_VACANCY,
	TSolution\ExtComponentParameter::ORDER_BLOCK_MAP,
	TSolution\ExtComponentParameter::ORDER_BLOCK_GOODS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_COMMENTS,
));

TSolution\ExtComponentParameter::addOrderTabParameters(array(
	TSolution\ExtComponentParameter::ORDER_BLOCK_DESC,
	TSolution\ExtComponentParameter::ORDER_BLOCK_CHAR,
	TSolution\ExtComponentParameter::ORDER_BLOCK_VIDEO,
	TSolution\ExtComponentParameter::ORDER_BLOCK_DOCS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_FAQ,
	TSolution\ExtComponentParameter::ORDER_BLOCK_REVIEWS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_BUY,
	TSolution\ExtComponentParameter::ORDER_BLOCK_PAYMENT,
	TSolution\ExtComponentParameter::ORDER_BLOCK_DELIVERY,
	TSolution\ExtComponentParameter::ORDER_BLOCK_DOPS,
));

TSolution\ExtComponentParameter::addOrderAllParameters(array(
	TSolution\ExtComponentParameter::ORDER_BLOCK_TIZERS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_ORDER_FORM,
	TSolution\ExtComponentParameter::ORDER_BLOCK_SALE,
	TSolution\ExtComponentParameter::ORDER_BLOCK_DESC,
	TSolution\ExtComponentParameter::ORDER_BLOCK_CHAR,
	TSolution\ExtComponentParameter::ORDER_BLOCK_REVIEWS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_GALLERY,
	TSolution\ExtComponentParameter::ORDER_BLOCK_VIDEO,
	TSolution\ExtComponentParameter::ORDER_BLOCK_SERVICES,
	TSolution\ExtComponentParameter::ORDER_BLOCK_PROJECTS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_NEWS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_ARTICLES,
	TSolution\ExtComponentParameter::ORDER_BLOCK_DOCS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_STAFF,
	TSolution\ExtComponentParameter::ORDER_BLOCK_FAQ,
	TSolution\ExtComponentParameter::ORDER_BLOCK_PARTNERS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_VACANCY,
	TSolution\ExtComponentParameter::ORDER_BLOCK_MAP,
	TSolution\ExtComponentParameter::ORDER_BLOCK_GOODS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_DOPS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_COMMENTS,
));

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

TSolution\ExtComponentParameter::addUseTabParameter('USE_DETAIL_TABS_PROJECTS');
TSolution\ExtComponentParameter::addTextParameter('T_MAP');

TSolution\ExtComponentParameter::addCheckBoxParameter('USE_SHARE', [
	"DEFAULT" => "N"
]);
TSolution\ExtComponentParameter::addCheckBoxParameter('SHOW_CATEGORY', [
	"DEFAULT" => "Y"
]);
TSolution\ExtComponentParameter::addCheckBoxParameter('DETAIL_USE_TAGS', [
	"DEFAULT" => "N"
]);
TSolution\ExtComponentParameter::addSelectParameter('PROPERTIES_DISPLAY_TYPE', [
	'VALUES' => [
		"BLOCK" => GetMessage("PROPERTIES_DISPLAY_TYPE_BLOCK"),
		"TABLE" => GetMessage("PROPERTIES_DISPLAY_TYPE_TABLE")
	],
	"DEFAULT" => "TABLE"
]);

TSolution\ExtComponentParameter::appendTo($arTemplateParameters);

if (strpos($arCurrentValues['SECTION_ELEMENTS_TYPE_VIEW'], 'list_elements_1') !== false) {
	$arTemplateParametersParts[] = array(
		'ELEMENTS_ITEMS_OFFSET' => array(
			'PARENT' => 'LIST_SETTINGS',
			'NAME' => GetMessage('SECTION-ELEMENTS_ITEMS_OFFSET'),
			'TYPE' => 'CHECKBOX',
			'DEFAULT' => 'Y',
		),
		'ELEMENTS_COUNT' => array(
			'PARENT' => 'LIST_SETTINGS',
			'NAME' => GetMessage('SECTION-ELEMENTS_ELEMENTS_COUNT'),
			'TYPE' => 'LIST',
			'VALUES' => array(
				'3' => '3',
				'4' => '4',
			),
			'DEFAULT' => '3',
		),
	);
}
if (strpos($arCurrentValues['SECTION_ELEMENTS_TYPE_VIEW'], 'list_elements_2') !== false) {
	$arTemplateParametersParts[] = array(
		'ELEMENTS_ITEMS_OFFSET' => array(
			'PARENT' => 'LIST_SETTINGS',
			'NAME' => GetMessage('SECTION-ELEMENTS_ITEMS_OFFSET'),
			'TYPE' => 'CHECKBOX',
			'DEFAULT' => 'Y',
		),
		
	);
}
if (strpos($arCurrentValues['SECTION_ELEMENTS_TYPE_VIEW'], 'list_elements_3') !== false) {
	$arTemplateParametersParts[] = array(
		'ELEMENTS_ITEMS_OFFSET' => array(
			'PARENT' => 'LIST_SETTINGS',
			'NAME' => GetMessage('SECTION-ELEMENTS_ITEMS_OFFSET'),
			'TYPE' => 'CHECKBOX',
			'DEFAULT' => 'Y',
		),
		'ELEMENTS_IMAGE_POSITION' => array(
			'PARENT' => 'LIST_SETTINGS',
			'NAME' => GetMessage('SECTION-ELEMENTS_IMAGE_POSITION'),
			'TYPE' => 'LIST',
			'VALUES' => array(
				'LEFT' => GetMessage('IMAGE_POSITION_LEFT'),
				'RIGHT' => GetMessage('IMAGE_POSITION_RIGHT'),
			),
			'DEFAULT' => 'LEFT',
		),
	);
}

$arTemplateParameters['SHOW_DETAIL_LINK'] = [
	'PARENT' => TSolution\ExtComponentParameter::PARENT_GROUP_LIST,
	'NAME' => Loc::getMessage('SHOW_DETAIL_LINK'),
	'TYPE' => 'CHECKBOX',
	'DEFAULT' => 'Y',
];
// $arTemplateParameters["SKU_IBLOCK_ID"] = array(
// 	"NAME" => GetMessage("T_SKU_IBLOCK_ID"),
// 	"TYPE" => "LIST",
// 	"VALUES" => $arIBlocks,
// 	"DEFAULT" => "",
// 	"PARENT" => "BASE",
// 	"REFRESH" => "Y",
// );

$arTemplateParameters = array_merge($arTemplateParameters, array(
	'MAP_TYPE' => array(
		'PARENT' => TSolution\ExtComponentParameter::PARENT_GROUP_BASE,
		'SORT' => 250,
		'NAME' => GetMessage('T_MAP_TYPE'),
		'TYPE' => 'LIST',
		'VALUES' => array(
			'YANDEX' => 'Yandex',
			'GOOGLE' => 'Google',
		),
		'DEFAULT' => 'YANDEX',
	),
	"TYPE_HEAD_BLOCK" => array(
		"PARENT" => TSolution\ExtComponentParameter::PARENT_GROUP_LIST,
		"NAME" => GetMessage("TYPE_HEAD_BLOCK_NAME"),
		"TYPE" => "LIST",
		"VALUES" => array(
			"FROM_MODULE" => GetMessage("FROM_MODULE_PARAMS"), 
			"none" => GetMessage("T_NONE"), 
			"years_mix" => GetMessage("T_YEARS_MIX"), 
			"years_links" => GetMessage("T_YEARS_LINKS"), 
			"sections_mix" => GetMessage("T_SECTIONS_MIX"), 
			"sections_links" => GetMessage("T_SECTIONS_LINKS")
		),
		"DEFAULT" => "FROM_MODULE",
	),
	'S_ASK_QUESTION' => array(
		'PARENT' => TSolution\ExtComponentParameter::PARENT_GROUP_DETAIL,
		'SORT' => 700,
		'NAME' => Loc::getMessage('S_ASK_QUESTION'),
		'TYPE' => 'TEXT',
		'DEFAULT' => '',
	),
	'S_ORDER_SERVISE' => array(
		'PARENT' => TSolution\ExtComponentParameter::PARENT_GROUP_DETAIL,
		'SORT' => 701,
		'NAME' => Loc::getMessage('S_ORDER_SERVISE'),
		'TYPE' => 'TEXT',
		'DEFAULT' => '',
	),
	'FORM_ID_ORDER_SERVISE' => array(
		'PARENT' => TSolution\ExtComponentParameter::PARENT_GROUP_DETAIL,
		'SORT' => 701,
		'NAME' => Loc::getMessage('T_FORM_ID_ORDER_SERVISE'),
		'TYPE' => 'TEXT',
		'DEFAULT' => '',
	),
	"VISIBLE_PROP_COUNT" => array(
		"PARENT" => TSolution\ExtComponentParameter::PARENT_GROUP_DETAIL,
		"NAME" => GetMessage("VISIBLE_PROP_COUNT_TITLE"),
		"TYPE" => "STRING",
		"DEFAULT" => "6",
	),
	"TAKE_FILTER_FROM" => array(
		"PARENT" => FILTER_SETTINGS,
		"SORT" => 1,
		"NAME" => GetMessage("TAKE_FILTER_FROM_TITLE"),
		'TYPE' => 'LIST',
		'VALUES' => array(
			"FROM_MODULE" => GetMessage("FROM_MODULE_PARAMS"), 
			'FROM_PARAMETERS' => GetMessage("FROM_PARAMETERS"),
		),
		"DEFAULT" => "FROM_MODULE",
	),
	

));

//merge parameters to one array
foreach ($arTemplateParametersParts as $i => $part) {
	$arTemplateParameters = array_merge($arTemplateParameters, $part);
}?>