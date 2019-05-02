<?php
/**
 * Created by PhpStorm.
 * User: rakesh
 * Date: 01/05/19
 * Time: 3:22 PM
 */

namespace tests\HelloPHPUnit;
use HelloPHPUnit\User;
use Invoker;

class UserTest extends Base
{
    public function testSetPasswordReturnsTrueWhenPasswordSuccessfullySet()
    {
        $details = array();

        $user = new User($details);

        $password = 'password';

        $result = $user->setPassword($password);

        $this->assertTrue($result);
    }

    public function testGetUserReturnsUserWithExpectedValues()
    {
        $details = array();

        $user = new User($details);

        $password = 'password';

        $user->setPassword($password);

        $expectedPasswordResult = '5f4dcc3b5aa765d61d8327deb882cf99';

        $currentUser = $user->getUser();

        $this->assertEquals($expectedPasswordResult, $currentUser['password']);
    }

    public function testGetUserReturnsUserWithExpectedValuesWithCript()
    {
        $details = array();

        $user = new User($details);

        $Invoker = new Invoker();

        $password = 'password';

        $user->setPassword($password);

        $currentUser = $user->getUser();

        $expectedPasswordResult = $Invoker->invokeMethod($user, 'cryptPassword', array($password));

        $this->assertEquals($expectedPasswordResult, $currentUser['password']);
    }

}