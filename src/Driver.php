<?php

namespace CommandString\Pdo;

use Exception;
use LogicException;
use InvalidArgumentException;
use PDO;
use PDOStatement;
use stdClass;

/**
 * @method bool                         beginTransaction()                                                                                          Initiates a transaction
 * @method bool                         commit()                                                                                                    Commits a transaction
 * @method ?string                      errorCode()                                                                                                 Fetch the SQLSTATE associated with the last operation on the database handle
 * @method array                        errorInfo()                                                                                                 Fetch extended error information associated with the last operation on the database handle
 * @method int|false                    exec(string $statement)                                                                                     Execute an SQL statement and return the number of affected rows
 * @method mixed                        getAttribute(int $attribute)                                                                                Retrieve a database connection attribute
 * @method bool                         inTransaction()                                                                                             Checks if inside a transaction
 * @method string|false                 lastInsertId(?string $name = null)                                                                          Returns the ID of the last inserted row or sequence value
 * @method PDOStatement|false           prepare(string $query, array $options = [])                                                                 Prepares a statement for execution and returns a statement object
 * @method PDOStatement|false           query(string $query, ?int $fetchMode = null)                                                                Prepares and executes an SQL statement without placeholders
 * @method PDOStatement|false           query(string $query, ?int $fetchMode = FETCH_COLUMN, int $colo)                                             Prepares and executes an SQL statement without placeholders
 * @method PDOStatement|false           query(string $query, ?int $fetchMode = PDO::FETCH_CLASS, string $classname, array $constructorArgs = [])    Prepares and executes an SQL statement without placeholders
 * @method string|false                 quote(string $string, int $type = PDO::PARAM_STR)                                                           Quotes a string for use in a query
 * @method bool                         rollBack()                                                                                                  Rolls back a transaction
 * @method bool                         setAttribute(int $attribute, mixed $value)                                                                  Set an attribute
 * @method array                        getAvailableDrivers()                                                                                       Return an array of available PDO drivers
 * 
 * @method static bool                  beginTransaction()                                                                                          Initiates a transaction
 * @method static bool                  commit()                                                                                                    Commits a transaction
 * @method static ?string               errorCode()                                                                                                 Fetch the SQLSTATE associated with the last operation on the database handle
 * @method static array                 errorInfo()                                                                                                 Fetch extended error information associated with the last operation on the database handle
 * @method static int|false             exec(string $statement)                                                                                     Execute an SQL statement and return the number of affected rows
 * @method static mixed                 getAttribute(int $attribute)                                                                                Retrieve a database connection attribute
 * @method static bool                  inTransaction()                                                                                             Checks if inside a transaction
 * @method static string|false          lastInsertId(?string $name = null)                                                                          Returns the ID of the last inserted row or sequence value
 * @method static PDOStatement|false    prepare(string $query, array $options = [])                                                                 Prepares a statement for execution and returns a statement object
 * @method static PDOStatement|false    query(string $query, ?int $fetchMode = null)                                                                Prepares and executes an SQL statement without placeholders
 * @method static PDOStatement|false    query(string $query, ?int $fetchMode = FETCH_COLUMN, int $colo)                                             Prepares and executes an SQL statement without placeholders
 * @method static PDOStatement|false    query(string $query, ?int $fetchMode = PDO::FETCH_CLASS, string $classname, array $constructorArgs = [])    Prepares and executes an SQL statement without placeholders
 * @method static string|false          quote(string $string, int $type = PDO::PARAM_STR)                                                           Quotes a string for use in a query
 * @method static bool                  rollBack()                                                                                                  Rolls back a transaction
 * @method static bool                  setAttribute(int $attribute, mixed $value)                                                                  Set an attribute
 * @method static array                 getAvailableDrivers()                                                                                       Return an array of available PDO drivers
 * 
 * @method bool                 bindColumn(string|int $column, mixed &$var, int $type = PDO::PARAM_STR, int $maxLength = 0, mixed $driverOptions = null)    Bind a column to a PHP variable
 * @method bool                 bindParam(string|int $param, mixed &var, int $type = PDO::PARAM_STR, int $maxLength = 0, mixed $driverOptions = null)       Binds a parameter to the specified variable name
 * @method bool                 bindValue(string|int $param, mixed $value, int $type = PDO::PARAM_STR)                                                      Binds a value to a parameter
 * @method bool                 closeCursor()                                                                                                               Closes the cursor, enabling the statement to be executed again
 * @method int                  columnCount()                                                                                                               Returns the number of columns in the result set
 * @method ?bool                debugDumpParams()                                                                                                           Dump an SQL prepared command
 * @method ?string              errorCode()                                                                                                                 Fetch the SQLSTATE associated with the last operation on the statement handle
 * @method array                errorInfo()                                                                                                                 Fetch extended error information associated with the last operation on the statement handle
 * @method bool                 execute(?array $params = null)                                                                                              Executes a prepared statement
 * @method mixed                fetch(int $mode = PDO::FETCH_DEFAULT, int $cursorOrientation = PDO::FETCH_ORI_NEXT, int $cursorOffset = 0)                  Fetches the next row from a result set
 * @method array                fetchAll(int $mode = PDO::FETCH_DEFAULT)                                                                                    Fetches the remaining rows from a result set
 * @method array                fetchAll(int $mode = PDO::FETCH_COLUMN, int $column)                                                                        Fetches the remaining rows from a result set
 * @method array                fetchAll(int $mode = PDO::FETCH_CALL, string $class, ?array $constructorArgs)                                               Fetches the remaining rows from a result set
 * @method array                fetchAll(int $mode = PDO::FETCH_FUN, callable $callback)                                                                    Fetches the remaining rows from a result set
 * @method mixed                fetchColumn(int $column = 0)                                                                                                Returns a single column from the next row of a result set
 * @method object|false         fetchObject(?string $class = "stdClass", array $constructorArgs = [])                                                       Fetches the next row and returns it as an object
 * @method mixed                getAttribute(int $name)                                                                                                     Retrieve a statement attribute
 * @method array|false          getColumnMeta(int $column)                                                                                                  Returns metadata for a column in a result set
 * @method Iterator             getIterator()                                                                                                               Gets result set iterator
 * @method bool                 nextRowset()                                                                                                                Advances to the next rowset in a multi-rowset statement handle
 * @method int                  rowCount()                                                                                                                  Returns the number of rows affected by the last SQL statement
 * @method bool                 setAttribute(int $attribute, mixed $value)                                                                                  Set a statement attribute
 * @method bool                 setFetchMode(int $mode)                                                                                                     Set the default fetch mode for this statement
 * @method bool                 setFetchMode(int $mode = PDO::FETCH_COLUMN, int $colno)                                                                     Set the default fetch mode for this statement
 * @method bool                 setFetchMode(int $mode = PDO::FETCH_COLUMN, int $colno)                                                                     Set the default fetch mode for this statement
 * @method bool                 setFetchMode(int $mode = PDO::FETCH_CLASS, string $class, ?array $constructorArgs = null)                                   Set the default fetch mode for this statement
 * @method bool                 setFetchMode(int $mode = PDO::FETCH_INTO, object $object)                                                                   Set the default fetch mode for this statement 
 *
 * @method static bool          bindColumn(string|int $column, mixed &$var, int $type = PDO::PARAM_STR, int $maxLength = 0, mixed $driverOptions = null)    Bind a column to a PHP variable
 * @method static bool          bindParam(string|int $param, mixed &var, int $type = PDO::PARAM_STR, int $maxLength = 0, mixed $driverOptions = null)       Binds a parameter to the specified variable name
 * @method static bool          bindValue(string|int $param, mixed $value, int $type = PDO::PARAM_STR)                                                      Binds a value to a parameter
 * @method static bool          closeCursor()                                                                                                               Closes the cursor, enabling the statement to be executed again
 * @method static int           columnCount()                                                                                                               Returns the number of columns in the result set
 * @method static ?bool         debugDumpParams()                                                                                                           Dump an SQL prepared command
 * @method static ?string       errorCode()                                                                                                                 Fetch the SQLSTATE associated with the last operation on the statement handle
 * @method static array         errorInfo()                                                                                                                 Fetch extended error information associated with the last operation on the statement handle
 * @method static bool          execute(?array $params = null)                                                                                              Executes a prepared statement
 * @method static mixed         fetch(int $mode = PDO::FETCH_DEFAULT, int $cursorOrientation = PDO::FETCH_ORI_NEXT, int $cursorOffset = 0)                  Fetches the next row from a result set
 * @method static array         fetchAll(int $mode = PDO::FETCH_DEFAULT)                                                                                    Fetches the remaining rows from a result set
 * @method static array         fetchAll(int $mode = PDO::FETCH_COLUMN, int $column)                                                                        Fetches the remaining rows from a result set
 * @method static array         fetchAll(int $mode = PDO::FETCH_CALL, string $class, ?array $constructorArgs)                                               Fetches the remaining rows from a result set
 * @method static array         fetchAll(int $mode = PDO::FETCH_FUN, callable $callback)                                                                    Fetches the remaining rows from a result set
 * @method static mixed         fetchColumn(int $column = 0)                                                                                                Returns a single column from the next row of a result set
 * @method static object|false  fetchObject(?string $class = "stdClass", array $constructorArgs = [])                                                       Fetches the next row and returns it as an object
 * @method static mixed         getAttribute(int $name)                                                                                                     Retrieve a statement attribute
 * @method static array|false   getColumnMeta(int $column)                                                                                                  Returns metadata for a column in a result set
 * @method static Iterator      getIterator()                                                                                                               Gets result set iterator
 * @method static bool          nextRowset()                                                                                                                Advances to the next rowset in a multi-rowset statement handle
 * @method static int           rowCount()                                                                                                                  Returns the number of rows affected by the last SQL statement
 * @method static bool          setAttribute(int $attribute, mixed $value)                                                                                  Set a statement attribute
 * @method static bool          setFetchMode(int $mode)                                                                                                     Set the default fetch mode for this statement
 * @method static bool          setFetchMode(int $mode = PDO::FETCH_COLUMN, int $colno)                                                                     Set the default fetch mode for this statement
 * @method static bool          setFetchMode(int $mode = PDO::FETCH_COLUMN, int $colno)                                                                     Set the default fetch mode for this statement
 * @method static bool          setFetchMode(int $mode = PDO::FETCH_CLASS, string $class, ?array $constructorArgs = null)                                   Set the default fetch mode for this statement
 * @method static bool          setFetchMode(int $mode = PDO::FETCH_INTO, object $object)                                                                   Set the default fetch mode for this statement
 *  
 * @method self         withUsername(string $username)  Sets the username used when connecting to the database
 * @method self         withPassword(string $password)  Sets the password used when connecting to the database
 * @method self         withDatabase(string $database)  Sets the database that is connected to database
 * @method self         withHost(string $host)          Sets the host used when connecting to the database
 * @method self         withPort(int $port)             Sets the port used when connecting to the database
 * @method self         withOptions(array $options)     Sets the options used when connecting to the database
 * @method self         withDsn(string $dsn)            Sets the DSN used when connecting to the database
 * @method self         withPrefix(string $prefix)      Sets the DNS used when connecting to the database
 * 
 * @method static self  withUsername(string $username)  Sets the username used when connecting to the database
 * @method static self  withPassword(string $password)  Sets the password used when connecting to the database
 * @method static self  withDbName(string $database)    Sets the database that is connected to the database
 * @method static self  withHost(string $host)          Sets the host used when connecting to the database
 * @method static self  withPort(int $port)             Sets the port used when connecting to the database
 * @method static self  withOptions(array $options)     Sets the options used when connecting to the database
 * @method static self  withDsn(string $dsn)            Sets the DSN used when connecting to the database
 * @method static self  withPrefix(string $prefix)      Sets the prefix used when connecting to the database
 * 
 * @method static \CommandString\Pdo\Sql\Statements\Select select()     Create a new select query
 * @method static \CommandString\Pdo\Sql\Statements\Update update()     Create a new update query
 * @method static \CommandString\Pdo\Sql\Statements\Insert insert()     Create a new insert query
 * @method static \CommandString\Pdo\Sql\Statements\Delete delete()     Create a new delete query
 * 
 * @method \CommandString\Pdo\Sql\Statements\Select select()            Create a new select query
 * @method \CommandString\Pdo\Sql\Statements\Update update()            Create a new update query
 * @method \CommandString\Pdo\Sql\Statements\Insert insert()            Create a new insert query
 * @method \CommandString\Pdo\Sql\Statements\Delete delete()            Create a new delete query
 */
