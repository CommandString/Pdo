<?php

namespace CommandString\Pdo\Sql\Statements;

use CommandString\Pdo\Sql\Statements\Traits\Columns;
use CommandString\Pdo\Sql\Statements\Traits\Join;
use CommandString\Pdo\Sql\Statements\Traits\LimitOffset;
use CommandString\Pdo\Sql\Statements\Traits\OrderBy;
use CommandString\Pdo\Sql\Statements\Traits\Where;

final class Select {
    use Statement;
    use Where;
    use Columns;
    use LimitOffset;
    use Join;
    use OrderBy;

    public function from(string $table): self
    {
        return $this->table($table);
    }

    protected function build(): string
    {
        if (isset($this->query)) {
            $this->parameters = [];
        }

        $query = "SELECT";

        $this->buildColumns($query);     

        $query .= " FROM {$this->table}";

        $this->buildJoin($query);
        $this->buildOn($query);
        
        $this->buildWheres($query);

        $this->buildOrderBy($query);

        $this->buildLimit($query);
        $this->buildOffset($query);

        $this->query = $query;

        return $query;
    }
}