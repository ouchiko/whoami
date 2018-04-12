<?php
namespace app\models\geography;

class Countries
{
    public function getCountryInformation($country_code)
    {
        $country_information = country($country_code);

        return [
            "name" => $country_information->getName(),
            "official_name" => $country_information->getOfficialName(),
            "native_name" => $country_information->getNativeOfficialName(),
            "captial" => $country_information->getCapital(),
            "domain" => $country_information->getTld(),
            "languages" => $country_information->getLanguages(),
            "region" => $country_information->getRegion(),
            "worldpoint" => $country_information->getWorldRegion(),
            "continent" => $country_information->getContinent(),
            "dialcode" => $country_information->getCallingCodes(),
            "emoji" => $country_information->getEmoji(),
            "svg" => $country_information->getFlag(),
            "currency" => $country_information->getCurrencies(),
            "boundaries" => [
                "minlat" => $country_information->getMinLatitude(),
                "minlon" => $country_information->getMinLongitude(),
                "maxlat" => $country_information->getMaxLatitude(),
                "maxlon" => $country_information->getMaxLongitude()
            ],
            "area" => $country_information->getArea()
        ];
    }
}
