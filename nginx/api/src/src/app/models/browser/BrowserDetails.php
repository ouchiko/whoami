<?php
namespace app\models\browser;

use DeviceDetector\DeviceDetector;
use DeviceDetector\Parser\Device\DeviceParserAbstract;

class BrowserDetails
{
    public function getBrowserDetails($userAgent)
    {
        DeviceParserAbstract::setVersionTruncation(DeviceParserAbstract::VERSION_TRUNCATION_NONE);

        $dd = new DeviceDetector($userAgent);
        $dd->discardBotInformation();
        $dd->parse();
        if ($dd->isBot()) {
            return [
                "type"=>"bot",
                "info"=>$dd->getBot()
            ];
        } else {
            return [
    
                "device_name" => $dd->getDeviceName(),
                "brand_name" => $dd->getBrandName(),
                "model" => $dd->getModel(),
                "details" => $dd->getInfoFromUserAgent($userAgent)
            ];
        }
        return $settings;
    }
}
