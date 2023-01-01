<?php

namespace CommandString\Pdo\Sql\Statements;

use CommandString\Pdo\Sql\Statements\Statement;
use CommandString\Pdo\Sql\Statements\Traits\Where;

class Delete {
    use Statement;
    use Where;

    public function from(string $table): self
    {
        return $this->table($table);
    }

    public function build(): string
    {
        $query = "DELETE FROM {$this->table}";

        $this->buildWheres($query);

        return $query;
    }
}