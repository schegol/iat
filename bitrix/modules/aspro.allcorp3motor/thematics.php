<?php
/**
 * Aspro:Max module thematics
 * @copyright 2021 Aspro
 */

IncludeModuleLangFile(__FILE__);
$moduleClass = 'CAllcorp3Motor';

// initialize module parametrs list and default values
$moduleClass::$arThematicsList = array(
	'UNIVERSAL' => array(
		'CODE' => 'UNIVERSAL',
		'TITLE' => GetMessage('THEMATIC_UNIVERSAL_TITLE'),
		'DESCRIPTION' => GetMessage('THEMATIC_UNIVERSAL_DESCRIPTION'),
		'PREVIEW_PICTURE' => '/bitrix/images/aspro.allcorp3motor/themes/thematic_preview_uni.png',
		'URL' => 'https://allcorp3motor-demo.ru/',
		'OPTIONS' => array(
		),
		'PRESETS' => array(
			'DEFAULT' => 894,
			'LIST' => array(
				0 => 894,
				1 => 855,
				2 => 265,
			),
		),
	),
);