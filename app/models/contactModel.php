<?php
    class contactModel extends Model{
        
        /*
         * Default constructor of the contactModel class
         */
        public function __construct(){
            parent::__construct();
        }

        // public function getAdmin($admin_id){
        //     $this->query("SELECT contact_id 
        //                   FROM admin 
        //                   WHERE admin_id = :admin_id");

        //     $this->bind("admin_id",$admin_id);

        //     return $this->getSingle();

        // }

        
        /*
         * Retrieves all contact record from the database
         */
        public function getAllContact(){
            $this->query("SELECT * 
                          FROM contact");
    
            return $this->getResultSet();
        }

        /*
         * Retrieves a specific contact record from the database based on the adminID 
         */
        public function getContact($admin_id) {  
            $this->query("SELECT businessEmail, location, name 
                          FROM contact 
                          WHERE admin.admin_id = :admin_id 
                          JOIN admin ON contact.admin_id = admin.admin_id");

            $this->bind(":admin_id", $admin_id);

            return $this->getSingle();
        }

        public function getContactById($id) {  
            $this->query("SELECT businessEmail, phone, location, name 
                          FROM contact 
                          WHERE contact_id = :contact_id");

            $this->bind(":contact_id", $id);

            return $this->getSingle();
        }
   
        /*
         * Updates a specific contact record from the database based on the adminID
         */
        public function updateContact($admin_id, $contact) { 
            $this->query("UPDATE contact 
                          SET businessEmail = :email, location = :location, phone = :phone, name = :name 
                          WHERE contact_id = (
                              SELECT contact_id FROM admin WHERE admin_id = :admin_id
                          )");

            $this->bind(":admin_id", $admin_id);
            $this->bind(":email", $contact["email"]);
            $this->bind(":location", $contact["location"]);
            $this->bind(":phone", $contact["phone"]);
            $this->bind(":name", $contact["name"]);

            return $this->execute();
        }

        // public function updateEmail($admin_id,$email){


            // $this->query("UPDATE contact 
            //               businessEmail = :email 
            //               WHERE contact.admin_id = :admin_id 
            //               JOIN admin ON contact.admin_id = admin.admin_id");

        //     $this->bind("email",$email);
        //     $this->bind("admin_id",$admin_id);

        //     return $this->execute();
        // }

        // public function updateLocation($admin_id,$location){


        //     $this->query("UPDATE contact 
        //                   location = :location 
        //                   WHERE admin.admin_id = :admin_id 
        //                   JOIN admin ON contact.admin_id = admin.admin_id");

        //     $this->bind("location",$location);
        //     $this->bind("admin_id",$admin_id);

        //     return $this->execute();
        // }

        // public function updateName($admin_id,$name){


        //     $this->query("UPDATE contact 
        //                   name = :name 
        //                   WHERE admin.admin_id = :admin_id 
        //                   JOIN admin ON contact.admin_id = admin.admin_id");

        //     $this->bind("name",$name);
        //     $this->bind("admin_id",$admin_id);

        //     return $this->execute();
        // }
    }
?>