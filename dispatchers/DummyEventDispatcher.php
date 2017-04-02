<?php

namespace app\dispatchers;

class DummyEventDispatcher implements EventDispatcher
{
    public function dispatch(array $events)
    {
        foreach ($events as $event) {
            \Yii::info('Dispatch event ' . get_class($event));
        }
    }
}