<?php

namespace CommandString\Pdo;

use PDO;

/**
 * @method self withUsername(string $username)
 * @method self withPassword(string $password)
 * @method self withDatabase(string $database)
 * @method self withHost(string $host)
 * @method self withPort(int $port)
 * @method self withOptions(array $options)
 */
class Driver {
    public readonly PDO $driver;
    private string $dsn;

    public function __construct(
        private string|null $username = null,
        private string|null $password = null,
        private string|null $database = null,
        private string $host = "127.0.0.1",
        private int $port = 3306,
        private array|null $options = null
    ) {}

    public function connect() {
        $this->dsn = sprintf("mysql:host=%s;port=%d;dbname=%s;", $this->host, $this->port, $this->database);
        $this->driver = new PDO($this->dsn, $this->username, $this->password, $this->options);

        return $this;
    }

    public function __call($name, $args)
    {
        if (str_contains($name, "with")) {
            if (isset($this->driver)) {
                trigger_error("Cannot modify $name property as the PDO driver has already been initialized.", E_USER_WARNING);
                return $this;
            }

            $name = strtolower(explode("with", $name)[1]);
            $value = $args[0];

            $allowed = ["username", "password", "database", "host", "port", "options"];

            if (!in_array($name, $allowed)) {
                return $this;
            }

            $this->$name = $value;
        } else if (!method_exists($this, $name)) {
            $this->driver->$name(...$args);
        }

        return $this;
    }
}