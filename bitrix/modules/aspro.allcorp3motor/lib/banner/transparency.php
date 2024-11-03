<?
namespace Aspro\Allcorp3Motor\Banner;
use CAllcorp3Motor as Solution,
\Aspro\Allcorp3Motor\Functions\Extensions;

class Transparency {
    public static function setHeaderClasses($templateData = []) {
        global $APPLICATION, $SECTION_BNR_CONTENT, $bodyDopClass;

        $arProperties = [];
        $bodyClassList = '';
        
        if ($templateData['SECTION_BNR_CONTENT']){
            $bSectionBannerUnderHeader = $templateData['SECTION_BNR_UNDER_HEADER'] === 'YES';

            $SECTION_BNR_CONTENT = true;
            $bodyClassList .= ' has-long-banner';
            if ($bSectionBannerUnderHeader) {
                $bodyClassList .= ' header_opacity front_page';
            }

            $arOptions = [
                'PREFER_COLOR' => $templateData['SECTION_BNR_COLOR'] ?: 'light', 
            ];
            if ($logoPosition = $APPLICATION->GetPageProperty('LOGO_POSITION')) {
                $arOptions['LOGO_POSITION'] = $logoPosition;
            }
            
            Solution::setLogoColor($arOptions);
            if ($templateData['SECTION_BNR_COLOR'] !== 'dark'){	
                $arProperties['HEADER_COLOR'] = 'light';
            }
        } 
        // single detail image
        elseif ($templateData['BANNER_TOP_ON_HEAD']) {
            $bodyClassList .= ' has-long-banner header_opacity front_page';

            $arProperties['HEADER_COLOR'] = $arProperties['HEADER_COLOR'] = 'light';
        }

        if ($bodyClassList) {
            $bodyDopClass .= $bodyClassList;
        }

        self::initExtentsions($templateData);
        self::setProperties($arProperties);
    }

    public static function initExtentsions($templateData = []) {
        $arExtensions = [];
        if (
            ($templateData['SECTION_BNR_CONTENT'] && $templateData['SECTION_BNR_UNDER_HEADER'] === 'YES')
            || $templateData['BANNER_TOP_ON_HEAD']
        ) {
            $arExtensions[] = 'header_opacity';
        }

        if ($arExtensions) {
            Extensions::init($arExtensions);
        }
    }

    public static function setProperties($arProperties = []) {
        if ($arProperties) {
            global $APPLICATION;

            foreach ($arProperties as $prop => $value) {
                $APPLICATION->SetPageProperty($prop, $value);
            }
        }
    }
}