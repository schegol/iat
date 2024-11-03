<?
namespace Aspro\Allcorp3Motor\Solution;

use \CAllcorp3Motor as Solution,
\Aspro\Allcorp3Motor\Property\ListWebForms,
\Bitrix\Main\Localization\Loc,
\Aspro\Allcorp3Motor\Functions\CAsproAllcorp3 as Functions;

class Widget{
    public static function OnAsproShowRightDokWidgetHandler(){
        global $APPLICATION, $arTheme;
        $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/widget.css');
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/widget.js');

        $widgetBlock = Solution::GetFrontParametrValue('WIDGET_SIDE_BUTTON') == 'Y';
		$widgetIcon = unserialize(Solution::GetFrontParametrValue('WIDGET_ICON'));
		$widgetTitle = Solution::GetFrontParametrValue('WIDGET_TITLE');
		$widgetWidth = Solution::GetFrontParametrValue('WIDGET_WIDTH');
		$bWidgetSlide = Solution::GetFrontParametrValue('WIDGET_OPEN') == 'SLIDE';
		if($widgetIcon){
			$widgetIcon = \CFile::GetPath($widgetIcon[0]);
		} else {
			$widgetIcon = SITE_TEMPLATE_PATH."/images/svg/photo.svg";
		}
		$widgetIconExt = pathinfo($widgetIcon, PATHINFO_EXTENSION);
        ?>
        <?if($widgetBlock):?>
            <?ob_start();?>
                <?
                $arBackParametrs = Solution::GetFrontParametrsValues(SITE_ID);
                $formId = '';
                $once = '';
                if($arBackParametrs['WIDGET_TYPE'] === 'type_1'):?>
                    <?$formId = Solution::getFormID($arBackParametrs['WIDGET_FORM']);
                    $once = 'N';
                elseif($arBackParametrs['WIDGET_TYPE'] === 'type_2'):
                    $formId = 'widget';
                    $once = 'Y';
                endif;?>
                <span class="link fill-theme-hover" title="<?=$widgetTitle?>">
                <span class="animate-load" data-event="jqm" data-param-id=<?=$formId?> <?=($bWidgetSlide ? 'data-nooverlay="Y" data-once='.$once.' data-show_slide="Y"' : '')?> data-width="<?=$widgetWidth?>" data-name="widget">						
                        <?if($widgetIconExt === 'svg'):?>
                            <?=Solution::showIconSvg("widget", $widgetIcon);?>
                        <?else:?>
                            <img class="widget-img" src="<?=$widgetIcon?>" alt="<?=$widgetTitle?>" />
                        <?endif;?>
                    </span>
                </span>
            <?$html = ob_get_contents();
			ob_end_clean();
            return $html;?>
        <?endif;

    }
    public static function OnAsproShowMobileMenuBlockWidgetHandler(){
        global $APPLICATION;
        $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/mobile-menu-widget.css');
        
        $widgetIcon = unserialize(Solution::GetFrontParametrValue('WIDGET_ICON'));
        $widgetTitle = Solution::GetFrontParametrValue('WIDGET_TITLE');
        if($widgetIcon){
            $widgetIcon = \CFile::GetPath($widgetIcon[0]);
        } else {
            $widgetIcon = SITE_TEMPLATE_PATH."/images/svg/calculator.svg";
        }
        $widgetIconExt = pathinfo($widgetIcon, PATHINFO_EXTENSION);
        ?>
        <?ob_start();?>
            <?
            $arBackParametrs = Solution::GetFrontParametrsValues(SITE_ID);
            $formId = '';
            if($arBackParametrs['WIDGET_TYPE'] === 'type_1'):?>
                <?$formId = Solution::getFormID($arBackParametrs['WIDGET_FORM']);
            elseif($arBackParametrs['WIDGET_TYPE'] === 'type_2'):
                $formId = 'widget';
            endif;?>
            <div class="mobilemenu__menu mobilemenu__menu--widget">
                <ul class="mobilemenu__menu-list">
                    <li class="mobilemenu__menu-item mobilemenu__menu-item--with-icon">
                        <div class="link-wrapper bg-opacity-theme-parent-hover fill-theme-parent-all color-theme-parent-all ">
                            <span class="link-wrapper__span" data-event="jqm" data-param-id=<?=$formId?> data-param-mobile="Y" data-width="narrow" data-name="widget">
                                <span class="mobilemenu__menu-item-svg ">
                                    <?if($widgetIconExt === 'svg'):?>
                                        <?=Solution::showIconSvg("widget", $widgetIcon);?>
                                    <?else:?>
                                        <img class="widget-img" src="<?=$widgetIcon?>" alt="<?=$widgetTitle?>" />
                                    <?endif;?>													
                                </span>
                                <span class="font_15"><?=$widgetTitle?></span>
                            </span>
                        </div>
                    </li>
                </ul>
            </div>
        <?$html = ob_get_contents();
        ob_end_clean();
        return $html;?>
    <?}

