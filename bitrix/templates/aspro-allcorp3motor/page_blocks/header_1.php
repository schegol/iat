<?
include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
include($_SERVER['DOCUMENT_ROOT'].SITE_DIR.'include/header/settings.php');

global $bodyDopClass, $arTheme;
$bodyDopClass .= ' header_padding-146';

$topPartClasses = '';
$topPartClasses .= ' header__top-part--height_46';
$topPartClasses .= ' header__top-part--can-transparent';
if($bNarrowHeader) {
	if($bMarginHeader) {
	} else {
		$topPartClasses .= ' header--color_'.$topBlockColor;
		$topPartClasses .= ' header__top-part--bordered';
	}
} else {
	if($bMarginHeader) {
	} else {
		$topPartClasses .= ' header--color_'.$topBlockColor;
		$topPartClasses .= ' header__top-part--bordered';
	}
	$topPartClasses .= ' header__top-part--paddings';
}


$mainPartClasses = '';
$mainPartClasses .= ' header__main-part--can-transparent';
if($bNarrowHeader) {
	if($bMarginHeader) {
	} else {
		$mainPartClasses .= ' header--color_'.$mainBlockColor;
		$mainPartClasses .= ' header__main-part--bordered';
	}
} else {
	$mainPartClasses .= ' header--color_'.$mainBlockColor;
	if($bMarginHeader) {
		$mainPartClasses .= ' header__main-part--margin';
		$mainPartClasses .= ' header__main-part--shadow';
	} else {
		$mainPartClasses .= ' header__main-part--bordered';
	}
}

$innerClasses = '';
$innerClasses .= ' hide-dotted';
if($bNarrowHeader) {
	if($bMarginHeader) {
		$innerClasses .= ' header__main-inner--color_'.$mainBlockColor;
		$innerClasses .= ' header__main-inner--shadow';
		$innerClasses .= ' header--color_'.$mainBlockColor;
	} else {
		$innerClasses .= ' header__main-inner--margin';
	}
}
if(!$bMarginHeader) {
	$innerClasses .= ' bg_none';
	$mainPartClasses .= ' bg_none';
}
?>

<?if ($GLOBALS['SHOWCASE'] == 'Y'):
    $topPartClasses .= ' header__top-part--height_90';
?>

