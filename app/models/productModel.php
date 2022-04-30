<?php
    class productModel extends Model{
        /*
        * Default constructor of the productModel class
        */
        public function __construct(){
            parent::__construct();
        }

        
        // NOTE: for the Manage Products table 
        // will need some testing!!
        /*
         * Retrieves all products of the hookah table and accessory table from the database
         */
        public function getAllProducts(){ 
            $this->query("SELECT hookah_id as product_id, name, price, IF(description, '', 'Hookah') as description 
                          FROM hookah
                          UNION 
                          SELECT accessory_id as product_id, name, price, IF(description, '', 'Accessory') as description 
                          FROM accessory
                          ORDER BY name ASC
                          ");
            
            return $this->getResultSet();
        }

        /*
         * Retrieves all hookahs from the database
         */
        public function getAllHookahs(){
            $this->query("SELECT * 
                          FROM hookah");
            
            return $this->getResultSet();
        }

        /*
         * Retrieves all accessories from the database
         */
        public function getAllAccessories(){
            $this->query("SELECT * 
                          FROM accessory");
            
            return $this->getResultSet();
        }

        /*
         * Retrieves a specific hookah from the database based on the hookahID
         */
        public function getHookah($hookah){
            $this->query("SELECT * 
                          FROM hookah 
                          WHERE hookah_id = :hookah_id");

            $this->bind(":hookah_id", $hookah["hookah_id"]);

            return $this->getSingle();
        }

        /*
         * Retrieves a accessory from the database based on the accessoryID
         */
        public function getAccessory($accessory){
            $this->query("SELECT * 
                          FROM accessory 
                          WHERE accessory_id = :accessory_id");

            $this->bind(":accessory_id",$accessory["accessory_id"]);

            return $this->getSingle();
        }

        /*
         * Adds a hookah to the database
         */
        public function addHookah($hookah){
            $this->query("INSERT INTO hookah (name, price, color, type, quantity, description, brand, image)
                          VALUES (:name, :price, :color, :type, :quantity, :description, :brand, :image) ");

            $this->bind(":name", $hookah["name"]);
            $this->bind(":price", $hookah["price"]);
            $this->bind(":color", $hookah["color"]);
            $this->bind(":type", $hookah["type"]);
            $this->bind(":quantity", $hookah["quantity"]);
            $this->bind(":description", $hookah["description"]);
            $this->bind(":brand", $hookah["brand"]);
            $this->bind(":image", $hookah["image"]);

            return $this->execute();
        }
        
        /*
         * Adds an accessory to the database
         */
        public function addAccessory($accessory){
            $this->query("INSERT INTO accessory (name, price, category, quantity, description, brand, image)
                          VALUES (:name, :price, :category, :quantity, :description, :brand, :image)" );

            $this->bind(":name", $accessory["name"]);
            $this->bind(":price", $accessory["price"]);
            $this->bind(":category", $accessory["category"]);
            $this->bind(":quantity", $accessory["quantity"]);
            $this->bind(":description", $accessory["description"]);
            $this->bind(":brand", $accessory["brand"]);
            $this->bind(":image", $accessory["image"]);
            
            return $this->execute();
        }

        /*
         * Updates a specific hookah to the database based on the hookahID
         */
        public function updateHookah($hookah){
            $this->query("UPDATE hookah 
                          SET name = :name, price = :price, color = :color, type = :type, quantity = :quantity, description = :description, brand = :brand, image = :image 
                          WHERE hookah_id = :hookah_id" );

            $this->bind(":name", $hookah["name"]);
            $this->bind(":price", $hookah["price"]);
            $this->bind(":color", $hookah["color"]);
            $this->bind(":type", $hookah["type"]);
            $this->bind(":quantity", $hookah["quantity"]);
            $this->bind(":description", $hookah["description"]);
            $this->bind(":brand", $hookah["brand"]);
            $this->bind(":image", $hookah["image"]);
            $this->bind(":hookah_id", $hookah["hookah_id"]);

            return $this->execute();
        }

        /*
         * Updates a specific accessory to the database based on the accessoryID
         */
        public function updateAccessory($accessory){
            $this->query("UPDATE accessory 
                          SET name = :name, price = :price, category = :category, quantity = :quantity, description = :description, brand = :brand, image = :image, hookah_id = :hookah_id 
                          WHERE accessory_id = :accessory_id" );

            $this->bind(":name", $accessory["name"]);
            $this->bind(":price", $accessory["price"]);
            $this->bind(":category", $accessory["category"]);
            $this->bind(":quantity", $accessory["quantity"]);
            $this->bind(":description", $accessory["description"]);
            $this->bind(":brand", $accessory["brand"]);
            $this->bind(":image", $accessory["image"]);
            $this->bind(":hookah_id", $accessory["hookah_id"]);
            $this->bind(":accessory_id", $accessory["accessory_id"]);

            return $this->execute();
        }

        /*
         * Deletes a specific hookah to the database based on the hookahID
         */
        public function deleteHookah($hookah){
            $this->query("DELETE 
                          FROM hookah 
                          WHERE hookah_id = :hookah_id");

            $this->bind(":hookah_id", $hookah["hookah_id"]);

            return $this->execute();
        }

        /*
         * Deletes a specific hookah to the database based on the hookahID
         */
        public function deleteAccessory($accessory){
            $this->query("DELETE 
                          FROM accessory 
                          WHERE accessory_id = :accessory_id");

            $this->bind(":accessory_id", $accessory["accessory_id"]);

            return $this->execute();
        }

        public function getHookahFilter($brand,$type,$color,$price, $sort){
            

            $query = "SELECT * FROM hookah ";
            $count = 0;

            if(!empty($brand)){
                $count++;

                $query .= "WHERE brand IN ('".implode("', '", $brand)."') ";
            }
            if(!empty($type))
            {
                if($count==0){
                    $query .= "WHERE type IN ('".implode("', '", $type)."') ";
                }
                else{
                    $query .= "AND type IN ('".implode("', '", $type)."') ";
                }    

                $count++;
            }
            if(!empty($color))
            {
                if($count==0){
                    $query .= "WHERE color IN ('".implode("', '", $color)."') ";                    
                }
                else{
                    $query .= "AND color IN ('".implode("', '", $color)."') ";
                }    
                
                $count++;
            }
            if (!empty($price)) {
                $priceCount = 0;
                foreach($price as $p) {
                    switch ($p) {
                        case '0':
                            if($count == 0){
                                $query .= "WHERE (price < 25) ";                
                            }
                            else{
                                if ($price == 0)
                                    $query .= "AND (price < 25) ";
                                else
                                    $query .= "OR (price < 25) ";    
                            }  
                            $count++;
                            break;
                        case '1':
                            if($count == 0){
                                $query .= "WHERE (price BETWEEN 25 AND 50) ";                
                            }
                            else{
                                if ($priceCount == 0)
                                    $query .= "AND (price BETWEEN 25 AND 50) ";
                                else
                                    $query .= "OR (price BETWEEN 25 AND 50) ";  
                                    $priceCount++;  
                            }  
                            $count++;
                            break;
                        case '2':
                            if($count == 0){
                                $query .= "WHERE (price BETWEEN 50 AND 100) ";                
                            }
                            else{
                                if ($priceCount == 0)
                                    $query .= "AND (price BETWEEN 50 AND 100) ";
                                else
                                    $query .= "OR (price BETWEEN 50 AND 100) ";    
                                $priceCount++;
                            }  
                            $count++;
                            break;
                        case '3':
                            if($count == 0){
                                $query .= "WHERE (price BETWEEN 100 AND 200) ";                
                            }
                            else{
                                if ($priceCount == 0)
                                    $query .= "AND (price BETWEEN 100 AND 200) ";
                                else
                                    $query .= "OR (price BETWEEN 100 AND 200) ";    
                                    $priceCount++;
                            }  
                            $count++;
                            break;
                        default:
                            if($count == 0){
                                $query .= "WHERE (price > 200) ";                
                            }
                            else{
                                if ($priceCount == 0)
                                    $query .= "AND (price > 200) ";
                                else
                                    $query .= "OR (price > 200) ";    
                                    $priceCount++;
                            }  
                            $count++;
                            break;
                    }
                }
            }
            if (isset($sort))
            {
                $query .= $sort == "0" ? "ORDER BY price ASC" : "ORDER BY price DESC";
            }
            $this->query($query);

            return $this->getResultSet();

        }

        public function getAccessoryFilter($brand,$price,$category, $sort){
            $query = "SELECT * FROM accessory ";
            $count = 0;

            if(!empty($brand)){
                $query .= "WHERE brand IN ('".implode("', '", $brand)."') ";
                
                $count++;
            }
            if(!empty($category))
            {
                if($count==0){
                    $query .= "WHERE category IN ('".implode("', '", $category)."') ";
                }
                else{
                    $query .= "AND category IN ('".implode("', '", $category)."') ";
                    
                }    

                $count++;
            }
            if (!empty($price)) {
                $priceCount = 0;
                foreach($price as $p) {
                    switch ($p) {
                        case '0':
                            if($count == 0){
                                $query .= "WHERE (price < 25) ";                
                            }
                            else{
                                if ($price == 0)
                                    $query .= "AND (price < 25) ";
                                else
                                    $query .= "OR (price < 25) ";    
                            }  
                            $count++;
                            break;
                        case '1':
                            if($count == 0){
                                $query .= "WHERE (price BETWEEN 25 AND 50) ";                
                            }
                            else{
                                if ($priceCount == 0)
                                    $query .= "AND (price BETWEEN 25 AND 50) ";
                                else
                                    $query .= "OR (price BETWEEN 25 AND 50) ";  
                                    $priceCount++;  
                            }  
                            $count++;
                            break;
                        case '2':
                            if($count == 0){
                                $query .= "WHERE (price BETWEEN 50 AND 100) ";                
                            }
                            else{
                                if ($priceCount == 0)
                                    $query .= "AND (price BETWEEN 50 AND 100) ";
                                else
                                    $query .= "OR (price BETWEEN 50 AND 100) ";    
                                $priceCount++;
                            }  
                            $count++;
                            break;
                        case '3':
                            if($count == 0){
                                $query .= "WHERE (price BETWEEN 100 AND 200) ";                
                            }
                            else{
                                if ($priceCount == 0)
                                    $query .= "AND (price BETWEEN 100 AND 200) ";
                                else
                                    $query .= "OR (price BETWEEN 100 AND 200) ";    
                                    $priceCount++;
                            }  
                            $count++;
                            break;
                        default:
                            if($count == 0){
                                $query .= "WHERE (price > 200) ";                
                            }
                            else{
                                if ($priceCount == 0)
                                    $query .= "AND (price > 200) ";
                                else
                                    $query .= "OR (price > 200) ";    
                                    $priceCount++;
                            }  
                            $count++;
                            break;
                    }
                }
            }
            if (isset($sort))
            {
                $query .= $sort == "0" ? "ORDER BY price ASC" : "ORDER BY price DESC";
            }
            $this->query($query);

            return $this->getResultSet();
        }

        /**
         * to get all the brands of hookah in the db (with no duplicate)
         */
        public function getHookahBrand() {
            $this->query("SELECT DISTINCT brand FROM hookah");
            return $this->getResultSet();
        }

        /**
         * to get all the types of hookah in the db (with no duplicate)
         */
        public function getHookahType() {
            $this->query("SELECT DISTINCT type FROM hookah");
            return $this->getResultSet();
        }

        /**
         * to get all the colors of hookah in the db (with no duplicate)
         */
        public function getHookahColor() {
            $this->query("SELECT DISTINCT color FROM hookah");
            return $this->getResultSet();
        }

        /**
         * to get all the categories of accessory in the db (with no duplicate)
         */
        public function getAccessoryCategory() {
            $this->query("SELECT DISTINCT category FROM accessory");
            return $this->getResultSet();
        }

        /**
         * to get all the brand of accessory in the db (with no duplicate)
         */
        public function getAccessoryBrand() {
            $this->query("SELECT DISTINCT brand FROM accessory");
            return $this->getResultSet();
        }
    }
?>