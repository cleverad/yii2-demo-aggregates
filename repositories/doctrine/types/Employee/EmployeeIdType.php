<?php

namespace app\repositories\doctrine\types\Employee;

use app\entities\Employee\EmployeeId;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\GuidType;

class EmployeeIdType extends GuidType
{
    const NAME = 'Type\Employee\EmployeeId';

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        /** @var EmployeeId $value */
        return $value->getId();
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new EmployeeId($value);
    }

    public function getName()
    {
        return self::NAME;
    }
}