<?php

namespace app\entities\Employee;

use Assert\Assertion;
use yii\db\ActiveRecord;

class Phone extends ActiveRecord
{
    private $country;
    private $code;
    private $number;

    /**
     * @param integer $country
     * @param string $code
     * @param string $number
     */
    public function __construct($country, $code, $number)
    {
        Assertion::notEmpty($country);
        Assertion::notEmpty($code);
        Assertion::notEmpty($number);

        $this->country = $country;
        $this->code = $code;
        $this->number = $number;
        parent::__construct();
    }

    public function isEqualTo(self $phone)
    {
        return $this->getFull() === $phone->getFull();
    }

    public function getFull()
    {
        return '+' . $this->country . ' (' . $this->code . ') ' . $this->number;
    }

    public function getCountry() { return $this->country; }
    public function getCode() { return $this->code; }
    public function getNumber() { return $this->number; }

    ######## INFRASTRUCTURE #########

    public static function tableName()
    {
        return '{{%ar_employee_phones}}';
    }

    public static function instantiate($row)
    {
        $class = get_called_class();
        $object = unserialize(sprintf('O:%d:"%s":0:{}', strlen($class), $class));
        $object->init();
        return $object;
    }

    public function afterFind()
    {
        $this->country = $this->getAttribute('phone_country');
        $this->code = $this->getAttribute('phone_code');
        $this->number = $this->getAttribute('phone_number');

        parent::afterFind();
    }

    public function beforeSave($insert)
    {
        $this->setAttribute('phone_country', $this->country);
        $this->setAttribute('phone_code', $this->code);
        $this->setAttribute('phone_number', $this->number);

        return parent::beforeSave($insert);
    }
}
