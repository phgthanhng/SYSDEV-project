<?php
    class contactModel extends Model{

        public function __construct(){
            parent::__construct();
        }

        public function getAdmin($admin_id){
            $this->query("SELECT contact_id 
                          FROM admin 
                          WHERE admin_id = :admin_id");

            $this->bind("admin_id",$admin_id);

            return $this->getSingle();

        }

        public function getContact($admin_id){

            $contact = $this->getAdmin($admin_id);

            $this->query("SELECT businessEmail, location, name 
                          FROM contact 
                          WHERE contact_id = :contact_id");

            $this->bind("contact_id",$contact->contact_id);

            return $this->getSingle();
        }


        public function updateEmail($admin_id,$email){

            $contact = $this->getAdmin($admin_id);

            $this->query("UPDATE contact 
                          businessEmail = :email 
                          WHERE contact_id = :contact_id");

            $this->bind("email",$email);
            $this->bind("contact_id",$contact->contact_id);

            return $this->execute();
        }

        public function updateLocation($admin_id,$location){

            $contact = $this->getAdmin($admin_id);

            $this->query("UPDATE contact 
                          location = :location 
                          WHERE contact_id = :contact_id");

            $this->bind("location",$location);
            $this->bind("contact_id",$contact->contact_id);

            return $this->execute();
        }

        public function updateName($admin_id,$name){

            $contact = $this->getAdmin($admin_id);

            $this->query("UPDATE contact 
                          name = :name 
                          WHERE contact_id = :contact_id");

            $this->bind("name",$name);
            $this->bind("contact_id",$contact->contact_id);

            return $this->execute();
        }
    }
?>