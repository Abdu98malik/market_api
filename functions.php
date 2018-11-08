<?php 

include "pgsql.php";

class Functions{
    private $db;
    function __construct(){
        
        $this->db = new DB("localhost", "market", "postgres", "root");
        $this->db->open();
        
    }

    public function addProduct($arg)
    {
        if(!$this->getProduct_Bool($id)){
            $this->db->query("INSERT INTO products VALUES (\'".pg_escape_string($arg['id'])."','".pg_escape_string($arg['name'])."','".pg_escape_string(
                $arg['cost'])."','".pg_escape_string($arg['category'])."','".pg_escape_string($arg['amount'])."')");
                return TRUE;
       }else{
           return FALSE;
       }
    }

    public function getProduct($id){
        $this->db->query("SELECT * FROM products WHERE id=".pg_escape_string($id));
        return $this->db->fetchAll();
    }

    public function getProduct_Bool($id){
        $this->db->query("SELECT id FROM products WHERE id=".pg_escape_string($id));
        if($this->db->numRows()>0){
            return 1;
        }else{
            return 0;
        }
    }

    public function deleteProduct($id){
        if($this->getProduct_Bool($id)){
        $this->db->query("DELETE FROM products WHERE id=".pg_escape_string($id));
            return 1;
        }else{
             return 0;
         }
    } 

    public function updateCost($arg){
        if($this->getProduct_Bool($arg['id'])){
            $this->db->query("UPDATE products SET cost=".pg_escape_string($arg['cost'])." WHERE id= ".pg_escape_string($arg['id']));
            return 1;
        }else{
            return 0;
        }
    }

    public function addCategory($cat){
        if(!$this->getCategory()){
            $this->db->query("INSERT INTO categories VALUES (\'".pg_escape_string($cat)."\')");
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function addAmount($amount){
        if(!$this->getAmount()){
            $this->db->query("INSERT INTO amounts VALUES (\'".pg_escape_string($amount)."\')");
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function getCategory($cat){
        $this->db->query("SELECT category FROM categories WHERE category=\'".pg_escape_string($cat)."'");
        if($this->db->numRows()>0){
            return 1;
        }else{
            return 0;
        }
    }

    public function getAmount($amount){
        $this->db->query("SELECT amount FROM amounts WHERE amount=\'".pg_escape_string($amount)."'");
        if($this->db->numRows()>0){
            return 1;
        }else{
            return 0;
        }
    }

    
}


}



?>