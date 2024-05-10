<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}

use \Bitrix\Main\Localization\Loc;

$this->setFrameMode(true);

Loc::loadMessages(__FILE__);

$arItemFilter = TSolution::GetIBlockAllElementsFilter($arParams);
$itemsCnt = TSolution\Cache::CIblockElement_GetList(['CACHE' => ['TAG' => TSolution\Cache::GetIBlockCacheTag($arParams['IBLOCK_ID'])]], $arItemFilter, []);
?>

<?php include('include_top_block.php'); ?>

<? if (!$itemsCnt): ?>
	<div class="alert alert-warning"><?= Loc::getMessage('REVIEWS__SECTION_EMPTY') ?></div>
<? else : ?>
	<?TSolution::CheckComponentTemplatePageBlocksParams($arParams, __DIR__);?>
	<?// section elements?>
	<?@include_once('page_blocks/'.$arParams["SECTION_ELEMENTS_TYPE_VIEW"].'.php');?>
<? endif ?>

