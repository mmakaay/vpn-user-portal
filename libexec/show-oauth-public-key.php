<?php

declare(strict_types=1);

/*
 * eduVPN - End-user friendly VPN.
 *
 * Copyright: 2016-2019, The Commons Conservancy eduVPN Programme
 * SPDX-License-Identifier: AGPL-3.0+
 */

require_once dirname(__DIR__).'/vendor/autoload.php';
$baseDir = dirname(__DIR__);

use fkooman\Jwt\Keys\EdDSA\SecretKey;
use LC\Portal\FileIO;

try {
    $dataDir = sprintf('%s/data', $baseDir);
    $keyFile = sprintf('%s/oauth.key', $dataDir);
    $secretKey = SecretKey::fromEncodedString(FileIO::readFile($keyFile));
    echo 'Public Key: '.$secretKey->getPublicKey()->encode().PHP_EOL;
} catch (Exception $e) {
    echo sprintf('ERROR: %s', $e->getMessage()).PHP_EOL;
    exit(1);
}
