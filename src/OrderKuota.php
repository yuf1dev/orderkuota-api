<?php

namespace YuF1Dev;

/**
 * [OrderKuota] OrderKuota Api PHP Class (Un-Official)
 * Author : YuF1Dev <https://github.com/yuf1dev>
 * Created at 10-10-2023 00:22
 * Last Modified at 11-10-2023 23:18
 */
class OrderKuota
{
    const API_URL = 'https://app.orderkuota.com:443/api/v2';
    const HOST = 'app.orderkuota.com';
    const USER_AGENT = 'okhttp/4.10.0';
    const APP_VERSION_NAME = '23.02.01';
    const APP_VERSION_CODE = '230201';
    const APP_REG_ID = 'di309HvATsaiCppl5eDpoc:APA91bFUcTOH8h2XHdPRz2qQ5Bezn-3_TaycFcJ5pNLGWpmaxheQP9Ri0E56wLHz0_b1vcss55jbRQXZgc9loSfBdNa5nZJZVMlk7GS1JDMGyFUVvpcwXbMDg8tjKGZAurCGR4kDMDRJ';

    private $authToken, $username;

    public function __construct($username = false, $authToken = false)
    {
        if ($username) {
            $this->username = $username;
        }
        if ($authToken) {
            $this->authToken = $authToken;
        }
    }

    public function loginRequest($username, $password)
    {
        $payload = "username=" . $username . "&password=" . $password . "&app_reg_id=" . self::APP_REG_ID . "&app_version_code=" . self::APP_VERSION_CODE . "app_version_name=" . self::APP_VERSION_NAME . "";
        return self::Request("POST", self::API_URL . '/login', $payload, true);
    }

    public function getAuthToken($username, $otp)
    {
        $payload = "username=" . $username . "&password=" . $otp . "&app_reg_id=" . self::APP_REG_ID . "&app_version_code=" . self::APP_VERSION_CODE . "app_version_name=" . self::APP_VERSION_NAME . "";
        return self::Request("POST", self::API_URL . '/login', $payload, true);
    }

    public function getTransactionQris($type = '')
    {
        $payload = "auth_token=" . $this->authToken . "&auth_username=" . $this->username . "&requests%5Bqris_history%5Bjumlah%5D=&requests%5Bqris_history%5D%5Bjenis%5D=" . $type . "&requests%5Bqris_history%5D%5Bpage%5D=1&requests%5Bqris_history%5D%5Bdari_tanggal%5D=&requests%5Bqris_history%5D%5Bke_tanggal%5D=&requests%5Bqris_history%5D%5Bketerangan%5D=&requests%5B0%5D=account&app_version_name=" . self::APP_VERSION_NAME . "&app_version_code=" . self::APP_VERSION_CODE . "&app_reg_id=" . self::APP_REG_ID . "";
        return self::Request("POST", self::API_URL . '/get', $payload, true);
    }
    protected function buildHeaders()
    {
        $headers = array(
            'Host: ' . self::HOST,
            'User-Agent: ' . self::USER_AGENT,
            'Content-Type: application/x-www-form-urlencoded',
        );
        return $headers;
    }


    protected function Request($type = "GET", $url, $post = false, $headers = false)
    {
        $ch = curl_init();

        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
        ));

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $type);

        if ($post) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }

        if ($headers) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, self::buildHeaders());
        }

        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}
