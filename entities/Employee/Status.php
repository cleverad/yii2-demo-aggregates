<?php

namespace app\entities\Employee;

use Assert\Assertion;

class Status
{
    const ACTIVE = 'active';
    const ARCHIVED = 'archived';

    private $id;
    private $employee;
    private $value;
    private $date;

    public function __construct(Employee $employee, $value, \DateTimeImmutable $date)
    {
        Assertion::inArray($value, [
            self::ACTIVE,
            self::ARCHIVED
        ]);

        $this->employee = $employee;
        $this->value = $value;
        $this->date = $date;
    }

    public function isActive()
    {
        return $this->value === self::ACTIVE;
    }

    public function isArchived()
    {
        return $this->value === self::ARCHIVED;
    }

    public function getValue() { return $this->value; }
    public function getDate() { return $this->date; }
}