<?
CModule::IncludeModule("main");
CModule::IncludeModule("iblock");

set_time_limit(0);

if (!function_exists("ClearAllSitesCacheComponents")) {
	function ClearAllSitesCacheComponents($arComponentsNames)
	{
		if ($arComponentsNames && is_array($arComponentsNames)) {
			global $CACHE_MANAGER;
			$arSites = array();
			$rsSites = CSite::GetList($by = "sort", $order = "desc", array("ACTIVE" => "Y"));
			while ($arSite = $rsSites->Fetch()) {
				$arSites[] = $arSite;
			}
			foreach ($arComponentsNames as $componentName) {
				foreach ($arSites as $arSite) {
					CBitrixComponent::clearComponentCache($componentName, $arSite["ID"]);
				}
			}
		}
	}
}

if (!function_exists("ClearAllSitesCacheDirs")) {
	function ClearAllSitesCacheDirs($arDirs)
	{
		if ($arDirs && is_array($arDirs)) {
			foreach ($arDirs as $dir) {
				$obCache = new CPHPCache();
				$obCache->CleanDir("", $dir);
			}
		}
	}
}

if (!function_exists("GetIBlocks")) {
	function GetIBlocks()
	{
		$arRes = array();
		$dbRes = CIBlock::GetList(array(), array("ACTIVE" => "Y"));
		while ($item = $dbRes->Fetch()) {
			$dbIBlockSites = CIBlock::GetSite($item['ID']);
			while($arIBlockSite = $dbIBlockSites->Fetch()){
				$arRes[$arIBlockSite["SITE_ID"]][$item["IBLOCK_TYPE_ID"]][$item["CODE"]][] = $item["ID"];
			}
		}

		return $arRes;
	}
}

if (!function_exists("GetSites")) {
	function GetSites()
	{
		$arRes = array();
		$dbRes = CSite::GetList($by = "sort", $order = "desc", array("ACTIVE" => "Y"));
		while ($item = $dbRes->Fetch()) {
			$arRes[$item["LID"]] = $item;
		}
		return $arRes;
	}
}

if (!function_exists("GetCurVersion")) {
	function GetCurVersion($versionFile)
	{
		$ver = false;
		if (file_exists($versionFile)) {
			$arModuleVersion = array();
			include($versionFile);
			$ver = trim($arModuleVersion["VERSION"]);
		}
		return $ver;
	}
}

if (!function_exists("CreateBakFile")) {
	function CreateBakFile($file, $curVersion = CURRENT_VERSION)
	{
		$file = trim($file);
		if (file_exists($file)) {
			$arPath = pathinfo($file);
			$backFile = $arPath['dirname'] . '/_' . $arPath['basename'] . '.back' . $curVersion;
			if (!file_exists($backFile)) {
				@copy($file, $backFile);
			}
		}
	}
}