class Driver {
    public const PREFIX_MYSQL = "mysql";
    public const PREFIX_POSTGRES = "pgsql";
    public const PREFIX_CUBRID = "cubrid";
    public const PREFIX_ORACLE = "oci";
    public const PREFIX_SQLITE = "sqlite";
    public const PREFIX_ODBC = "odbc";
    public const PREFIX_IBM = "ibm";
    public const PREFIX_MS_SQL = "sqlsrv";
    public const PREFIX_MS_SQL_LIB = "sybase";
    public const PREFIX_INFORMIX = "informix";
    public const PREFIX_FIREBIRD = "firebird";

    /**
     * @var PDO $driver PDO's native driver
     * 
     * @see https://www.php.net/manual/en/class.pdo.php
     */
    public readonly PDO $driver;

    /**
     * @var PDOStatement $statement The last PDOStatement instance PDO returns
     * 
     * @see https://www.php.net/manual/en/class.pdostatement.php
     */
    public PDOStatement $statement;

    /**
     * @var string $dsn The Data Source Name that holds information used to connect to the database
     */
    private string $dsn;

    /**
     * @var string $username The username supplied when connecting to the database
     */
    private string $username;

    /**
     * @var string $password The password supplied when connecting to the database
     */
    private string $password;

    /**
     * @var stdClass Stores properties used in the DSN
     */
    private stdClass $dsn_props;

