<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

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

$arTemplateParametersParts = [];

TSolution\ExtComponentParameter::init(__DIR__, $arCurrentValues);
TSolution\ExtComponentParameter::addBaseParameters(array(
	array(
		array('SECTION' => 'TARIFFS_PAGE', 'OPTION' => 'SECTIONS_TYPE_VIEW_TARIFFS'),
		'SECTIONS_TYPE_VIEW',
	),
	array(
		array('SECTION' => 'TARIFFS_PAGE', 'OPTION' => 'SECTION_TYPE_VIEW_TARIFFS'),
		'SECTION_TYPE_VIEW',
	),
	array(
		array('SECTION' => 'TARIFFS_PAGE', 'OPTION' => 'ELEMENTS_PAGE_TARIFFS'),
		'SECTION_ELEMENTS_TYPE_VIEW'
	),
	array(
		array('SECTION' => 'TARIFFS_PAGE', 'OPTION' => 'TARIFFS_PAGE_DETAIL'),
		'ELEMENT_TYPE_VIEW'
	),
));

TSolution\ExtComponentParameter::addRelationBlockParameters(array(
	TSolution\ExtComponentParameter::RELATION_BLOCK_DESC,
	TSolution\ExtComponentParameter::RELATION_BLOCK_CHAR,
	TSolution\ExtComponentParameter::RELATION_BLOCK_DOCS,
	TSolution\ExtComponentParameter::RELATION_BLOCK_FAQ,
	TSolution\ExtComponentParameter::RELATION_BLOCK_REVIEWS,
	TSolution\ExtComponentParameter::RELATION_BLOCK_SALE,
	TSolution\ExtComponentParameter::RELATION_BLOCK_NEWS,
	TSolution\ExtComponentParameter::RELATION_BLOCK_ARTICLES,
	TSolution\ExtComponentParameter::RELATION_BLOCK_SERVICES,
	TSolution\ExtComponentParameter::RELATION_BLOCK_PROJECTS,
	TSolution\ExtComponentParameter::RELATION_BLOCK_GOODS,
	array(
		TSolution\ExtComponentParameter::RELATION_BLOCK_DOPS,
		'additionalParams' => [
			'toggle' => false,
		],		
	),
	TSolution\ExtComponentParameter::RELATION_BLOCK_COMMENTS,
));

TSolution\ExtComponentParameter::addOrderAllParameters(array(
	TSolution\ExtComponentParameter::ORDER_BLOCK_SALE,
	//TSolution\ExtComponentParameter::ORDER_BLOCK_TIZERS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_DESC,
	TSolution\ExtComponentParameter::ORDER_BLOCK_CHAR,
	TSolution\ExtComponentParameter::ORDER_BLOCK_REVIEWS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_SERVICES,
	TSolution\ExtComponentParameter::ORDER_BLOCK_PROJECTS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_NEWS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_ARTICLES,
	TSolution\ExtComponentParameter::ORDER_BLOCK_DOCS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_FAQ,
	TSolution\ExtComponentParameter::ORDER_BLOCK_GOODS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_DOPS,
	TSolution\ExtComponentParameter::ORDER_BLOCK_COMMENTS,
));

TSolution\ExtComponentParameter::addCheckBoxParameter('USE_SHARE', [
	"DEFAULT" => "N"
]);
TSolution\ExtComponentParameter::addCheckBoxParameter('DETAIL_USE_TAGS', [
	"DEFAULT" => "N"
]);
TSolution\ExtComponentParameter::addCheckBoxParameter('SHOW_CATEGORY', [
	"DEFAULT" => "N"
]);

TSolution\ExtComponentParameter::appendTo($arTemplateParameters);

if (strpos($arCurrentValues['SECTIONS_TYPE_VIEW'], 'sections_1') !== false) {
	$arTemplateParametersParts[] = array(
		'SECTIONS_ITEMS_OFFSET' => array(
			'PARENT' => 'LIST_SETTINGS',
			'NAME' => GetMessage('SECTIONS_ITEMS_OFFSET'),
			'TYPE' => 'CHECKBOX',
			'DEFAULT' => 'Y',
		),
		'SECTIONS_ELEMENTS_COUNT' => array(
			'PARENT' => 'LIST_SETTINGS',
			'NAME' => GetMessage('SECTIONS_ELEMENTS_COUNT'),
			'TYPE' => 'LIST',
			'VALUES' => array(
				'2' => '2',
				'3' => '3',
			),
			'DEFAULT' => '2',
		),
		'SECTIONS_IMAGES' => array(
			'PARENT' => 'LIST_SETTINGS',
			'NAME' => GetMessage('SECTIONS_IMAGES'),
			'TYPE' => 'LIST',
			'VALUES' => array(
				'ICONS' => GetMessage('IMAGES_ICONS'),
				'ROUND_PICTURES' => GetMessage('IMAGES_ROUND_PICTURES'),
			),
			'DEFAULT' => 'ROUND_PICTURES',
		),
		'SECTIONS_IMAGE_POSITION' => array(
			'PARENT' => 'LIST_SETTINGS',
			'NAME' => GetMessage('SECTIONS_IMAGE_POSITION'),
			'TYPE' => 'LIST',
			'VALUES' => array(
				'RIGHT' => GetMessage('IMAGE_POSITION_RIGHT'),
				'LEFT' => GetMessage('IMAGE_POSITION_LEFT'),
			),
			'DEFAULT' => 'LEFT',
		),
	);
}

