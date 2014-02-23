#Central Reporting and Information System for Programs and Participants (CRISP/P)

##Deployment
Prerequisites:
- XAMPP

Deploying:
- Clone to **/xampp/htdocs** folder
- Import **crisp.sql** in phpMyAdmin

MySQL Debugging:
- If MySQL Workbench is installed, stop MySQL service
- Make sure MySQL username and password are both *root* via phpMyAdmin
	
Executing:
- Run XAMPP control panel and start Apache and MySQL modules
- Go to **localhost/crisp** in browser
	
NOTES:
- DROP all tables in crisp database for every crisp.sql import

##Implementation
Configure DB in **/application/config/database.php**
```php
$db['default']['hostname'] = 'localhost'; //MySQL server host
$db['default']['username'] = 'root'; //MySQL username
$db['default']['password'] = 'root'; //MySQL password
$db['default']['database'] = 'crisp'; //DB name
$db['default']['db_debug'] = FALSE; //disables DB error messages
```
Change Apache timezone in **php.ini**
```
date.timezone=Asia/Manila
```

##Production Deployment
Change application environment to in **index.php**
```php
//define('ENVIRONMENT', 'development');
define('ENVIRONMENT', 'production'); 
```