    /**
     * @var string $prefix The database you're connecting to e.g. mysql, pgsql
     */
    private string $prefix;

    /**
     * @var array $options Additional options for the connection
     */
    private array $options = [];

    /**
     * @var self $singleton 
     */
    private static self $instance;

    /**
     * @var storedStatements $storedStatements A class for storing storableStatement instances
     */
    private StoredStatements $storedStatements;

    /**
     * @param self $singleton if set to true the static method get will return this new instance.
     */
    public function __construct(bool $singleton = false)
    {
        if ($singleton) {
            self::$instance = $this;
        }

        $this->dsn_props = new stdClass;
        $this->storedStatements = new StoredStatements();
    }

    /**
     * Attempt to establish a connection with the database
     * 
     * @return self
     */
    public function connect(): self
    {
        if (!isset($this->dsn)) {
            $this->dsn = self::buildDsn($this->prefix, $this->dsn_props);
        }

        if (isset($this->driver)) {
            throw new LogicException("Driver has already been initialized!");
        }

        $this->driver = new PDO($this->dsn, $this->username ?? null, $this->password ?? null, $this->options);

        return $this;
    }

    private static function buildDsn(string $prefix, stdClass|array $dsn_props) {
        $dsn = "$prefix:";
        foreach ($dsn_props as $name => $value) {
            if (is_null($value)) {
                continue;
            }

            $dsn .= "$name=$value;";
        }

        return $dsn;
    }

