crisp
=====

CRISP Project Repository
========================

Deployment Prerequisites:
	- XAMPP

Deploying:
	1. Clone to /xampp/htdocs folder
	2. Import crisp.sql in phpMyAdmin

MySQL Debugging:
	- If MySQL Workbench is installed, stop MySQL service
	- Make sure MySQL username and password are both 'root' via phpMyAdmin
	
Executing:
	1. Run XAMPP control panel and start Apache and MySQL modules
	2. Go to localhost/crisp in browser
	
NOTES:
	- DROP all tables in crisp database for every crisp.sql import
