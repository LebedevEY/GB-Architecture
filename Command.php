<?php

interface IAction {
    public function execute();

    public function cancel();
}

interface IUndo extends IAction {
    public function undo();
}

class CopyCommand implements IAction {

    public function execute()
    {
        echo ('copy');
    }

    public function cancel()
    {
        echo ('copy cancel');
    }
}

class CutCommand implements IAction {
    public function execute()
    {
        echo ('cut');
    }

    public function cancel()
    {
        echo ('cut cancel');
    }
}

class PasteCommand implements IAction {
    public function execute()
    {
        echo ('paste');
    }

    public function cancel()
    {
        echo ('paste cancel');
    }
}


class textRedactor  {
    protected string $start;
    protected string $end;


    public function highlight ($start, $end) {
        $this->start = $start;
        $this->end = $end;
    }

    public function copy() {
        //...
    }

    public function cut() {
        //...
    }

    public function paste () {
        //...
    }
}