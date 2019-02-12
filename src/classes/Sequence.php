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
        $this->count = $this->getSize();
        $this->ratio = $this->getRatio();
    }

    public function isGeometric()
    {
        if ($this->count <= 1) {
            return true;
        }

        for ($i = 1; $i < $this->count; $i++) {
            if (!$this->checkRatio($i)) {
                return false;
            }
        }

        return true;
    }

    public function getFirstItem()
    {
        if ($this->count == 0) {
            throw new \InvalidArgumentException("Can't get first item from empty progression");
        }
        return $this->progression[0];
    }

    public function getRatio()
    {
        if ($this->count <= 1) {
            return 0;
        }
        return $this->ratio ?? $this->progression[1] / $this->progression[0];
    }

    public function getSize()
    {
        return $this->count ?? count($this->progression);
    }

    private function checkRatio(int $i)
    {
        return $this->progression[$i] / ($this->progression[$i - 1]) == $this->ratio;
    }
}