<?php
namespace app\controllers;

use \Slim\Http\Request;
use \Slim\Http\Response;

class User
{
    public function getUserInformation(Request $request, Response $response, $args)
    {
        $ip = $args['ip'];
        $filter = $args['filter'];
        $dataset = [];

        if ($ip == "requester") {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        $country = new \app\models\geography\Countries();
        $language = new \Sinergi\BrowserDetector\Language();
        $browserDetails = new \app\models\browser\BrowserDetails();
        $geoip = new \app\models\geolocation\GeoByIP($ip);

        switch ($filter) {
            case "browser":
                $dataset['browser'] = $browserDetails->getBrowserDetails($_SERVER['HTTP_USER_AGENT']);
                break;
            case "geo":
                $geo_information = $geoip->getInformationFromIPAddress($ip);
                $proxy_information = $geoip->getProxyInformation($ip);
                $dataset['geoinfo'] = [
                    "ip_address" => $ip,
                    "host" => gethostbyaddr($ip),
                    "location" => $geo_information,
                    "proxy" => $proxy_information
                ];
                break;
            case "country":
                $geo_information = $geoip->getInformationFromIPAddress($ip);
                $country_information = $country->getCountryInformation($geo_information['country_code']);
                $dataset['country'] = $country_information;
                break;
            default:
                $geo_information = $geoip->getInformationFromIPAddress($ip);
                $proxy_information = $geoip->getProxyInformation($ip);
                $country_information = $country->getCountryInformation($geo_information['country_code']);
                $dataset = [
                    "language" => $language->getLanguage(),
                    "browser" => $browserDetails->getBrowserDetails($_SERVER['HTTP_USER_AGENT']),
                    "geoinfo" => [
                        "ip_address" => $ip,
                        "location" => $geo_information,
                        "proxy" => $proxy_information
                    ],
                    "country" => $country_information,

                ];
                break;
        }

        return $response->withJson($dataset);
    }
}
