<?php

class VacancySubject implements SplSubject {

    protected array $storage = [];

    public function attach(SplObserver $observer)
    {
        $this->storage[] = $observer;
    }

    public function detach(SplObserver $observer)
    {
        foreach ($this->storage as $key => $item) {
            if ($item === $observer) {
                unset($this->storage[$key]);
            }
        }
    }

    public function notify()
    {
        foreach ($this->storage as $item) {
            $item->getEmail();
        }
    }
}

class User implements SplObserver {
    protected string $email;

    public function __construct($email)
    {
        $this->email = $email;
    }


    public function update(SplSubject $subject)
    {
        // TODO: Implement update() method.
    }


    public function getEmail(): void
    {
        echo ($this->email);
        echo ("\n");
    }
}

$user1 = new User('test1@mail.ru');
$user2 = new User('test2@mail.ru');
$user3 = new User('test3@mail.ru');

$vacancyNotifyer = new VacancySubject();

$vacancyNotifyer->attach($user1);
$vacancyNotifyer->attach($user2);
$vacancyNotifyer->attach($user3);
$vacancyNotifyer->notify();
$vacancyNotifyer->detach($user2);
echo ("\n");
$vacancyNotifyer->notify();