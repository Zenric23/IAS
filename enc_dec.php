<?php

$password="this_is_zenric's_password";

function encryptString ($string) {
    return openssl_encrypt($string,"AES-128-ECB", $password);
}

function decryptString ($encryptedString) {
    return openssl_decrypt($encryptedString,"AES-128-ECB", $password);
}


