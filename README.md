<h1>DeviceDetails PHP library for visitors devices</h1><p>With this library, you can very easily detect device details. Especially for mobile and tablet.</p><hr>

####Composer installation
composer require phpmk/devicedata:v1

<h3>Configuration:</h3><h4>./config/config-sample.php</h4><pre>&lt;?php
    
    //rename file to config.php
    $config['token'] = '[your PHP.mk token]'; //You can get free token on https://php.mk/services/device

?&gt;</pre><hr><h3>How to use:</h3><h4>./examples/simple.php</h4><pre>&lt;?php

    require_once '../config/config.php';
    require_once '../src/DeviceDetails.php';
    
    $device = new DeviceDetails($config['token']);

    $deviceData = $device->getDevice();

    if ($device->errors()) {
        print_r($device->errors());
    } else {
        print_r($deviceData);
    }

?&gt;
</pre><hr><h4>./examples/advanced.php</h4><pre>&lt;?php

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

?&gt;
</pre><hr><h3>Public methods:</h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>DeviceDetails :: __construct</b><pre>/**
     * Initialize class object
     * 
     * @param array $token Token for web service
     * 
     * @return object|null Return instance of the class or null if missing token
     **/</pre><hr>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>DeviceDetails :: setUserAgent</b><pre>/**
     * Manually set UserAgent
     * 
     * @param string $userAgent Browser UserAgent
     * 
     * @return void
     **/</pre><hr>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>DeviceDetails :: getDevice</b><pre>/**
     * Get Device data
     * 
     * @return mixed Return everything about device
     **/</pre><hr>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>DeviceDetails :: errors</b><pre>/**
     * Get errors from service
     * 
     * @return array Return service errors
     **/</pre><hr>