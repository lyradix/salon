<?php
// Generate private key
$privateKey = openssl_pkey_new([
    'private_key_bits' => 4096,
    'private_key_type' => OPENSSL_KEYTYPE_RSA
]);

// Save private key
openssl_pkey_export($privateKey, $privateKeyPem);
file_put_contents('private.pem', $privateKeyPem);

// Generate public key
$publicKeyDetails = openssl_pkey_get_details($privateKey);
file_put_contents('public.pem', $publicKeyDetails['key']);

echo "Keys generated successfully.\n";
?>
