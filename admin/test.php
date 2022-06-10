<?php
$message_to_encrypt = "Yoroshikune";
$secret_key = "my-secret-key";
$method = "aes128";
$iv_length = openssl_cipher_iv_length($method);
$iv = openssl_random_pseudo_bytes($iv_length);
echo $iv.'<br>';
$encrypted_message = openssl_encrypt($message_to_encrypt, $method, $secret_key, 0, $iv);

echo $encrypted_message.'<br>';

$decrypted_message = openssl_decrypt($encrypted_message, $method, $secret_key, 0, $iv);

echo $decrypted_message;
?>