<header class="header_1 header_1--new header <?=($bHeaderFon ? 'header--fon' : '')?> <?=($arRegion ? 'header--with_regions' : '')?> <?=$bNarrowHeader ? 'header--narrow' : ''?> <?=$bMarginHeader ? 'header--offset' : ''?> <?=($bMarginHeader && $whiteBreadcrumbs) ? 'header--white' : '' ;?> <?=TSolution::ShowPageProps('HEADER_COLOR')?>">
    <div class="header__inner">

        <?if($ajaxBlock == "HEADER_TOP_PART" && $bAjax) {
            $APPLICATION->restartBuffer();
        }?>

        <div class="header__top-part <?=$topPartClasses?>" data-ajax-load-block="HEADER_TOP_PART">
            <?if($bNarrowHeader):?>
            <div class="maxwidth-theme">
                <?endif;?>

                <div class="header__top-inner justify-content-between">
                    <?//show logo?>
                    <div class="line-block__item">
                        <div class="logo no-shrinked <?=$logoClass?>">
                            <?TSolution::ShowBufferedLogo();?>
                        </div>
                    </div>

                    <div class="header-top-slogan">ИАТ Спортив — сердце вашего спорта!</div>

                    <?/*
                    <?if($arRegion):?>
                        <?//regions?>
                        <div class="header__top-item icon-block--with_icon">
                            <?
                            $arRegionsParams = array();
                            if($bAjax) {
                                $arRegionsParams['POPUP'] = 'N';
                            }
                            TSolution::ShowListRegions($arRegionsParams);?>
                        </div>
                    <?endif;?>

                    <?//check address text?>
                    <?
                    $blockOptions = array(
                        'PARAM_NAME' => 'HEADER_TOGGLE_ADDRESS',
                        'BLOCK_TYPE' => 'ADDRESS',
                        'IS_AJAX' => $bAjax,
                        'AJAX_BLOCK' => $ajaxBlock,
                        //'VISIBLE' => $bShowAddress,
                        'VISIBLE' => false,
                        'WRAPPER' => 'header__top-item hide-1300',
                    );
                    ?>
                    <div class="v-hidden"><?=TSolution\Functions::showHeaderBlock($blockOptions);?></div>

                    <?//show social?>
                    <?
                    $blockOptions = array(
                        'PARAM_NAME' => 'HEADER_TOGGLE_SOCIAL',
                        'BLOCK_TYPE' => 'SOCIAL',
                        'IS_AJAX' => $bAjax,
                        'AJAX_BLOCK' => $ajaxBlock,
                        //'VISIBLE' => $bShowSocial,
                        'VISIBLE' => false,
                        'WRAPPER' => 'header__top-item',
                    );
                    ?>
                    <?=TSolution\Functions::showHeaderBlock($blockOptions);?>
                    */?>

                    <?//show phone and callback?>
                    <?
                    $arDropdownCallback = explode(",", $arTheme['SHOW_DROPDOWN_CALLBACK']['VALUE']);
                    $bDropdownCallback =  in_array('HEADER', $arDropdownCallback) ? 'Y' : 'N';

                    $arDropdownEmail = explode(",", $arTheme['SHOW_DROPDOWN_EMAIL']['VALUE']);
                    $bDropdownEmail =  in_array('HEADER', $arDropdownEmail) ? 'Y' : 'N';

                    $arDropdownSocial = explode(",", $arTheme['SHOW_DROPDOWN_SOCIAL']['VALUE']);
                    $bDropdownSocial =  in_array('HEADER', $arDropdownSocial) ? 'Y' : 'N';

                    $arDropdownAddress = explode(",", $arTheme['SHOW_DROPDOWN_ADDRESS']['VALUE']);
                    $bDropdownAddress =  in_array('HEADER', $arDropdownAddress) ? 'Y' : 'N';

                    $arDropdownSchedule = explode(",", $arTheme['SHOW_DROPDOWN_SCHEDULE']['VALUE']);
                    $bDropdownSchedule =  in_array('HEADER', $arDropdownSchedule) ? 'Y' : 'N';

                    /*$blockOptions = array(
                    'PARAM_NAME' => 'HEADER_TOGGLE_PHONE',
                    'BLOCK_TYPE' => 'PHONE',
                    'IS_AJAX' => $bAjax,
                    'AJAX_BLOCK' => $ajaxBlock,
                    'VISIBLE' => $bShowPhone && $bPhone,
                    'WRAPPER' => 'header__top-item no-shrinked',
                    'CALLBACK' => $bShowCallback && $bCallback,
                    'MESSAGE' => GetMessage("S_CALLBACK"),
                    'DROPDOWN_CALLBACK' =>  $bDropdownCallback,
                    'DROPDOWN_EMAIL' => $bDropdownEmail,
                    'DROPDOWN_SOCIAL' =>  $bDropdownSocial,
                    'DROPDOWN_ADDRESS' =>  $bDropdownAddress,
                    'DROPDOWN_SCHEDULE' =>  $bDropdownSchedule,
                );*/
                    ?>
                    <div class="header-top-right">
                        <div class="header-top-contacts-wrapper">
                            <button class="header-top-contacts-toggle">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     width="20" height="20" viewBox="-74 0 100 100" style="enable-background:new -74 0 100 100;" xml:space="preserve">
                                    <path d="M21.2,71.7L9.1,59.5c-2-2-4.7-3.2-7.2-3.2c-2.7,0-5.1,1.1-7.2,3.2l-7,7c-0.3-0.2-0.7-0.4-1-0.5c0,0-0.1,0-0.1-0.1l-0.1-0.1
                                        c-0.9-0.6-1.9-1.2-3.1-1.7c-6.1-3.8-11.8-9.1-17.6-16.2c-2.7-3.4-4.6-6.4-6.1-9.7l0,0c1.6-1.3,2.8-2.6,3.7-3.6l3.1-3.1
                                        c2.4-2.2,3.6-4.7,3.6-7.3c0-2.7-1.2-5.2-3.5-7.6l-9.5-9.5c-0.9-0.9-1.8-1.8-2.8-2.7c-2-1.9-4.5-3-7.1-3c-2.9,0-5.3,1-7.5,3.2
                                        l-7.3,7.3c-2.9,2.7-4.6,6.1-5,10.3l0,0.1c-0.2,5.2,0.6,10,2.8,16c3.5,9.4,8.8,18.2,16.7,27.9C-42.8,77.8-31.2,86.8-18.3,93l0.3,0.1
                                        c3.8,1.7,11,4.9,19,5.4l1.1,0c5.3,0,9.3-1.7,12.6-5.3c1.2-1.4,2.5-2.7,3.6-3.9c0.9-0.7,1.5-1.4,2.1-2.1l0.8-0.8l0.2-0.2
                                        C25.6,81.6,25.6,76,21.2,71.7z M17.7,82.8l-1,1L16.6,84c-0.5,0.6-0.9,1.1-1.4,1.5l-0.3,0.3c-1.2,1.2-2.6,2.6-4,4.2
                                        c-2.3,2.5-4.9,3.6-8.8,3.6H1.3c-7-0.5-13.4-3.3-17.2-5l-0.2-0.1C-28.4,82.6-39.5,74-49.2,63c-7.6-9.2-12.6-17.6-15.9-26.4
                                        c-2-5.5-2.7-9.5-2.5-14c0.3-2.9,1.4-5.2,3.4-7l7.4-7.4c1.2-1.2,2.4-1.7,3.9-1.7c1.3,0,2.5,0.6,3.6,1.6l0.1,0.1
                                        c0.9,0.8,1.8,1.7,2.7,2.6l9.5,9.5c1.8,1.8,2.1,3.2,2.1,4c0,0.8-0.2,2-2.1,3.7l-3.2,3.2c-1.1,1.2-2.4,2.5-4.1,3.9l-0.2,0.2l-0.2,0.3
                                        c-0.9,1.2-1,2.3-0.5,3.9l0.1,0.4l0.1,0.4c1.7,3.7,3.8,7.1,6.8,10.9c6.2,7.6,12.4,13.3,19,17.4l0.3,0.2c0.8,0.4,1.6,0.8,2.3,1.2
                                        c0.3,0.3,0.7,0.5,1,0.6c0.4,0.2,0.7,0.3,0.9,0.5l0.7,0.5h0.2l0.3,0.1c0.6,0.2,1,0.2,1.3,0.2c1,0,1.9-0.4,2.8-1.3l7.5-7.5
                                        c1.2-1.2,2.3-1.7,3.7-1.7c1.5,0,2.9,0.9,3.7,1.7l12.2,12.2C20.1,77.7,20.2,80.2,17.7,82.8z" fill="#888" stroke="#888" stroke-width="7"/>
                                </svg>
                            </button>
                            <div class="d-flex header-top-contacts">
                                <div class="d-flex">
                                    <div class="icon-block--with_icon">
                                        <span class="icon-block__icon icon-block__icon--top banner-light-icon-fill menu-light-icon-fill">
                                            <i class="svg inline  svg-inline-address" aria-hidden="true">
                                                <svg width="10" height="14" viewBox="0 0 10 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M10 5.00244C10 6.31243 9.49622 7.50475 8.67184 8.39624L4.88411 12.8264C4.58473 13.1856 4 12.9739 4 12.5063V9.90242C1.71776 9.43915 0 7.4214 0 5.00244C0 2.24102 2.23858 0.00244141 5 0.00244141C7.76142 0.00244141 10 2.24102 10 5.00244ZM5 2.00244C6.65685 2.00244 8 3.34559 8 5.00244C8 6.6593 6.65685 8.00244 5 8.00244C3.34315 8.00244 2 6.6593 2 5.00244C2 3.34559 3.34315 2.00244 5 2.00244Z"
                                                          fill="#888888">
                                                    </path>
                                                </svg>
                                            </i>
                                        </span>
                                    </div>
                                    <span>ИАТ Спортив Север</span>
                                    <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
                                            "AREA_FILE_SHOW" => "file",
                                            "PATH" => SITE_DIR."include/header/header_phone_ext.php"
                                        )
                                    );?>
                                    <?//=TSolution\Functions::showHeaderBlock($blockOptions);?>
                                </div>
                                <div class="d-flex">
                                    <div class="icon-block--with_icon">
                                        <span class="icon-block__icon icon-block__icon--top banner-light-icon-fill menu-light-icon-fill">
                                            <i class="svg inline  svg-inline-address" aria-hidden="true">
                                                <svg width="10" height="14" viewBox="0 0 10 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M10 5.00244C10 6.31243 9.49622 7.50475 8.67184 8.39624L4.88411 12.8264C4.58473 13.1856 4 12.9739 4 12.5063V9.90242C1.71776 9.43915 0 7.4214 0 5.00244C0 2.24102 2.23858 0.00244141 5 0.00244141C7.76142 0.00244141 10 2.24102 10 5.00244ZM5 2.00244C6.65685 2.00244 8 3.34559 8 5.00244C8 6.6593 6.65685 8.00244 5 8.00244C3.34315 8.00244 2 6.6593 2 5.00244C2 3.34559 3.34315 2.00244 5 2.00244Z"
                                                          fill="#888888">
                                                    </path>
                                                </svg>
                                            </i>
                                        </span>
                                    </div>
                                    <span>ИАТ Спортив Юг</span>
                                    <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
                                            "AREA_FILE_SHOW" => "file",
                                            "PATH" => SITE_DIR."include/header/header_phone_ext2.php"
                                        )
                                    );?>
                                </div>
                            </div>
                        </div>

                        <div class="header-top-btns">
                            <?
                            $blockOptions = array(
                                'PARAM_NAME' => 'HEADER_TOGGLE_BUTTON',
                                'BLOCK_TYPE' => 'BUTTON',
                                'IS_AJAX' => $bAjax,
                                'AJAX_BLOCK' => $ajaxBlock,
                                'VISIBLE' => $bShowButton,
                                'WRAPPER' => 'line-block__item',
                                'MESSAGE' => GetMessage("S_CALLBACK"),
                            );
                            ?>
                            <?=TSolution\Functions::showHeaderBlock($blockOptions);?>

                            <?$visible = ($bShowLang || $bCompare || $bCabinet || $bOrder || $bShowThemeSelector);?>
                            <?$arShowSites = TSolution\Functions::getShowSites();
                            $countSites = count($arShowSites);?>
                            <?$blockOptions = array(
                                'PARAM_NAME' => 'HEADER_RIGHT_BLOCK',
                                'BLOCK_TYPE' => 'HEADER_RIGHT_BLOCK',
                                'IS_AJAX' => $bAjax,
                                'AJAX_BLOCK' => $ajaxBlock,
                                'VISIBLE' => $visible,
                                'WRAPPER' => 'header__top-item',
                                'INNER_WRAPPER' => 'line-block line-block--24',
                                'ITEMS' => [
                                    [ //show site list
                                        'PARAM_NAME' => 'HEADER_TOGGLE_LANG',
                                        'BLOCK_TYPE' => 'LANG',
                                        'VISIBLE' => $bShowLang && $countSites > 1,
                                        'WRAPPER' => 'line-block__item',
                                        'SITE_SELECTOR_NAME' => $siteSelectorName,
                                        'TEMPLATE' => 'main',
                                        'SITE_LIST' => $arShowSites,
                                    ],
                                    [ //show theme selector
                                        'PARAM_NAME' => 'HEADER_TOGGLE_THEME_SELECTOR',
                                        'BLOCK_TYPE' => 'THEME_SELECTOR',
                                        'VISIBLE' => $bShowThemeSelector,
                                        'WRAPPER' => 'line-block__item',
                                    ],
                                    [ //show cabinet
                                        'PARAM_NAME' => 'HEADER_TOGGLE_CABINET',
                                        'BLOCK_TYPE' => 'CABINET',
                                        'VISIBLE' => $bCabinet,
                                        'WRAPPER' => 'line-block__item hide-name-1600',
                                    ],
                                    [ //show compare
                                        'PARAM_NAME' => 'HEADER_TOGGLE_COMPARE',
                                        'BLOCK_TYPE' => 'COMPARE',
                                        'VISIBLE' => $bCompare,
                                        'WRAPPER' => 'line-block__item hide-name-1600',
                                        'MESSAGE' => \Bitrix\Main\Localization\Loc::getMessage('COMPARE_TEXT'),
                                        'CLASS_LINK' => 'light-opacity-hover fill-theme-hover banner-light-icon-fill',
                                        'CLASS_ICON' => 'menu-light-icon-fill ',
                                    ],
                                    [ //show basket
                                        'PARAM_NAME' => 'HEADER_TOGGLE_BASKET',
                                        'BLOCK_TYPE' => 'BASKET',
                                        'VISIBLE' => $bOrder && !TSolution::IsBasketPage() && !TSolution::IsOrderPage(),
                                        'WRAPPER' => 'line-block__item hide-name-1600',
                                        'MESSAGE' => GetMessage('BASKET'),
                                    ]
                                ]
                            );?>
                            <?=TSolution\Functions::showHeaderBlock($blockOptions);?>
                        </div>
                    </div>
                </div>

                <?if($bNarrowHeader):?>
            </div>
        <?endif;?>
        </div>

        <?if($ajaxBlock == "HEADER_TOP_PART" && $bAjax) {
            die();
        }?>


        <?if($ajaxBlock == "HEADER_MAIN_PART" && $bAjax) {
            $APPLICATION->restartBuffer();
        }?>

        <div class="header__main-part  <?=$mainPartClasses?> sliced"  data-ajax-load-block="HEADER_MAIN_PART">

            <?if($bNarrowHeader):?>
            <div class="maxwidth-theme">
                <?endif;?>

                <div class="header__main-inner <?=$innerClasses?>">

                    <div class="header__main-item">
                        <div class="line-block line-block--40">
                            <div class="line-block line-block__item">
                                <?/*
                                $blockOptions = array(
                                    'PARAM_NAME' => 'HEADER_TOGGLE_MEGA_MENU_LEFT',
                                    'BLOCK_TYPE' => 'MEGA_MENU',
                                    'IS_AJAX' => $bAjax,
                                    'AJAX_BLOCK' => $ajaxBlock,
                                    'VISIBLE' => $bShowMegaMenu && !$bRightMegaMenu,
                                    'WRAPPER' => 'line-block__item',
                                );
                                */?>
                                <?//=TSolution\Functions::showHeaderBlock($blockOptions);?>

                                <?//show logo?>
                                <?/*
                                <div class="line-block__item">
                                    <div class="logo no-shrinked <?=$logoClass?>">
                                        <?TSolution::ShowBufferedLogo();?>
                                    </div>
                                </div>
                                */?>
                            </div>

                            <?//check slogan text?>
                            <?
                            $blockOptions = array(
                                'PARAM_NAME' => 'HEADER_TOGGLE_SLOGAN',
                                'BLOCK_TYPE' => 'SLOGAN',
                                'IS_AJAX' => $bAjax,
                                'AJAX_BLOCK' => $ajaxBlock,
                                'VISIBLE' => $bShowSlogan,
                                'WRAPPER' => 'line-block__item hide-1300',
                            );
                            ?>
                            <?=TSolution\Functions::showHeaderBlock($blockOptions);?>
                        </div>
                    </div>

                    <?//show menu?>
                    <div class="header__main-item header__main-item--shinked header-menu header-menu--centered">
                        <nav class="mega-menu sliced">
                            <?$APPLICATION->IncludeComponent("bitrix:main.include", ".default",
                                array(
                                    "COMPONENT_TEMPLATE" => ".default",
                                    "PATH" => SITE_DIR."include/header/menu_new.php",
                                    "AREA_FILE_SHOW" => "file",
                                    "AREA_FILE_SUFFIX" => "",
                                    "AREA_FILE_RECURSIVE" => "Y",
                                    "EDIT_TEMPLATE" => "include_area.php"
                                ),
                                false, array("HIDE_ICONS" => "Y")
                            );?>
                        </nav>
                    </div>

                    <div class="header__main-item">
                        <div class="line-block">
                            <?
                            $blockOptions = array(
                                'PARAM_NAME' => 'HEADER_TOGGLE_EYED',
                                'BLOCK_TYPE' => 'EYED',
                                'IS_AJAX' => $bAjax,
                                'AJAX_BLOCK' => $ajaxBlock,
                                'VISIBLE' => $bShowEyed,
                                'WRAPPER' => 'line-block__item',
                            );
                            ?>
                            <?=TSolution\Functions::showHeaderBlock($blockOptions);?>

                            <?
                            $blockOptions = array(
                                'PARAM_NAME' => 'HEADER_TOGGLE_SEARCH',
                                'BLOCK_TYPE' => 'SEARCH',
                                'IS_AJAX' => $bAjax,
                                'AJAX_BLOCK' => $ajaxBlock,
                                'VISIBLE' => $bShowSearch,
                                'WRAPPER' => 'line-block__item',
                            );
                            ?>
                            <?=TSolution\Functions::showHeaderBlock($blockOptions);?>

                            <?/*
                            $blockOptions = array(
                                'PARAM_NAME' => 'HEADER_TOGGLE_BUTTON',
                                'BLOCK_TYPE' => 'BUTTON',
                                'IS_AJAX' => $bAjax,
                                'AJAX_BLOCK' => $ajaxBlock,
                                'VISIBLE' => $bShowButton,
                                'WRAPPER' => 'line-block__item',
                                'MESSAGE' => GetMessage("S_CALLBACK"),
                            );
                            ?>
                            <?=TSolution\Functions::showHeaderBlock($blockOptions);*/?>

                            <?
                            $blockOptions = array(
                                'PARAM_NAME' => 'HEADER_TOGGLE_MEGA_MENU_RIGHT',
                                'BLOCK_TYPE' => 'MEGA_MENU',
                                'IS_AJAX' => $bAjax,
                                'AJAX_BLOCK' => $ajaxBlock,
                                'VISIBLE' => $bShowMegaMenu && $bRightMegaMenu,
                                'WRAPPER' => 'line-block__item',
                            );
                            ?>
                            <?=TSolution\Functions::showHeaderBlock($blockOptions);?>
                        </div>
                    </div>

                </div>

                <?if($bNarrowHeader):?>
            </div>
        <?endif;?>
        </div>

        <?if($ajaxBlock == "HEADER_MAIN_PART" && $bAjax) {
            die();
        }?>
    </div>
