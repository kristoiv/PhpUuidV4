<?php

/**
 * Generates version 4 type UUID's
 *
 * @author Kristoffer A. Iversen
 */

class Uuid
{
    public static function generate()
    {
        $uuid = sprintf('%s-%s-%04x-%04x-%s',
            bin2hex(openssl_random_pseudo_bytes(4, $strong1)),
            bin2hex(openssl_random_pseudo_bytes(2, $strong2)),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            bin2hex(openssl_random_pseudo_bytes(6, $strong3))
        );

        if (!$strong1 || !$strong2 || !$strong3) throw new \Exception('openssl_random_pseudo_bytes could\'not use a cryptographically strong PRNG');

        return $uuid;
    }
}

