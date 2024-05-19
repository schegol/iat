<?
use \Bitrix\Main\Localization\Loc;

$bTab = isset($tabCode) && $tabCode === 'dops';
?>
<?//show dops block?>
<?if($arParams["SHOW_DOPS"] === 'Y'):?>
    <?if($bTab):?>
        <?if(!isset($bShow_dops)):?>
            <?$bShow_dops = true;?>
        <?else:?>
            <div class="tab-pane <?=(!($iTab++) ? 'active' : '')?>" id="dops">
                <?$APPLICATION->ShowViewContent('PRODUCT_DOPS_INFO')?>
                <?
                $VALUES = array();
                $res = CIBlockElement::GetProperty(38, 223, "sort", "asc", array("CODE" => "GALLEY_BIG"));
                while ($ob = $res->GetNext())
                {
                    $bigGallery[] = CFile::GetPath($ob['VALUE']);
                }

//                var_dump($bigGallery);
                ?>
                <div class="ordered-block__title switcher-title font_22"><?=$arParams["T_BIG_GALLERY"]?></div>
                <div class="gallery-view_switch">
                    <div class="flexbox flexbox--direction-row flexbox--align-center">
                        <div class="gallery-view_switch__count color_666 font_13">
                            <div class="gallery-view_switch__count-wrapper gallery-view_switch__count-wrapper--small" <?=($bShowSmallGallery ? "" : "style='display:none;'");?>>
                                <span class="gallery-view_switch__count-value"><?=count((array)$arResult['BIG_GALLERY']);?></span>
                                <?=Loc::getMessage('PHOTO');?>
                                <span class="gallery-view_switch__count-separate">&mdash;</span>
                            </div>
                            <div class="gallery-view_switch__count-wrapper gallery-view_switch__count-wrapper--big" <?=($bShowSmallGallery ? "style='display:none;'" : "");?>>
                                <span class="gallery-view_switch__count-value">1/<?=count((array)$arResult['BIG_GALLERY']);?></span>
                                <span class="gallery-view_switch__count-separate">&mdash;</span>
                            </div>
                        </div>
<!--                        <div class="gallery-view_switch__icons-wrapper">-->
<!--                            <span class="gallery-view_switch__icons--><?php //=(!$bShowSmallGallery ? ' active' : '')?><!-- gallery-view_switch__icons--big" title="--><?php //=Loc::getMessage("BIG_GALLERY");?><!--">--><?php //=TSolution::showIconSvg("gallery", SITE_TEMPLATE_PATH."/images/svg/gallery_alone.svg", "", "colored_theme_hover_bg-el-svg", true, false);?><!--</span>-->
<!--                            <span class="gallery-view_switch__icons--><?php //=($bShowSmallGallery ? ' active' : '')?><!-- gallery-view_switch__icons--small" title="--><?php //=Loc::getMessage("SMALL_GALLERY");?><!--">--><?php //=TSolution::showIconSvg("gallery", SITE_TEMPLATE_PATH."/images/svg/gallery_list.svg", "", "colored_theme_hover_bg-el-svg", true, false);?><!--</span>-->
<!--                        </div>-->
                    </div>
                </div>
                <div class="gallery-big" >
                    <div class="owl-carousel appear-block owl-carousel--outer-dots owl-carousel--nav-hover-visible owl-bg-nav owl-carousel--light owl-carousel--button-wide owl-carousel--button-offset-half" data-plugin-options='{"items": "1", "autoplay" : false, "autoplayTimeout" : "3000", "smartSpeed":1000, "dots": true, "dotsContainer": false, "nav": true, "loop": false, "index": true, "margin": 0}'>
                        <?foreach($bigGallery as $arPhoto):?>
                            <div class="item">
                                <a href="<?=$arPhoto?>" class="fancy" data-fancybox="big-gallery" target="_blank" title="photo">
                                    <img data-src="<?=$arPhoto?>" src="<?=$arPhoto?>" class="img-responsive inline lazy rounded-4" title="photo" alt="photo" />
                                </a>
                            </div>
                        <?endforeach;?>
                    </div>
                </div>
            </div>
        <?endif;?>
    <?else:?>
        <div class="detail-block ordered-block dops">
            <div class="ordered-block__title switcher-title font_22"><?=$arParams["T_DOPS"]?></div>
            <?$APPLICATION->ShowViewContent('PRODUCT_DOPS_INFO')?>
        </div>
    <?endif;?>
<?endif;?>