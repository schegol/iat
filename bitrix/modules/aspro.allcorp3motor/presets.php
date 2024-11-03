<?php
/**
 * Aspro:allcorp3motor module params presets
 * @copyright 2021 Aspro
 */

IncludeModuleLangFile(__FILE__);
$moduleClass = 'CAllcorp3Motor';

// initialize module parametrs list and default values
$moduleClass::$arPresetsList = array(
	894 => array(
		'ID' => 894,
		'TITLE' => GetMessage('PRESET_894_TITLE'),
		'DESCRIPTION' => GetMessage('PRESET_894_DESCRIPTION'),
		'PREVIEW_PICTURE' => '/bitrix/images/aspro.allcorp3motor/themes/preset_894_preview.jpg',
		'DETAIL_PICTURE' => '/bitrix/images/aspro.allcorp3motor/themes/preset_894_detail.jpg',
		'BANNER_INDEX' => '1',
		'OPTIONS' => array(
			'BASE_COLOR' => 'CUSTOM',
			'BASE_COLOR_CUSTOM' => 'd72929',
			'USE_MORE_COLOR' => 'N',
			'PAGE_WIDTH' => '2',
			'FONT_STYLE' => '7',
			'TITLE_FONT' => 'N',
			'MAX_DEPTH_MENU' => '4',
			'LEFT_BLOCK' => 'normal',
			'SIDE_MENU' => 'RIGHT',
			'TYPE_SEARCH' => 'fixed',
			'ROUND_ELEMENTS' => 'N',
			'FONT_BUTTONS' => 'LOWER',
			'PAGE_TITLE' => '1',
			'PAGE_TITLE_POSITION' => 'LEFT',
			'H1_STYLE' => '1',
			'STICKY_SIDEBAR' => 'Y',
			'SHOW_LICENCE' => array(
				'VALUE' => 'Y',
				'DEPENDENT_PARAMS' => array(
				),
			),
			'INDEX_TYPE' => array(
				'VALUE' => 'index1',
				'SUB_PARAMS' => array(
					'BIG_BANNER_INDEX' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'N',
								'FON' => 'N',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_3',
						'ADDITIONAL_OPTIONS' => array(
							'NARROW_BANNER' => 'N',
							'NO_OFFSET_BANNER' => 'N',
							'HEIGHT_BANNER' => 'NORMAL',
						),
					),
					'TIZERS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '40',
								'BOTTOM_OFFSET' => '80',
								'IMAGES' => 'PICTURES',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_1',
						'ADDITIONAL_OPTIONS' => array(
							'ELEMENTS_COUNT' => '4',
							'LINES_COUNT' => '1',
							'IMAGES_POSITION' => 'LEFT',
						),
					),
					'CATALOG_SECTIONS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'N',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => 'N',
								'SHOW_TITLE' => 'Y',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_1',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'ITEMS_OFFSET' => 'Y',
							'ELEMENTS_COUNT' => '3',
							'LINES_COUNT' => '2',
							'TEXT_POSITION' => 'BG',
							'SHOW_BLOCKS' => 'DESCRIPTION',
						),
					),
					'CATALOG_TAB' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
								'SHOW_TITLE' => 'Y',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_1',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'TEXT_CENTER' => 'N',
							'ITEMS_OFFSET' => 'Y',
							'IMG_CORNER' => 'N',
							'ELEMENTS_COUNT' => '4',
							'LINES_COUNT' => '1',
						),
					),
					'YOUTUBE' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'N',
								'FON' => 'Y',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
								'SHOW_TITLE' => 'Y',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_1',
						'ADDITIONAL_OPTIONS' => array(
							'ITEMS_OFFSET' => 'N',
							'WIDE' => 'N',
							'ELEMENTS_COUNT' => '3',
						),
					),
					'TARIFFS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'Y',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '40',
								'BOTTOM_OFFSET' => '80',
								'SHOW_TITLE' => 'N',
								'TITLE_POSITION' => 'NORMAL',
								'TABS' => 'INSIDE',
							),
						),
						'VALUE' => 'N',
						'TEMPLATE' => 'type_3',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'ITEMS_OFFSET' => 'N',
							'IMAGES' => 'ROUND_PICTURES',
						),
					),
					'MIDDLE_ADV' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_2',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'ITEMS_OFFSET' => 'Y',
							'TEXT_CENTER' => 'Y',
							'SHORT_BLOCK' => 'Y',
						),
					),
					'SALE' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'Y',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
								'SHOW_TITLE' => 'Y',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_1',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'ITEMS_OFFSET' => 'Y',
							'LINES_COUNT' => 'SHOW_MORE',
						),
					),
					'NEWS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'N',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
								'SHOW_TITLE' => 'Y',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_2',
						'ADDITIONAL_OPTIONS' => array(
							'ITEMS_OFFSET' => 'Y',
							'LINES_COUNT' => '1',
						),
					),
					'BOTTOM_BANNERS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'N',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => 'N',
								'BOTTOM_OFFSET' => 'N',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_1',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'Y',
							'ITEMS_OFFSET' => 'N',
						),
					),
					'SERVICES' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'Y',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
								'SHOW_TITLE' => 'Y',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_1',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'ITEMS_OFFSET' => 'Y',
							'ELEMENTS_COUNT' => '3',
							'LINES_COUNT' => '2',
							'IMAGES' => 'TRANSPARENT_PICTURES',
							'ITEMS_TYPE' => 'SECTIONS',
						),
					),
					'STAFF' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'Y',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
								'SHOW_TITLE' => 'Y',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_1',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'ITEMS_OFFSET' => 'Y',
							'SHOW_NEXT' => 'N',
							'ELEMENTS_COUNT' => '4',
						),
					),
					'REVIEWS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'Y',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => 'N',
								'BOTTOM_OFFSET' => '80',
								'SHOW_TITLE' => 'N',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_3',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'ITEMS_OFFSET' => 'N',
							'SHOW_NEXT' => 'N',
							'ELEMENTS_COUNT' => '2',
						),
					),
					'FLOAT_BANNERS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => 'N',
								'BOTTOM_OFFSET' => '80',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_1',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'Y',
							'ITEMS_OFFSET' => 'Y',
							'LINES_COUNT' => '1',
						),
					),
					'BLOG' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'Y',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
								'SHOW_TITLE' => 'Y',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_2',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'ITEMS_OFFSET' => 'Y',
							'LINES_COUNT' => '1',
						),
					),
					'PROJECTS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
								'SHOW_TITLE' => 'Y',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_1',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'ITEMS_OFFSET' => 'Y',
							'ELEMENTS_COUNT' => '2',
							'LINES_COUNT' => 'SHOW_MORE',
						),
					),
					'GALLERY' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
								'SHOW_TITLE' => 'Y',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_2',
						'ADDITIONAL_OPTIONS' => array(
							'ITEMS_OFFSET' => 'Y',
							'SHOW_NEXT' => 'N',
							'ELEMENTS_COUNT' => '2',
							'ITEMS_TYPE' => 'ALBUM',
						),
					),
					'MAPS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'Y',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
								'SHOW_TITLE' => 'N',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_2',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'OFFSET' => 'N',
						),
					),
					'FAQS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'Y',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_1',
					),
					'COMPANY_TEXT' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_3',
						'ADDITIONAL_OPTIONS' => array(
							'IMAGES_TIZERS' => 'ICONS',
						),
					),
					'BRANDS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'Y',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
								'SHOW_TITLE' => 'Y',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_1',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'ITEMS_OFFSET' => 'N',
							'ITEMS_BORDER' => 'Y',
							'LINES_COUNT' => '1',
						),
					),
					'FORMS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '40',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_1',
						'ADDITIONAL_OPTIONS' => array(
							'CENTERED' => 'Y',
							'LIGHT_TEXT' => 'Y',
							'LIGHTEN_DARKEN' => 'N',
						),
					),
					'INSTAGRAMM' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
								'SHOW_TITLE' => 'Y',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'N',
						'TEMPLATE' => 'type_1',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'ITEMS_OFFSET' => 'Y',
							'ELEMENTS_COUNT' => '4',
							'LINES_COUNT' => '1',
						),
					),
					'VK' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'N',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => 'N',
								'BOTTOM_OFFSET' => 'N',
								'SHOW_TITLE' => 'N',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'N',
						'TEMPLATE' => 'type_1',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'ELEMENTS_COUNT' => '4',
						),
					),
					'CUSTOM_TEXT' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'N',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
							),
						),
						'VALUE' => 'N',
						'TEMPLATE' => '',
					),
				),
				'ORDER' => 'BIG_BANNER_INDEX,TIZERS,FORMS,SERVICES,BOTTOM_BANNERS,SALE,MIDDLE_ADV,STAFF,PROJECTS,YOUTUBE,REVIEWS,CATALOG_SECTIONS,CATALOG_TAB,BRANDS,NEWS,FLOAT_BANNERS,TARIFFS,BLOG,GALLERY,FAQS,COMPANY_TEXT,MAPS,INSTAGRAMM,CUSTOM_TEXT,VK',
			),
			'TOP_MENU_FIXED' => array(
				'VALUE' => 'Y',
				'DEPENDENT_PARAMS' => array(
					'HEADER_FIXED' => array(
						'VALUE' => '1',
						'TOGGLE_OPTIONS' => array(
							'HEADER_FIXED_TOGGLE_MEGA_MENU' => array(
								'VALUE' => 'Y',
								'ADDITIONAL_OPTIONS' => array(
									'HEADER_FIXED_TOGGLE_MEGA_MENU_POSITION' => 'N',
								),
							),
							'HEADER_FIXED_TOGGLE_PHONE' => 'Y',
							'HEADER_FIXED_TOGGLE_SEARCH' => 'Y',
							'HEADER_FIXED_TOGGLE_LANG' => 'Y',
							'HEADER_FIXED_TOGGLE_BUTTON' => 'Y',
							'HEADER_FIXED_TOGGLE_EYED' => 'N',
						),
					),
				),
			),
			'HEADER_TYPE' => array(
				'VALUE' => '1',
				'ADDITIONAL_OPTIONS' => array(
					'HEADER_NARROW' => 'N',
					'HEADER_MARGIN' => 'Y',
					'HEADER_FON' => 'N',
				),
				'TOGGLE_OPTIONS' => array(
					'HEADER_TOGGLE_MEGA_MENU' => array(
						'VALUE' => 'Y',
						'ADDITIONAL_OPTIONS' => array(
							'HEADER_TOGGLE_MEGA_MENU_POSITION' => 'N',
						),
					),
					'HEADER_TOGGLE_SLOGAN' => 'N',
					'HEADER_TOGGLE_PHONE' => array(
						'VALUE' => 'Y',
						'ADDITIONAL_OPTIONS' => array(
							'HEADER_TOGGLE_CALLBACK' => 'N',
						),
					),
					'HEADER_TOGGLE_SEARCH' => 'Y',
					'HEADER_TOGGLE_ADDRESS' => 'Y',
					'HEADER_TOGGLE_SOCIAL' => 'Y',
					'HEADER_TOGGLE_LANG' => 'Y',
					'HEADER_TOGGLE_THEME_SELECTOR' => 'Y',
					'HEADER_TOGGLE_BUTTON' => 'Y',
					'HEADER_TOGGLE_EYED' => 'N',
				),
			),
			'MEGA_MENU_TYPE' => array(
				'VALUE' => '1',
				'DEPENDENT_PARAMS' => array(
					'REPLACE_TYPE' => 'REPLACE',
				),
			),
			'SHOW_RIGHT_SIDE' => 'Y',
			'TOP_MENU_COLOR' => 'LIGHT BG_NONE',
			'MENU_COLOR' => 'LIGHT',
			'MENU_LOWERCASE' => 'N',
			'IMAGES_WIDE_MENU' => 'PICTURES',
			'IMAGES_WIDE_MENU_POSITION' => 'LEFT',
			'WIDE_MENU_CONTENT' => array(
				'VALUE' => 'CHILDS',
				'DEPENDENT_PARAMS' => array(
					'CHILDS_VIEW' => 'ROWS',
				),
			),
			'USE_REGIONALITY' => array(
				'VALUE' => 'Y',
				'DEPENDENT_PARAMS' => array(
					'REGIONALITY_TYPE' => 'ONE_DOMAIN',
					'REGIONALITY_VIEW' => 'POPUP_REGIONS',
					'REGIONALITY_CONFIRM' => 'TOP',
				),
			),
			'ORDER_VIEW' => 'N',
			'SHOW_ONE_CLICK_BUY' => 'Y',
			'USE_FAST_VIEW_PAGE_DETAIL' => 'fast_view_1',
			'SHOW_CATALOG_GALLERY_IN_LIST' => array(
				'VALUE' => 'Y',
				'DEPENDENT_PARAMS' => array(
					'MAX_GALLERY_ITEMS' => '5',
				),
			),
			'LEFT_BLOCK_CATALOG_ROOT' => 'Y',
			'SECTIONS_TYPE_VIEW_CATALOG' => array(
				'VALUE' => 'sections_2',
				'ADDITIONAL_OPTIONS' => array(
					'SECTIONS_ITEMS_OFFSET_CATALOG' => 'Y',
					'SECTIONS_ELEMENTS_COUNT_CATALOG' => '3',
					'SECTIONS_IMAGES_CATALOG' => 'TRANSPARENT_PICTURES',
					'SECTIONS_IMAGE_POSITION_CATALOG' => 'RIGHT',
				),
			),
			'LEFT_BLOCK_CATALOG_SECTIONS' => 'Y',
			'SECTION_TYPE_VIEW_CATALOG' => array(
				'VALUE' => 'section_1',
				'ADDITIONAL_OPTIONS' => array(
					'SECTION_ITEMS_OFFSET_CATALOG' => 'Y',
					'SECTION_IMAGES_CATALOG' => 'ROUND_PICTURES',
				),
			),
			'ELEMENTS_TABLE_TYPE_VIEW' => array(
				'VALUE' => 'catalog_table',
				'ADDITIONAL_OPTIONS' => array(
					'SECTION_ITEM_LIST_OFFSET_CATALOG' => 'Y',
					'SECTION_ITEM_LIST_IMG_CORNER' => 'N',
					'SECTION_ITEM_LIST_TEXT_CENTER' => 'N',
				),
			),
			'SHOW_PROPS_BLOCK' => 'N',
			'SHOW_TABLE_PROPS' => 'NOT',
			'SHOW_SMARTFILTER' => array(
				'VALUE' => 'Y',
				'DEPENDENT_PARAMS' => array(
					'FILTER_VIEW' => 'COMPACT',
				),
			),
			'LEFT_BLOCK_CATALOG_DETAIL' => 'N',
			'CATALOG_PAGE_DETAIL' => 'element_1',
			'CATALOG_PAGE_DETAIL_GALLERY_SIZE' => '454px',
			'CATALOG_PAGE_DETAIL_THUMBS' => 'horizontal',
			'USE_DETAIL_TABS' => 'Y',
			'LEFT_BLOCK_SERVICES_ROOT' => 'Y',
			'SECTIONS_TYPE_VIEW_SERVICES' => array(
				'VALUE' => 'sections_2',
				'ADDITIONAL_OPTIONS' => array(
					'SECTIONS_ITEMS_OFFSET_SERVICES' => 'Y',
					'SECTIONS_ELEMENTS_COUNT_SERVICES' => '3',
					'SECTIONS_IMAGES_SERVICES' => 'TRANSPARENT_PICTURES',
				),
			),
			'LEFT_BLOCK_SERVICES_SECTIONS' => 'Y',
			'SECTION_TYPE_VIEW_SERVICES' => array(
				'VALUE' => 'section_2',
				'ADDITIONAL_OPTIONS' => array(
					'SECTION_ITEMS_OFFSET_SERVICES' => 'Y',
					'SECTION_ELEMENTS_COUNT_SERVICES' => '2',
					'SECTION_IMAGES_SERVICES' => 'TRANSPARENT_PICTURES',
				),
			),
			'ELEMENTS_PAGE_SERVICES' => array(
				'VALUE' => 'list_elements_2',
				'ADDITIONAL_OPTIONS' => array(
					'ELEMENTS_OFFSET_SERVICES' => 'Y',
					'ELEMENTS_COUNT_SERVICES' => '2',
					'ELEMENTS_IMAGES_SERVICES' => 'TRANSPARENT_PICTURES',
				),
			),
			'LEFT_BLOCK_SERVICES_DETAIL' => 'N',
			'USE_DETAIL_TABS_SERVICES' => 'Y',
			'SERVICES_PAGE_DETAIL' => 'element_1',
			'PROJECT_PAGE_LEFT_BLOCK' => 'N',
			'SHOW_PROJECTS_MAP' => 'Y',
			'PROJECTS_SHOW_HEAD_BLOCK' => array(
				'VALUE' => 'Y',
				'DEPENDENT_PARAMS' => array(
					'SHOW_HEAD_BLOCK_TYPE' => 'sections_mix',
				),
			),
			'PROJECTS_PAGE' => array(
				'VALUE' => 'list_elements_1',
				'ADDITIONAL_OPTIONS' => array(
					'ELEMENTS_OFFSET_PROJECT' => 'Y',
					'ELEMENTS_COUNT_PROJECT' => '4',
				),
			),
			'PROJECT_DETAIL_LEFT_BLOCK' => 'N',
			'SHOW_PROJECTS_MAP_DETAIL' => 'Y',
			'USE_DETAIL_TABS_PROJECTS' => 'Y',
			'PROJECTS_PAGE_DETAIL' => 'element_1',
			'DETAIL_LINKED_PROJECTS' => 'list',
			'GALLERY_LIST_PAGE' => array(
				'VALUE' => 'list_elements_1',
				'ADDITIONAL_OPTIONS' => array(
					'ELEMENTS_OFFSET_GALLERY' => 'Y',
					'ELEMENTS_COUNT_GALLERY' => '3',
					'ITEMS_TYPE_GALLERY' => 'ALBUM',
				),
			),
			'GALLERY_DETAIL_PAGE' => 'element_2',
			'PAGE_CONTACTS' => '2',
			'CONTACTS_USE_FEEDBACK' => 'Y',
			'CONTACTS_USE_MAP' => 'Y',
			'CONTACTS_USE_TABS' => 'N',
			'BLOG_PAGE_LEFT_BLOCK' => 'Y',
			'BLOG_PAGE' => array(
				'VALUE' => 'list_elements_3',
				'ADDITIONAL_OPTIONS' => array(
					'ELEMENTS_OFFSET_BLOG' => 'Y',
					'ELEMENTS_IMAGE_POSITION_BLOG' => 'LEFT',
				),
			),
			'LANDINGS_PAGE' => array(
				'VALUE' => 'list_elements_1',
				'ADDITIONAL_OPTIONS' => array(
					'ELEMENTS_OFFSET_LANDING' => 'Y',
					'ELEMENTS_IMAGE_POSITION_LANDING' => 'LEFT',
				),
			),
			'SALE_PAGE_LEFT_BLOCK' => 'N',
			'SALE_PAGE' => array(
				'VALUE' => 'list_elements_2',
				'ADDITIONAL_OPTIONS' => array(
					'ELEMENTS_OFFSET_SALE' => 'Y',
					'ELEMENTS_COUNT_SALE' => '4',
				),
			),
			'NEWS_PAGE_LEFT_BLOCK' => 'N',
			'NEWS_PAGE' => array(
				'VALUE' => 'list_elements_2',
				'ADDITIONAL_OPTIONS' => array(
					'ELEMENTS_OFFSET_NEWS' => 'Y',
				),
			),
			'STAFF_PAGE' => 'list_elements_1',
			'DETAIL_LINKED_STAFF' => 'list',
			'PARTNERS_PAGE' => array(
				'VALUE' => 'list_elements_3',
				'ADDITIONAL_OPTIONS' => array(
					'ELEMENTS_OFFSET_PARTNER' => 'Y',
				),
			),
			'BRANDS_PAGE' => array(
				'VALUE' => 'list_elements_1',
				'ADDITIONAL_OPTIONS' => array(
					'ELEMENTS_OFFSET_BRAND' => 'Y',
				),
			),
			'VACANCY_PAGE' => 'list_elements_1',
			'LICENSES_PAGE' => 'list_elements_2',
			'DOCS_PAGE' => 'list_elements_2',
			'FOOTER_TYPE' => array(
				'VALUE' => '1',
				'ADDITIONAL_OPTIONS' => array(
					'FOOTER_COLOR' => 'DARK',
				),
				'TOGGLE_OPTIONS' => array(
					'FOOTER_TOGGLE_SUBSCRIBE' => 'Y',
					'FOOTER_TOGGLE_PHONE' => array(
						'VALUE' => 'Y',
						'ADDITIONAL_OPTIONS' => array(
							'FOOTER_TOGGLE_CALLBACK' => 'N',
						),
					),
					'FOOTER_TOGGLE_EMAIL' => 'Y',
					'FOOTER_TOGGLE_ADDRESS' => 'Y',
					'FOOTER_TOGGLE_SOCIAL' => 'Y',
					'FOOTER_TOGGLE_LANG' => 'Y',
					'FOOTER_TOGGLE_PAY_SYSTEMS' => 'Y',
					'FOOTER_TOGGLE_DEVELOPER' => array(
						'VALUE' => 'Y',
						'ADDITIONAL_OPTIONS' => array(
							'FOOTER_TOGGLE_DEVELOPER_PARTNER' => 'N',
						),
					),
					'FOOTER_TOGGLE_EYED' => 'N',
					'FOOTER_TOGGLE_SITEMAP' => 'N',
				),
			),
			'CALLBACK_SIDE_BUTTON' => 'Y',
			'QUESTION_SIDE_BUTTON' => 'Y',
			'REVIEWS_SIDE_BUTTON' => 'Y',
			'ADV_TOP_HEADER' => 'N',
			'ADV_TOP_UNDERHEADER' => 'N',
			'ADV_SIDE' => 'Y',
			'ADV_CONTENT_TOP' => 'N',
			'ADV_CONTENT_BOTTOM' => 'N',
			'ADV_FOOTER' => 'N',
			'HEADER_MOBILE_FIXED' => array(
				'VALUE' => 'Y',
				'DEPENDENT_PARAMS' => array(
					'HEADER_MOBILE_SHOW' => 'ALWAYS',
				),
			),
			'HEADER_MOBILE' => array(
				'VALUE' => '1',
				'ADDITIONAL_OPTIONS' => array(
					'HEADER_MOBILE_COLOR' => 'WHITE',
				),
				'TOGGLE_OPTIONS' => array(
					'HEADER_MOBILE_TOGGLE_BURGER' => array(
						'VALUE' => 'Y',
						'ADDITIONAL_OPTIONS' => array(
							'HEADER_MOBILE_TOGGLE_BURGER_POSITION' => 'N',
						),
					),
					'HEADER_MOBILE_TOGGLE_PHONE' => array(
						'VALUE' => 'Y',
						'ADDITIONAL_OPTIONS' => array(
							'HEADER_MOBILE_TOGGLE_CALLBACK' => 'Y',
						),
					),
					'HEADER_MOBILE_TOGGLE_SEARCH' => 'Y',
				),
			),
			'HEADER_MOBILE_MENU' => array(
				'VALUE' => '1',
				'TOGGLE_OPTIONS' => array(
					'MOBILE_MENU_TOGGLE_THEME_SELECTOR' => 'N',
					'MOBILE_MENU_TOGGLE_PHONE' => array(
						'VALUE' => 'Y',
						'ADDITIONAL_OPTIONS' => array(
							'MOBILE_MENU_TOGGLE_CALLBACK' => 'Y',
						),
					),
					'MOBILE_MENU_TOGGLE_EMAIL' => 'Y',
					'MOBILE_MENU_TOGGLE_ADDRESS' => 'Y',
					'MOBILE_MENU_TOGGLE_SCHEDULE' => 'Y',
					'MOBILE_MENU_TOGGLE_SOCIAL' => 'Y',
					'MOBILE_MENU_TOGGLE_LANG' => array(
						'VALUE' => 'Y',
						'ADDITIONAL_OPTIONS' => array(
							'MOBILE_MENU_TOGGLE_LANG_UP' => 'N',
						),
					),
					'MOBILE_MENU_TOGGLE_BUTTON' => 'Y',
					'MOBILE_MENU_TOGGLE_REGION' => array(
						'ADDITIONAL_OPTIONS' => array(
							'MOBILE_MENU_TOGGLE_REGION_UP' => 'N',
						),
					),
					'MOBILE_MENU_TOGGLE_PERSONAL' => array(
						'ADDITIONAL_OPTIONS' => array(
							'MOBILE_MENU_TOGGLE_PERSONAL_UP' => 'N',
						),
					),
					'MOBILE_MENU_TOGGLE_COMPARE' => array(
						'ADDITIONAL_OPTIONS' => array(
							'MOBILE_MENU_TOGGLE_COMPARE_UP' => 'N',
						),
					),
					'MOBILE_MENU_TOGGLE_CART' => array(
						'ADDITIONAL_OPTIONS' => array(
							'MOBILE_MENU_TOGGLE_CART_UP' => 'N',
						),
					),
					'MOBILE_MENU_TOGGLE_WIDGET' => 'Y',
				),
			),
			'HEADER_MOBILE_MENU_OPEN' => '1',
			'COMPACT_FOOTER_MOBILE' => 'Y',
			'MOBILE_LIST_SECTIONS_COMPACT_IN_SECTIONS' => 'N',
			'MOBILE_LIST_ELEMENTS_COMPACT_IN_SECTIONS' => 'N',
			'CABINET' => array(
				'VALUE' => 'Y',
				'DEPENDENT_PARAMS' => array(
					'PERSONAL_ONEFIO' => 'Y',
					'LOGIN_EQUAL_EMAIL' => 'Y',
				),
			),
			'CLICK_TO_SHOW_4DEPTH' => 'Y',
			'VIEW_LINKED_GOODS' => 'catalog_slider',
			'CATALOG_PAGE_DETAIL_SKU' => 'TYPE_1',
			'DETAIL_LINKED_TARIFFS' => array(
				'VALUE' => 'type_3',
				'ADDITIONAL_OPTIONS' => array(
					'LINKED_OFFSET_TARIFFS' => 'N',
					'LINKED_IMAGES_TARIFFS' => 'ROUND_PICTURES',
				),
			),
			'LEFT_BLOCK_TARIFFS_ROOT' => 'Y',
			'SECTIONS_TYPE_VIEW_TARIFFS' => array(
				'VALUE' => 'sections_1',
				'ADDITIONAL_OPTIONS' => array(
					'SECTIONS_ITEMS_OFFSET_TARIFFS' => 'Y',
					'SECTIONS_ELEMENTS_COUNT_TARIFFS' => '2',
					'SECTIONS_IMAGES_TARIFFS' => 'ROUND_PICTURES',
					'SECTIONS_IMAGE_POSITION_TARIFFS' => 'LEFT',
				),
			),
			'LEFT_BLOCK_TARIFFS_SECTIONS' => 'N',
			'SECTION_TYPE_VIEW_TARIFFS' => array(
				'VALUE' => 'section_1',
				'ADDITIONAL_OPTIONS' => array(
					'SECTION_ITEMS_OFFSET_TARIFFS' => 'Y',
					'SECTION_ELEMENTS_COUNT_TARIFFS' => '2',
					'SECTION_IMAGES_TARIFFS' => 'ROUND_PICTURES',
					'SECTION_IMAGE_POSITION_TARIFFS' => 'LEFT',
				),
			),
			'ELEMENTS_PAGE_TARIFFS' => array(
				'VALUE' => 'list_elements_3',
				'ADDITIONAL_OPTIONS' => array(
					'ELEMENTS_OFFSET_TARIFFS' => 'N',
					'ELEMENTS_IMAGES_TARIFFS' => 'ROUND_PICTURES',
				),
			),
			'LEFT_BLOCK_TARIFFS_DETAIL' => 'N',
			'USE_DETAIL_TABS_TARIFFS' => 'Y',
			'BRANDS_DETAIL_PAGE' => 'element_1',
			'BOTTOM_ICONS_PANEL' => 'Y',
			'THEME_VIEW_COLOR' => 'DARK',
			'SELF_HOSTED_FONTS' => 'Y',
			'LEFT_BLOCK_BLOG_DETAIL' => 'Y',
			'LEFT_BLOCK_SALE_DETAIL' => 'N',
			'LEFT_BLOCK_NEWS_DETAIL' => 'Y',
			'MORE_COLOR' => 'CUSTOM',
			'MORE_COLOR_CUSTOM' => 'c30101',
			'SHOW_DROPDOWN_CALLBACK' => 'HEADER,FOOTER,MEGA_MENU',
			'SHOW_DROPDOWN_EMAIL' => 'HEADER,FOOTER,MEGA_MENU',
			'SHOW_DROPDOWN_ADDRESS' => 'HEADER,FOOTER,MEGA_MENU',
			'SHOW_DROPDOWN_SCHEDULE' => 'HEADER,FOOTER,MEGA_MENU',
			'SHOW_DROPDOWN_SOCIAL' => 'HEADER,FOOTER,MEGA_MENU',
			'CATALOG_COMPARE' => 'N',
			'ELEMENTS_IMG_TYPE' => 'normal',
			'CHANGE_TITLE_ITEM_LIST' => 'N',
			'CHANGE_TITLE_ITEM_DETAIL' => 'N',
			'BIGBANNER_MOBILE' => '3',
			'WIDGET_SIDE_BUTTON' => array(
				'VALUE' => 'Y',
				'DEPENDENT_PARAMS' => array(
					'WIDGET_TYPE' => 'type_1',
					'WIDGET_OPEN' => 'SLIDE',
					'WIDGET_WIDTH' => 'wide',
				),
			),
		),
	),
	855 => array(
		'ID' => 855,
		'TITLE' => GetMessage('PRESET_855_TITLE'),
		'DESCRIPTION' => GetMessage('PRESET_855_DESCRIPTION'),
		'PREVIEW_PICTURE' => '/bitrix/images/aspro.allcorp3motor/themes/preset_855_preview.jpg',
		'DETAIL_PICTURE' => '/bitrix/images/aspro.allcorp3motor/themes/preset_855_detail.jpg',
		'BANNER_INDEX' => '2',
		'OPTIONS' => array(
			'BASE_COLOR' => 'CUSTOM',
			'BASE_COLOR_CUSTOM' => '166cb3',
			'USE_MORE_COLOR' => 'N',
			'THEME_VIEW_COLOR' => 'LIGHT',
			'PAGE_WIDTH' => '1',
			'FONT_STYLE' => '10',
			'TITLE_FONT' => 'N',
			'SELF_HOSTED_FONTS' => 'Y',
			'MAX_DEPTH_MENU' => '4',
			'LEFT_BLOCK' => 'normal',
			'SIDE_MENU' => 'RIGHT',
			'SHOW_DROPDOWN_CALLBACK' => 'HEADER,FOOTER,MEGA_MENU',
			'SHOW_DROPDOWN_EMAIL' => 'HEADER,FOOTER,MEGA_MENU',
			'SHOW_DROPDOWN_ADDRESS' => 'HEADER,FOOTER,MEGA_MENU',
			'SHOW_DROPDOWN_SCHEDULE' => 'HEADER,FOOTER,MEGA_MENU',
			'SHOW_DROPDOWN_SOCIAL' => 'HEADER,FOOTER,MEGA_MENU',
			'TYPE_SEARCH' => 'fixed',
			'ROUND_ELEMENTS' => 'Y',
			'FONT_BUTTONS' => 'LOWER',
			'PAGE_TITLE' => '1',
			'PAGE_TITLE_POSITION' => 'LEFT',
			'H1_STYLE' => '2',
			'STICKY_SIDEBAR' => 'Y',
			'SHOW_LICENCE' => array(
				'VALUE' => 'Y',
				'DEPENDENT_PARAMS' => array(
				),
			),
			'INDEX_TYPE' => array(
				'VALUE' => 'index1',
				'SUB_PARAMS' => array(
					'BIG_BANNER_INDEX' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'N',
								'FON' => 'N',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_1',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE_TEXT' => 'Y',
							'HEIGHT_BANNER' => 'NORMAL',
						),
					),
					'TIZERS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '40',
								'BOTTOM_OFFSET' => '80',
								'IMAGES' => 'ICONS',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_1',
						'ADDITIONAL_OPTIONS' => array(
							'ELEMENTS_COUNT' => '4',
							'LINES_COUNT' => '1',
							'IMAGES_POSITION' => 'LEFT',
						),
					),
					'CATALOG_SECTIONS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'N',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => 'N',
								'SHOW_TITLE' => 'Y',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'N',
						'TEMPLATE' => 'type_1',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'ITEMS_OFFSET' => 'Y',
							'ELEMENTS_COUNT' => '3',
							'LINES_COUNT' => '2',
							'TEXT_POSITION' => 'BG',
							'SHOW_BLOCKS' => 'DESCRIPTION',
						),
					),
					'CATALOG_TAB' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
								'SHOW_TITLE' => 'Y',
							),
						),
						'VALUE' => 'N',
						'TEMPLATE' => 'type_1',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'TEXT_CENTER' => 'N',
							'ITEMS_OFFSET' => 'Y',
							'IMG_CORNER' => 'N',
							'ELEMENTS_COUNT' => '4',
							'LINES_COUNT' => '1',
						),
					),
					'YOUTUBE' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'N',
								'FON' => 'Y',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
								'SHOW_TITLE' => 'Y',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'N',
						'TEMPLATE' => 'type_1',
						'ADDITIONAL_OPTIONS' => array(
							'ITEMS_OFFSET' => 'N',
							'WIDE' => 'N',
							'ELEMENTS_COUNT' => '3',
						),
					),
					'TARIFFS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'Y',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '40',
								'BOTTOM_OFFSET' => '80',
								'SHOW_TITLE' => 'N',
								'TITLE_POSITION' => 'NORMAL',
								'TABS' => 'INSIDE',
							),
						),
						'VALUE' => 'N',
						'TEMPLATE' => 'type_3',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'ITEMS_OFFSET' => 'N',
							'IMAGES' => 'ROUND_PICTURES',
						),
					),
					'MIDDLE_ADV' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
							),
						),
						'VALUE' => 'N',
						'TEMPLATE' => 'type_2',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'ITEMS_OFFSET' => 'Y',
							'TEXT_CENTER' => 'Y',
							'SHORT_BLOCK' => 'Y',
						),
					),
					'SALE' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'Y',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
								'SHOW_TITLE' => 'Y',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_2',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'ITEMS_OFFSET' => 'Y',
							'ELEMENTS_COUNT' => '4',
							'LINES_COUNT' => 'SHOW_MORE',
						),
					),
					'NEWS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
								'SHOW_TITLE' => 'Y',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_3',
						'ADDITIONAL_OPTIONS' => array(
							'ITEMS_OFFSET' => 'Y',
							'ELEMENTS_COUNT' => '3',
							'LINES_COUNT' => 'SHOW_MORE',
						),
					),
					'BOTTOM_BANNERS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'N',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => 'N',
								'BOTTOM_OFFSET' => 'N',
							),
						),
						'VALUE' => 'N',
						'TEMPLATE' => 'type_2',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'Y',
							'ITEMS_OFFSET' => 'Y',
							'LINES_COUNT' => '1',
						),
					),
					'SERVICES' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'N',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '40',
								'SHOW_TITLE' => 'Y',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_2',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'ITEMS_OFFSET' => 'Y',
							'ELEMENTS_COUNT' => '4',
							'LINES_COUNT' => '1',
							'ITEMS_TYPE' => 'ELEMENTS',
						),
					),
					'STAFF' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '0',
								'BOTTOM_OFFSET' => '80',
								'SHOW_TITLE' => 'Y',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_2',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'ITEMS_OFFSET' => 'N',
							'SHOW_NEXT' => 'N',
						),
					),
					'REVIEWS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
								'SHOW_TITLE' => 'N',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_1',
					),
					'FLOAT_BANNERS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_3',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'ITEMS_OFFSET' => 'Y',
							'LINES_COUNT' => '1',
						),
					),
					'BLOG' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'N',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
								'SHOW_TITLE' => 'Y',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_2',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'ITEMS_OFFSET' => 'Y',
							'LINES_COUNT' => '1',
						),
					),
					'PROJECTS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'Y',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
								'SHOW_TITLE' => 'Y',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_1',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'ITEMS_OFFSET' => 'Y',
							'ELEMENTS_COUNT' => '2',
							'LINES_COUNT' => '2',
						),
					),
					'GALLERY' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'Y',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
								'SHOW_TITLE' => 'Y',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_3',
					),
					'MAPS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'N',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '0',
								'BOTTOM_OFFSET' => '80',
								'SHOW_TITLE' => 'N',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_2',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'OFFSET' => 'N',
						),
					),
					'FAQS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'Y',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_1',
					),
					'COMPANY_TEXT' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'N',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '0',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_2',
						'ADDITIONAL_OPTIONS' => array(
							'IMAGE_WIDE' => 'N',
							'POSITION_IMAGE_BLOCK' => 'RIGHT',
						),
					),
					'BRANDS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'Y',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
								'SHOW_TITLE' => 'Y',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'N',
						'TEMPLATE' => 'type_1',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'ITEMS_OFFSET' => 'N',
							'ITEMS_BORDER' => 'Y',
							'LINES_COUNT' => '1',
						),
					),
					'FORMS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_2',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'POSITION_IMAGE' => 'RIGHT',
						),
					),
					'INSTAGRAMM' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
								'SHOW_TITLE' => 'Y',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'N',
						'TEMPLATE' => 'type_1',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'ITEMS_OFFSET' => 'Y',
							'ELEMENTS_COUNT' => '4',
							'LINES_COUNT' => '1',
						),
					),
					'VK' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'N',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => 'N',
								'BOTTOM_OFFSET' => 'N',
								'SHOW_TITLE' => 'N',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'N',
						'TEMPLATE' => 'type_1',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'ELEMENTS_COUNT' => '4',
						),
					),
					'CUSTOM_TEXT' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'N',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
							),
						),
						'VALUE' => 'N',
						'TEMPLATE' => '',
					),
				),
				'ORDER' => 'BIG_BANNER_INDEX,SERVICES,TIZERS,SALE,FORMS,PROJECTS,COMPANY_TEXT,MAPS,STAFF,GALLERY,REVIEWS,FLOAT_BANNERS,NEWS,FAQS,BLOG,YOUTUBE,MIDDLE_ADV,BOTTOM_BANNERS,CATALOG_SECTIONS,CATALOG_TAB,TARIFFS,BRANDS,INSTAGRAMM,CUSTOM_TEXT,VK',
			),
			'TOP_MENU_FIXED' => array(
				'VALUE' => 'Y',
				'DEPENDENT_PARAMS' => array(
					'HEADER_FIXED' => array(
						'VALUE' => '1',
						'TOGGLE_OPTIONS' => array(
							'HEADER_FIXED_TOGGLE_MEGA_MENU' => array(
								'VALUE' => 'Y',
								'ADDITIONAL_OPTIONS' => array(
									'HEADER_FIXED_TOGGLE_MEGA_MENU_POSITION' => 'N',
								),
							),
							'HEADER_FIXED_TOGGLE_PHONE' => 'Y',
							'HEADER_FIXED_TOGGLE_SEARCH' => 'Y',
							'HEADER_FIXED_TOGGLE_LANG' => 'Y',
							'HEADER_FIXED_TOGGLE_BUTTON' => 'Y',
							'HEADER_FIXED_TOGGLE_EYED' => 'N',
						),
					),
				),
			),
			'HEADER_TYPE' => array(
				'VALUE' => '2',
				'ADDITIONAL_OPTIONS' => array(
					'HEADER_NARROW' => 'N',
					'HEADER_MARGIN' => 'N',
					'HEADER_FON' => 'N',
				),
				'TOGGLE_OPTIONS' => array(
					'HEADER_TOGGLE_MEGA_MENU' => array(
						'VALUE' => 'Y',
						'ADDITIONAL_OPTIONS' => array(
							'HEADER_TOGGLE_MEGA_MENU_POSITION' => 'N',
						),
					),
					'HEADER_TOGGLE_SLOGAN' => 'Y',
					'HEADER_TOGGLE_PHONE' => array(
						'VALUE' => 'Y',
						'ADDITIONAL_OPTIONS' => array(
							'HEADER_TOGGLE_CALLBACK' => 'Y',
						),
					),
					'HEADER_TOGGLE_SEARCH' => 'Y',
					'HEADER_TOGGLE_SOCIAL' => 'Y',
					'HEADER_TOGGLE_LANG' => 'N',
					'HEADER_TOGGLE_THEME_SELECTOR' => 'N',
					'HEADER_TOGGLE_BUTTON' => 'Y',
					'HEADER_TOGGLE_EYED' => 'N',
				),
			),
			'MEGA_MENU_TYPE' => array(
				'VALUE' => '1',
				'DEPENDENT_PARAMS' => array(
					'REPLACE_TYPE' => 'REPLACE',
				),
			),
			'SHOW_RIGHT_SIDE' => 'Y',
			'MENU_LOWERCASE' => 'N',
			'TOP_MENU_COLOR' => 'LIGHT BG_NONE',
			'MENU_COLOR' => 'LIGHT',
			'IMAGES_WIDE_MENU' => 'PICTURES',
			'IMAGES_WIDE_MENU_POSITION' => 'LEFT',
			'WIDE_MENU_CONTENT' => array(
				'VALUE' => 'CHILDS',
				'DEPENDENT_PARAMS' => array(
					'CHILDS_VIEW' => 'ROWS',
				),
			),
			'CLICK_TO_SHOW_4DEPTH' => 'Y',
			'USE_REGIONALITY' => array(
				'VALUE' => 'Y',
				'DEPENDENT_PARAMS' => array(
					'REGIONALITY_TYPE' => 'ONE_DOMAIN',
					'REGIONALITY_VIEW' => 'POPUP_REGIONS',
					'REGIONALITY_CONFIRM' => 'TOP',
				),
			),
			'ORDER_VIEW' => 'N',
			'CATALOG_COMPARE' => 'N',
			'SHOW_ONE_CLICK_BUY' => 'Y',
			'USE_FAST_VIEW_PAGE_DETAIL' => 'fast_view_1',
			'SHOW_CATALOG_GALLERY_IN_LIST' => array(
				'VALUE' => 'Y',
				'DEPENDENT_PARAMS' => array(
					'MAX_GALLERY_ITEMS' => '5',
				),
			),
			'VIEW_LINKED_GOODS' => 'catalog_slider',
			'ELEMENTS_IMG_TYPE' => 'normal',
			'LEFT_BLOCK_CATALOG_ROOT' => 'Y',
			'SECTIONS_TYPE_VIEW_CATALOG' => array(
				'VALUE' => 'sections_2',
				'ADDITIONAL_OPTIONS' => array(
					'SECTIONS_ITEMS_OFFSET_CATALOG' => 'Y',
					'SECTIONS_ELEMENTS_COUNT_CATALOG' => '3',
					'SECTIONS_IMAGES_CATALOG' => 'TRANSPARENT_PICTURES',
					'SECTIONS_IMAGE_POSITION_CATALOG' => 'RIGHT',
				),
			),
			'LEFT_BLOCK_CATALOG_SECTIONS' => 'Y',
			'SECTION_TYPE_VIEW_CATALOG' => array(
				'VALUE' => 'section_1',
				'ADDITIONAL_OPTIONS' => array(
					'SECTION_ITEMS_OFFSET_CATALOG' => 'Y',
					'SECTION_IMAGES_CATALOG' => 'ROUND_PICTURES',
				),
			),
			'ELEMENTS_TABLE_TYPE_VIEW' => array(
				'VALUE' => 'catalog_table',
				'ADDITIONAL_OPTIONS' => array(
					'SECTION_ITEM_LIST_OFFSET_CATALOG' => 'Y',
					'SECTION_ITEM_LIST_IMG_CORNER' => 'N',
					'SECTION_ITEM_LIST_TEXT_CENTER' => 'N',
				),
			),
			'SHOW_PROPS_BLOCK' => 'N',
			'SHOW_TABLE_PROPS' => 'NOT',
			'SHOW_SMARTFILTER' => array(
				'VALUE' => 'Y',
				'DEPENDENT_PARAMS' => array(
					'FILTER_VIEW' => 'COMPACT',
				),
			),
			'LEFT_BLOCK_CATALOG_DETAIL' => 'N',
			'CATALOG_PAGE_DETAIL' => 'element_1',
			'CATALOG_PAGE_DETAIL_GALLERY_SIZE' => '454px',
			'CATALOG_PAGE_DETAIL_THUMBS' => 'horizontal',
			'USE_DETAIL_TABS' => 'Y',
			'CATALOG_PAGE_DETAIL_SKU' => 'TYPE_1',
			'CHANGE_TITLE_ITEM_LIST' => 'N',
			'CHANGE_TITLE_ITEM_DETAIL' => 'N',
			'LEFT_BLOCK_SERVICES_ROOT' => 'Y',
			'SECTIONS_TYPE_VIEW_SERVICES' => array(
				'VALUE' => 'sections_2',
				'ADDITIONAL_OPTIONS' => array(
					'SECTIONS_ITEMS_OFFSET_SERVICES' => 'Y',
					'SECTIONS_ELEMENTS_COUNT_SERVICES' => '3',
					'SECTIONS_IMAGES_SERVICES' => 'TRANSPARENT_PICTURES',
				),
			),
			'LEFT_BLOCK_SERVICES_SECTIONS' => 'Y',
			'SECTION_TYPE_VIEW_SERVICES' => array(
				'VALUE' => 'section_2',
				'ADDITIONAL_OPTIONS' => array(
					'SECTION_ITEMS_OFFSET_SERVICES' => 'Y',
					'SECTION_ELEMENTS_COUNT_SERVICES' => '2',
					'SECTION_IMAGES_SERVICES' => 'TRANSPARENT_PICTURES',
				),
			),
			'ELEMENTS_PAGE_SERVICES' => array(
				'VALUE' => 'list_elements_2',
				'ADDITIONAL_OPTIONS' => array(
					'ELEMENTS_OFFSET_SERVICES' => 'Y',
					'ELEMENTS_COUNT_SERVICES' => '2',
					'ELEMENTS_IMAGES_SERVICES' => 'TRANSPARENT_PICTURES',
				),
			),
			'LEFT_BLOCK_SERVICES_DETAIL' => 'N',
			'USE_DETAIL_TABS_SERVICES' => 'Y',
			'DETAIL_LINKED_PROJECTS' => 'list',
			'PROJECT_PAGE_LEFT_BLOCK' => 'N',
			'SHOW_PROJECTS_MAP' => 'Y',
			'PROJECTS_SHOW_HEAD_BLOCK' => array(
				'VALUE' => 'Y',
				'DEPENDENT_PARAMS' => array(
					'SHOW_HEAD_BLOCK_TYPE' => 'sections_mix',
				),
			),
			'PROJECTS_PAGE' => array(
				'VALUE' => 'list_elements_1',
				'ADDITIONAL_OPTIONS' => array(
					'ELEMENTS_OFFSET_PROJECT' => 'Y',
					'ELEMENTS_COUNT_PROJECT' => '4',
				),
			),
			'PROJECT_DETAIL_LEFT_BLOCK' => 'N',
			'SHOW_PROJECTS_MAP_DETAIL' => 'Y',
			'USE_DETAIL_TABS_PROJECTS' => 'Y',
			'DETAIL_LINKED_TARIFFS' => array(
				'VALUE' => 'type_3',
				'ADDITIONAL_OPTIONS' => array(
					'LINKED_OFFSET_TARIFFS' => 'N',
					'LINKED_IMAGES_TARIFFS' => 'ROUND_PICTURES',
				),
			),
			'LEFT_BLOCK_TARIFFS_ROOT' => 'Y',
			'SECTIONS_TYPE_VIEW_TARIFFS' => array(
				'VALUE' => 'sections_1',
				'ADDITIONAL_OPTIONS' => array(
					'SECTIONS_ITEMS_OFFSET_TARIFFS' => 'Y',
					'SECTIONS_ELEMENTS_COUNT_TARIFFS' => '2',
					'SECTIONS_IMAGES_TARIFFS' => 'ROUND_PICTURES',
					'SECTIONS_IMAGE_POSITION_TARIFFS' => 'LEFT',
				),
			),
			'LEFT_BLOCK_TARIFFS_SECTIONS' => 'N',
			'SECTION_TYPE_VIEW_TARIFFS' => array(
				'VALUE' => 'section_1',
				'ADDITIONAL_OPTIONS' => array(
					'SECTION_ITEMS_OFFSET_TARIFFS' => 'Y',
					'SECTION_ELEMENTS_COUNT_TARIFFS' => '2',
					'SECTION_IMAGES_TARIFFS' => 'ROUND_PICTURES',
					'SECTION_IMAGE_POSITION_TARIFFS' => 'LEFT',
				),
			),
			'ELEMENTS_PAGE_TARIFFS' => array(
				'VALUE' => 'list_elements_3',
				'ADDITIONAL_OPTIONS' => array(
					'ELEMENTS_OFFSET_TARIFFS' => 'N',
					'ELEMENTS_IMAGES_TARIFFS' => 'ROUND_PICTURES',
				),
			),
			'LEFT_BLOCK_TARIFFS_DETAIL' => 'N',
			'USE_DETAIL_TABS_TARIFFS' => 'Y',
			'GALLERY_LIST_PAGE' => array(
				'VALUE' => 'list_elements_1',
				'ADDITIONAL_OPTIONS' => array(
					'ELEMENTS_OFFSET_GALLERY' => 'Y',
					'ELEMENTS_COUNT_GALLERY' => '3',
					'ITEMS_TYPE_GALLERY' => 'ALBUM',
				),
			),
			'GALLERY_DETAIL_PAGE' => 'element_2',
			'PAGE_CONTACTS' => '2',
			'CONTACTS_USE_FEEDBACK' => 'Y',
			'CONTACTS_USE_MAP' => 'Y',
			'CONTACTS_USE_TABS' => 'N',
			'BLOG_PAGE_LEFT_BLOCK' => 'Y',
			'LEFT_BLOCK_BLOG_DETAIL' => 'Y',
			'BLOG_PAGE' => array(
				'VALUE' => 'list_elements_3',
				'ADDITIONAL_OPTIONS' => array(
					'ELEMENTS_OFFSET_BLOG' => 'Y',
					'ELEMENTS_IMAGE_POSITION_BLOG' => 'LEFT',
				),
			),
			'LANDINGS_PAGE' => array(
				'VALUE' => 'list_elements_1',
				'ADDITIONAL_OPTIONS' => array(
					'ELEMENTS_OFFSET_LANDING' => 'Y',
					'ELEMENTS_IMAGE_POSITION_LANDING' => 'LEFT',
				),
			),
			'SALE_PAGE_LEFT_BLOCK' => 'N',
			'LEFT_BLOCK_SALE_DETAIL' => 'N',
			'SALE_PAGE' => array(
				'VALUE' => 'list_elements_2',
				'ADDITIONAL_OPTIONS' => array(
					'ELEMENTS_OFFSET_SALE' => 'Y',
					'ELEMENTS_COUNT_SALE' => '4',
				),
			),
			'NEWS_PAGE_LEFT_BLOCK' => 'N',
			'LEFT_BLOCK_NEWS_DETAIL' => 'Y',
			'NEWS_PAGE' => array(
				'VALUE' => 'list_elements_2',
				'ADDITIONAL_OPTIONS' => array(
					'ELEMENTS_OFFSET_NEWS' => 'Y',
				),
			),
			'STAFF_PAGE' => 'list_elements_1',
			'DETAIL_LINKED_STAFF' => 'list',
			'PARTNERS_PAGE' => array(
				'VALUE' => 'list_elements_3',
				'ADDITIONAL_OPTIONS' => array(
					'ELEMENTS_OFFSET_PARTNER' => 'Y',
				),
			),
			'BRANDS_PAGE' => array(
				'VALUE' => 'list_elements_1',
				'ADDITIONAL_OPTIONS' => array(
					'ELEMENTS_OFFSET_BRAND' => 'Y',
				),
			),
			'BRANDS_DETAIL_PAGE' => 'element_1',
			'VACANCY_PAGE' => 'list_elements_1',
			'LICENSES_PAGE' => 'list_elements_2',
			'DOCS_PAGE' => 'list_elements_2',
			'FOOTER_TYPE' => array(
				'VALUE' => '2',
				'ADDITIONAL_OPTIONS' => array(
					'FOOTER_COLOR' => 'LIGHT',
				),
				'TOGGLE_OPTIONS' => array(
					'FOOTER_TOGGLE_SUBSCRIBE' => 'Y',
					'FOOTER_TOGGLE_PHONE' => array(
						'VALUE' => 'Y',
						'ADDITIONAL_OPTIONS' => array(
							'FOOTER_TOGGLE_CALLBACK' => 'Y',
						),
					),
					'FOOTER_TOGGLE_EMAIL' => 'Y',
					'FOOTER_TOGGLE_ADDRESS' => 'Y',
					'FOOTER_TOGGLE_SOCIAL' => 'Y',
					'FOOTER_TOGGLE_LANG' => 'N',
					'FOOTER_TOGGLE_PAY_SYSTEMS' => 'Y',
					'FOOTER_TOGGLE_DEVELOPER' => array(
						'VALUE' => 'Y',
						'ADDITIONAL_OPTIONS' => array(
							'FOOTER_TOGGLE_DEVELOPER_PARTNER' => 'N',
						),
					),
					'FOOTER_TOGGLE_EYED' => 'N',
					'FOOTER_TOGGLE_SITEMAP' => 'N',
				),
			),
			'CALLBACK_SIDE_BUTTON' => 'Y',
			'QUESTION_SIDE_BUTTON' => 'Y',
			'REVIEWS_SIDE_BUTTON' => 'Y',
			'ADV_TOP_HEADER' => 'N',
			'ADV_TOP_UNDERHEADER' => 'N',
			'ADV_SIDE' => 'Y',
			'ADV_CONTENT_TOP' => 'N',
			'ADV_CONTENT_BOTTOM' => 'N',
			'ADV_FOOTER' => 'N',
			'HEADER_MOBILE_FIXED' => array(
				'VALUE' => 'Y',
				'DEPENDENT_PARAMS' => array(
					'HEADER_MOBILE_SHOW' => 'ALWAYS',
				),
			),
			'HEADER_MOBILE' => array(
				'VALUE' => '1',
				'ADDITIONAL_OPTIONS' => array(
					'HEADER_MOBILE_COLOR' => 'WHITE',
				),
				'TOGGLE_OPTIONS' => array(
					'HEADER_MOBILE_TOGGLE_BURGER' => array(
						'VALUE' => 'Y',
						'ADDITIONAL_OPTIONS' => array(
							'HEADER_MOBILE_TOGGLE_BURGER_POSITION' => 'N',
						),
					),
					'HEADER_MOBILE_TOGGLE_PHONE' => array(
						'VALUE' => 'Y',
						'ADDITIONAL_OPTIONS' => array(
							'HEADER_MOBILE_TOGGLE_CALLBACK' => 'Y',
						),
					),
					'HEADER_MOBILE_TOGGLE_SEARCH' => 'Y',
				),
			),
			'HEADER_MOBILE_MENU' => array(
				'VALUE' => '1',
				'TOGGLE_OPTIONS' => array(
					'MOBILE_MENU_TOGGLE_THEME_SELECTOR' => 'N',
					'MOBILE_MENU_TOGGLE_PHONE' => array(
						'VALUE' => 'Y',
						'ADDITIONAL_OPTIONS' => array(
							'MOBILE_MENU_TOGGLE_CALLBACK' => 'Y',
						),
					),
					'MOBILE_MENU_TOGGLE_EMAIL' => 'Y',
					'MOBILE_MENU_TOGGLE_ADDRESS' => 'Y',
					'MOBILE_MENU_TOGGLE_SCHEDULE' => 'Y',
					'MOBILE_MENU_TOGGLE_SOCIAL' => 'Y',
					'MOBILE_MENU_TOGGLE_LANG' => array(
						'VALUE' => 'Y',
						'ADDITIONAL_OPTIONS' => array(
							'MOBILE_MENU_TOGGLE_LANG_UP' => 'N',
						),
					),
					'MOBILE_MENU_TOGGLE_BUTTON' => 'Y',
					'MOBILE_MENU_TOGGLE_REGION' => array(
						'ADDITIONAL_OPTIONS' => array(
							'MOBILE_MENU_TOGGLE_REGION_UP' => 'N',
						),
					),
					'MOBILE_MENU_TOGGLE_PERSONAL' => array(
						'ADDITIONAL_OPTIONS' => array(
							'MOBILE_MENU_TOGGLE_PERSONAL_UP' => 'N',
						),
					),
					'MOBILE_MENU_TOGGLE_COMPARE' => array(
						'ADDITIONAL_OPTIONS' => array(
							'MOBILE_MENU_TOGGLE_COMPARE_UP' => 'N',
						),
					),
					'MOBILE_MENU_TOGGLE_CART' => array(
						'ADDITIONAL_OPTIONS' => array(
							'MOBILE_MENU_TOGGLE_CART_UP' => 'N',
						),
					),
					'MOBILE_MENU_TOGGLE_WIDGET' => 'Y',
				),
			),
			'HEADER_MOBILE_MENU_OPEN' => '1',
			'BIGBANNER_MOBILE' => '1',
			'COMPACT_FOOTER_MOBILE' => 'Y',
			'MOBILE_LIST_SECTIONS_COMPACT_IN_SECTIONS' => 'N',
			'MOBILE_LIST_ELEMENTS_COMPACT_IN_SECTIONS' => 'N',
			'BOTTOM_ICONS_PANEL' => 'Y',
			'CABINET' => array(
				'VALUE' => 'Y',
				'DEPENDENT_PARAMS' => array(
					'PERSONAL_ONEFIO' => 'Y',
					'LOGIN_EQUAL_EMAIL' => 'Y',
				),
			),
			'WIDGET_SIDE_BUTTON' => array(
				'VALUE' => 'Y',
				'DEPENDENT_PARAMS' => array(
					'WIDGET_TYPE' => 'type_1',
					'WIDGET_OPEN' => 'SLIDE',
					'WIDGET_WIDTH' => 'wide',
				),
			),
		),
	),
	265 => array(
		'ID' => 265,
		'TITLE' => GetMessage('PRESET_265_TITLE'),
		'DESCRIPTION' => GetMessage('PRESET_265_DESCRIPTION'),
		'PREVIEW_PICTURE' => '/bitrix/images/aspro.allcorp3motor/themes/preset_265_preview.jpg',
		'DETAIL_PICTURE' => '/bitrix/images/aspro.allcorp3motor/themes/preset_265_detail.jpg',
		'BANNER_INDEX' => '3',
		'OPTIONS' => array(
			'BASE_COLOR' => 'CUSTOM',
			'BASE_COLOR_CUSTOM' => '563cee',
			'USE_MORE_COLOR' => 'N',
			'THEME_VIEW_COLOR' => 'DARK',
			'PAGE_WIDTH' => '3',
			'FONT_STYLE' => '4',
			'TITLE_FONT' => 'N',
			'SELF_HOSTED_FONTS' => 'Y',
			'MAX_DEPTH_MENU' => '4',
			'LEFT_BLOCK' => 'normal',
			'SIDE_MENU' => 'RIGHT',
			'SHOW_DROPDOWN_CALLBACK' => 'HEADER,FOOTER,MEGA_MENU',
			'SHOW_DROPDOWN_EMAIL' => 'HEADER,FOOTER,MEGA_MENU',
			'SHOW_DROPDOWN_ADDRESS' => 'HEADER,FOOTER,MEGA_MENU',
			'SHOW_DROPDOWN_SCHEDULE' => 'HEADER,FOOTER,MEGA_MENU',
			'SHOW_DROPDOWN_SOCIAL' => 'HEADER,FOOTER,MEGA_MENU',
			'TYPE_SEARCH' => 'corp',
			'ROUND_ELEMENTS' => 'N',
			'FONT_BUTTONS' => 'LOWER',
			'PAGE_TITLE' => '1',
			'PAGE_TITLE_POSITION' => 'LEFT',
			'H1_STYLE' => '2',
			'STICKY_SIDEBAR' => 'Y',
			'SHOW_LICENCE' => array(
				'VALUE' => 'Y',
				'DEPENDENT_PARAMS' => array(
				),
			),
			'INDEX_TYPE' => array(
				'VALUE' => 'index1',
				'SUB_PARAMS' => array(
					'BIG_BANNER_INDEX' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'N',
								'FON' => 'N',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_1',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE_TEXT' => 'Y',
							'HEIGHT_BANNER' => 'HIGH',
						),
					),
					'TIZERS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '40',
								'BOTTOM_OFFSET' => '80',
								'IMAGES' => 'ICONS',
							),
						),
						'VALUE' => 'N',
						'TEMPLATE' => 'type_1',
						'ADDITIONAL_OPTIONS' => array(
							'ELEMENTS_COUNT' => '4',
							'LINES_COUNT' => '1',
							'IMAGES_POSITION' => 'LEFT',
						),
					),
					'CATALOG_SECTIONS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'N',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '0',
								'BOTTOM_OFFSET' => '130',
								'SHOW_TITLE' => 'Y',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_2',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'ITEMS_OFFSET' => 'Y',
							'ELEMENTS_COUNT' => '3',
							'LINES_COUNT' => 'ALL',
							'IMAGES' => 'ICONS',
							'IMAGE_POSITION' => 'LEFT',
							'SHOW_BLOCKS' => 'DESCRIPTION',
						),
					),
					'CATALOG_TAB' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'N',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '0',
								'BOTTOM_OFFSET' => '130',
								'SHOW_TITLE' => 'Y',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_1',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'TEXT_CENTER' => 'N',
							'ITEMS_OFFSET' => 'Y',
							'IMG_CORNER' => 'N',
							'ELEMENTS_COUNT' => '3',
							'LINES_COUNT' => '1',
						),
					),
					'YOUTUBE' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'N',
								'FON' => 'Y',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
								'SHOW_TITLE' => 'Y',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'N',
						'TEMPLATE' => 'type_1',
						'ADDITIONAL_OPTIONS' => array(
							'ITEMS_OFFSET' => 'N',
							'WIDE' => 'N',
							'ELEMENTS_COUNT' => '3',
						),
					),
					'TARIFFS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'Y',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '40',
								'BOTTOM_OFFSET' => '80',
								'SHOW_TITLE' => 'N',
								'TITLE_POSITION' => 'NORMAL',
								'TABS' => 'INSIDE',
							),
						),
						'VALUE' => 'N',
						'TEMPLATE' => 'type_3',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'ITEMS_OFFSET' => 'N',
							'IMAGES' => 'ROUND_PICTURES',
						),
					),
					'MIDDLE_ADV' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
							),
						),
						'VALUE' => 'N',
						'TEMPLATE' => 'type_2',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'ITEMS_OFFSET' => 'Y',
							'TEXT_CENTER' => 'Y',
							'SHORT_BLOCK' => 'Y',
						),
					),
					'SALE' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'N',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '0',
								'BOTTOM_OFFSET' => '130',
								'SHOW_TITLE' => 'Y',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_2',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'ITEMS_OFFSET' => 'Y',
							'ELEMENTS_COUNT' => '4',
							'LINES_COUNT' => 'SHOW_MORE',
						),
					),
					'NEWS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'N',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '0',
								'BOTTOM_OFFSET' => '130',
								'SHOW_TITLE' => 'Y',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_1',
						'ADDITIONAL_OPTIONS' => array(
							'ITEMS_OFFSET' => 'Y',
							'ELEMENTS_COUNT' => '4',
							'LINES_COUNT' => 'SHOW_MORE',
						),
					),
					'BOTTOM_BANNERS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'N',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => 'N',
								'BOTTOM_OFFSET' => 'N',
							),
						),
						'VALUE' => 'N',
						'TEMPLATE' => 'type_2',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'Y',
							'ITEMS_OFFSET' => 'Y',
							'LINES_COUNT' => '1',
						),
					),
					'SERVICES' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'N',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '0',
								'BOTTOM_OFFSET' => '130',
								'SHOW_TITLE' => 'Y',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_1',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'ITEMS_OFFSET' => 'Y',
							'ELEMENTS_COUNT' => '3',
							'LINES_COUNT' => '2',
							'IMAGES' => 'ICONS',
							'ITEMS_TYPE' => 'SECTIONS',
						),
					),
					'STAFF' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '0',
								'BOTTOM_OFFSET' => '80',
								'SHOW_TITLE' => 'Y',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'N',
						'TEMPLATE' => 'type_2',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'ITEMS_OFFSET' => 'N',
							'SHOW_NEXT' => 'N',
						),
					),
					'REVIEWS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'N',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '0',
								'BOTTOM_OFFSET' => '130',
								'SHOW_TITLE' => 'N',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_2',
						'ADDITIONAL_OPTIONS' => array(
							'SHOW_NEXT' => 'N',
						),
					),
					'FLOAT_BANNERS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
							),
						),
						'VALUE' => 'N',
						'TEMPLATE' => 'type_3',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'ITEMS_OFFSET' => 'Y',
							'LINES_COUNT' => '1',
						),
					),
					'BLOG' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'N',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
								'SHOW_TITLE' => 'Y',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'N',
						'TEMPLATE' => 'type_2',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'ITEMS_OFFSET' => 'Y',
							'LINES_COUNT' => '1',
						),
					),
					'PROJECTS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'Y',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
								'SHOW_TITLE' => 'Y',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'N',
						'TEMPLATE' => 'type_3',
						'ADDITIONAL_OPTIONS' => array(
							'ITEMS_OFFSET' => 'Y',
						),
					),
					'GALLERY' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'Y',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
								'SHOW_TITLE' => 'Y',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'N',
						'TEMPLATE' => 'type_3',
					),
					'MAPS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'N',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '0',
								'BOTTOM_OFFSET' => '130',
								'SHOW_TITLE' => 'N',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_2',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'OFFSET' => 'N',
						),
					),
					'FAQS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'Y',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
							),
						),
						'VALUE' => 'N',
						'TEMPLATE' => 'type_1',
					),
					'COMPANY_TEXT' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'N',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '0',
								'BOTTOM_OFFSET' => '130',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_1',
						'ADDITIONAL_OPTIONS' => array(
							'IMAGE_WIDE' => 'N',
							'IMAGE_OFFSET' => 'N',
							'IMAGES_TIZERS' => 'TEXT',
						),
					),
					'BRANDS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'N',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '130',
								'BOTTOM_OFFSET' => '130',
								'SHOW_TITLE' => 'Y',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_2',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
						),
					),
					'FORMS' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'N',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '0',
								'BOTTOM_OFFSET' => '130',
							),
						),
						'VALUE' => 'Y',
						'TEMPLATE' => 'type_3',
						'ADDITIONAL_OPTIONS' => array(
							'NO_IMAGE' => 'N',
						),
					),
					'INSTAGRAMM' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'Y',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
								'SHOW_TITLE' => 'Y',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'N',
						'TEMPLATE' => 'type_1',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'ITEMS_OFFSET' => 'Y',
							'ELEMENTS_COUNT' => '4',
							'LINES_COUNT' => '1',
						),
					),
					'VK' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'N',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => 'N',
								'BOTTOM_OFFSET' => 'N',
								'SHOW_TITLE' => 'N',
								'TITLE_POSITION' => 'NORMAL',
							),
						),
						'VALUE' => 'N',
						'TEMPLATE' => 'type_1',
						'ADDITIONAL_OPTIONS' => array(
							'WIDE' => 'N',
							'ELEMENTS_COUNT' => '4',
						),
					),
					'CUSTOM_TEXT' => array(
						'INDEX_BLOCK_OPTIONS' => array(
							'TOP' => array(
								'DELIMITER' => 'N',
								'FON' => 'N',
							),
							'BOTTOM' => array(
								'TOP_OFFSET' => '80',
								'BOTTOM_OFFSET' => '80',
							),
						),
						'VALUE' => 'N',
						'TEMPLATE' => '',
					),
				),
				'ORDER' => 'BIG_BANNER_INDEX,BRANDS,CATALOG_SECTIONS,CATALOG_TAB,SERVICES,SALE,COMPANY_TEXT,MAPS,REVIEWS,NEWS,FORMS,TIZERS,PROJECTS,STAFF,GALLERY,FLOAT_BANNERS,FAQS,BLOG,YOUTUBE,MIDDLE_ADV,BOTTOM_BANNERS,TARIFFS,INSTAGRAMM,CUSTOM_TEXT,VK',
			),
			'TOP_MENU_FIXED' => array(
				'VALUE' => 'Y',
				'DEPENDENT_PARAMS' => array(
					'HEADER_FIXED' => array(
						'VALUE' => '1',
						'TOGGLE_OPTIONS' => array(
							'HEADER_FIXED_TOGGLE_MEGA_MENU' => array(
								'VALUE' => 'Y',
								'ADDITIONAL_OPTIONS' => array(
									'HEADER_FIXED_TOGGLE_MEGA_MENU_POSITION' => 'N',
								),
							),
							'HEADER_FIXED_TOGGLE_PHONE' => 'Y',
							'HEADER_FIXED_TOGGLE_SEARCH' => 'Y',
							'HEADER_FIXED_TOGGLE_LANG' => 'Y',
							'HEADER_FIXED_TOGGLE_BUTTON' => 'Y',
							'HEADER_FIXED_TOGGLE_EYED' => 'N',
						),
					),
				),
			),
			'HEADER_TYPE' => array(
				'VALUE' => '5',
				'ADDITIONAL_OPTIONS' => array(
					'HEADER_LOGO_POSITION' => 'TOP',
					'HEADER_NARROW' => 'Y',
					'HEADER_MARGIN' => 'Y',
					'HEADER_FON' => 'N',
					'LOGO_CENTERED' => 'Y',
				),
				'TOGGLE_OPTIONS' => array(
					'HEADER_TOGGLE_MEGA_MENU' => 'N',
					'HEADER_TOGGLE_SLOGAN' => 'Y',
					'HEADER_TOGGLE_PHONE' => array(
						'VALUE' => 'Y',
						'ADDITIONAL_OPTIONS' => array(
							'HEADER_TOGGLE_CALLBACK' => 'Y',
						),
					),
					'HEADER_TOGGLE_SEARCH' => 'Y',
					'HEADER_TOGGLE_LANG' => 'N',
					'HEADER_TOGGLE_THEME_SELECTOR' => 'N',
					'HEADER_TOGGLE_BUTTON' => 'Y',
					'HEADER_TOGGLE_EYED' => 'N',
				),
			),
			'MEGA_MENU_TYPE' => array(
				'VALUE' => '1',
				'DEPENDENT_PARAMS' => array(
					'REPLACE_TYPE' => 'REPLACE',
				),
			),
			'SHOW_RIGHT_SIDE' => 'Y',
			'MENU_LOWERCASE' => 'N',
			'TOP_MENU_COLOR' => 'DARK',
			'MENU_COLOR' => 'COLORED',
			'IMAGES_WIDE_MENU' => 'ICONS',
			'IMAGES_WIDE_MENU_POSITION' => 'LEFT',
			'WIDE_MENU_CONTENT' => array(
				'VALUE' => 'CHILDS',
				'DEPENDENT_PARAMS' => array(
					'CHILDS_VIEW' => 'ROWS',
				),
			),
			'CLICK_TO_SHOW_4DEPTH' => 'Y',
			'USE_REGIONALITY' => array(
				'VALUE' => 'Y',
				'DEPENDENT_PARAMS' => array(
					'REGIONALITY_TYPE' => 'ONE_DOMAIN',
					'REGIONALITY_VIEW' => 'POPUP_REGIONS',
					'REGIONALITY_CONFIRM' => 'TOP',
				),
			),
			'ORDER_VIEW' => 'N',
			'CATALOG_COMPARE' => 'N',
			'SHOW_ONE_CLICK_BUY' => 'Y',
			'USE_FAST_VIEW_PAGE_DETAIL' => 'fast_view_1',
			'SHOW_CATALOG_GALLERY_IN_LIST' => array(
				'VALUE' => 'Y',
				'DEPENDENT_PARAMS' => array(
					'MAX_GALLERY_ITEMS' => '5',
				),
			),
			'VIEW_LINKED_GOODS' => 'catalog_slider',
			'ELEMENTS_IMG_TYPE' => 'normal',
			'LEFT_BLOCK_CATALOG_ROOT' => 'Y',
			'SECTIONS_TYPE_VIEW_CATALOG' => array(
				'VALUE' => 'sections_3',
				'ADDITIONAL_OPTIONS' => array(
					'SECTIONS_ITEMS_OFFSET_CATALOG' => 'Y',
					'SECTIONS_IMAGES_CATALOG' => 'ICONS',
					'SECTIONS_IMAGE_POSITION_CATALOG' => 'RIGHT',
				),
			),
			'LEFT_BLOCK_CATALOG_SECTIONS' => 'Y',
			'SECTION_TYPE_VIEW_CATALOG' => array(
				'VALUE' => 'section_4',
				'ADDITIONAL_OPTIONS' => array(
					'SECTION_ITEMS_OFFSET_CATALOG' => 'Y',
					'SECTION_IMAGES_CATALOG' => 'ROUND_PICTURES',
					'SECTION_IMAGE_POSITION_CATALOG' => 'RIGHT',
				),
			),
			'ELEMENTS_TABLE_TYPE_VIEW' => array(
				'VALUE' => 'catalog_table',
				'ADDITIONAL_OPTIONS' => array(
					'SECTION_ITEM_LIST_OFFSET_CATALOG' => 'Y',
					'SECTION_ITEM_LIST_IMG_CORNER' => 'N',
					'SECTION_ITEM_LIST_TEXT_CENTER' => 'N',
				),
			),
			'SHOW_PROPS_BLOCK' => 'N',
			'SHOW_TABLE_PROPS' => 'NOT',
			'SHOW_SMARTFILTER' => array(
				'VALUE' => 'Y',
				'DEPENDENT_PARAMS' => array(
					'FILTER_VIEW' => 'COMPACT',
				),
			),
			'LEFT_BLOCK_CATALOG_DETAIL' => 'Y',
			'CATALOG_PAGE_DETAIL' => 'element_2',
			'CATALOG_PAGE_DETAIL_GALLERY_SIZE' => '454px',
			'CATALOG_PAGE_DETAIL_THUMBS' => 'horizontal',
			'USE_DETAIL_TABS' => 'Y',
			'CATALOG_PAGE_DETAIL_SKU' => 'TYPE_1',
			'CHANGE_TITLE_ITEM_LIST' => 'N',
			'CHANGE_TITLE_ITEM_DETAIL' => 'N',
			'LEFT_BLOCK_SERVICES_ROOT' => 'Y',
			'SECTIONS_TYPE_VIEW_SERVICES' => array(
				'VALUE' => 'sections_2',
				'ADDITIONAL_OPTIONS' => array(
					'SECTIONS_ITEMS_OFFSET_SERVICES' => 'Y',
					'SECTIONS_ELEMENTS_COUNT_SERVICES' => '4',
					'SECTIONS_IMAGES_SERVICES' => 'ICONS',
				),
			),
			'LEFT_BLOCK_SERVICES_SECTIONS' => 'Y',
			'SECTION_TYPE_VIEW_SERVICES' => array(
				'VALUE' => 'section_2',
				'ADDITIONAL_OPTIONS' => array(
					'SECTION_ITEMS_OFFSET_SERVICES' => 'Y',
					'SECTION_ELEMENTS_COUNT_SERVICES' => '2',
					'SECTION_IMAGES_SERVICES' => 'ICONS',
				),
			),
			'ELEMENTS_PAGE_SERVICES' => array(
				'VALUE' => 'list_elements_2',
				'ADDITIONAL_OPTIONS' => array(
					'ELEMENTS_OFFSET_SERVICES' => 'Y',
					'ELEMENTS_COUNT_SERVICES' => '2',
					'ELEMENTS_IMAGES_SERVICES' => 'ICONS',
				),
			),
			'LEFT_BLOCK_SERVICES_DETAIL' => 'N',
			'USE_DETAIL_TABS_SERVICES' => 'Y',
			'DETAIL_LINKED_PROJECTS' => 'list',
			'PROJECT_PAGE_LEFT_BLOCK' => 'N',
			'SHOW_PROJECTS_MAP' => 'Y',
			'PROJECTS_SHOW_HEAD_BLOCK' => array(
				'VALUE' => 'Y',
				'DEPENDENT_PARAMS' => array(
					'SHOW_HEAD_BLOCK_TYPE' => 'sections_mix',
				),
			),
			'PROJECTS_PAGE' => array(
				'VALUE' => 'list_elements_1',
				'ADDITIONAL_OPTIONS' => array(
					'ELEMENTS_OFFSET_PROJECT' => 'Y',
					'ELEMENTS_COUNT_PROJECT' => '4',
				),
			),
			'PROJECT_DETAIL_LEFT_BLOCK' => 'N',
			'SHOW_PROJECTS_MAP_DETAIL' => 'Y',
			'USE_DETAIL_TABS_PROJECTS' => 'Y',
			'DETAIL_LINKED_TARIFFS' => array(
				'VALUE' => 'type_3',
				'ADDITIONAL_OPTIONS' => array(
					'LINKED_OFFSET_TARIFFS' => 'N',
					'LINKED_IMAGES_TARIFFS' => 'ROUND_PICTURES',
				),
			),
			'LEFT_BLOCK_TARIFFS_ROOT' => 'Y',
			'SECTIONS_TYPE_VIEW_TARIFFS' => array(
				'VALUE' => 'sections_1',
				'ADDITIONAL_OPTIONS' => array(
					'SECTIONS_ITEMS_OFFSET_TARIFFS' => 'Y',
					'SECTIONS_ELEMENTS_COUNT_TARIFFS' => '2',
					'SECTIONS_IMAGES_TARIFFS' => 'ROUND_PICTURES',
					'SECTIONS_IMAGE_POSITION_TARIFFS' => 'LEFT',
				),
			),
			'LEFT_BLOCK_TARIFFS_SECTIONS' => 'N',
			'SECTION_TYPE_VIEW_TARIFFS' => array(
				'VALUE' => 'section_1',
				'ADDITIONAL_OPTIONS' => array(
					'SECTION_ITEMS_OFFSET_TARIFFS' => 'Y',
					'SECTION_ELEMENTS_COUNT_TARIFFS' => '2',
					'SECTION_IMAGES_TARIFFS' => 'ROUND_PICTURES',
					'SECTION_IMAGE_POSITION_TARIFFS' => 'LEFT',
				),
			),
			'ELEMENTS_PAGE_TARIFFS' => array(
				'VALUE' => 'list_elements_3',
				'ADDITIONAL_OPTIONS' => array(
					'ELEMENTS_OFFSET_TARIFFS' => 'N',
					'ELEMENTS_IMAGES_TARIFFS' => 'ROUND_PICTURES',
				),
			),
			'LEFT_BLOCK_TARIFFS_DETAIL' => 'N',
			'USE_DETAIL_TABS_TARIFFS' => 'Y',
			'GALLERY_LIST_PAGE' => array(
				'VALUE' => 'list_elements_1',
				'ADDITIONAL_OPTIONS' => array(
					'ELEMENTS_OFFSET_GALLERY' => 'Y',
					'ELEMENTS_COUNT_GALLERY' => '3',
					'ITEMS_TYPE_GALLERY' => 'ALBUM',
				),
			),
			'GALLERY_DETAIL_PAGE' => 'element_2',
			'PAGE_CONTACTS' => '2',
			'CONTACTS_USE_FEEDBACK' => 'Y',
			'CONTACTS_USE_MAP' => 'Y',
			'CONTACTS_USE_TABS' => 'N',
			'BLOG_PAGE_LEFT_BLOCK' => 'Y',
			'LEFT_BLOCK_BLOG_DETAIL' => 'Y',
			'BLOG_PAGE' => array(
				'VALUE' => 'list_elements_3',
				'ADDITIONAL_OPTIONS' => array(
					'ELEMENTS_OFFSET_BLOG' => 'Y',
					'ELEMENTS_IMAGE_POSITION_BLOG' => 'LEFT',
				),
			),
			'LANDINGS_PAGE' => array(
				'VALUE' => 'list_elements_1',
				'ADDITIONAL_OPTIONS' => array(
					'ELEMENTS_OFFSET_LANDING' => 'Y',
					'ELEMENTS_IMAGE_POSITION_LANDING' => 'LEFT',
				),
			),
			'SALE_PAGE_LEFT_BLOCK' => 'N',
			'LEFT_BLOCK_SALE_DETAIL' => 'N',
			'SALE_PAGE' => array(
				'VALUE' => 'list_elements_2',
				'ADDITIONAL_OPTIONS' => array(
					'ELEMENTS_OFFSET_SALE' => 'Y',
					'ELEMENTS_COUNT_SALE' => '4',
				),
			),
			'NEWS_PAGE_LEFT_BLOCK' => 'N',
			'LEFT_BLOCK_NEWS_DETAIL' => 'Y',
			'NEWS_PAGE' => array(
				'VALUE' => 'list_elements_2',
				'ADDITIONAL_OPTIONS' => array(
					'ELEMENTS_OFFSET_NEWS' => 'Y',
				),
			),
			'STAFF_PAGE' => 'list_elements_1',
			'DETAIL_LINKED_STAFF' => 'list',
			'PARTNERS_PAGE' => array(
				'VALUE' => 'list_elements_3',
				'ADDITIONAL_OPTIONS' => array(
					'ELEMENTS_OFFSET_PARTNER' => 'Y',
				),
			),
			'BRANDS_PAGE' => array(
				'VALUE' => 'list_elements_1',
				'ADDITIONAL_OPTIONS' => array(
					'ELEMENTS_OFFSET_BRAND' => 'Y',
				),
			),
			'BRANDS_DETAIL_PAGE' => 'element_1',
			'VACANCY_PAGE' => 'list_elements_1',
			'LICENSES_PAGE' => 'list_elements_2',
			'DOCS_PAGE' => 'list_elements_2',
			'FOOTER_TYPE' => array(
				'VALUE' => '3',
				'ADDITIONAL_OPTIONS' => array(
					'FOOTER_COLOR' => 'LIGHT',
				),
				'TOGGLE_OPTIONS' => array(
					'FOOTER_TOGGLE_SUBSCRIBE' => 'Y',
					'FOOTER_TOGGLE_PHONE' => array(
						'VALUE' => 'Y',
						'ADDITIONAL_OPTIONS' => array(
							'FOOTER_TOGGLE_CALLBACK' => 'Y',
						),
					),
					'FOOTER_TOGGLE_EMAIL' => 'Y',
					'FOOTER_TOGGLE_ADDRESS' => 'Y',
					'FOOTER_TOGGLE_SOCIAL' => 'Y',
					'FOOTER_TOGGLE_LANG' => 'N',
					'FOOTER_TOGGLE_PAY_SYSTEMS' => 'Y',
					'FOOTER_TOGGLE_DEVELOPER' => array(
						'VALUE' => 'Y',
						'ADDITIONAL_OPTIONS' => array(
							'FOOTER_TOGGLE_DEVELOPER_PARTNER' => 'N',
						),
					),
					'FOOTER_TOGGLE_EYED' => 'N',
					'FOOTER_TOGGLE_SITEMAP' => 'N',
				),
			),
			'CALLBACK_SIDE_BUTTON' => 'Y',
			'QUESTION_SIDE_BUTTON' => 'Y',
			'REVIEWS_SIDE_BUTTON' => 'Y',
			'ADV_TOP_HEADER' => 'N',
			'ADV_TOP_UNDERHEADER' => 'N',
			'ADV_SIDE' => 'Y',
			'ADV_CONTENT_TOP' => 'N',
			'ADV_CONTENT_BOTTOM' => 'N',
			'ADV_FOOTER' => 'N',
			'HEADER_MOBILE_FIXED' => array(
				'VALUE' => 'Y',
				'DEPENDENT_PARAMS' => array(
					'HEADER_MOBILE_SHOW' => 'ALWAYS',
				),
			),
			'HEADER_MOBILE' => array(
				'VALUE' => '1',
				'ADDITIONAL_OPTIONS' => array(
					'HEADER_MOBILE_COLOR' => 'WHITE',
				),
				'TOGGLE_OPTIONS' => array(
					'HEADER_MOBILE_TOGGLE_BURGER' => array(
						'VALUE' => 'Y',
						'ADDITIONAL_OPTIONS' => array(
							'HEADER_MOBILE_TOGGLE_BURGER_POSITION' => 'N',
						),
					),
					'HEADER_MOBILE_TOGGLE_PHONE' => array(
						'VALUE' => 'Y',
						'ADDITIONAL_OPTIONS' => array(
							'HEADER_MOBILE_TOGGLE_CALLBACK' => 'Y',
						),
					),
					'HEADER_MOBILE_TOGGLE_SEARCH' => 'Y',
				),
			),
			'HEADER_MOBILE_MENU' => array(
				'VALUE' => '1',
				'TOGGLE_OPTIONS' => array(
					'MOBILE_MENU_TOGGLE_THEME_SELECTOR' => 'N',
					'MOBILE_MENU_TOGGLE_PHONE' => array(
						'VALUE' => 'Y',
						'ADDITIONAL_OPTIONS' => array(
							'MOBILE_MENU_TOGGLE_CALLBACK' => 'Y',
						),
					),
					'MOBILE_MENU_TOGGLE_EMAIL' => 'Y',
					'MOBILE_MENU_TOGGLE_ADDRESS' => 'Y',
					'MOBILE_MENU_TOGGLE_SCHEDULE' => 'Y',
					'MOBILE_MENU_TOGGLE_SOCIAL' => 'Y',
					'MOBILE_MENU_TOGGLE_LANG' => array(
						'VALUE' => 'Y',
						'ADDITIONAL_OPTIONS' => array(
							'MOBILE_MENU_TOGGLE_LANG_UP' => 'N',
						),
					),
					'MOBILE_MENU_TOGGLE_BUTTON' => 'Y',
					'MOBILE_MENU_TOGGLE_REGION' => array(
						'ADDITIONAL_OPTIONS' => array(
							'MOBILE_MENU_TOGGLE_REGION_UP' => 'N',
						),
					),
					'MOBILE_MENU_TOGGLE_PERSONAL' => array(
						'ADDITIONAL_OPTIONS' => array(
							'MOBILE_MENU_TOGGLE_PERSONAL_UP' => 'N',
						),
					),
					'MOBILE_MENU_TOGGLE_COMPARE' => array(
						'ADDITIONAL_OPTIONS' => array(
							'MOBILE_MENU_TOGGLE_COMPARE_UP' => 'N',
						),
					),
					'MOBILE_MENU_TOGGLE_CART' => array(
						'ADDITIONAL_OPTIONS' => array(
							'MOBILE_MENU_TOGGLE_CART_UP' => 'N',
						),
					),
					'MOBILE_MENU_TOGGLE_WIDGET' => 'Y',
				),
			),
			'HEADER_MOBILE_MENU_OPEN' => '1',
			'BIGBANNER_MOBILE' => '1',
			'COMPACT_FOOTER_MOBILE' => 'Y',
			'MOBILE_LIST_SECTIONS_COMPACT_IN_SECTIONS' => 'N',
			'MOBILE_LIST_ELEMENTS_COMPACT_IN_SECTIONS' => 'N',
			'BOTTOM_ICONS_PANEL' => 'Y',
			'CABINET' => array(
				'VALUE' => 'Y',
				'DEPENDENT_PARAMS' => array(
					'PERSONAL_ONEFIO' => 'Y',
					'LOGIN_EQUAL_EMAIL' => 'Y',
				),
			),
			'WIDGET_SIDE_BUTTON' => array(
				'VALUE' => 'Y',
				'DEPENDENT_PARAMS' => array(
					'WIDGET_TYPE' => 'type_1',
					'WIDGET_OPEN' => 'SLIDE',
					'WIDGET_WIDTH' => 'wide',
				),
			),
		),
	),
);