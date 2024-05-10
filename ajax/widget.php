<?
require_once( $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/vendor/php/solution.php');

if(\Bitrix\Main\Loader::includeModule(VENDOR_MODULE_ID))
    $arThemeWidget = TSolution::GetFrontParametrsValues(SITE_ID);
    $is_mobile = isset($_REQUEST["mobile"]) && $_REQUEST["mobile"] == "Y";
    $description = $arThemeWidget["WIDGET_DESCRIPTION"];
    $title = $arThemeWidget["WIDGET_TITLE"];
    $type = $arThemeWidget["WIDGET_TYPE"];
    $bWide = $arThemeWidget['WIDGET_WIDTH'] == 'wide' && !$is_mobile;
    $width = $bWide ? '465px' : '285px';
    
?>
<div class="popup_vidjet">
    <?if(strlen($title)):?>
        <div class="popup_vidjet__title switcher-title <?=($bWide ? 'font_24' : 'font_20')?> color_333">
            <?=$title?>
        </div>
    <?endif;?>
    <div class="popup_vidjet__wrap ">
            <?include(__DIR__.'/../include/widget_code.php');?>
    </div>
    <?if(strlen($description)):?>
        <div class="popup_vidjet__description font_13 color_999">
            <?=$description?>
        </div>
    <?endif;?>
</div>