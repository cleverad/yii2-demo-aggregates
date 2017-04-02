<?php

namespace app\entities;

interface AggregateRoot
{
    /**
     * @return Id
     */
    public function getId();

    /**
     * @return array
     */
    public function releaseEvents();
}