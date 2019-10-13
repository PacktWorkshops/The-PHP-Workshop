<?php


use PHPUnit\Framework\TestCase;

class ArrayTest extends TestCase
{
    protected $items;

    protected function setUp(): Void
    {
        $this->items = [
            'name' => 'dave',
            'email' => 'dave@daveismyname.blog'
        ];
    }

    /** @test */
    public function arrayHasKeyName()
    {
        $expected = 'name';
        $actual = $this->items;

        $this->assertArrayHasKey($expected, $actual);
    }

    /** @test */
    public function arrayHasKeyEmail()
    {
        $expected = 'email';
        $actual = $this->items;

        $this->assertArrayHasKey($expected, $actual);
    }

    /** @test */
    public function arrayHasOnly2Keys()
    {
        $expected = 2;
        $actual = count($this->items);

        $this->assertEquals($expected, $actual);
    }


}