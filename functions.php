<?php
ob_start();
//MySQL connection
require ('database/DBController.php');
require ('database/Product.php');
require ('database/Cart.php');

//DBcontroller object
$database = new DBController;
$product = new Product($database);
$productDatas = $product->getProducts();
$cart = new Cart($database);

