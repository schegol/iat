<?
namespace {
    if (!defined('VENDOR_PARTNER_NAME')) {
        /** @const Aspro partner name */
        define('VENDOR_PARTNER_NAME', 'aspro');
    }
    
    if (!defined('VENDOR_SOLUTION_NAME')) {
        /** @const Aspro solution name */
        define('VENDOR_SOLUTION_NAME', 'allcorp3motor');
    }
    
    if (!defined('VENDOR_MODULE_ID')) {
        /** @const Aspro module id */
        define('VENDOR_MODULE_ID', 'aspro.allcorp3motor');
    }
    if (!defined('VENDOR_MODULE_CODE')) {
        /** @const Aspro module id */
        define('VENDOR_MODULE_CODE', 'motor');
    }
    
    foreach ([
        'CAllcorp3Motor' => 'TSolution',
        'CAllcorp3MotorEvents' => 'TSolution\Events',
        'CAllcorp3MotorCache' => 'TSolution\Cache',
        'CAllcorp3MotorRegionality' => 'TSolution\Regionality',
        'CAllcorp3MotorCondition' => 'TSolution\Condition',
        'CInstargramAllcorp3Motor' => 'TSolution\Instagram',
        'CAllcorp3MotorTools' => 'TSolution\Tools',
        'CVKAllcorp3Motor' => 'TSolution\VK',
        'Aspro\Allcorp3Motor\Functions\CAsproAllcorp3' => 'TSolution\Functions',
        'Aspro\Allcorp3Motor\Functions\CAsproAllcorp3Custom' => 'TSolution\FunctionsCustom',
        'Aspro\Allcorp3Motor\Functions\CAsproAllcorp3ReCaptcha' => 'TSolution\ReCaptcha',
        'Aspro\Allcorp3Motor\Functions\CAsproAllcorp3Switcher' => 'TSolution\Switcher',
        'Aspro\Allcorp3Motor\Functions\Extensions' => 'TSolution\Extensions',
        'Aspro\Allcorp3Motor\Functions\CSKU' => 'TSolution\SKU',
        'Aspro\Allcorp3Motor\Functions\CSKUTemplate' => 'TSolution\CSKUTemplate',
        'Aspro\Allcorp3Motor\Functions\ExtComponentParameter' => 'TSolution\ExtComponentParameter',
        'Aspro\Allcorp3Motor\Property\CustomFilter' => 'TSolution\Property\CustomFilter',
        'Aspro\Allcorp3Motor\Notice' => 'TSolution\Notice',
        'Aspro\Allcorp3Motor\Eyed' => 'TSolution\Eyed',
        'Aspro\Allcorp3Motor\Banner\Transparency' => 'TSolution\Banner\Transparency',
        'Aspro\Allcorp3Motor\Video\Iframe' => 'TSolution\Video\Iframe',
        'Aspro\Allcorp3Motor\MarketingPopup' => 'TSolution\MarketingPopup',
        'Aspro\Allcorp3Motor\Property\TariffItem' => 'TSolution\TariffItem',
    ] as $original => $alias) {
        if (!class_exists($alias)) {
            class_alias($original, $alias);
        }    
    }

    // these alias declarations for IDE only
    if (false) {
        class TSolution extends CAllcorp3Motor {}
    }
}

// these alias declarations for IDE only
namespace TSolution {
    if (false) {
        class Events extends \CAllcorp3MotorEvents {}

        class Cache extends \CAllcorp3MotorCache {}

        class Regionality extends \CAllcorp3MotorRegionality {}

        class Condition extends \CAllcorp3MotorCondition {}

        class Instagram extends \CInstargramAllcorp3Motor {}

        class Tools extends \CAllcorp3MotorTools {}

        class Functions extends \Aspro\Allcorp3Motor\Functions\CAsproAllcorp3 {}

        class FunctionsCustom extends \Aspro\Functions\CAsproAllcorp3MotorCustom {}

        class Extensions extends \Aspro\Allcorp3Motor\Functions\Extensions {}

        class SKU extends \Aspro\Allcorp3Motor\Functions\CSKU {}

        class Notice extends \Aspro\Allcorp3Motor\Notice {}

        class Eyed extends \Aspro\Allcorp3Motor\Eyed {}

        class ExtComponentParameter extends \Aspro\Allcorp3Motor\Functions\ExtComponentParameter {}

        class ReCaptcha extends \Aspro\Allcorp3Motor\Functions\CAsproAllcorp3ReCaptcha {}

        class Switcher extends \Aspro\Allcorp3Motor\Functions\CAsproAllcorp3Switcher {}

        class CSKUTemplate extends \Aspro\Allcorp3Motor\Functions\CSKUTemplate {}

        class VK extends \CVKAllcorp3Motor {}

        class MarketingPopup extends \Aspro\Allcorp3Motor\MarketingPopup {}

        class TariffItem extends \Aspro\Allcorp3Motor\Property\TariffItem {}
    }
}

namespace TSolution\Banner {
    if (false) {
        class Transparency extends \Aspro\Allcorp3Motor\Banner\Transparency {}
    }
}

namespace TSolution\Video {
    if (false) {
        class Iframe extends \Aspro\Allcorp3Motor\Video\Iframe {}
    }
}