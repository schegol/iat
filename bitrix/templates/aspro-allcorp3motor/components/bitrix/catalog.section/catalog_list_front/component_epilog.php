<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $templateData */
/** @var @global CMain $APPLICATION */
use Bitrix\Main\Loader;

?>
<? if( $arParams['DISPLAY_COMPARE'] || $arParams['ORDER_VIEW']): ?>
	<? TSolution\Extensions::init('item_action'); ?>
<? endif; ?>