if (!function_exists("RemoveFileFromModuleWizard")) {
	function RemoveFileFromModuleWizard($file)
	{
		@unlink($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/' . MODULE_NAME . '/install/wizards/' . PARTNER_NAME . '/' . MODULE_NAME_SHORT . $file);
		@unlink($_SERVER['DOCUMENT_ROOT'] . '/bitrix/wizards/' . PARTNER_NAME . '/' . MODULE_NAME_SHORT . $file);
	}
}

if (!function_exists("RemoveFileFromTemplate")) {
	function RemoveFileFromTemplate($file, $bModule = true)
	{
		@unlink($_SERVER['DOCUMENT_ROOT'] . TEMPLATE_PATH . $file);
		if ($bModule) {
			RemoveFileFromModuleWizard('/site/templates/' . TEMPLATE_NAME . $file);
		}
	}
}

if (!function_exists('SearchFilesInPublicRecursive')) {
	function SearchFilesInPublicRecursive($dir, $pattern, $flags = 0)
	{
		$arDirExclude = array('bitrix', 'upload');
		$pattern = str_replace('//', '/', str_replace('//', '/', $dir . '/') . $pattern);
		$files = glob($pattern, $flags);
		foreach (glob(dirname($pattern) . '/*', GLOB_ONLYDIR | GLOB_NOSORT) as $dir) {
			if (!in_array(basename($dir), $arDirExclude)) {
				$files = array_merge($files, SearchFilesInPublicRecursive($dir, basename($pattern), $flags));
			}
		}
		return $files;
	}
}

if(!function_exists('RemoveOldBakFiles')){
	function RemoveOldBakFiles(){
		$arDirs = $arFiles = array();

		foreach(
			$arExclude = array(
				'bitrix',
				'local',
				'upload',
				'webp-copy',
				'cgi',
				'cgi-bin',
			) as $dir){
			$arDirExclude[] = $_SERVER['DOCUMENT_ROOT'].'/'.$dir;
		}

		// public
		if($arSites = GetSites()){
			foreach($arSites as $siteID => $arSite){
				$arSite['DIR'] = str_replace('//', '/', '/'.$arSite['DIR']);
				if(!strlen($arSite['DOC_ROOT'])){
					$arSite['DOC_ROOT'] = $_SERVER['DOCUMENT_ROOT'];
				}
				$arSite['DOC_ROOT'] = str_replace('//', '/', $arSite['DOC_ROOT'].'/');
				$siteDir = str_replace('//', '/', $arSite['DOC_ROOT'].$arSite['DIR']);

				if($arPublicDirs = glob($siteDir.'*', GLOB_ONLYDIR|GLOB_NOSORT)){
					foreach($arPublicDirs as $dir){
						foreach($arExclude as $exclude){
							if(strpos($dir, '/'.$exclude) !== false){
								continue 2;
							}
						}

						$arDirs[] = str_replace('//', '/', $dir.'/');
					}
				}
			}

			$i = 0;
			while($arDirs && ++$i < 10000){
				$dir = array_pop($arDirs);
				$arFiles = array_merge($arFiles, (array)glob($dir.'_*.back*', GLOB_NOSORT));
				foreach((array)glob($dir.'*', GLOB_ONLYDIR|GLOB_NOSORT) as $dir){
					if(
						strlen($dir)
					){
						foreach($arExclude as $exclude){
							if(strpos($dir, '/'.$exclude) !== false){
								continue 2;
							}
						}

						$arDirs[] = str_replace('//', '/', $dir.'/');
					}
				}
			}
		}

		$arDirs = array();

		// aspro components
		if(file_exists($_SERVER['DOCUMENT_ROOT'].'/bitrix/components/')){
			if($arComponents = glob($_SERVER['DOCUMENT_ROOT'].'/bitrix/components/'.PARTNER_NAME.'*', 0)){
				foreach($arComponents as $componentPath){
					$arDirs[] = str_replace('//', '/', $componentPath.'/');
				}
			}
		}
		if(file_exists($_SERVER['DOCUMENT_ROOT'].'/local/components/')){
			if($arComponents = glob($_SERVER['DOCUMENT_ROOT'].'/local/components/'.PARTNER_NAME.'*', 0)){
				foreach($arComponents as $componentPath){
					$arDirs[] = str_replace('//', '/', $componentPath.'/');
				}
			}
		}

		// aspro and other templates
		if(file_exists($_SERVER['DOCUMENT_ROOT'].'/bitrix/templates/')){
			if($arTemplates = glob($_SERVER['DOCUMENT_ROOT'].'/bitrix/templates/*', 0)){
				foreach($arTemplates as $templatePath){
					$arDirs[] = str_replace('//', '/', $templatePath.'/');
				}
			}
		}
		if(file_exists($_SERVER['DOCUMENT_ROOT'].'/local/templates/')){
			if($arTemplates = glob($_SERVER['DOCUMENT_ROOT'].'/local/templates/*', 0)){
				foreach($arTemplates as $templatePath){
					$arDirs[] = str_replace('//', '/', $templatePath.'/');
				}
			}
		}

		// aspro modules
		if(file_exists($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/')){
			if($arModules = glob($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.PARTNER_NAME.'*', 0)){
				foreach($arModules as $modulePath){
					$arDirs[] = str_replace('//', '/', $modulePath.'/');
				}
			}
		}
		if(file_exists($_SERVER['DOCUMENT_ROOT'].'/local/modules/')){
			if($arModules = glob($_SERVER['DOCUMENT_ROOT'].'/local/modules/'.PARTNER_NAME.'*', 0)){
				foreach($arModules as $modulePath){
					$arDirs[] = str_replace('//', '/', $modulePath.'/');
				}
			}
		}

		// aspro js
		if(file_exists($_SERVER['DOCUMENT_ROOT'].'/bitrix/js/')){
			if($arJs = glob($_SERVER['DOCUMENT_ROOT'].'/bitrix/js/'.MODULE_NAME.'*', 0)){
				foreach($arJs as $jsPath){
					$arDirs[] = str_replace('//', '/', $jsPath.'/');
				}
			}
		}

		// aspro css
		if(file_exists($_SERVER['DOCUMENT_ROOT'].'/bitrix/css/')){
			if($arCss = glob($_SERVER['DOCUMENT_ROOT'].'/bitrix/css/'.MODULE_NAME.'*', 0)){
				foreach($arCss as $cssPath){
					$arDirs[] = str_replace('//', '/', $cssPath.'/');
				}
			}
		}

		// aspro wizards
		if(file_exists($_SERVER['DOCUMENT_ROOT'].'/bitrix/wizards/')){
			if($arWizards = glob($_SERVER['DOCUMENT_ROOT'].'/bitrix/wizards/'.PARTNER_NAME.'*', 0)){
				foreach($arWizards as $wizardPath){
					$arDirs[] = str_replace('//', '/', $wizardPath.'/');
				}
			}
		}
		if(file_exists($_SERVER['DOCUMENT_ROOT'].'/local/wizards/')){
			if($arWizards = glob($_SERVER['DOCUMENT_ROOT'].'/local/wizards/'.PARTNER_NAME.'*', 0)){
				foreach($arWizards as $wizardPath){
					$arDirs[] = str_replace('//', '/', $wizardPath.'/');
				}
			}
		}

		$i = 0;
		while($arDirs && ++$i < 10000){
			$popdir = array_pop($arDirs);
			$arFiles = array_merge($arFiles, (array)glob($popdir.'_*.back*', GLOB_NOSORT));
			foreach((array)glob($popdir.'{,.}*', GLOB_ONLYDIR|GLOB_NOSORT|GLOB_BRACE) as $dir){
				if(
					strlen($dir) &&
					!in_array($dir, array($popdir.'.', $popdir.'..')) &&
					!in_array($dir, $arDirExclude) &&
					(
						strpos($dir, PARTNER_NAME) !== false ||
						strpos($dir, '/templates/') !== false
					)
				){
					$arDirs[] = str_replace('//', '/', $dir.'/');
				}
			}
		}

		if($arFiles){
			foreach($arFiles as $file){
				if(file_exists($file) && !is_dir($file)){
					if(time() - filemtime($file) >= 1209600){ // 14 days
						@unlink($file);
					}
				}
			}
		}
	}
}

if (!function_exists("GetDBcharset")) {
	function GetDBcharset()
	{
		$sql = 'SHOW VARIABLES LIKE "character_set_database";';
		if (method_exists('\Bitrix\Main\Application', 'getConnection')) {
			$db = \Bitrix\Main\Application::getConnection();
			$arResult = $db->query($sql)->fetch();
			return $arResult['Value'];
		} elseif (defined("BX_USE_MYSQLI") && BX_USE_MYSQLI == true) {
			if ($result = @mysqli_query($sql)) {
				$arResult = mysql_fetch_row($result);
				return $arResult[1];
			}
		} elseif ($result = @mysql_query($sql)) {
			$arResult = mysql_fetch_row($result);
			return $arResult[1];
		}
		return false;
	}
}

if (!function_exists("GetMes")) {
	function GetMes($str)
	{
		static $isUTF8;
		if ($isUTF8 === NULL) {
			$isUTF8 = GetDBcharset() == 'utf8';
		}
		return ($isUTF8 ? iconv('CP1251', 'UTF-8', $str) : $str);
	}
}

if (!function_exists("UpdaterLog")) {
	function UpdaterLog($str)
	{
		static $fLOG;
		if ($bFirst = !$fLOG) {
			$fLOG = $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/' . MODULE_NAME . '/updaterlog.txt';
		}
		if (is_array($str)) {
			$str = print_r($str, 1);
		}
		@file_put_contents($fLOG, ($bFirst ? PHP_EOL : '') . date("d.m.Y H:i:s", time()) . ' ' . $str . PHP_EOL, FILE_APPEND);
	}
}

if (!function_exists("InitComposite")) {
	function InitComposite($arSites)
	{
		if (class_exists("CHTMLPagesCache")) {
			if (method_exists("CHTMLPagesCache", "GetOptions")) {
				if ($arHTMLCacheOptions = CHTMLPagesCache::GetOptions()) {
					if ($arHTMLCacheOptions["COMPOSITE"] !== "Y") {
						$arDomains = array();
						if ($arSites) {
							foreach ($arSites as $arSite) {
								if (strlen($serverName = trim($arSite["SERVER_NAME"], " \t\n\r"))) {
									$arDomains[$serverName] = $serverName;
								}
								if (strlen($arSite["DOMAINS"])) {
									foreach (explode("\n", $arSite["DOMAINS"]) as $domain) {
										if (strlen($domain = trim($domain, " \t\n\r"))) {
											$arDomains[$domain] = $domain;
										}
									}
								}
							}
						}

						if (!$arDomains) {
							$arDomains[$_SERVER["SERVER_NAME"]] = $_SERVER["SERVER_NAME"];
						}

						if (!$arHTMLCacheOptions["GROUPS"]) {
							$arHTMLCacheOptions["GROUPS"] = array();
						}
						$rsGroups = CGroup::GetList(($by = "id"), ($order = "asc"), array());
						while ($arGroup = $rsGroups->Fetch()) {
							if ($arGroup["ID"] > 2) {
								if (in_array($arGroup["STRING_ID"], array("RATING_VOTE_AUTHORITY", "RATING_VOTE")) && !in_array($arGroup["ID"], $arHTMLCacheOptions["GROUPS"])) {
									$arHTMLCacheOptions["GROUPS"][] = $arGroup["ID"];
								}
							}
						}

						$arHTMLCacheOptions["COMPOSITE"] = "Y";
						$arHTMLCacheOptions["DOMAINS"] = array_merge((array)$arHTMLCacheOptions["DOMAINS"], (array)$arDomains);
						CHTMLPagesCache::SetEnabled(true);
						CHTMLPagesCache::SetOptions($arHTMLCacheOptions);
						bx_accelerator_reset();
					}
				}
			}
		}
	}
}

if (!function_exists('GetCompositeOptions')) {
	function GetCompositeOptions()
	{
		if (class_exists('CHTMLPagesCache')) {
			if (method_exists('CHTMLPagesCache', 'GetOptions')) {
				return CHTMLPagesCache::GetOptions();
			}
		}

		return array();
	}
}

if (!function_exists('IsCompositeEnabled')) {
	function IsCompositeEnabled()
	{
		if (class_exists('CHTMLPagesCache')) {
			if ($arHTMLCacheOptions = GetCompositeOptions()) {
				if (method_exists('CHTMLPagesCache', 'isOn')) {
					if (CHTMLPagesCache::isOn()) {
						if (isset($arHTMLCacheOptions['AUTO_COMPOSITE']) && $arHTMLCacheOptions['AUTO_COMPOSITE'] === 'Y') {
							return 'AUTO_COMPOSITE';
						} else {
							return 'COMPOSITE';
						}
					}
				} else {
					if ($arHTMLCacheOptions['COMPOSITE'] === 'Y') {
						return 'COMPOSITE';
					}
				}
			}
		}

		return false;
	}
}

if (!function_exists('EnableComposite')) {
	function EnableComposite($auto = false, $arHTMLCacheOptions = array())
	{
		if (class_exists('CHTMLPagesCache')) {
			if (method_exists('CHTMLPagesCache', 'GetOptions')) {
				$arHTMLCacheOptions = is_array($arHTMLCacheOptions) ? $arHTMLCacheOptions : array();
				$arHTMLCacheOptions = array_merge(CHTMLPagesCache::GetOptions(), $arHTMLCacheOptions);

				$arHTMLCacheOptions['COMPOSITE'] = $arHTMLCacheOptions['COMPOSITE'] ?? 'Y';
				$arHTMLCacheOptions['AUTO_UPDATE'] = $arHTMLCacheOptions['AUTO_UPDATE'] ?? 'Y'; // standart mode
				$arHTMLCacheOptions['AUTO_UPDATE_TTL'] = $arHTMLCacheOptions['AUTO_UPDATE_TTL'] ?? '0'; // no ttl delay
				$arHTMLCacheOptions['AUTO_COMPOSITE'] = ($auto ? 'Y' : 'N'); // auto composite mode

				CHTMLPagesCache::SetEnabled(true);
				CHTMLPagesCache::SetOptions($arHTMLCacheOptions);
				bx_accelerator_reset();
			}
		}
	}
}

if (!function_exists('AddNewProps')) {
	function AddNewProps($arPropertiesIBlocks = [], $lang = 'ru')
	{
		if (!count($arPropertiesIBlocks)) return;

		foreach ($arPropertiesIBlocks as $IBlockID => $arProperties) {
			$arUserOptionsForm = CUserOptions::GetOption("form", "form_element_" . $IBlockID, []);
			$strOptionTab = '';

			foreach ($arProperties as $key => $property) {
				if ($property['PROPS_DELIMETER']) {
					$strOptionTab .= ',--editAspro_csection_'.$property['ID'].'--#--'.$property['LANG'][$lang].'--';
				} else {
					$dbProperty = CIBlockProperty::GetList([], ["IBLOCK_ID" => $IBlockID, "CODE" => $property["CODE"]]);
					
					if (!$dbProperty->SelectedRowsCount()) {
						$arFields = [
							"NAME" => $property["LANG"][$lang],
							"ACTIVE" => $property["ACTIVE"],
							"SORT" => $property["SORT"],
							"CODE" => $property["CODE"],
							"PROPERTY_TYPE" => $property["PROPERTY_TYPE"],
							"LIST_TYPE" => $property["LIST_TYPE"],
							"MULTIPLE" => $property["MULTIPLE"],
							"IBLOCK_ID" => $IBlockID,
						];
						
						if ($property['PROPERTY_TYPE'] === 'E' && $property['LINK_IBLOCK_ID'])
							$arFields['LINK_IBLOCK_ID'] = $property['LINK_IBLOCK_ID'];
	
						$ibp = new CIBlockProperty;
						$propID = $ibp->Add($arFields);
	
						if ($propID) {
							$strOptionTab .= ',--PROPERTY_' . $propID . '--#--' . $property["LANG"][$lang] . '--';
						}
					} else {
						$propID = $dbProperty->Fetch()['ID'];
					}
	
					if (
						$propID &&
						$property["ENUMS"]
					) {
						$arEnumValue = [];
						$ibpenum = new CIBlockPropertyEnum;
						$propertyEnums = CIBlockPropertyEnum::GetList([], ["IBLOCK_ID" => $IBlockID, "CODE" => $property["CODE"]]);
						if ($propertyEnums->SelectedRowsCount()) {
							while ($enumFields = $propertyEnums->GetNext()) {
								$arEnumValue[] = $enumFields["VALUE"];
							}
							
							foreach ($property["ENUMS"][$lang] as $enumsValue) {
								if (!in_array($enumsValue, $arEnumValue)) {
									$ibpenum->Add([
										"PROPERTY_ID" => $propID, 
										"VALUE" => $enumsValue,
									]);
								}
							}
						} else {
							foreach ($property["ENUMS"][$lang] as $enumsValue) {
								$ibpenum->Add([
									"PROPERTY_ID" => $propID, 
									"VALUE" => $enumsValue
								]);
							}
						}
					}
				}
			}

			if ($strOptionTab && isset($arUserOptionsForm['tabs'])) {
				$matches = [];
				$subject = "/(--Aspro--.*?);/s";
				preg_match($subject, $arUserOptionsForm["tabs"], $matches);

				if ($matches[0]) {
					$patternNewProperty = $matches[1] . $strOptionTab;
					$arUserOptionsForm["tabs"] = str_replace($matches[1], $patternNewProperty, $arUserOptionsForm["tabs"]);
				} else {
					$matches = [];
					preg_match_all('/\bedit(\d)\b/', $arUserOptionsForm["tabs"], $matches, false);
					sort($matches[1]);
					$editNumber = array_pop($matches[1]);

					$addPropForm = 'edit' . ($editNumber + 1) . '--#--Aspro--' . $strOptionTab . ';--';
					$arUserOptionsForm["tabs"] .= $addPropForm;
				}

				$arUserOptionsForm = CUserOptions::SetOption("form", "form_element_" . $IBlockID, $arUserOptionsForm);
			}
		}
	}
}
