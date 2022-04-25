<?php
class loginModel extends Model{
    
    /*
     * Default constructor of the loginModel class
     */
    public function __construct(){
        parent::__construct();
    }

    /*
     * Retrieves all admin from the Admin table in the database
     */
    public function getAllAdmin(){
        $this->query("SELECT * 
                      FROM admin");

        return $this->getResultSet();
    }

    /*
     * Retrieves a specific admin from the Admin table in the database
     */
    public function getAdmin($admin_id){
        $this->query("SELECT password 
                        FROM admin 
                        WHERE admin_id = :admin_id");

        $this->bind(":admin_id", $admin_id);

        return $this->getSingle();
    }

    /*
     * Retrieves an admin in the database based on the email
     */
    public function getAdminByEmail($email) {
        $this->query("SELECT *
                        FROM admin
                        WHERE email = :email");
        $this->bind(":email", $email);

        return $this->getSingle();
    }

    /*
     * Updates email account of a specific admin in the database
     */
    public function updateEmail($admin_id, $email){
        $this->query("UPDATE admin 
                        SET email = :email 
                        WHERE admin_id = :admin_id");

        $this->bind(":admin_id", $admin_id);
        $this->bind(":email", $email);
        
        return $this->execute();
    }

    /*
     * Updates password of a specific admin in the database
     */
    public function updatePassword($admin_id, $password){
        $this->query("UPDATE admin 
                        SET password = :password 
                        WHERE admin_id = :admin_id");

        $this->bind(":admin_id", $admin_id);
        $this->bind(":password", $password);

        return $this->execute();
    }
}   
?>