    /**
     * @param string $prop
     * @param mixed $value
     * @return Driver
     */
    public function setDsnProp(string $prop, mixed $value): self
    {
        $this->dsn_props->$prop = $value;

        return $this;
    }

    /**
     * @param string $name
     * @param array $args
     */
    public function __call($name, $args)
    {
        if (in_array($name, ["select", "insert", "update", "delete"])) {
            $class = "\\CommandString\\Pdo\Sql\\Statements\\".ucfirst($name);

            return new $class($this);
        } else if (str_contains($name, "with")) {
            if (isset($this->driver)) {
                trigger_error("Cannot modify $name property as the PDO driver has already been initialized.", E_USER_WARNING);
                return $this;
            }

            $name = explode("with", $name)[1];
            $value = $args[0];

            $nonDSNProps = ["Options", "Dsn", "Prefix", "Username", "Password"];

            if (in_array($name, $nonDSNProps)) {
                $name = strtolower($name);
                $this->$name = $value;
            } else {
                $name = strtolower($name);
                $this->setDsnProp($name, $value);
            }
        } else if (method_exists("PDO", $name) && isset($this->driver)) {
            $return = $this->driver->$name(...$args);

            if ($return instanceof PDOStatement) {
                $this->statement = $return;
            }

            return $return;
        } else if (method_exists("PDOStatement", $name) && isset($this->statement)) {
            return $this->statement->$name(...$args);
        }

        return $this;
    }
    
