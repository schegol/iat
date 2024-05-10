<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile(__FILE__);
global $APPLICATION, $arRegion, $arSite, $arTheme;

require_once('vendor/php/solution.php');

$arSite = CSite::GetByID(SITE_ID)->Fetch();
if(class_exists('TSolution')){
    $bIncludedModule =  \Bitrix\Main\Loader::includeModule(TSolution::moduleID);
}
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>" class="<?=($_SESSION['SESS_INCLUDE_AREAS'] ? 'bx_editmode ' : '')?><?=strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE 7.0' ) ? 'ie ie7' : ''?> <?=strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE 8.0' ) ? 'ie ie8' : ''?> <?=strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE 7.0' ) ? 'ie ie9' : ''?>">
<head>


    <title><?$APPLICATION->ShowTitle()?></title>
    <link type="image/x-icon" href="https://iat-sportive.ru/favicon.ico?v=2" rel="shortcut icon">
    <link type="Image/x-icon" href="https://iat-sportive.ru/favicon.ico?v=2" rel="icon">

    <!-- Begin Online-Chat {literal} -->

    <!-- {/literal} End Online-Chat -->

    <?$APPLICATION->ShowMeta("viewport");?>
    <?$APPLICATION->ShowMeta("HandheldFriendly");?>
    <?$APPLICATION->ShowMeta("apple-mobile-web-app-capable", "yes");?>
    <?$APPLICATION->ShowMeta("apple-mobile-web-app-status-bar-style");?>
    <?$APPLICATION->ShowMeta("SKYPE_TOOLBAR");?>
    <?$APPLICATION->ShowHead();?>
    <?$APPLICATION->AddHeadString('<script>BX.message('.CUtil::PhpToJSObject($MESS, false).')</script>', true);?>
    <?if($bIncludedModule)
        TSolution::Start(SITE_ID);?>
    <!-- calltouch -->
    <script>
        (function(w,d,n,c){w.CalltouchDataObject=n;w[n]=function(){w[n]["callbacks"].push(arguments)};if(!w[n]["callbacks"]){w[n]["callbacks"]=[]}w[n]["loaded"]=false;if(typeof c!=="object"){c=[c]}w[n]["counters"]=c;for(var i=0;i<c.length;i+=1){p(c[i])}function p(cId){var a=d.getElementsByTagName("script")[0],s=d.createElement("script"),i=function(){a.parentNode.insertBefore(s,a)},m=typeof Array.prototype.find === 'function',n=m?"init-min.js":"init.js";s.async=true;s.src="https://mod.calltouch.ru/"+n+"?id="+cId;if(w.opera=="[object Opera]"){d.addEventListener("DOMContentLoaded",i,false)}else{i()}}})(window,document,"ct","esy462w1");
    </script>
    <!-- calltouch -->

    <!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();
        for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
        k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(94857077, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
    });
</script>

    <!-- /Yandex.Metrika counter -->


    <!-- Google Tag Manager -->
    <script>
		(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-WQKGGF85');
	</script>
    <!-- End Google Tag Manager -->

    <script src="https://www.googletagmanager.com/gtag/js?id=G-HLPES61PGH"></script>

    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-HLPES61PGH');
    </script>





    <!-- Top.Mail.Ru counter -->
    <script type="text/javascript">
        var _tmr = window._tmr || (window._tmr = []);
        _tmr.push({id: "3406352", type: "pageView", start: (new Date()).getTime()});
        (function (d, w, id) {
            if (d.getElementById(id)) return;
            var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true; ts.id = id;
            ts.src = "https://top-fwz1.mail.ru/js/code.js";
            var f = function () {var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);};
            if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }
        })(document, window, "tmr-code");
    </script>

    <!-- /Top.Mail.Ru counter -->
</head>
<body class="<?=($bIndexBot ? "wbot" : "")?> site_<?=SITE_ID?> <?=($bIncludedModule ? TSolution::getConditionClass() : '')?>" id="main" data-site="<?=SITE_DIR?>">

    <noscript><div><img src="https://top-fwz1.mail.ru/counter?id=3406352;js=na" style="position:absolute;left:-9999px;" alt="Top.Mail.Ru" /></div></noscript>
    <noscript><div><img src="https://mc.yandex.ru/watch/94857077" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WQKGGF85"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

<div class="bx_areas"><?if($bIncludedModule){TSolution::ShowPageType('header_counter');}?></div>

