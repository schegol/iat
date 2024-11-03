<?
$moduleName = 'Allcorp3Motor';
CModule::AddAutoloadClasses(
	"aspro.allcorp3motor",
	array(
		"allcorp3motor" => "install/index.php",
		"C{$moduleName}" => "classes/general/C{$moduleName}.php",
		"C{$moduleName}Const" => "classes/general/C{$moduleName}Const.php",
		"C{$moduleName}Cache" => "classes/general/C{$moduleName}Cache.php",
		"C{$moduleName}Tools" => "classes/general/C{$moduleName}Tools.php",
		"C{$moduleName}Events" => "classes/general/C{$moduleName}Events.php",
		"C{$moduleName}Condition" => "classes/general/C{$moduleName}Condition.php",
		"CInstargram{$moduleName}" => "classes/general/CInstargram{$moduleName}.php",
		"CVK{$moduleName}" => "classes/general/CVK{$moduleName}.php",
		"C{$moduleName}Regionality" => "classes/general/C{$moduleName}Regionality.php",
		"Aspro\\{$moduleName}\Functions\CAsproAllcorp3" => "lib/functions/CAsproAllcorp3.php",
		"Aspro\\{$moduleName}\Functions\ThematicParameters" => "lib/functions/ThematicParameters.php",
		"Aspro\\{$moduleName}\Functions\CAsproAllcorp3Admin" => "lib/functions/CAsproAllcorp3Admin.php",
		"Aspro\\{$moduleName}\Functions\CAsproAllcorp3Switcher" => "lib/functions/CAsproAllcorp3Switcher.php",
		"Aspro\\{$moduleName}\Functions\CAsproAllcorp3CRM" => "lib/functions/CAsproAllcorp3CRM.php",
		"Aspro\Functions\CAsproAllcorp3MotorCustom" => "lib/functions/CAsproAllcorp3MotorCustom.php",
		"Aspro\\{$moduleName}\Functions\CAsproAllcorp3ReCaptcha" => "lib/functions/CAsproAllcorp3ReCaptcha.php",
		"Aspro\\{$moduleName}\GS" => "lib/gs.php",
		"Aspro\\{$moduleName}\CrossSales" => "lib/crosssales.php",
		"Aspro\\{$moduleName}\MarketingPopup" => "lib/marketingpopup.php",
		"Aspro\\{$moduleName}\Eyed" => "lib/eyed.php",
		"Aspro\\{$moduleName}\Property\ListUsersGroups" => "lib/property/listusersgroups.php",
		"Aspro\\{$moduleName}\Property\ListWebForms" => "lib/property/listwebforms.php",
		"Aspro\\{$moduleName}\Property\CustomFilter" => "lib/property/customfilter.php",
		"Aspro\\{$moduleName}\Property\CustomFilter\CondCtrl" => "lib/property/customfilter/condctrl.php",
		"Aspro\\{$moduleName}\CustomFilter\CCatalogCondCtrlGroup" => "lib/property/customfilter/condctrl.php",
		"Aspro\\{$moduleName}\Property\ConditionType" => "lib/property/conditiontype.php",
		"Aspro\\{$moduleName}\Property\ModalConditions" => "lib/property/modalconditions.php",
		"Aspro\\{$moduleName}\Property\ModalConditions\CondCtrl" => "lib/property/modalconditions/condctrl.php",
		"Aspro\\{$moduleName}\Property\ModalConditions\CCatalogCondCtrlGroup" => "lib/property/modalconditions/condctrl.php",
		"Aspro\\{$moduleName}\Property\TariffItem" => "lib/property/tariffitem.php",
		"Aspro\\{$moduleName}\Notice" => "lib/notice.php",
		"Aspro\\{$moduleName}\Functions\ExtComponentParameter" => "lib/functions/ExtComponentParameter.php",
		"Aspro\\{$moduleName}\Functions\CSKU" => "lib/functions/CSKU.php",
		"Aspro\\{$moduleName}\Functions\CSKUTemplate" => "lib/functions/CSKUTemplate.php",
		"Aspro\\{$moduleName}\Functions\Extensions" => "lib/functions/Extensions.php",
		"Aspro\\{$moduleName}\Banner\Transparency" => "lib/banner/transparency.php",
		"Aspro\\{$moduleName}\CRM\Acloud\Connection" => "lib/crm/acloud/connection.php",
		"Aspro\\{$moduleName}\CRM\Flowlu\Connection" => "lib/crm/flowlu/connection.php",
		"Aspro\\{$moduleName}\CRM\Amocrm\Connection" => "lib/crm/amocrm/connection.php",
		"Aspro\\{$moduleName}\CRM\Base\Connection" => "lib/crm/base/connection.php",
		"Aspro\\{$moduleName}\CRM\Type" => "lib/crm/type.php",
		"Aspro\\{$moduleName}\CRM\Lead" => "lib/crm/lead.php",
		"Aspro\\{$moduleName}\CRM\Helper" => "lib/crm/helper.php",
		"Aspro\\{$moduleName}\Video\Iframe" => "lib/video/iframe.php",
	)
);

if(!CJSCore::IsExtRegistered("aspro_core_condtree")){
	CJSCore::RegisterExt(
		"aspro_core_condtree",
		array(
			"js" => "/bitrix/js/aspro.allcorp3motor/core_tree.js",
			"css" => "/bitrix/css/aspro.allcorp3motor/catalog_cond.css",
			"lang" => "/bitrix/modules/aspro.allcorp3motor/lang/".LANGUAGE_ID."/lib/js_core_tree.php",
			"rel" => array("core", "date", "window")
		)
	);
}