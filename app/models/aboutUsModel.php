<?php
class aboutUsModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }

    // public function getAdmin($admin_id){

    //     $this->query("SELECT about_id 
    //                   FROM admin 
    //                   WHERE admin_id");

    // }

    public function getAboutUs($admin_id){
        $this->query("SELECT image, text 
                        FROM about_us 
                        WHERE admin.admin_id = :admin_id 
                        JOIN admin ON about_us.admin_id = admin.admin_id");

        $this->bind(":admin_id", $admin_id);

        return $this->getSingle();
    }

    public function updateAboutUs($admin_id, $about_us){
        $this->query("UPDATE about_us 
                        SET text = :text, image = :image 
                        WHERE admin.admin_id = :admin_id 
                        JOIN admin ON about_us.admin_id = admin.admin_id");

        $this->bind(":admin_id", $admin_id);
        $this->bind(":text", $about_us["text"]);
        $this->bind(":image", $about_us["image"]);

        return $this->execute();
    }

    
}
?>