<?php
class loginModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function getAdmin($admin_id){
        $this->query("SELECT password 
                        FROM admin 
                        WHERE admin_id = :admin_id");

        $this->bind(":admin_id",$admin_id);

        return $this->getSingle();
    }

    public function getAdminByEmail($email) {
        $this->query("SELECT *
                        FROM admin
                        WHERE email = :email");
        $this->bind(":email", $email);

        return $this->getSingle();
    }

    public function updateEmail($admin_id,$email){
        $this->query("UPDATE admin 
                        SET email = :email 
                        WHERE admin_id = :admin_id");

        $this->bind(":admin_id",$admin_id);
        $this->bind(":email",$email);
        
        return $this->execute();
    }

    public function updatePassword($admin_id,$password){
        $this->query("UPDATE admin 
                        SET password = :password 
                        WHERE admin_id = :admin_id");

        $this->bind(":admin_id",$admin_id);
        $this->bind(":password",$password);

        return $this->execute();
    }
}   

?>