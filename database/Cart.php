<?php

//php cart class
class Cart 
{

    public $database = null;

    public function __construct(DBController $database) 
    {
        if(!isset($database->connexion)){return null;} 
        $this->database = $database;
    }

    //insert into cart table
    public function insertIntoCart($params = null, $table = "cart")
    {
        if($this->database->connexion != null) {
            if($params != null) {
                $columns = implode(',', array_keys($params));
                $values = implode(',', array_values($params));

                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);
                $result = $this->database->connexion->query($query_string);
                return $result;

            }
        }
    }

    //get user_id and cart table

    public function addToCart($userid, $itemid)
    {
        if(isset($userid ) && isset ($itemid))
        {
            $params = array(
                "user_id" =>$userid,
                "item_id" =>$itemid,
            );
        }

        $result = $this->insertIntoCart($params);
        if($result)
        {
            //reload page
            header("Location:".$_SERVER['PHP_SELF']);
        }
    }

    public function getSum($arr)
    {
        if(isset($arr)) {
            $sum = 0;
            foreach($arr as $item) {
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f', $sum);
        }
    }

    public function delete($item_id = null, $table = 'cart') {
        if($item_id != null) {
            $result = $this->database->connexion->query("DELETE FROM {$table} WHERE item_id = {item_id}");
            if($result) {
                header("Location:" . $_SERVER["PHP_SELF"]);
            }
            return $result;
        }
    }
}

