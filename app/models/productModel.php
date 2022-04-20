<?php
    class productModel extends Model{

        public function __construct(){
            parent::__construct();
        }

        public function getAllHookahs(){
            $this->query("SELECT * 
                          FROM hookah");
            
            return $this->getResultSet();
        }

        public function getAllAccessories(){
            $this->query("SELECT * 
                          FROM accessory");
            
            return $this->getResultSet();
        }

    }
?>