if (strpos($arCurrentValues['SECTION_TYPE_VIEW'], 'section_1') !== false) {
	$arTemplateParametersParts[] = array(
		'SECTION_ITEMS_OFFSET' => array(
			'PARENT' => 'LIST_SETTINGS',
			'NAME' => GetMessage('SECTION_ITEMS_OFFSET'),
			'TYPE' => 'CHECKBOX',
			'DEFAULT' => 'Y',
		),
		'SECTION_ELEMENTS_COUNT' => array(
			'PARENT' => 'LIST_SETTINGS',
			'NAME' => GetMessage('SECTION_ELEMENTS_COUNT'),
			'TYPE' => 'LIST',
			'VALUES' => array(
				'2' => '2',
				'3' => '3',
			),
			'DEFAULT' => '2',
		),
		'SECTIONS_IMAGES' => array(
			'PARENT' => 'LIST_SETTINGS',
			'NAME' => GetMessage('SECTIONS_IMAGES'),
			'TYPE' => 'LIST',
			'VALUES' => array(
				'ICONS' => GetMessage('IMAGES_ICONS'),
				'ROUND_PICTURES' => GetMessage('IMAGES_ROUND_PICTURES'),
			),
			'DEFAULT' => 'ROUND_PICTURES',
		),
		'SECTION_IMAGE_POSITION' => array(
			'PARENT' => 'LIST_SETTINGS',
			'NAME' => GetMessage('SECTION_IMAGE_POSITION'),
			'TYPE' => 'LIST',
			'VALUES' => array(
				'RIGHT' => GetMessage('IMAGE_POSITION_RIGHT'),
				'LEFT' => GetMessage('IMAGE_POSITION_LEFT'),
			),
			'DEFAULT' => 'LEFT',
		),
	);
}

if(strpos($arCurrentValues['SECTION_ELEMENTS_TYPE_VIEW'], 'list_elements_1') !== false) {
	$arTemplateParametersParts[] = array(
		'ELEMENTS_ITEMS_OFFSET' => array(
			'PARENT' => 'LIST_SETTINGS',
			'NAME' => GetMessage('SECTION-ELEMENTS_ITEMS_OFFSET'),
			'TYPE' => 'CHECKBOX',
			'DEFAULT' => 'Y',
		),
	);
}
elseif(strpos($arCurrentValues['SECTION_ELEMENTS_TYPE_VIEW'], 'list_elements_2') !== false) {
	$arTemplateParametersParts[] = array(
		'ELEMENTS_ITEMS_OFFSET' => array(
			'PARENT' => 'LIST_SETTINGS',
			'NAME' => GetMessage('SECTION-ELEMENTS_ITEMS_OFFSET'),
			'TYPE' => 'CHECKBOX',
			'DEFAULT' => 'Y',
		),
		'ELEMENTS_IMAGES' => array(
			'PARENT' => 'LIST_SETTINGS',
			'NAME' => GetMessage('SECTION-ELEMENTS_IMAGES'),
			'TYPE' => 'LIST',
			'VALUES' => array(
				'ICONS' => GetMessage('IMAGES_ICONS'),
				'ROUND_PICTURES' => GetMessage('IMAGES_ROUND_PICTURES'),
			),
			'DEFAULT' => 'ROUND_PICTURES',
		),
	);
}
elseif(strpos($arCurrentValues['SECTION_ELEMENTS_TYPE_VIEW'], 'list_elements_3') !== false) {
	$arTemplateParametersParts[] = array(
		'ELEMENTS_ITEMS_OFFSET' => array(
			'PARENT' => 'LIST_SETTINGS',
			'NAME' => GetMessage('SECTION-ELEMENTS_ITEMS_OFFSET'),
			'TYPE' => 'CHECKBOX',
			'DEFAULT' => 'Y',
		),
		'ELEMENTS_IMAGES' => array(
			'PARENT' => 'LIST_SETTINGS',
			'NAME' => GetMessage('SECTION-ELEMENTS_IMAGES'),
			'TYPE' => 'LIST',
			'VALUES' => array(
				'ICONS' => GetMessage('IMAGES_ICONS'),
				'ROUND_PICTURES' => GetMessage('IMAGES_ROUND_PICTURES'),
			),
			'DEFAULT' => 'ROUND_PICTURES',
		),
	);
}

