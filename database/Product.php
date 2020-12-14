<?php 

//Use to fetch data
class Product 
{
    public $database = null;

    public  function __construct(DBController $database) 
    {
        if(!isset($database->connexion)) return null;
        $this->database = $database;
    }

    //fetch product from db
    public function getProducts($table = 'product')
    {
        $sql = "SELECT * FROM {$table}";
        $products = $this->database->connexion->query($sql);
        $productsArray = array();

        while($item = mysqli_fetch_array($products, MYSQLI_ASSOC )) {
            $productsArray[]= $item;
        }
        return $productsArray;
    }

    public function getProduct($item_id = null, $table = 'product') 
    {
        if(isset($item_id)) {
        $result = $this->database->connexion->query("SELECT * FROM {$table} WHERE item_id = {$item_id}");
        $resultArray = array();

        while($item = mysqli_fetch_array($result, MYSQLI_ASSOC )) {
            $resultArray[]= $item;
        }

        return $resultArray;
        }
    }
}