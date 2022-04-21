<?php
    class contactModel extends Model{

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

        public function getContact($admin_id) {  
            $this->query("SELECT businessEmail, location, name 
                          FROM contact 
                          WHERE admin.admin_id = :admin_id 
                          JOIN admin ON contact.admin_id = admin.admin_id");

            $this->bind(":admin_id", $admin_id);

            return $this->getSingle();
        }

        public function updateContact($admin_id,$contact) { 
            $this->query("UPDATE contact 
                          SET businessEmail = :email, location = :location, phone = :phone, name = :name 
                          WHERE admin.admin_id = :admin_id 
                          JOIN admin ON contact.admin_id = admin.admin_id");

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