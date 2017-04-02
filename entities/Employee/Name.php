<?php

namespace app\entities\Employee;

use Assert\Assertion;

class Name
{
    private $last;
    private $first;
    private $middle;

    public function __construct($last, $first, $middle)
    {
        Assertion::notEmpty($last);
        Assertion::notEmpty($first);

        $this->last = $last;
        $this->first = $first;
        $this->middle = $middle;
    }

    public function getFull()
    {
        return trim($this->last . ' ' . $this->first . ' ' . $this->middle);
    }

    public function getFirst() { return $this->first; }
    public function getMiddle() { return $this->middle; }
    public function getLast() { return $this->last; }
}