<?
namespace Aspro\Allcorp3Motor\Controller;

use \Aspro\Allcorp3Motor\Solution\Form as SolutionForm,
    CAllcorp3Motor as Solution;

class Form extends \Bitrix\Main\Engine\Controller {
    
    public function configureActions(){
        return [
			'getRecordTime' => [
				'prefilters' => [],
			],
            'checkFreeTime' => [
				'prefilters' => [],
			],
        ];
    }

    public function getRecordTimeAction($CONTACT_ID, $FORM_CODE, $DATE, $SERVICE_ID) {
        $FORM_ID = Solution::getFormID($FORM_CODE);
        return SolutionForm::getRecordTime(SolutionForm::getContacts([$CONTACT_ID]), $FORM_ID, $DATE, $SERVICE_ID);
    }  

    public function checkFreeTimeAction($SERVICE_ID, $CONTACT_ID, $DATE, $RECORD_TIME, $FORM_CODE) {

        $FORM_ID = Solution::getFormID($FORM_CODE);

        if(!SolutionForm::checkFreeTime($SERVICE_ID, $CONTACT_ID, $DATE, $RECORD_TIME, $FORM_ID)) {
            echo 'false';
            die();
        } else {
            echo 'true';
            die();
        }
    }  
}