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

        public function getHookah($hookah){
            $this->query("SELECT * 
                          FROM hookah 
                          WHERE hookah_id = :hookah_id");

            $this->bind(":hookah_id",$hookah["hookah_id"]);

            return $this->getSingle();
        }

        public function getAccessory($accessory){
            $this->query("SELECT * 
                          FROM accessory 
                          WHERE accessory_id = :accessory_id");

            $this->bind(":accessory_id",$accessory["accessory_id"]);

            return $this->getSingle();
        }

        public function addHookah($hookah){
            $this->query("INSERT INTO hookah (name,price,color,type,quantity,description,brand,image)
                          VALUES (:name,:price,:color,:type,:quantity,:description,:brand,:image)" );

            $this->bind(":name",$hookah["name"]);
            $this->bind(":price",$hookah["price"]);
            $this->bind(":color",$hookah["color"]);
            $this->bind(":type",$hookah["type"]);
            $this->bind(":quantity",$hookah["quantity"]);
            $this->bind(":description",$hookah["description"]);
            $this->bind(":brand",$hookah["brand"]);
            $this->bind(":image",$hookah["image"]);

            return $this->execute();
        }

        public function addAccessory($accessory){
            $this->query("INSERT INTO accessory (name,price,category,quantity,description,brand,image)
                          VALUES (:name,:price,:category,:quantity,:description,:brand,:image)" );

            $this->bind(":name",$accessory["name"]);
            $this->bind(":price",$accessory["price"]);
            $this->bind(":category",$accessory["category"]);
            $this->bind(":quantity",$accessory["quantity"]);
            $this->bind(":description",$accessory["description"]);
            $this->bind(":brand",$accessory["brand"]);
            $this->bind(":image",$accessory["image"]);
            
            return $this->execute();
        }

        public function updateHookah($hookah){
            $this->query("UPDATE hookah 
                          SET name = :name, price = :price, color = :color, type = :type, quantity = :quantity, description = :description, brand = :brand, image = :image 
                          WHERE hookah_id = :hookah_id" );

            $this->bind(":name",$hookah["name"]);
            $this->bind(":price",$hookah["price"]);
            $this->bind(":color",$hookah["color"]);
            $this->bind(":type",$hookah["type"]);
            $this->bind(":quantity",$hookah["quantity"]);
            $this->bind(":description",$hookah["description"]);
            $this->bind(":brand",$hookah["brand"]);
            $this->bind(":image",$hookah["image"]);
            $this->bind(":hookah_id",$hookah["hookah_id"]);

            return $this->execute();
        }

        public function updateAccessory($accessory){
            $this->query("UPDATE accessory 
                          SET name = :name, price = :price, category = :category, quantity = :quantity, description = :description, brand = :brand, image = :image, hookah_id = :hookah_id 
                          WHERE accessory = :accessory_id" );

            $this->bind(":name",$accessory["name"]);
            $this->bind(":price",$accessory["price"]);
            $this->bind(":category",$accessory["category"]);
            $this->bind(":quantity",$accessory["quantity"]);
            $this->bind(":description",$accessory["description"]);
            $this->bind(":brand",$accessory["brand"]);
            $this->bind(":image",$accessory["image"]);
            $this->bind(":hookah_id",$accessory["hookah_id"]);
            $this->bind(":accessory_id",$accessory["accessory_id"]);

            return $this->execute();
        }

        public function deleteHookah($hookah){
            $this->query("DELETE 
                          FROM hookah 
                          WHERE hookah_id = :hookah_id");

            $this->bind(":hookah_id",$hookah["hookah_id"]);

            return $this->execute();
        }

        public function deleteAccessory($accessory){
            $this->query("DELETE 
                          FROM accessory 
                          WHERE accessory_id = :accessory_id");

            $this->bind(":accessory_id",$accessory["accessory_id"]);

            return $this->execute();
        }
    }
?>