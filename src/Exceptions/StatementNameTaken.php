<?php

namespace CommandString\Pdo\Exceptions;

class StatementNameTaken extends \Exception
{
    public function __construct(string $name)
    {
        parent::__construct("A statement has already been stored under the name $name!");
    }
}