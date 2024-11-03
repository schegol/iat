<?

namespace Aspro\Allcorp3Motor\Functions;

use \Bitrix\Main\Config\Option,
    \Aspro\Allcorp3Motor\Property\ListWebForms,
    \CAllcorp3Motor as Solution;

class ThematicParameters
{
    public static function transformParameters(&$arParams)
    {
        self::addCatalogSkuPropertyCode($arParams);
        self::addSkuTreePropertyCodeCatalogPage($arParams);
        self::addWidgetPage($arParams);
        self::addMobileMenuToggleWidget($arParams);
        self::modifierRootTariffs($arParams);
        self::modifierRootWebForms($arParams);
    }


    public static function addCatalogSkuPropertyCode(&$arParams){
        $arParams['CATALOG_PAGE']['OPTIONS']['CATALOG_SKU_PROPERTY_CODE'] =  array(
            'TITLE' => GetMessage('CATALOG_SKU_PROPERTY_CODE_TITLE'),
            'TYPE' => 'multiselectbox',
            'TYPE_SELECT' => 'IBLOCK_PROPS',
            'PROPS_SETTING' => [
                'IBLOCK_ID_OPTION' => 'CATALOG_SKU_IBLOCK_ID',
                'IBLOCK_CODE' => 'aspro_'.Solution::themesSolutionName.'_sku',
            ],
            'DEFAULT' => 'FORM_ORDER,STATUS,ARTICLE,PRICE_CURRENCY,PRICE,PRICEOLD,ECONOMY,COLOR,DLINA,WIDTH',
            'GROUP_BLOCK' => 'MAIN_ALL_GROUP',
            'THEME' => 'N',
        );
    }
    
    public static function addSkuTreePropertyCodeCatalogPage(&$arParams){
        $arParams['CATALOG_PAGE']['OPTIONS']['CATALOG_SKU_TREE_PROPERTY_CODE'] =  array(
            'TITLE' => GetMessage('CATALOG_SKU_TREE_PROPERTY_CODE_TITLE'),
            'TYPE' => 'multiselectbox',
            'TYPE_SELECT' => 'IBLOCK_PROPS',
            'PROPS_SETTING' => [
                'IBLOCK_ID_OPTION' => 'CATALOG_SKU_IBLOCK_ID',
                'IBLOCK_CODE' => 'aspro_'.Solution::themesSolutionName.'_sku',
                'IS_TREE' => true,
            ],
            'DEFAULT' => 'COLOR,DIAMETER,DLINA,THICKNESS_STEEL,WIDTH',
            'GROUP_BLOCK' => 'MAIN_ALL_GROUP',
            'THEME' => 'N',
        );
    }