    /**
     * Pass the $name and $args to the __call magic method after getting the instance from the static method property
     * 
     * @param string $name
     * @param array $args
     * 
     * @return mixed
     */
    public static function __callStatic($name, $args) {
        if ($name === "getAvailableDrivers") {
            return self::get()->driver->getAvailableDrivers();
        }

        return self::get()->__call($name, $args);
    }

    public function __get($name) {
        return ($name === "storedStatements") ? $this->storedStatements : $this->driver->$name ?? $this->statement?->$name ?? null;
    }

    /**
     * Get the Driver instance stored in the static $instance property
     * 
     * @return self
     */
    public static function get(): self 
    {
        if (!isset(self::$instance)) {
            throw new Exception("No instances have been constructed with the singleton option enabled!");
        }

        return self::$instance;
    }

    /**
     * Create a driver fit to connect to a mysql database
     * 
     * **NOTE YOU HAVE TO INVOKE THE CONNECT METHOD YOURSELF!**
     * @param string $username
     * @param string $password
     * @param string $dbname
     * @param string $host
     * @param string $port
     * @param string|null $unix_socket
     * @param string|null $charset
     * @return Driver
     */
    public static function createMySqlDriver(
        string $username,
        string $password,
        string $dbname,
        string $host = "127.0.0.1",
        int $port = 3306,
        ?string $unix_socket = null,
        ?string $charset = null
    ): self
    {
        return (new self)
            ->withDsn(
                self::buildDsn(self::PREFIX_MYSQL, [
                    "host" => $host,
                    "port" => $port,
                    "dbname" => $dbname,
                    "unix_socket" => $unix_socket,
                    "charset" => $charset
                ])
            )
            ->withUsername($username)
            ->withPassword($password)
        ;
    }

    /**
     * Creates a driver fit for connecting to a postgresql server
     * 
     * **NOTE YOU HAVE TO INVOKE THE CONNECT METHOD YOURSELF!**
     * @param string $username
     * @param string $password
     * @param string $dbname
     * @param string $host
     * @param int $port
     * @param string|null $sslMode
     * @return Driver
     */
    public static function createPostgresSqlDriver(
        string $username,
        string $password,
        string $dbname,
        string $host = "127.0.0.1",
        int $port = 5432,
        ?string $sslMode = null
    ): self
    {
        return (new self)
            ->withDsn(
                self::buildDsn(self::PREFIX_POSTGRES, [
                    "host" => $host,
                    "port" => $port,
                    "dbname" => $dbname,
                    "sslmode" => $sslMode
                ])
            )
            ->withUsername($username)
            ->withPassword($password)
        ;
    }


    /**
     * Creates a driver fit for opening an SQLite database
     * 
     * **NOTE YOU HAVE TO INVOKE THE CONNECT METHOD YOURSELF!**
     * @param string $db_path
     * @return self
     */
    public static function createSQLiteDriver(string $dbPath): self
    {
        $driver = new self;
        $path = realpath($dbPath);

        if (!$path) {
            throw new InvalidArgumentException("$dbPath is not an existing file");
        }

        $driver->dsn = self::PREFIX_SQLITE.":{$dbPath}";

        return $driver;
    }
}
