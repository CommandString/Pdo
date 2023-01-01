<?php

namespace CommandString\Pdo\Sql\Statements;

use CommandString\Pdo\Sql\Statements\Traits\Where;
use CommandString\Pdo\Sql\Statements\Traits\Set;

class Update {
    use Statement;
    use Where;
    use Set;

    public function build(): string
    {
        $query = "UPDATE {$this->table}";
        
        $this->buildSets($query);

        $this->buildWheres($query);

        return $query;
    }
}