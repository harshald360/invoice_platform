<?php

use Config\Services;

if (!function_exists('encrypt_id')) {
    function encrypt_id($id)
    {
        $encrypter = Services::encrypter();
        return bin2hex($encrypter->encrypt($id));
    }
}

if (!function_exists('decrypt_id')) {
    function decrypt_id($encrypted_id)
    {
        $encrypter = Services::encrypter();
        return $encrypter->decrypt(hex2bin($encrypted_id));
    }
}
