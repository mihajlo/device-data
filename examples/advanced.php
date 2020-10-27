<?php

    require_once '../config/config.php';
    require_once '../src/DeviceDetails.php';
    
    $device = new DeviceDetails($config['token']);

    $device->setUserAgent('Mozilla/5.0 (Linux; Android 4.4.2; GT-P5210 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.109 Safari/537.36');
    
    $deviceData = $device->getDevice();

    if ($device->errors()) {
        print_r($device->errors());
    } else {
        print_r($deviceData);
    }

?>
