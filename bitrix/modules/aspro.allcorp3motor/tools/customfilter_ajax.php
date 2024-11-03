<?
define('STOP_STATISTICS', true);
define('PUBLIC_AJAX_MODE', true);
define('BX_PUBLIC_MODE', 1);

require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_admin_before.php');
@include_once(__DIR__.'/../lib/catalog_cond.php');

use \Bitrix\Main,
	\Bitrix\Main\Loader,
	\Bitrix\Main\Localization\Loc,
	\Bitrix\Iblock,
	\Bitrix\Highloadblock\HighloadBlockTable,
	CAllcorp3Motor as Solution,
	Aspro\Allcorp3Motor\CCatalogCondTree,
	\Aspro\Allcorp3Motor\Property\CustomFilter\CondCtrl;

if(
	!check_bitrix_sessid() ||
	!Loader::includeModule('iblock') ||
	!class_exists('CAllcorp3Motor') || 
	!Loader::IncludeModule(Solution::moduleID)
)

	return;

const ModuleName = 'Allcorp3Motor';

$request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
$request->addFilter(new \Bitrix\Main\Web\PostDecodeFilter);
$action = $request->get('action');
if($action){
	if($action === 'init' || $action === 'save'){
		require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_admin_js.php');

		$eventManager = \Bitrix\Main\EventManager::getInstance();
		$eventManager->unRegisterEventHandler('catalog', 'OnCondCatControlBuildList', 'catalog', 'CCatalogCondCtrlGroup', 'GetControlDescr');
		$eventManager->unRegisterEventHandler('catalog', 'OnCondCatControlBuildList', 'catalog', 'CCatalogCondCtrlIBlockFields', 'GetControlDescr');
		$eventManager->unRegisterEventHandler('catalog', 'OnCondCatControlBuildList', 'catalog', 'CCatalogCondCtrlIBlockProps', 'GetControlDescr');

		$eventManager->addEventHandlerCompatible(
			'catalog',
			'OnCondCatControlBuildList', 
			array(
				'\Aspro\\'.ModuleName.'\CCatalogCondCtrlGroup',
				'GetControlDescr'
			)
		);

		$eventManager->addEventHandlerCompatible(
			'catalog',
			'OnCondCatControlBuildList', 
			array(
				'\Aspro\\'.ModuleName.'\CCatalogCondCtrlIBlockFields',
				'GetControlDescr'
			)
		);

		$eventManager->addEventHandlerCompatible(
			'catalog',
			'OnCondCatControlBuildList', 
			array(
				'\Aspro\\'.ModuleName.'\CCatalogCondCtrlIBlockProps',
				'GetControlDescr'
			)
		);

		$eventManager->addEventHandlerCompatible(
			'catalog',
			'OnCondCatControlBuildList', 
			array(
				'\Aspro\\'.ModuleName.'\Property\CustomFilter\CondCtrl',
				'GetControlDescr'
			)
		);

		$ids = $request->get('ids');
		$success = false;

		if(!empty($ids) && is_array($ids)){
			$condTree = new CCatalogCondTree();
			$success = $condTree->Init(
				AS_COND_MODE_DEFAULT,
				AS_COND_BUILD_CATALOG,
				array(
					'FORM_NAME' => $ids['form'],
					'CONT_ID' => $ids['container'],
					'JS_NAME' => $ids['treeObject']
				)
			);
		}

		$eventManager->RegisterEventHandler('catalog', 'OnCondCatControlBuildList', 'catalog', 'CCatalogCondCtrlGroup', 'GetControlDescr');
		$eventManager->RegisterEventHandler('catalog', 'OnCondCatControlBuildList', 'catalog', 'CCatalogCondCtrlIBlockFields', 'GetControlDescr');
		$eventManager->RegisterEventHandler('catalog', 'OnCondCatControlBuildList', 'catalog', 'CCatalogCondCtrlIBlockProps', 'GetControlDescr');

		if($success){
			if($action === 'init'){
				try{
					$condition = \Bitrix\Main\Web\Json::decode($request->get('condition'));
				}
				catch (Exception $e){
					$condition = array();
				}

				$condTree->Show($condition);
			}
			elseif($action === 'save'){
				$result = $condTree->Parse();

				$GLOBALS['APPLICATION']->RestartBuffer();
				echo \Bitrix\Main\Web\Json::encode($result);
			}
		}

		\CMain::FinalActions();
		die();
	}
	else{
		Loc::loadMessages(__FILE__);

		$arResult = array();

		if(check_bitrix_sessid() && $request->isPost()){
			if($action === 'get_crosssales_iblockfields'){
				$field = $request->get('field');
				$iblockId = (int)$request->get('iblockId');

				if(in_array($field, array('SECTION_ID', 'PARENT_SECTION_ID'))){

					if($field === 'SECTION_ID'){
						$arFields = array(
							'IBLOCK_SECTION_ID',
							'PARENT_IBLOCK_SECTION_ID',
						);
					}
					else{
						$arFields = array(
							$field,
						);
					}

					foreach($arFields as $field){
						$name = (strlen(Loc::getMessage('CUSTOM_FILTER_CONTROL_FIELD_NAME_'.$field)) ? Loc::getMessage('CUSTOM_FILTER_CONTROL_FIELD_NAME_'.$field) : $field);
						$arResult[] = array(
							'value' => $field,
							'label' => Loc::getMessage('CUSTOM_FILTER_CONTROL_CROSSALES_FIELD_PREFIX').' '.$name,
						);
					}
				}
			}
			elseif($action === 'get_crosssales_iblockprops'){
				$propertyId = (int)$request->get('propertyId');
				$iblockId = (int)$request->get('iblockId');
				if($propertyId > 0){
					$property = \Bitrix\Iblock\PropertyTable::getList(
						array(
							'filter' => array('=ID' => $propertyId),
							'select' => array(
								'ID',
								'PROPERTY_TYPE',
								'USER_TYPE',
								'USER_TYPE_SETTINGS'
							),
						)
					)->fetch();
					if($property){
						$arExcludeUserTypes = CondCtrl::getCrossSalesExcludePropertyUserTypes();
						$properties = \Bitrix\Iblock\PropertyTable::getList(
							array(
								'filter' => array(
									'=IBLOCK_ID' => $iblockId,
									'PROPERTY_TYPE' => $property['PROPERTY_TYPE'],
								),
								'select' => array(
									'ID',
									'PROPERTY_TYPE',
									'CODE',
									'NAME',
									'USER_TYPE',
									'USER_TYPE_SETTINGS',
								),
							)
						);
						while($arProperty = $properties->fetch()){
							if(in_array($arProperty['USER_TYPE'], $arExcludeUserTypes)){
								continue;
							}

							$arResult[] = array(
								'value' => $arProperty['ID'],
								'label' => Loc::getMessage('CUSTOM_FILTER_CONTROL_CROSSALES_PROPERTY_PREFIX').' '.$arProperty['NAME'],
							);
						}
					}
				}
			}
			elseif($action === 'get_property_values'){
				$propertyId = (int)$request->get('propertyId');
				if($propertyId > 0){
					$property = Iblock\PropertyTable::getList(array(
						'select' => array('ID', 'PROPERTY_TYPE', 'USER_TYPE', 'USER_TYPE_SETTINGS'),
						'filter' => array('=ID' => $propertyId)
					))->fetch();

					if(!empty($property)){
						$property['USER_TYPE'] = (string)$property['USER_TYPE'];
						if($property['USER_TYPE'] != ''){
							if(!is_array($property['USER_TYPE_SETTINGS'])){
								$property['USER_TYPE_SETTINGS'] = (string)$property['USER_TYPE_SETTINGS'];
								if(CheckSerializedData($property['USER_TYPE_SETTINGS']))
									$property['USER_TYPE_SETTINGS'] = unserialize($property['USER_TYPE_SETTINGS']);
								if(!is_array($property['USER_TYPE_SETTINGS']))
									$property['USER_TYPE_SETTINGS'] = array();
							}
						}
						
						if($property['PROPERTY_TYPE'] === Iblock\PropertyTable::TYPE_STRING && $property['USER_TYPE'] === 'directory'){
							if(Loader::includeModule('highloadblock') && !empty($property['USER_TYPE_SETTINGS']['TABLE_NAME'])){
								$hlBlock = HighloadBlockTable::getList(array(
									'filter' => array('=TABLE_NAME' => $property['USER_TYPE_SETTINGS']['TABLE_NAME'])
								))->fetch();
								if(!empty($hlBlock)){
									$entity = HighloadBlockTable::compileEntity($hlBlock);

									$fieldsList = $entity->getFields();
									$sortExist = isset($oneProperty['USER_TYPE_SETTINGS']['FIELDS_MAP']['UF_SORT']);
									$directorySelect = array('ID', 'UF_NAME', 'UF_XML_ID');
									$directoryOrder = array();
									if($sortExist){
										$directorySelect[] = 'UF_SORT';
										$directoryOrder['UF_SORT'] = 'ASC';
									}
									$directoryOrder['UF_NAME'] = 'ASC';

									$entityDataClass = $entity->getDataClass();
									$iterator = $entityDataClass::getList(array(
										'select' => $directorySelect,
										'order' => $directoryOrder
									));
									while($row = $iterator->fetch()){
										$arResult[] = array(
											'value' => $row['UF_XML_ID'],
											'label' => $row['UF_NAME']
										);
									}
									unset($row, $iterator);
								}
							}
						}
						elseif($property['PROPERTY_TYPE'] === Iblock\PropertyTable::TYPE_LIST){
							$iterator = Iblock\PropertyEnumerationTable::getList(array(
								'select' => array('*'),
								'filter' => array('=PROPERTY_ID' => $propertyId),
								'order' => array('DEF' => 'DESC', 'SORT' => 'ASC')
							));
							while($row = $iterator->fetch()){
								$arResult[] = array(
									'value' => $row['ID'],
									'label' => $row['VALUE']
								);
							}
							unset($row, $iterator);
						}
					}
					unset($property);
				}
			}
		}

		$GLOBALS['APPLICATION']->RestartBuffer();
		header('Content-Type: application/json');
		echo Bitrix\Main\Web\Json::encode($arResult);
		die();
	}
}
