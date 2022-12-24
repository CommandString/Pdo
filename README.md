# CommandString/Pdo #
Making PDO easier with the power of magic

## Installation
`composer require commandstring/pdo`

# Creating a connection
## Doing so manually
```php
$driver = (new Driver)
	->withUsername("root")
	->withPassword("password")
	->withDatabase("database")
	->withHost("127.0.0.1")
	->withPort(3306)
	->withPrefix(Driver::PREFIX_MYSQL)
	->connect()
;
```

*You can use Driver::setDsnProp or Driver::with{insert dsn prop name here} to set additional dsn values*

## Using the database predefined createDriver method

*I currently only have mysql and postgres specific methods*

```php
$driver = Driver::createMySqlDriver("root", "password", "database")->connect();
$driver = Driver::createPostgresSqlDriver("root", "password", "database")->connect();

// you can set the host and port in the last two parameters but they default to localhost and the default port of the service
```

# Executing a query
```php
$rows = $driver->query("SELECT * FROM table")->fetchAll(PDO::FETCH_ASSOC);
```
The driver will store the PDOStatement internally and detect if the method your invoking exists in PDOStatement or PDO and invoke it on one of the instances accordinly. *Thankfully there's no method names that are the same between the two classes*

# Preparing a statement
```php
$driver->prepare("SELECT * FROM table WHERE column = :column");
$driver->bindValue("column", "value");
$driver->execute();
$rows = $driver->fetchAll(PDO::FETCH_ASSOC);
```

# Singleton Constructor Argument
If you construct a Driver with the singleton argument as `true` then that new instance will be stored as a static property in the class that can be called from anywhere with the `get` method. You can additionally call PDO/PDOStatement methods statically from Driver and it will work similar to `$driver->methodName`
```php
(new Driver(true))
	->withUsername("root")
	->withPassword("password")
	->withDatabase("database")
	->withHost("127.0.0.1")
	->connect()
;

function getRowWhereIdIs(int $id, int $fetch_type = PDO::FETCH_ASSOC): mixed
{
	Driver::prepare("SELECT * FROM table WHERE id = :id");
	Driver::bindValue("id", $id);
	Driver::execute();
	return Driver::fetch($fetch_type);
}

$row = getRowWhereIdIs(20);
```