$arTemplateParameters['SHOW_DETAIL_LINK'] = [
	'PARENT' => TSolution\ExtComponentParameter::PARENT_GROUP_LIST,
	'NAME' => Loc::getMessage('SHOW_DETAIL_LINK'),
	'TYPE' => 'CHECKBOX',
	'DEFAULT' => 'Y',
];

$arTemplateParameters = array_merge($arTemplateParameters, array(
	'SHOW_SECTION_PREVIEW_DESCRIPTION' => array(
		'PARENT' => TSolution\ExtComponentParameter::PARENT_GROUP_LIST,
		'SORT' => 700,
		'NAME' => Loc::getMessage('T_SHOW_SECTION_PREVIEW_DESCRIPTION'),
		'TYPE' => 'CHECKBOX',
		'DEFAULT' => 'Y',
	),
	'SHOW_SECTION_DESCRIPTION' => array(
		'PARENT' => TSolution\ExtComponentParameter::PARENT_GROUP_LIST,
		'SORT' => 700,
		'NAME' => Loc::getMessage('T_SHOW_SECTION_DESCRIPTION'),
		'TYPE' => 'CHECKBOX',
		'DEFAULT' => 'Y',
	),
	'SHOW_SECTION' => array(
		'PARENT' => TSolution\ExtComponentParameter::PARENT_GROUP_LIST,
		'SORT' => 700,
		'NAME' => Loc::getMessage('T_SHOW_SECTION'),
		'TYPE' => 'CHECKBOX',
		'DEFAULT' => 'Y',
	),
	"INCLUDE_SUBSECTIONS" => array(
		"PARENT" => TSolution\ExtComponentParameter::PARENT_GROUP_LIST,
		"NAME" => Loc::getMessage("CP_BC_INCLUDE_SUBSECTIONS"),
		"TYPE" => "LIST",
		"VALUES" => array(
			"Y" => Loc::getMessage('CP_BC_INCLUDE_SUBSECTIONS_ALL'),
			"A" => Loc::getMessage('CP_BC_INCLUDE_SUBSECTIONS_ACTIVE'),
			"N" => Loc::getMessage('CP_BC_INCLUDE_SUBSECTIONS_NO'),
		),
		"DEFAULT" => "Y",
	),
	'SHOW_CHILD_SECTIONS' => array(
		'PARENT' => TSolution\ExtComponentParameter::PARENT_GROUP_LIST,
		'SORT' => 700,
		'NAME' => Loc::getMessage('SHOW_CHILD_SECTIONS'),
		'TYPE' => 'CHECKBOX',
		'DEFAULT' => 'Y',
	),
	'SHOW_CHILD_ELEMENTS' => array(
		'PARENT' => TSolution\ExtComponentParameter::PARENT_GROUP_LIST,
		'SORT' => 700,
		'NAME' => Loc::getMessage('SHOW_CHILD_ELEMENTS'),
		'TYPE' => 'CHECKBOX',
		'DEFAULT' => 'N',
		'REFRESH' => 'Y',
	),
	'LIST_VISIBLE_PROP_COUNT' => array(
		'PARENT' => TSolution\ExtComponentParameter::PARENT_GROUP_LIST,
		'NAME' => Loc::getMessage('T_LIST_VISIBLE_PROP_COUNT'),
		'TYPE' => 'STRING',
		'DEFAULT' => '4',
		'SORT' => 700,
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
	'DETAIL_VISIBLE_PROP_COUNT' => array(
		'PARENT' => TSolution\ExtComponentParameter::PARENT_GROUP_DETAIL,
		'NAME' => Loc::getMessage('T_DETAIL_VISIBLE_PROP_COUNT'),
		'TYPE' => 'STRING',
		'DEFAULT' => '6',
		'SORT' => 710,
	),
));

if($arCurrentValues['SHOW_CHILD_ELEMENTS'] == 'Y'){
	$arTemplateParameters['SHOW_ELEMENTS_IN_LAST_SECTION'] = array(
		'PARENT' => TSolution\ExtComponentParameter::PARENT_GROUP_LIST,
		'SORT' => 700,
		'NAME' => Loc::getMessage('SHOW_ELEMENTS_IN_LAST_SECTION'),
		'TYPE' => 'CHECKBOX',
		'DEFAULT' => 'N',
	);
}

//merge parameters to one array
foreach ($arTemplateParametersParts as $i => $part) {
	$arTemplateParameters = array_merge($arTemplateParameters, $part);
}?>