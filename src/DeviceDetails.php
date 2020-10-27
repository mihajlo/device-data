<?php

/**
 * DeviceDetails PHP library for visitors devices
 * - This library uses free HTTP web service from https://php.mk/services/device
 *
 * @author Mihajlo Siljanoski
 */
class DeviceDetails
{

    /**
     * Initialize class object
     * 
     * @param array $token Token for web service
     * 
     * @return object|null Return instance of the class or null if missing token
     */
    public function __construct($token = false)
    {
        if (!$token) {
            return null;
        }
        $this->baseApiUrl = 'https://api.php.mk';
        $this->version = 'v1.0';
        $this->token = $token;
        $this->userAgent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
        $this->error = [];
    }

    /**
     * Manually set UserAgent
     * 
     * @param string $userAgent Browser UserAgent
     * 
     * @return void
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
    }

    /**
     * Get Device data
     * 
     * @return mixed Return everything about device
     */
    public function getDevice()
    {
        $deviceData = $this->httpRequest();
        if ($deviceData->error) {
            $this->error = (array) $deviceData;
            return false;
        }
        return (object) $deviceData->data;
    }

    /**
     * Get errors from service
     * 
     * @return array Return service errors
     */
    public function errors()
    {
        return $this->error;
    }

    /**
     * Make HTTP request to service
     * 
     * @return object|null Return original response from service
     */
    private function httpRequest()
    {
        $context = stream_context_create([
            'http' => ['ignore_errors' => true],
        ]);

        $response = file_get_contents($this->baseApiUrl . '/device/' . $this->version . '?token=' . $this->token . '&userAgent=' . urlencode($this->userAgent), false, $context);
        return json_decode($response);
    }
}
