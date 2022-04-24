<?php
//Decorator
interface SendInterface {
    public function send();
}

class Sender implements SendInterface {

    public function send()
    {
        // TODO: Implement send() method.
        return;
    }
}

class SendEmail implements SendInterface {
    protected SendInterface $sender;

    public function __construct(SendInterface $sender)
    {
        $this->sender = $sender;
    }

    public function send(): string
    {
        $this->sendEmail();
        return $this->sender->send();
    }

    private function sendEmail()
    {
        // ...
    }
}

class SendSms extends Sender {
    protected SendInterface $sender;

    public function __construct(SendInterface $sender)
    {
        $this->sender = $sender;
    }

    public function send(): string
    {
        $this->sendSms();
        return $this->sender->send();
    }

    private function sendSms()
    {
        // ...
    }
}

class SendCN extends Sender {
    protected SendInterface $sender;

    public function __construct(SendInterface $sender)
    {
        $this->sender = $sender;
    }

    public function send(): string
    {
        $this->sendCN();
        return $this->sender->send();
    }

    private function sendCN()
    {
        // ...
    }
}

$sender = new SendCN(
    new SendSms(
        new SendEmail(
            new Sender()
        )
    )
);

$sender->send();