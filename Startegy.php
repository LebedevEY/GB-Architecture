<?php
interface IPaying {
    public function pay(int $sum, string $number);
}

class QiwiPaying implements IPaying {

    public function pay(int $sum, string $number)
    {
        echo ('Qiwi');
        echo ("\n");
        echo ($sum . ' ' . $number);
        echo ("\n");
    }
}

class YandexPaying implements IPaying {

    public function pay(int $sum, string $number)
    {
        echo ('Yandex');
        echo ("\n");
        echo ($sum . ' ' . $number);
        echo ("\n");
    }
}

class WebMoneyPaying implements IPaying {

    public function pay(int $sum, string $number)
    {
        echo ('WebMoney');
        echo ("\n");
        echo ($sum . ' ' . $number);
        echo ("\n");
    }
}

class Order {
    private int $sum;
    private string $number;

    public function __construct(int $sum, string $number)
    {
        $this->sum = $sum;
        $this->number = $number;
    }

    public function pay(IPaying $paying) {
        $paying->pay($this->sum, $this->number);
    }
}

$myOrder = new Order(100, '+7 999 888-77-66');


$myOrder->pay(new QiwiPaying());
$myOrder->pay(new WebMoneyPaying());
$myOrder->pay(new YandexPaying());