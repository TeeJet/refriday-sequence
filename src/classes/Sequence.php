<?php

namespace classes;

class Sequence
{
    private $progression;
    private $ratio;
    private $count;

    public function __construct(array $progression)
    {
        $this->progression = array_values($progression);
    }

    public function isGeometric()
    {
        if ($this->getSize() <= 1 || $this->getFirstItem() == 0 || $this->getRatio() == 0) {
            return false;
        }

        for ($i = 1; $i < $this->getSize(); $i++) {
            if (!$this->checkRatio($i)) {
                return false;
            }
        }

        return true;
    }

    public function getFirstItem()
    {
        if ($this->getSize() == 0) {
            throw new \InvalidArgumentException("Can't get first item from empty progression");
        }
        return $this->progression[0];
    }

    public function getRatio()
    {
        if ($this->getSize() <= 1) {
            throw new \InvalidArgumentException("Can't get ratio from a sequence of less than two elements");
        }
        if ($this->progression[0] == 0) {
            throw new \InvalidArgumentException("Can't division by zero");
        }
        return $this->ratio ?? $this->progression[1] / $this->progression[0];
    }

    public function getSize()
    {
        return $this->count ?? count($this->progression);
    }

    private function checkRatio(int $i)
    {
        return $this->progression[$i] / ($this->progression[$i - 1]) == $this->getRatio();
    }
}