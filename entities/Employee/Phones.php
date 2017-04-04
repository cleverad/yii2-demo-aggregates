<?php

namespace app\entities\Employee;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Phones
{
    private $employee;
    /**
     * @var Collection|Phone[]
     */
    private $phones = [];

    public function __construct(Employee $employee, &$relatedPhones, array $phones)
    {
        if (!$phones) {
            throw new \DomainException('Employee must contain at least one phone.');
        }
        $this->employee = $employee;
        $this->phones = $relatedPhones = new ArrayCollection();
        foreach ($phones as $phone) {
            $this->add($phone);
        }
    }

    public function add(Phone $phone)
    {
        foreach ($this->phones as $item) {
            if ($item->isEqualTo($phone)) {
                throw new \DomainException('Phone already exists.');
            }
        }
        $this->phones->add($phone);
        $phone->setEmployee($this->employee);
    }

    public function remove($index)
    {
        if (!isset($this->phones[$index])) {
            throw new \DomainException('Phone not found.');
        }
        if ($this->phones->count() === 1) {
            throw new \DomainException('Cannot remove the last phone.');
        }
        return $this->phones->remove($index);
    }

    public function getAll()
    {
        return $this->phones->toArray();
    }
}