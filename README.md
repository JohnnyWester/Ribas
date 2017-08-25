Test case for junior php developer | Ribas
============================

CONFIGURATION
-------------

### Database

You can create database with next command or whatever you like:

```mysql
CREATE DATABASE `ribasblog` CHARACTER SET utf8 COLLATE utf8_general_ci;
```

You can copy the file `config/db_example.php` into `config/db.php`.
Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=ribasblog',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

Run migrations to create tables in database:

```
$ php yii migrate
```

**NOTES:**
- Yii won't create the database for you, this has to be done manually before you can access it.
- Check and edit the other files in the `config/` directory to customize your application as required.
- Refer to the README in the `tests` directory for information specific to basic application tests.
