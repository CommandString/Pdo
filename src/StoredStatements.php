<?php

namespace CommandString\Pdo;

use CommandString\Pdo\Exceptions\StatementNameTaken;
use CommandString\Pdo\Sql\Statements\StorableStatement;
use PDOStatement;

class StoredStatements {
    private array $stmts = [];

    public function create(string $name): StorableStatement
    {
        if (isset($this->stmts[$name])) {
            throw new StatementNameTaken($name);
        }

        $this->stmts[$name] = new StorableStatement($name);

        $return = &$this->stmts[$name];

        return $return;
    }

    public function __get($name) {
        return $this->stmts[$name];
    }

    public function __set($name, $value) {
        $this->stmts[$name] = $value;
    }

    public function execute(string $name, array $beforeArgs = [], array $afterArgs = []): ?PDOStatement
    {
        if ($stmt = $this->stmts[$name]) {
           return $stmt->execute($beforeArgs, $afterArgs);
        }

        return null;
    }
}