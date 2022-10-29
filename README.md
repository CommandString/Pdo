# CommandString/Pdo #
Making PDO easier to use with the power of magic

## Creating a connection
```php
$driver = (new Driver())
	->withUsername("root")
	->withPassword("password")
	->withDatabase("database")
	->withHost("127.0.0.1")
	->connect()
;
```

## Executing a query
```php
$driver->query("SELECT * FROM table");
$rows = $driver->fetchAll(PDO::FETCH_ASSOC);
```
The driver will store the PDOStatement internally and detect if the method your invoking exists in PDOStatement or PDO and invoke the method on the instance accordingly. *Thankfully there's no method names that are the same between the two classes*

## Preparing a statement
```php
$driver->prepare("SELECT * FROM table WHERE column = :column");
$driver->bindValue("column", "value");
$driver->execute();
$rows = $driver->fetchAll(PDO::FETCH_ASSOC);
```

## Singleton Constructor Argument
If you construct a Driver with the singleton method as `true` then that new instance will be stored as a static property in the class that can be called from anywhere with the `get` method. You can additionally call PDO/PDOStatement methods statically from Driver and it will `get` pass the method call request to the instance stored internally.
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
