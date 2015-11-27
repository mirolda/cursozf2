<?php

namespace Bookmark\Service;


use Zend\Authentication\Storage\Session;

class AuthenticationStorageService extends Session
{
    public function setRememberMe($rememberMe = 0, $time = 2592000)
    {
        if ($rememberMe == 1) {
            $this->session->getManager()->rememberMe($time);
        }
    }

    public function forgetMe()
    {
        $this->session->getManager()->forgetMe();
    }
}