<?php

interface Observer {
    public function handle();
}

abstract class Subject {

    protected $storage = [];

    public function attach(Observer $object) {
        $this->storage[] = $object;
    }

    public function detach(Observer $object) {
        foreach ($this->storage as $item) {
            if ($object === $item) {
                unset($item);
            }
        }
    }

    protected function notify() {
        foreach ($this->storage as $item) {
            $item->handle();
        }
    }

}

class VacancyNotificator implements Observer {
    public function handle()
    {
        // TODO: Implement handle() method.
    }
}