    public static function addWidgetPage(&$arParams)
    {
        $arParams['WIDGET_PAGE'] = array(
            'TITLE' => GetMessage('WIDGET_OPTIONS'),
            'THEME' => 'Y',
            'OPTIONS' => array(
                'WIDGET_SIDE_BUTTON' => array(
                    'TITLE' => GetMessage('WIDGET_BUTTON'),
                    'TYPE' => 'checkbox',
                    'DEPENDENT_PARAMS' => array(
                        'WIDGET_TYPE' => array(
                            'TITLE' => GetMessage('WIDGET_TYPE'),
                            'TYPE' => 'selectbox',
                            'SHOW_IMG' => 'Y',
                            'ADDITIONAL_OPTIONS' => 'Y',
                            'GROUP_BLOCK' => 'WIDGET_GROUP',
                            'LIST' => array(
                                'type_1' => array(
                                    'TITLE' => GetMessage('WIDGET_TYPE_FORM_TEXT'),
                                    'IMG' => '/bitrix/images/'.Solution::moduleID.'/themes/widget_form.png',
                                    'ROW_CLASS' => 'col-md-4',
                                    'POSITION_BLOCK' => 'block',
                                    'IN_BLOCK' => 'Y',
                                ),
                                'type_2' => array(
                                    'TITLE' => GetMessage('WIDGET_TYPE_2_TEXT'),
                                    'IMG' => '/bitrix/images/'.Solution::moduleID.'/themes/widget2.png',
                                    'ROW_CLASS' => 'col-md-4',
                                    'POSITION_BLOCK' => 'block',
                                    'IN_BLOCK' => 'Y',
                                ),
                            ),
                            'DEFAULT' => 'type_1',
                            'THEME' => 'Y',
                            'CONDITIONAL_VALUE' => 'Y',
                        ),
                        'WIDGET_FORM' => array(
                            'TITLE' => GetMessage('EXPRESS_BUTTON_FORM'),
                            'TYPE' => 'selectbox',
                            'LIST' => array(),
                            'GROUPPED_LIST' => array(
                                array(
                                    'TITLE' => '',
                                    'LIST' => array(
                                        '' => GetMessage('EXPRESS_BUTTON_FORM_EMPTY'),
                                    ),
                                ),
                            ),
                            'DEFAULT' => 'aspro_'.Solution::themesSolutionName.'_photo',
                            'THEME' => 'N',
                            'GROUP_BLOCK' => 'WIDGET_GROUP',
                            'GROUP_BLOCK_LINE' => 'Y',
                        ),
                        'WIDGET_TITLE' => array(
                            'TITLE' => GetMessage('WIDGET_TITLE'),
                            'TYPE' => 'textarea',
                            'ROWS' => '1',
                            'COLS' => '77',
                            'DEFAULT' => GetMessage('WIDGET_TITLE_PHOTO'),
                            'THEME' => 'N',
                            'GROUP_BLOCK' => 'WIDGET_GROUP',
                            'GROUP_BLOCK_LINE' => 'Y',
                            'CONDITIONAL_VALUE' => 'Y',
                        ),
                        'WIDGET_DESCRIPTION' => array(
                            'TITLE' => GetMessage('WIDGET_DESCRIPTION'),
                            'TYPE' => 'textarea',
                            'ROWS' => '5',
                            'COLS' => '77',
                            'DEFAULT' => GetMessage('WIDGET_DESCRIPTION_DEFAULT'),
                            'THEME' => 'N',
                            'GROUP_BLOCK' => 'WIDGET_GROUP',
                            'GROUP_BLOCK_LINE' => 'Y',
                            'CONDITIONAL_VALUE' => 'Y',
                        ),
                        'WIDGET_CODE' => array(
                            'TITLE' => GetMessage('WIDGET_CODE'),
                            'TYPE' => 'includefile',
                            'INCLUDEFILE' => '#SITE_DIR#include/widget_code.php',
                            'GROUP_BLOCK' => 'WIDGET_GROUP',
                            'NO_EDITOR' => 'Y',
                            'CONDITIONAL_VALUE' => 'Y',
                        ),
                        'WIDGET_ICON' => array(
                            'TITLE' => GetMessage('WIDGET_ICON'),
                            'TYPE' => 'file',
                            'DEFAULT' => serialize(array()),
                            'GROUP_BLOCK' => 'WIDGET_GROUP',
                            'THEME' => 'N',
                            'CONDITIONAL_VALUE' => 'Y',
                        ),
                        'WIDGET_OPEN' => array(
                            'TITLE' => GetMessage('WIDGET_OPEN'),
                            'TYPE' => 'selectbox',
                            'LIST' => array(
                                'POPUP' => GetMessage('WIDGET_OPEN_POPUP'),
                                'SLIDE' => GetMessage('WIDGET_OPEN_SLIDE'),
                            ),
                            'DEFAULT' => 'SLIDE',
                            'THEME' => 'Y',
                            'GROUP_BLOCK' => 'WIDGET_GROUP',
                            'CONDITIONAL_VALUE' => 'Y',
                        ),
                        'WIDGET_WIDTH' => array(
                            'TITLE' => GetMessage('WIDGET_WIDTH'),
                            'TYPE' => 'selectbox',
                            'THEME' => 'Y',
                            'CONDITIONAL_VALUE' => 'Y',
                            'LIST' => array(
                                'narrow' => array(
                                    'TITLE' => GetMessage('WIDGET_WIDTH_NARROW'),
                                ),
                                'wide' => array(
                                    'TITLE' => GetMessage('WIDGET_WIDTH_WIDE'),
                                ),
                            ),
                            'DEFAULT' => 'wide',
                        ),
                    ),
                    'DEFAULT' => 'N',
                    'ONE_ROW' => 'Y',
                    'THEME' => 'Y',
                    'NO_DELAY' => 'Y',
                ),
            )
        );

        

    }

    public static function addMobileMenuToggleWidget(&$arParams){
        $arParams['MOBILE']['OPTIONS']['HEADER_MOBILE_MENU']['LIST'][1]['TOGGLE_OPTIONS']['OPTIONS']['MOBILE_MENU_TOGGLE_WIDGET'] = array(
            'TITLE' => GetMessage('MOBILE_MENU_TOGGLE_WIDGET'),
            'TYPE' => 'checkbox',
            'ONE_ROW' => 'Y',
            'SMALL2_TOGGLE' => 'Y',
            'SHOW_TITLE' => 'Y',
            'DEFAULT' => 'Y',
            'AJAX_PARAM' => 'MOBILE_MENU_MAIN_PART',
        );
    }

    public static function modifierRootTariffs(&$arParams)
    {
        $arParams['TARIFFS_PAGE']['OPTIONS']['TARIFFS_USE_DETAIL']['DEFAULT'] = 'Y';
    }

    public static function modifierRootWebForms(&$arParams)
    {
        $arParams['WEB_FORMS']['OPTIONS']['EXPRESS_BUTTON_TITLE']['DEFAULT'] = GetMessage('EXPRESS_BUTTON_TITLE_DEFAULT_MOTOR');
        $arParams['WEB_FORMS']['OPTIONS']['EXPRESS_BUTTON_FORM']['DEFAULT'] = 'aspro_allcorp3motor_order_services';
    }
}
