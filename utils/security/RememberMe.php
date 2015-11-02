<?php

class RememberMe
{

    private $tokenName = 'rmbrme';

    private $expireInterval = '+14 days';

    private $persist;

    private $user;

    function __construct($persist, $user = null)
    {
        $this->user = $user;
        $this->persist = $persist;
    }

    public function setPersist($persist)
    {
        $this->persist = $persist;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function setup($user = null)
    {
        $user = ($user === null) ? $this->user : $user;


        $userToken = $this->getUserToken($user);
        if ($userToken && !$this->isExpired($userToken)) {
            return false;
        }
        $newToken = $this->generateToken();
        $tokenId = $this->saveToken($newToken, $user);
        if ($tokenId === false || $tokenId === "0") {
            return false;
        }
        $this->setCookies($tokenId, $newToken);
        return true;
    }

    public function verify($userToken = null)
    {

        if (!isset($_COOKIE[$this->tokenName])) {
            return false;
        }

        $tokenParts = explode(':', $_COOKIE[$this->tokenName]);

        if ($userToken === null) {
            $userToken = $this->persist->findUserTokenById($tokenParts[0]);
        }

        if ($userToken === false) {
            return false;
        }

        $validToken = $this->isValidateToken($tokenParts[1], $userToken);

        if(!$validToken){
            return false;
        }

        return $userToken->user_id;

    }

    public function isValidateToken($cookieTokenValue, $userToken){
       return $this->hash_equals($this->hashToken($cookieTokenValue),$userToken->token);
    }


    public function getUserToken($user)
    {
        //try to get token from auth_tokens table

        return $this->persist->findUserToken($user->oid);
    }

    public function isExpired($userToken, $delete = true)
    {
        if (new \Datetime() > new \DateTime($userToken->expires)) {
            if ($delete === true) {
                $this->deleteToken($userToken->oid);
            }
            return true;
        }
        return false;
    }

    public function saveToken($token, $user)
    {
        $expires = new \DateTime($this->expireInterval);
        $expiresDate = $expires->format('Y-m-d H:i:s');

        return $this->persist->saveUserToken($this->hashToken($token), $user->oid, $expiresDate);
    }

    public function deleteToken($tokenId)
    {
        $this->persist->deleteUserToken($tokenId);
    }


    public function generateToken()
    {
        return mcrypt_create_iv(24, MCRYPT_DEV_URANDOM);
    }

    public function hashToken($token)
    {
        return hash('sha256', $token);
    }


    public function setCookies($tokenId, $token, $https = false, $domain = null)
    {
        if ($domain === null && isset($_SERVER['HTTP_HOST'])) {
            $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
        }
        $tokenValue = $tokenId . ':' . $token;
        $expires = new \DateTime($this->expireInterval);
        return setcookie($this->tokenName, $tokenValue, $expires->format('U'), '/', $domain, $https, true);
    }


    public static function hash_equals($hash1, $hash2)
    {
        if (\function_exists('hash_equals')) {
            return \hash_equals($hash1, $hash2);
        }
        if (\strlen($hash1) !== \strlen($hash2)) {
            return false;
        }
        $res = 0;
        $len = \strlen($hash1);
        for ($i = 0; $i < $len; ++$i) {
            $res |= \ord($hash1[$i]) ^ \ord($hash2[$i]);
        }
        return $res === 0;
    }

    public function killCookie(){
        if (isset($_COOKIE[$this->tokenName])) {
            $tokenID = explode(':', $_COOKIE[$this->tokenName])[0];
            $this->deleteToken($tokenID);
            $this->invalidatedCookie();

        }
    }

    public function invalidatedCookie(){
        unset($_COOKIE[$this->tokenName]);
        setcookie($this->tokenName, '', time() - 3600, '/');
    }


}