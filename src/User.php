<?php
/**
 * Created by PhpStorm.
 * User: rakesh
 * Date: 01/05/19
 * Time: 3:21 PM
 */

namespace HelloPHPUnit;


class User
{
    const MIN_PASS_LENGTH = 4;

    private $user = array();

    public function __construct(array $user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setPassword($password)
    {
        if (strlen($password) < self::MIN_PASS_LENGTH) {
            return false;
        }

        $this->user['password'] = $this->cryptPassword($password);

        return true;
    }

    private function cryptPassword($password)
    {
        return md5($password);
    }
}
