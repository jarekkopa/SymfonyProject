<?php

namespace App\Entity;

use PHPUnit\Framework\TestCase;

class UserEntityTest extends TestCase
{
    public function testCanSetLogin()
    {
        $login = new UserEntity();
        $login->setLogin('ewa');
        $this->assertEquals('ewa', $login->getLogin());
    }
}