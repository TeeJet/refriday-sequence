<?php

use classes\Sequence;
use PHPUnit\Framework\TestCase;

class SequenceTest extends TestCase
{
    public function testIsGeometric()
    {
        $data = [];
        $sequence = new Sequence($data);
        $this->assertTrue($sequence->isGeometric());

        $data = [1];
        $sequence = new Sequence($data);
        $this->assertTrue($sequence->isGeometric());

        $data = [2, 4, 8, 16, 32];
        $sequence = new Sequence($data);
        $this->assertTrue($sequence->isGeometric());
    }

    public function testIsNotGeometric()
    {
        $data = [2, 4, 8, 16, 34];
        $sequence = new Sequence($data);
        $this->assertFalse($sequence->isGeometric());
    }

    public function testRatio()
    {
        $data = [];
        $sequence = new Sequence($data);
        $this->assertSame(0, $sequence->getRatio());

        $data = [1];
        $sequence = new Sequence($data);
        $this->assertSame(0, $sequence->getRatio());

        $data = [2, 4, 8, 16, 32];
        $sequence = new Sequence($data);
        $this->assertSame(2, $sequence->getRatio());
    }

    public function testSize()
    {
        $data = [2, 4, 8, 16, 32];
        $sequence = new Sequence($data);
        $this->assertSame(5, $sequence->getSize());
    }

    public function testFirstItem()
    {
        $data = [2, 4, 8, 16, 32];
        $sequence = new Sequence($data);
        $this->assertSame(2, $sequence->getFirstItem());
    }

    public function testFirstItemNotFound()
    {
        $data = [];
        $sequence = new Sequence($data);
        $this->expectException(InvalidArgumentException::class);
        $sequence->getFirstItem();
    }
}