</header>
<?else:?>
<header class="header_1 header <?=($bHeaderFon ? 'header--fon' : '')?> <?=($arRegion ? 'header--with_regions' : '')?> <?=$bNarrowHeader ? 'header--narrow' : ''?> <?=$bMarginHeader ? 'header--offset' : ''?> <?=($bMarginHeader && $whiteBreadcrumbs) ? 'header--white' : '' ;?> <?=TSolution::ShowPageProps('HEADER_COLOR')?>">
	<div class="header__inner">

		<?if($ajaxBlock == "HEADER_TOP_PART" && $bAjax) {
			$APPLICATION->restartBuffer();
		}?>

		<div class="header__top-part <?=$topPartClasses?>" data-ajax-load-block="HEADER_TOP_PART">
			<?if($bNarrowHeader):?>
				<div class="maxwidth-theme">
			<?endif;?>
				
			<div class="header__top-inner justify-content-end">
				<?if($arRegion):?>
					<?//regions?>
					<div class="header__top-item icon-block--with_icon">
						<?
						$arRegionsParams = array();
						if($bAjax) {
							$arRegionsParams['POPUP'] = 'N';
						}
						TSolution::ShowListRegions($arRegionsParams);?>
					</div>
				<?endif;?>

				<?//check address text?>
				<?
				$blockOptions = array(
					'PARAM_NAME' => 'HEADER_TOGGLE_ADDRESS',
					'BLOCK_TYPE' => 'ADDRESS',
					'IS_AJAX' => $bAjax,
					'AJAX_BLOCK' => $ajaxBlock,
					'VISIBLE' => $bShowAddress,
					'WRAPPER' => 'header__top-item hide-1300',
				);
				?>
				<div class="v-hidden"><?=TSolution\Functions::showHeaderBlock($blockOptions);?></div>

				<?//show social?>
				<?
				$blockOptions = array(
					'PARAM_NAME' => 'HEADER_TOGGLE_SOCIAL',
					'BLOCK_TYPE' => 'SOCIAL',
					'IS_AJAX' => $bAjax,
					'AJAX_BLOCK' => $ajaxBlock,
					'VISIBLE' => $bShowSocial,
					'WRAPPER' => 'header__top-item',
				);
				?>
				<?=TSolution\Functions::showHeaderBlock($blockOptions);?>

				<?//show phone and callback?>
				<?
				$arDropdownCallback = explode(",", $arTheme['SHOW_DROPDOWN_CALLBACK']['VALUE']);
				$bDropdownCallback =  in_array('HEADER', $arDropdownCallback) ? 'Y' : 'N';

				$arDropdownEmail = explode(",", $arTheme['SHOW_DROPDOWN_EMAIL']['VALUE']);
				$bDropdownEmail =  in_array('HEADER', $arDropdownEmail) ? 'Y' : 'N';

				$arDropdownSocial = explode(",", $arTheme['SHOW_DROPDOWN_SOCIAL']['VALUE']);
				$bDropdownSocial =  in_array('HEADER', $arDropdownSocial) ? 'Y' : 'N';

				$arDropdownAddress = explode(",", $arTheme['SHOW_DROPDOWN_ADDRESS']['VALUE']);
				$bDropdownAddress =  in_array('HEADER', $arDropdownAddress) ? 'Y' : 'N';

				$arDropdownSchedule = explode(",", $arTheme['SHOW_DROPDOWN_SCHEDULE']['VALUE']);
				$bDropdownSchedule =  in_array('HEADER', $arDropdownSchedule) ? 'Y' : 'N';

					/*$blockOptions = array(
					'PARAM_NAME' => 'HEADER_TOGGLE_PHONE',
					'BLOCK_TYPE' => 'PHONE',
					'IS_AJAX' => $bAjax,
					'AJAX_BLOCK' => $ajaxBlock,
					'VISIBLE' => $bShowPhone && $bPhone,
					'WRAPPER' => 'header__top-item no-shrinked',
					'CALLBACK' => $bShowCallback && $bCallback,
					'MESSAGE' => GetMessage("S_CALLBACK"),
					'DROPDOWN_CALLBACK' =>  $bDropdownCallback,
					'DROPDOWN_EMAIL' => $bDropdownEmail,
					'DROPDOWN_SOCIAL' =>  $bDropdownSocial,
					'DROPDOWN_ADDRESS' =>  $bDropdownAddress,
					'DROPDOWN_SCHEDULE' =>  $bDropdownSchedule,
				);*/
				?>
				<div class="d-flex">
					<div class="d-flex">
						<div class="icon-block--with_icon">
							<span class="icon-block__icon icon-block__icon--top banner-light-icon-fill menu-light-icon-fill">
								<i class="svg inline  svg-inline-address" aria-hidden="true">
									<svg width="10" height="14" viewBox="0 0 10 14" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd"
											d="M10 5.00244C10 6.31243 9.49622 7.50475 8.67184 8.39624L4.88411 12.8264C4.58473 13.1856 4 12.9739 4 12.5063V9.90242C1.71776 9.43915 0 7.4214 0 5.00244C0 2.24102 2.23858 0.00244141 5 0.00244141C7.76142 0.00244141 10 2.24102 10 5.00244ZM5 2.00244C6.65685 2.00244 8 3.34559 8 5.00244C8 6.6593 6.65685 8.00244 5 8.00244C3.34315 8.00244 2 6.6593 2 5.00244C2 3.34559 3.34315 2.00244 5 2.00244Z"
											fill="#888888">
										</path>
									</svg>
								</i>
							</span>
						</div>
						<span>ИАТ Спортив Север</span>
						<?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
								"AREA_FILE_SHOW" => "file",
								"PATH" => SITE_DIR."include/header/header_phone_ext.php"
							)
						);?>
						<?//=TSolution\Functions::showHeaderBlock($blockOptions);?>
					</div>
					<div class="d-flex">
						<div class="icon-block--with_icon">
							<span class="icon-block__icon icon-block__icon--top banner-light-icon-fill menu-light-icon-fill">
								<i class="svg inline  svg-inline-address" aria-hidden="true">
									<svg width="10" height="14" viewBox="0 0 10 14" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd"
											d="M10 5.00244C10 6.31243 9.49622 7.50475 8.67184 8.39624L4.88411 12.8264C4.58473 13.1856 4 12.9739 4 12.5063V9.90242C1.71776 9.43915 0 7.4214 0 5.00244C0 2.24102 2.23858 0.00244141 5 0.00244141C7.76142 0.00244141 10 2.24102 10 5.00244ZM5 2.00244C6.65685 2.00244 8 3.34559 8 5.00244C8 6.6593 6.65685 8.00244 5 8.00244C3.34315 8.00244 2 6.6593 2 5.00244C2 3.34559 3.34315 2.00244 5 2.00244Z"
											fill="#888888">
										</path>
									</svg>
								</i>
							</span>
						</div>
						<span>ИАТ Спортив Юг</span>
						<?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
								"AREA_FILE_SHOW" => "file",
								"PATH" => SITE_DIR."include/header/header_phone_ext2.php"
							)
						);?>
					</div>
				</div>
				<?$visible = ($bShowLang || $bCompare || $bCabinet || $bOrder || $bShowThemeSelector);?>
				<?$arShowSites = TSolution\Functions::getShowSites();
				$countSites = count($arShowSites);?>
				<?$blockOptions = array(
					'PARAM_NAME' => 'HEADER_RIGHT_BLOCK',
					'BLOCK_TYPE' => 'HEADER_RIGHT_BLOCK',
					'IS_AJAX' => $bAjax,
					'AJAX_BLOCK' => $ajaxBlock,
					'VISIBLE' => $visible,
					'WRAPPER' => 'header__top-item',
					'INNER_WRAPPER' => 'line-block line-block--24',
					'ITEMS' => [
						[ //show site list
							'PARAM_NAME' => 'HEADER_TOGGLE_LANG',
							'BLOCK_TYPE' => 'LANG',
							'VISIBLE' => $bShowLang && $countSites > 1,
							'WRAPPER' => 'line-block__item',
							'SITE_SELECTOR_NAME' => $siteSelectorName,
							'TEMPLATE' => 'main',
							'SITE_LIST' => $arShowSites,
						],
						[ //show theme selector
							'PARAM_NAME' => 'HEADER_TOGGLE_THEME_SELECTOR',
							'BLOCK_TYPE' => 'THEME_SELECTOR',
							'VISIBLE' => $bShowThemeSelector,
							'WRAPPER' => 'line-block__item',
						],
						[ //show cabinet
							'PARAM_NAME' => 'HEADER_TOGGLE_CABINET',
							'BLOCK_TYPE' => 'CABINET',
							'VISIBLE' => $bCabinet,
							'WRAPPER' => 'line-block__item hide-name-1600',
						],
						[ //show compare
							'PARAM_NAME' => 'HEADER_TOGGLE_COMPARE',
							'BLOCK_TYPE' => 'COMPARE',
							'VISIBLE' => $bCompare,
							'WRAPPER' => 'line-block__item hide-name-1600',
							'MESSAGE' => \Bitrix\Main\Localization\Loc::getMessage('COMPARE_TEXT'),
							'CLASS_LINK' => 'light-opacity-hover fill-theme-hover banner-light-icon-fill',
							'CLASS_ICON' => 'menu-light-icon-fill ',
						],
						[ //show basket
							'PARAM_NAME' => 'HEADER_TOGGLE_BASKET',
							'BLOCK_TYPE' => 'BASKET',
							'VISIBLE' => $bOrder && !TSolution::IsBasketPage() && !TSolution::IsOrderPage(),
							'WRAPPER' => 'line-block__item hide-name-1600',
							'MESSAGE' => GetMessage('BASKET'),
						]
					]
				);?>
				<?=TSolution\Functions::showHeaderBlock($blockOptions);?>
			</div>

			<?if($bNarrowHeader):?>
				</div>
			<?endif;?>
		</div>

		<?if($ajaxBlock == "HEADER_TOP_PART" && $bAjax) {
			die();
		}?>


		<?if($ajaxBlock == "HEADER_MAIN_PART" && $bAjax) {
			$APPLICATION->restartBuffer();
		}?>

		<div class="header__main-part  <?=$mainPartClasses?> sliced"  data-ajax-load-block="HEADER_MAIN_PART">

			<?if($bNarrowHeader):?>
				<div class="maxwidth-theme">
			<?endif;?>

			<div class="header__main-inner <?=$innerClasses?>">

				<div class="header__main-item">
					<div class="line-block line-block--40">
						<div class="line-block line-block__item">
							<?
							$blockOptions = array(
								'PARAM_NAME' => 'HEADER_TOGGLE_MEGA_MENU_LEFT',
								'BLOCK_TYPE' => 'MEGA_MENU',
								'IS_AJAX' => $bAjax,
								'AJAX_BLOCK' => $ajaxBlock,
								'VISIBLE' => $bShowMegaMenu && !$bRightMegaMenu,
								'WRAPPER' => 'line-block__item',
							);
							?>
							<?=TSolution\Functions::showHeaderBlock($blockOptions);?>

							<?//show logo?>
							<div class="line-block__item">
								<div class="logo no-shrinked <?=$logoClass?>">
									<?TSolution::ShowBufferedLogo();?>
								</div>
							</div>
						</div>

						<?//check slogan text?>
						<?
						$blockOptions = array(
							'PARAM_NAME' => 'HEADER_TOGGLE_SLOGAN',
							'BLOCK_TYPE' => 'SLOGAN',
							'IS_AJAX' => $bAjax,
							'AJAX_BLOCK' => $ajaxBlock,
							'VISIBLE' => $bShowSlogan,
							'WRAPPER' => 'line-block__item hide-1300',
						);
						?>
						<?=TSolution\Functions::showHeaderBlock($blockOptions);?>
					</div>
				</div>

				<?//show menu?>
				<div class="header__main-item header__main-item--shinked header-menu header-menu--centered">
					<nav class="mega-menu sliced">
						<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default",
							array(
								"COMPONENT_TEMPLATE" => ".default",
								"PATH" => SITE_DIR."include/header/menu_new.php",
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "",
								"AREA_FILE_RECURSIVE" => "Y",
								"EDIT_TEMPLATE" => "include_area.php"
							),
							false, array("HIDE_ICONS" => "Y")
						);?>
					</nav>
				</div>
				
				<div class="header__main-item">
					<div class="line-block">
						<?
						$blockOptions = array(
							'PARAM_NAME' => 'HEADER_TOGGLE_EYED',
							'BLOCK_TYPE' => 'EYED',
							'IS_AJAX' => $bAjax,
							'AJAX_BLOCK' => $ajaxBlock,
							'VISIBLE' => $bShowEyed,
							'WRAPPER' => 'line-block__item',
						);
						?>
						<?=TSolution\Functions::showHeaderBlock($blockOptions);?>

						<?
						$blockOptions = array(
							'PARAM_NAME' => 'HEADER_TOGGLE_SEARCH',
							'BLOCK_TYPE' => 'SEARCH',
							'IS_AJAX' => $bAjax,
							'AJAX_BLOCK' => $ajaxBlock,
							'VISIBLE' => $bShowSearch,
							'WRAPPER' => 'line-block__item',
						);
						?>
						<?=TSolution\Functions::showHeaderBlock($blockOptions);?>

						<?
						$blockOptions = array(
							'PARAM_NAME' => 'HEADER_TOGGLE_BUTTON',
							'BLOCK_TYPE' => 'BUTTON',
							'IS_AJAX' => $bAjax,
							'AJAX_BLOCK' => $ajaxBlock,
							'VISIBLE' => $bShowButton,
							'WRAPPER' => 'line-block__item',
							'MESSAGE' => GetMessage("S_CALLBACK"),
						);
						?>
						<?=TSolution\Functions::showHeaderBlock($blockOptions);?>

						<?
						$blockOptions = array(
							'PARAM_NAME' => 'HEADER_TOGGLE_MEGA_MENU_RIGHT',
							'BLOCK_TYPE' => 'MEGA_MENU',
							'IS_AJAX' => $bAjax,
							'AJAX_BLOCK' => $ajaxBlock,
							'VISIBLE' => $bShowMegaMenu && $bRightMegaMenu,
							'WRAPPER' => 'line-block__item',
						);
						?>
						<?=TSolution\Functions::showHeaderBlock($blockOptions);?>
					</div>
				</div>

			</div>

			<?if($bNarrowHeader):?>
				</div>
			<?endif;?>	
		</div>

		<?if($ajaxBlock == "HEADER_MAIN_PART" && $bAjax) {
			die();
		}?>
	</div>
</header>
<?endif?>