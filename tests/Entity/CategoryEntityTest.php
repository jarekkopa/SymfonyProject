<?php

namespace App\Entity;

use PHPUnit\Framework\TestCase;

class CategoryEntityTest extends TestCase
{
    public function testCanSetName()
    {
        $category = new CategoryEntity();
        $category->setName('PHPUnit');
        $this->assertEquals('PHPUnit', $category->getName());
    }

    public function testIsHiddenIsBool()
    {
        $hidden = new CategoryEntity();
        $hidden->setHidden(true);
        $this->assertTrue($hidden->getHidden());
    }
    /**
     * @dataProvider namesAndUrlsProvider
     */
    public function testCanSetUrl($name, $url)
    {
        $category = new CategoryEntity();
        $category->setName($name);

        $this->assertEquals($url, $category->getUrl());
    }

    public function namesAndUrlsProvider()
    {
        return[
            ['aaaa', 'aaaa'],
            ['1 1 1', '1 1 1'],
            ['ABCDEXYZ', 'abcdexyz'],
            ['Symfony', 'symfony'],
        ];
    }
}