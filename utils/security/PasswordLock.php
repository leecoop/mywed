<?php

namespace ParagonIE\PasswordLock;
class PasswordLock
{
    /**
     * 1. Hash password using bcrypt-base64-SHA256
     *
     * @param string $password
     * @return string
     */
    public static function encrypt($password)
    {
        $hash = \password_hash(
            \base64_encode(
                \hash('sha512', $password, true)
            ),
            PASSWORD_DEFAULT
        );
        if ($hash === false) {
            throw new \Exception("Unknown hashing error.");
        }
        return $hash;
    }

    /**
     * 2. Verify that the password matches the hash
     *
     * @param string $password
     * @param string $encryptedPassword
     * @return boolean
     */
    public static function decryptAndVerify($password, $encryptedPassword)
    {
        return \password_verify(
            \base64_encode(
                \hash('sha512', $password, true)
            ),
            $encryptedPassword
        );
    }


}