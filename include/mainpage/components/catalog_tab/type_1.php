<?
$catalogIBlock = 38;
$countInLine = 4;
$customElementSort = '';
$skipHit = 'N';
$showOneProductFromSection = 'N';
if ($GLOBALS['SHOWCASE'] == 'Y') {
    $showOneProductFromSection = 'Y';

    $items = $sections = [];
    $sectionIteration = 1;

    $obSections = CIBlockSection::GetList(
        array('SORT' => 'ASC'),
        array(
            'IBLOCK_ID' => $catalogIBlock,
            'ACTIVE' => 'Y',
            'DEPTH_LEVEL' => 1,
            'CNT_ACTIVE' => 'Y',
        ),
        true,
        array('ID', 'NAME'),
	);
    while ($resSection = $obSections->GetNext()) {
        if ($resSection['ELEMENT_CNT'] <= 0)
            continue;

        $sections[] = $resSection;

        if ($sectionIteration >= $countInLine)
            break;

        $sectionIteration++;
    }

    foreach ($sections as $i => $section) {
        $obElements = CIBlockElement::GetList(
            array('SORT' => 'ASC', 'NAME' => 'ASC'),
            array(
                'IBLOCK_ID' => $catalogIBlock,
                'ACTIVE' => 'Y',
                'SECTION_ID' => $sections[$i]['ID'],
                'INCLUDE_SUBSECTIONS' => 'Y',
            ),
            false,
            false,
            array('ID')
        );
        while ($resElement = $obElements->GetNext()) {
            $items[] = $resElement['ID'];

            break;
        }
    }

    global $arFilterCatalogNew;
    $arFilterCatalogNew['ID'] = $items;
    $customElementSort = array('ID' => $items);
    $skipTabs = 'Y';
}
?>

<?$APPLICATION->IncludeComponent(
	"aspro:tabs.allcorp3motor", 
	".default", 
	array(
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"DETAIL_URL" => "",
		"FILTER_NAME" => "arFilterCatalogNew",
		"HIT_PROP" => "HIT",
		"IBLOCK_ID" => $catalogIBlock,
		"IBLOCK_TYPE" => "aspro_allcorp3motor_catalog",
		"PAGE_ELEMENT_COUNT" => "FROM_THEME",
		"PARENT_SECTION" => "",
		"PROPERTY_CODE" => array(
			0 => "SHOW_ON_INDEX_PAGE",
			1 => "STATUS",
			2 => "ARTICLE",
			3 => "PRICE",
			4 => "FORM_ORDER",
			5 => "PRICEOLD",
			6 => "ECONOMY",
			7 => "DATE_COUNTER",
			8 => "HIT",
			9 => "BRAND",
			10 => "RECOMMEND",
			11 => "",
		),
		"ELEMENT_SORT_FIELD" => "SORT",
		"ELEMENT_SORT_FIELD2" => "ID",
		"ELEMENT_SORT_ORDER" => "ASC",
		"ELEMENT_SORT_ORDER2" => "ASC",
        "CUSTOM_ELEMENT_SORT" => $customElementSort,
		"TITLE" => "Вся продукция",
		"COMPONENT_TEMPLATE" => ".default",
		"SECTION_ID" => "",
		"SECTION_CODE" => "",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_PICTURE",
			2 => "DETAIL_PICTURE",
			3 => "",
		),
		"ELEMENTS_TABLE_TYPE_VIEW" => "FROM_MODULE",
		"SHOW_SECTION" => "Y",
		"COUNT_IN_LINE" => $countInLine,
		"RIGHT_TITLE" => "Каталог",
		"RIGHT_LINK" => "product/",
		"SHOW_DISCOUNT_TIME" => "Y",
		"SHOW_OLD_PRICE" => "Y",
		"SHOW_PREVIEW_TEXT" => "N",
		"SHOW_DISCOUNT_PRICE" => "Y",
		"SHOW_GALLERY" => "Y",
		"ADD_PICT_PROP" => "PHOTOS",
		"MAX_GALLERY_ITEMS" => "5",
		"SUBTITLE" => "Каталог",
		"SKU_IBLOCK_ID" => "23",
		"SKU_PROPERTY_CODE" => array(
			0 => "FORM_ORDER",
			1 => "STATUS",
			2 => "ARTICLE",
			3 => "PRICE_CURRENCY",
			4 => "PRICE",
			5 => "PRICEOLD",
			6 => "ECONOMY",
			7 => "FILTER_PRICE",
			8 => "COLOR",
			9 => "GOST",
			10 => "DIAMETER",
			11 => "DLINA",
			12 => "VYLET_STRELY",
			13 => "MARK_STEEL",
			14 => "THICKNESS_STEEL",
			15 => "WIDTH",
		),
		"SKU_TREE_PROPS" => array(
			0 => "COLOR",
			1 => "DIAMETER",
			2 => "DLINA",
			3 => "VYLET_STRELY",
			4 => "THICKNESS_STEEL",
			5 => "WIDTH",
		),
		"SKU_SORT_FIELD" => "name",
		"SKU_SORT_ORDER" => "asc",
		"SKU_SORT_FIELD2" => "sort",
		"SKU_SORT_ORDER2" => "asc",
		"TYPE_TEMPLATE" => "catalog_block",
		"NARROW" => "FROM_THEME",
		"ITEMS_OFFSET" => "FROM_THEME",
		"TEXT_CENTER" => "FROM_THEME",
		"IMG_CORNER" => "FROM_THEME",
		"ELEMENT_IN_ROW" => "FROM_THEME",
		"COUNT_ROWS" => "FROM_THEME",
		"IMAGES_POSITION" => "FROM_THEME",
        "SHOW_ONE_PRODUCT_FROM_EACH_SECTION" => $showOneProductFromSection,
        "SKIP_TABS" => $skipTabs,
	),
	false
);?>