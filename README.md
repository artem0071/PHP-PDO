How to  use it
===========================

### Files:

* config.php // file with settings of DB
* DB.php // class of DB
* index.php // examples

### How to work

First of all you should to initialize class. For exemple like this: 

```php
$DB = new DB(require 'config.php');
```

File `config.php` should be an associative array:
```php
return [
    'connection' => 'mysql:host=127.0.0.1',
    'name' => 'test1',
    'username' => 'root',
    'password' => '',
    'options' => [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
];
```
Now you can work with Class.

To `SELECT` something from DB you should refer to `$DB->select()`.

There are parameters of `select('@param1','@param2','@param3','@param4','@param5')`:

* @param1 // Table in DB where to Select
* @param2 // What to Select (For example: 'test_id,test_text', or you can write '*' to Select all columns).
* @param3 // Some conditions (**OPTIONAL**)
* @param4 // How to order (**OPTIONAL**)
* @param5 // Limits (**OPTIONAL**)

To `INSERT` something in DB you should refer to `$DB->insert()`.

There are parameters of `insert('@param1','@param2')`:

* @param1 // Table in DB where to Insert
* @param2 // What to Insert 

Use it like this:
```php
$DB->insert( 'Table_Where_To_Insert',
    [
        'Name_Of_Column1' => $param1,
        'Name_Of_Column2' => $param2,
        'Name_Of_Column3' => $param3,
    ]
);
```

To `UPDATE` something in DB you should refer to `$DB->update()`.

There are parameters of `update('@param1','@param2','@param3')`:

* @param1 // Table in DB where to Insert
* @param2 // What to Insert 
* @param3 // Some conditions

Use it like this:
```php
$DB->update( 'Table_Where_To_Update',
    [
        'Name_Of_Column1' => $param1,
        'Name_Of_Column2' => $param2,
        'Name_Of_Column3' => $param3,
    ],
    [
        'Name_Of_Column_With_Condition1' => $condition1,
        'Name_Of_Column_With_Condition2' => $condition2
    ]
);
```

To `DELETE` something in DB you should refer to `$DB->insert()`.

There are parameters of `delete('@param1','@param2')`:

* @param1 // Table in DB where to Delete
* @param2 // What to Delete 

Use it like this:
```php
$DB->delete( 'Table_Where_To_Delete',
    [
        'Name_Of_Column_With_Condition1' => $condition1,
        'Name_Of_Column_With_Condition2' => $condition2
    ]
);
```


