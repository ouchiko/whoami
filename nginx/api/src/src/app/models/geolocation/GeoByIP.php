<?php
namespace app\models\geolocation;

class GeoByIP
{
    public function getInformationFromIPAddress($ipAddress)
    {
        $st = $GLOBALS['db']->prepare(
            'SELECT * FROM IP2.ip2location_db11 WHERE INET_ATON(:ip) BETWEEN ip_from AND ip_to LIMIT 1'
        );
        $st->execute(array(':ip'=>$ipAddress));

        $row = $st->fetch(\PDO::FETCH_ASSOC);

        return $row;
    }

    public function getProxyInformation($ipAddress)
    {
        $st = $GLOBALS['db']->prepare(
            'SELECT * FROM IP2.ip2proxy_px4 WHERE INET_ATON(:ip) BETWEEN ip_from AND ip_to LIMIT 1'
        );
        $st->execute(array(':ip'=>$ipAddress));

        $row = $st->fetch(\PDO::FETCH_ASSOC);

        return $row;
    }
}