<?if(!$bIncludedModule):?>
<?$APPLICATION->SetTitle(GetMessage("ERROR_INCLUDE_MODULE_ALLCORP3_TITLE"));?>
<?$APPLICATION->IncludeFile(SITE_DIR."include/error_include_module.php");?></body></html>
<?die();?>
<?endif;?>

<?include_once(str_replace('//', '/', $_SERVER['DOCUMENT_ROOT'].'/'.SITE_DIR.'include/header/body_top.php'));?>

<?$arTheme = $APPLICATION->IncludeComponent("aspro:theme.".VENDOR_SOLUTION_NAME, "", array(), false, ['HIDE_ICONS' => 'Y']);?>
<?include_once('defines.php');?>
<?TSolution::SetJSOptions();?>

<div class="body <?=($isIndex ? 'index' : '')?> hover_<?=$arTheme["HOVER_TYPE_IMG"]["VALUE"];?>">


    <div class="body_media"></div>

    <?TSolution::get_banners_position('TOP_HEADER');?>
    <?TSolution::ShowPageType('eyed_component');?>
    <div class="visible-lg visible-md title-v<?=$arTheme["PAGE_TITLE"]["VALUE"];?><?=($isIndex ? ' index' : '')?>" data-ajax-block="HEADER" data-ajax-callback="headerInit">
        <?TSolution::ShowPageType('mega_menu');?>
        <?TSolution::ShowPageType('header');?>
    </div>

    <?TSolution::get_banners_position('TOP_UNDERHEADER');?>

    <?if($arTheme["TOP_MENU_FIXED"]["VALUE"] == 'Y'):?>
        <div id="headerfixed">
            <?TSolution::ShowPageType('header_fixed');?>
        </div>
    <?endif;?>

    <div id="mobileheader" class="visible-xs visible-sm">
        <?TSolution::ShowPageType('header_mobile');?>
        <div id="mobilemenu" class="mobile-scroll scrollbar">
            <?TSolution::ShowPageType('header_mobile_menu');?>
        </div>
    </div>
    <div id="mobilefilter" class="scrollbar-filter"></div>

    <div role="main" class="main banner-auto">
        <?if(!$isIndex && !$is404 && !$isForm):?>
            <?$APPLICATION->ShowViewContent('section_bnr_content');?>
            <?if($APPLICATION->GetProperty("HIDETITLE")!=='Y'):?>
                <!--title_content-->
                <? TSolution::ShowPageType('page_title');?>
                <!--end-title_content-->
            <?endif;?>
            <?$APPLICATION->ShowViewContent('top_section_filter_content');?>
            <?$APPLICATION->ShowViewContent('top_detail_content');?>
        <?endif; // if !$isIndex && !$is404 && !$isForm?>

        <div class="container <?=($isCabinet ? 'cabinte-page' : '');?><?=($isBlog ? ' blog-page' : '');?> <?=TSolution::ShowPageProps("ERROR_404");?>">
            <?if(!$isIndex):?>
            <div class="row">
                <div class="maxwidth-theme wide-<?TSolution::ShowPageProps("FULLWIDTH");?>">
                    <?if($is404):?>
                    <div class="col-md-12 col-sm-12 col-xs-12 content-md">
                        <?else:?>
                        <div class="col-md-12 col-sm-12 col-xs-12 content-md">
                            <div class="right_block narrow_<?=TSolution::ShowPageProps("MENU");?> <?=$APPLICATION->ShowViewContent('right_block_class')?>">
                                <?TSolution::get_banners_position('CONTENT_TOP');?>

                                <?ob_start();?>
                                <?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
                                    "COMPONENT_TEMPLATE" => ".default",
                                    "PATH" => SITE_DIR."include/left_block/menu.left_menu.php",
                                    "AREA_FILE_SHOW" => "file",
                                    "AREA_FILE_SUFFIX" => "",
                                    "AREA_FILE_RECURSIVE" => "Y",
                                    "EDIT_TEMPLATE" => "include_area.php"
                                ),
                                    false,
                                    array(
                                        "ACTIVE_COMPONENT" => "Y"
                                    )
                                );?>
                                <?$sMenuContent = ob_get_contents();
                                ob_end_clean();?>
                                <?endif;?>
                                <?endif;?>
                                <?TSolution::checkRestartBuffer();?>

