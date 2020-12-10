<?php

//MySQL connection
require ('database/DBController.php');
require ('database/Product.php');

//DBcontroller object
$database = new DBController;
$product = new Product($database);
