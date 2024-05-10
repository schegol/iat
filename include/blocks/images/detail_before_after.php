<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true ) die();

//options from \TSolution\Functions::showBlockHtml
$arOptions = $arConfig['PARAMS'];
?>
<?if(
    $arOptions &&
    is_array($arOptions)
):?>
    <?
    $type = $arOptions['TYPE'] ?: 'wide';
    ?>
    <div class="detail-image detail-image--<?=strtolower($type)?>">
        <div class="maxwidth-theme">
            <div class="before-after-image swipeignore">
                <img src="<?=$arOptions['URL']?>" class="img-responsive rounded-4" title="<?=$arOptions['TITLE'];?>" alt="<?=$arOptions['ALT'];?>" />
                <div class="resize" style="background:url(<?=CFile::GetPath($arOptions['BEFORE_IMG']);?>) 0 0 /cover no-repeat;"></div>
                <span class="handle">
                    <span>
                        <span class="left_arrow"><?=TSolution::showIconSvg("colored", SITE_TEMPLATE_PATH."/images/svg/strelka.svg")?></span>
                        <span class="right_arrow"><?=TSolution::showIconSvg("colored", SITE_TEMPLATE_PATH."/images/svg/strelka.svg")?></span>
                    </span>
                </span>
            </div>
        </div>
    </div>
<?endif;?>