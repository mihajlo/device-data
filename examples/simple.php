<?php

    require_once '../config/config.php';
    require_once '../src/DeviceDetails.php';
    
    $device = new DeviceDetails($config['token']);

    $deviceData = $device->getDevice();

    if ($device->errors()) {
        print_r($device->errors());
    } else {
        print_r($deviceData);
    }

?>
