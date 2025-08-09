<?php
$passphrase = 'YourSecurePassphrase'; // You can change this

// Generate private key with passphrase
$privateKey = openssl_pkey_new([
    'private_key_bits' => 4096,
    'private_key_type' => OPENSSL_KEYTYPE_RSA,
]);

// Export private key with passphrase
if (!openssl_pkey_export($privateKey, $privateKeyPem, $passphrase)) {
    echo "Error exporting private key: " . openssl_error_string() . "\n";
    exit(1);
}

// Get public key
$publicKeyDetails = openssl_pkey_get_details($privateKey);
if ($publicKeyDetails === false) {
    echo "Error getting public key: " . openssl_error_string() . "\n";
    exit(1);
}

// Save keys
$privateKeyPath = __DIR__ . '/config/jwt/private.pem';
$publicKeyPath = __DIR__ . '/config/jwt/public.pem';

if (file_put_contents($privateKeyPath, $privateKeyPem) === false) {
    echo "Error writing private key to file\n";
    exit(1);
}

if (file_put_contents($publicKeyPath, $publicKeyDetails['key']) === false) {
    echo "Error writing public key to file\n";
    exit(1);
}

echo "JWT keys generated successfully!\n";
echo "Private key: $privateKeyPath\n";
echo "Public key: $publicKeyPath\n";
echo "Your passphrase is: $passphrase\n";
echo "Save this passphrase in your .env.local file: JWT_PASSPHRASE=$passphrase\n";
?>
