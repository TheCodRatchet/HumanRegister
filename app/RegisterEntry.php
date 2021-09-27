<?php

namespace app;

use League\Csv\Writer;

class RegisterEntry
{
    private Writer $record;

    public function __construct(string $name, string $surname, string $id, string $info)
    {
        $this->record = Writer::createFromPath("app/register.csv", "a+");
        $message = [$name, $surname, $id, $info];
        $this->record->insertOne($message);
    }
}