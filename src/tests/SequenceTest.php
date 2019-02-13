<?php

use classes\Sequence;
use PHPUnit\Framework\TestCase;

class SequenceTest extends TestCase
{
    public function testIsGeometric()
    {
        $data = [2, 4, 8, 16, 32, 64, 128, 256];
        $sequence = new Sequence($data);
        $this->assertTrue($sequence->isGeometric());
        $this->assertSame(2, $sequence->getRatio());
        $this->assertSame(8, $sequence->getSize());
        $this->assertSame(2, $sequence->getFirstItem());

        $data = [50, 25, 12.5, 6.25, 3.125];
        $sequence = new Sequence($data);
        $this->assertTrue($sequence->isGeometric());
        $this->assertSame(0.5, $sequence->getRatio());
        $this->assertSame(5, $sequence->getSize());
        $this->assertSame(50, $sequence->getFirstItem());

        $data = [1, 1, 1];
        $sequence = new Sequence($data);
        $this->assertTrue($sequence->isGeometric());
        $this->assertSame(1, $sequence->getRatio());
        $this->assertSame(3, $sequence->getSize());
        $this->assertSame(1, $sequence->getFirstItem());

        $data = [3, -6, 12, -24, 48, -96];
        $sequence = new Sequence($data);
        $this->assertTrue($sequence->isGeometric());
        $this->assertSame(-2, $sequence->getRatio());
        $this->assertSame(6, $sequence->getSize());
        $this->assertSame(3, $sequence->getFirstItem());
    }

    public function testEmptyIsNotGeometric()
    {
        $data = [];
        $sequence = new Sequence($data);
        $this->assertFalse($sequence->isGeometric());
        $this->expectExceptionMessage("Can't get ratio from a sequence of less than two elements");
        $sequence->getRatio();
        $this->assertSame(0, $sequence->getSize());
    }

    public function testEmptyCantGetFirstItem()
    {
        $data = [];
        $sequence = new Sequence($data);
        $this->expectExceptionMessage("Can't get first item from empty progression");
        $sequence->getFirstItem();
    }

    public function testOneElementIsNotGeometric()
    {
        $data = [1];
        $sequence = new Sequence($data);
        $this->assertFalse($sequence->isGeometric());
        $this->expectExceptionMessage("Can't get ratio from a sequence of less than two elements");
        $sequence->getRatio();
        $this->assertSame(1, $sequence->getSize());
        $this->assertSame(1, $sequence->getFirstItem());
    }

    public function testFirstElementZeroIsNotGeometric()
    {
        $data = [0, 1];
        $sequence = new Sequence($data);
        $this->assertFalse($sequence->isGeometric());
        $this->expectExceptionMessage("Can't division by zero");
        $sequence->getRatio();
        $this->assertSame(2, $sequence->getSize());
        $this->assertSame(0, $sequence->getFirstItem());
    }

    public function testRatioZeroIsNotGeometric()
    {
        $data = [1, 0];
        $sequence = new Sequence($data);
        $this->assertFalse($sequence->isGeometric());
        $this->assertSame(0, $sequence->getRatio());
        $this->assertSame(2, $sequence->getSize());
        $this->assertSame(1, $sequence->getFirstItem());
    }

    public function testAllZeroIsNotGeometric()
    {
        $data = [0, 0, 0];
        $sequence = new Sequence($data);
        $this->assertFalse($sequence->isGeometric());
        $this->expectExceptionMessage("Can't division by zero");
        $sequence->getRatio();
        $this->assertSame(3, $sequence->getSize());
        $this->assertSame(0, $sequence->getFirstItem());
    }

    public function testIncorrectSequenceIsNotGeometric()
    {
        $data = [2, 4, 8, 16, 34];
        $sequence = new Sequence($data);
        $this->assertFalse($sequence->isGeometric());
        $this->assertSame(2, $sequence->getRatio());
        $this->assertSame(5, $sequence->getSize());
        $this->assertSame(2, $sequence->getFirstItem());
    }
}