    public static function OnAsproShowBottomPanelWidgetHandler($arItem){?>
        <?ob_start();?>
            <?
            $arBackParametrs = Solution::GetFrontParametrsValues(SITE_ID);
            $formId = '';
            if($arBackParametrs['WIDGET_TYPE'] === 'type_1'):?>
                <?$formId = Solution::getFormID($arBackParametrs['WIDGET_FORM']);
            elseif($arBackParametrs['WIDGET_TYPE'] === 'type_2'):
                $formId = 'widget';
            endif;?>
            <span class="bottom-icons-panel__content-link fill-theme-parent bottom-icons-panel__content-link--widget bottom-icons-panel__content-link--with-counter" data-event="jqm" data-param-id=<?=$formId?> data-param-mobile="Y" data-width="narrow" data-name="widget">
                <?if($arItem['PROPERTY_IMG_VALUE']):?>
                    <span class="icon-block-with-counter__inner fill-theme-hover fill-theme-target<?=($arItem['PROPERTY_SHOW_TEXT_VALUE'] == 'Y' ? ' bottom-icons-panel__content-picture-wrapper--mb-3' : '')?>">
                        <?
                        $arImg = \CFile::ResizeImageGet($arItem['PROPERTY_IMG_VALUE'], array('width' => 60, 'height' => 60), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);?>
                        <?if(is_array($arImg)):?>
                            <?if(strpos($arImg["src"], ".svg") !== false):?>
                                <?=Solution::showIconSvg("cat_icons light-ignore", $arImg["src"]);?>
                            <?else:?>
                                <img class="bottom-icons-panel__content-picture lazyload" src="<?=$arImg["src"]?>" data-src="<?=$arImg["src"]?>" alt="<?=$arItem['NAME']?>" title="<?=$arItem['NAME']?>" />
                            <?endif;?>
                        <?endif;?>
                    </span>
                <?endif;?>
                <?if($arItem['PROPERTY_SHOW_TEXT_VALUE'] == 'Y'):?>
                    <span class="bottom-icons-panel__content-text font_10 bottom-icons-panel__content-link--display--block"><?=$arItem['NAME'];?></span>
                <?endif;?>
            </span>
        <?$html = ob_get_contents();
        ob_end_clean();
        return $html;?>
    <?}
    public static function OnAsproHeaderMobileMenuWidgetHandler($bAjax, $ajaxBlock, $bShowWidgetMobileMenu){
        return Functions::showMobileMenuBlock(
            array(
                'PARAM_NAME' => 'MOBILE_MENU_TOGGLE_WIDGET',
                'BLOCK_TYPE' => 'WIDGET',
                'IS_AJAX' => $bAjax,
                'AJAX_BLOCK' => $ajaxBlock,
                'VISIBLE' => $bShowWidgetMobileMenu,
                'WRAPPER' => '',
                'CLASS' => 'font_14',
            )
        );
    }
    
    public static function OnAsproGetBackParametrsValuesWidgetHandler($SITE_ID){
        $arWebForms[$SITE_ID] = array();
        if(isset(Solution::$arParametrsList['WIDGET_PAGE']['OPTIONS']['WIDGET_SIDE_BUTTON']['DEPENDENT_PARAMS']['WIDGET_FORM'])){
            if($arWebForms[$SITE_ID] = ListWebForms::getWebForms(array($SITE_ID))){
                if(isset(Solution::$arParametrsList['WIDGET_PAGE']['OPTIONS']['WIDGET_SIDE_BUTTON']['DEPENDENT_PARAMS']['WIDGET_FORM'])){
                    // add form`s list
                    Solution::$arParametrsList['WIDGET_PAGE']['OPTIONS']['WIDGET_SIDE_BUTTON']['DEPENDENT_PARAMS']['WIDGET_FORM']['LIST'] = array_merge($arWebForms[$SITE_ID]['MERGE'], $arWebForms[$SITE_ID]['FORM'], $arWebForms[$SITE_ID]['IBLOCK']);

                    foreach($arWebForms[$SITE_ID] as $type => $arWebFormsOfType){
                        if($arWebFormsOfType){
                            Solution::$arParametrsList['WIDGET_PAGE']['OPTIONS']['WIDGET_SIDE_BUTTON']['DEPENDENT_PARAMS']['WIDGET_FORM']['GROUPPED_LIST'][] = array(
                                'TITLE' => Loc::getMessage('EXPRESS_BUTTON_FORM_'.$type),
                                'LIST' => $arWebFormsOfType,
                            );
                        }
                    }
                }

            }
        }
    }

}