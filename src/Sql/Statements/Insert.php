<?php


namespace CommandString\Pdo\Sql\Statements;

use CommandString\Pdo\Sql\Statements\Traits\Values;

final class Insert {
    use Statement;
    use Values;

    public function into(string $table): self
    {
        return $this->table($table);
    }

    protected function build(): string
    {
        $this->parameters = [];

        $query = "INSERT INTO {$this->table} ";

        $this->buildValues($query);

        return $query;
    }
}