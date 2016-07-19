<?php
		define('DB_SERVER', 'localhost');
		define('USER', 'root');
		define('PASSWORD', '');
		define('DATABASE', 'logregsiter');
		define('DB_PREFIX', '');
		mysql_connect(DB_SERVER,USER,PASSWORD);
		mysql_select_db(DATABASE);
		error_reporting(0);
?>