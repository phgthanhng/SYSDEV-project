<?php
    class productModel extends Model{
        /*
        * Default constructor of the productModel class
        */
        public function __construct(){
            parent::__construct();
        }

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

        /*
         * Filter a hookah product 
         * @param $brand array of brands
         * @papram $type array of colors
         * @param $price array of price ID(0, 1, 2, 3, 4)
         * @param $sort chosen sort type(ascending or descending)
         */
        public function getHookahFilter($brand, $type, $color, $price, $name, $sort){
            $query = "SELECT * FROM hookah ";
            $columnCount = 0;

        // BRAND filtering
            if (!empty($brand)) 
            {
                $query .= "WHERE brand IN ('".implode("', '", $brand)."') ";
                $columnCount++;
            }
        
        // TYPE filtering
            if (!empty($type))
            {
                $query .= $columnCount == 0 ? "WHERE type IN ('".implode("', '", $type)."') "
                        : "AND type IN ('".implode("', '", $type)."') ";
                $columnCount++;
            }

        // COLOR filtering
            if(!empty($color))
            {
                $query .= $columnCount == 0 ? "WHERE color IN ('".implode("', '", $color)."') " 
                        :  "AND color IN ('".implode("', '", $color)."') ";
                $columnCount++;
            }

        // NAME filtering
            if(!empty($name))
            {
                $query .= $columnCount == 0 ? "WHERE name LIKE '%".$name."%' " 
                        :  "AND name LIKE '%".$name."%' ";
                $columnCount++;
            }
        
        // PRICE filtering
            if(!empty($price)) {
                $priceCount = 0;        // counter that describes how many checked price range option was chosen in the filter
                $p1 = "price < 25";
                $p2 = "price BETWEEN 25 AND 50";
                $p3 = "price BETWEEN 50 AND 100";
                $p4 = "price BETWEEN 100 AND 200";
                $p5 = "price > 200";
                foreach($price as $p) {
                    switch ($p) {
                        case '0':
                            if ($columnCount == 0 && $priceCount == 0) 
                                $query .= "WHERE ({$p1}) ";                
                            else
                                $query .= $priceCount == 0 ? "AND ({$p1} " : "OR {$p1} ";   

                            break;

                        case '1':
                            if ($columnCount == 0 && $priceCount == 0)
                                $query .= "WHERE ({$p2}) ";                
                            
                            else
                                $query .= $priceCount == 0 ? "AND ({$p2} " : "OR {$p2} ";  
                            
                            break;

                        case '2':
                            if ($columnCount == 0 && $priceCount == 0)
                                $query .= "WHERE ({$p3}) ";                
                            
                            else 
                                $query .=  $priceCount == 0 ? "AND ({$p3} " : "OR {$p3} ";    
                                
                            break;

                        case '3':
                            if ($columnCount == 0 && $priceCount == 0)
                                $query .= "WHERE ({$p4}) ";                
                            
                            else 
                                $query .=  $priceCount == 0 ? "AND ({$p4} " : "OR {$p4} ";    
                                
                            break;

                        default:
                            if ($columnCount == 0 && $priceCount == 0) 
                                $query .= "WHERE ({$p5}) ";                
                            
                            else 
                                $query .= $priceCount == 0 ? "AND ({$p5} " : "OR {$p5} ";    
                                
                            break;
                    }
                    $priceCount++; // inside foreach loop because this one deals with price ranges

                }
                if ($columnCount > 0)
                  $query .= ") ";

                $columnCount++; // outside foreach loop because this counter deals with brand, type, color and price
        
            }
            
            // SORT BY PRICE
            if (isset($sort))
                $query .= $sort == "0" ? "ORDER BY price ASC" : "ORDER BY price DESC";

            $this->query($query);

            return $this->getResultSet();
        }


        /*
         * Filters the accessory depending on the brand, price, catgegory, and sort by price chosen 
         * @param $brand array of brands
         * @param $price array of price ID
         * @param $category array of categories
         * @param $sort sorting type
         */
        public function getAccessoryFilter($brand, $price, $category, $name, $sort) {
            $query = "SELECT * FROM accessory ";
            $count = 0;

            // BRAND filtering
            if (!empty($brand)) {
                $query .= "WHERE brand IN ('".implode("', '", $brand)."') ";
                $count++;
            }   
            
            // CATEGORY filtering
            if (!empty($category)) {
                $query .= $count == 0 ? "WHERE category IN ('".implode("', '", $category)."') "
                        : "AND category IN ('".implode("', '", $category)."') ";  
                $count++;
            }

            // NAME filtering
            if (!empty($name))
            {
                $query .= $count == 0 ? "WHERE name LIKE '%".$name."%' " 
                        :  "AND name LIKE '%".$name."%' ";
                $count++;
            }

            // PRICE filtering
            if (!empty($price)) {  // counter that describes how many checked price range option was chosen in the filter
                
                $priceCount = 0; 
                foreach($price as $p) {
                    switch ($p) {

                        case '0':
                            if ($count == 0) 
                                $query .= "WHERE (price < 25) ";                
                            else
                                $query .= $priceCount == 0 ? "AND (price < 25) " : "OR (price < 25) ";   

                            $priceCount++;
                            break;

                        case '1':
                            if ($count == 0)
                                $query .= "WHERE (price BETWEEN 25 AND 50) ";                
                            
                            else
                                $query .= $priceCount == 0 ? "AND (price BETWEEN 25 AND 50) " : "OR (price BETWEEN 25 AND 50) ";  
                            
                            $priceCount++;
                            break;

                        case '2':
                            if ($count == 0)
                                $query .= "WHERE (price BETWEEN 50 AND 100) ";                
                            
                            else 
                                $query .=  $priceCount == 0 ? "AND (price BETWEEN 50 AND 100) " : "OR (price BETWEEN 50 AND 100) ";    
                                
                            $priceCount++;
                            break;

                        case '3':
                            if ($count == 0)
                                $query .= "WHERE (price BETWEEN 100 AND 200) ";                
                            
                            else 
                                $query .=  $priceCount == 0 ? "AND (price BETWEEN 100 AND 200) " : "OR (price BETWEEN 100 AND 200) ";    
                                
                            $priceCount++;
                            break;

                        default:
                            if ($count == 0) 
                                $query .= "WHERE (price > 200) ";                
                            
                            else 
                                $query .= $priceCount == 0 ? "AND (price > 200) " : "OR (price > 200) ";    
                                
                            $priceCount++;
                            break;
                    }
                    $count++; // increase counter if any/more price checkbox was checked
                }
            }

            // SORT BY PRICE
            if (isset($sort))
                $query .= $sort == "0" ? "ORDER BY price ASC" : "ORDER BY price DESC";

            $this->query($query);
            return $this->getResultSet();
        }

        /*
         *  Retrieves all the brands of hookah in the database (with no duplicate)
         */
        public function getHookahBrand() {
            $this->query("SELECT DISTINCT brand FROM hookah");
            return $this->getResultSet();
        }

        /*
         * Retrieves all the types of hookah in the database (with no duplicate)
         */
        public function getHookahType() {
            $this->query("SELECT DISTINCT type FROM hookah");
            return $this->getResultSet();
        }

        /*
         * Retrieves all the colors of hookah in the database (with no duplicate)
         */
        public function getHookahColor() {
            $this->query("SELECT DISTINCT color FROM hookah");
            return $this->getResultSet();
        }

        /*
         * Retrieves all the categories of accessory in the database (with no duplicate)
         */
        public function getAccessoryCategory() {
            $this->query("SELECT DISTINCT category FROM accessory");
            return $this->getResultSet();
        }

        /*
         * Retrieves all the brand of accessory in the databse (with no duplicate)
         */
        public function getAccessoryBrand() {
            $this->query("SELECT DISTINCT brand FROM accessory");
            return $this->getResultSet();
        }
    }
?>