<?
use \Aspro\Allcorp3Motor\Solution\Form;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arResult['QUESTIONS']['CONTACTS'] = Form::modifierQuestionsContacts($arResult);
$arResult['QUESTIONS']['RECORD_TIME']['HTML_CODE'] = Form::modifierQuestionsRecordTime($arResult);

$arResult['QUESTIONS']['SERVICE_ID']['HTML_CODE'] = '<input type="hidden" data-sid="SERVICE_ID" name="form_hidden_'.$arResult["QUESTIONS"]['SERVICE_ID']['STRUCTURE'][0]['ID'].'" value="'.$_REQUEST['item-id'].'">';
$arResult['QUESTIONS']['CONTACT_ID']['HTML_CODE'] = '<input type="hidden" data-sid="CONTACT_ID" name="form_hidden_'.$arResult["QUESTIONS"]['CONTACT_ID']['STRUCTURE'][0]['ID'].'"  value="'.Form::getContactsLink()[0]['ID'].'">';

$arResult['QUESTIONS']['DATE']['HTML_CODE'] = str_replace('value=""', 'value=' . FormatDateFromDB('','SHORT'), $arResult['QUESTIONS']['DATE']['HTML_CODE']);