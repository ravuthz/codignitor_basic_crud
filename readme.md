# Codignitor Basic CRUD

Tasks:

- [x] Config & Create Database
- [x] Create Notes Table
- [x] Create Notes Model
- [ ] Create Notes Controller
- [ ] Create Notes Views

1. Config & Create Database: application/config/database.php

	```php
	'username' => 'root',
	'password' => '',
	'database' => 'codignitor_basic_crud',
	```

	```sql
	CREATE DATABASE `codignitor_basic_crud` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
	```

2. Create Notes Tables

	```sql
	CREATE TABLE `notes` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`name` varchar(50) NOT NULL,
		`slug` varchar(50) NOT NULL,
		`note` text NOT NULL,
		`created_at` datetime NOT NULL,
		`updated_at` datetime NOT NULL,
		PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8
	```