<?php
class aboutUsModel extends Model{
    /*
     * Default constructor of the aboutUsModel class
     */
    public function __construct()
    {
        parent::__construct();
    }

    // public function getAdmin($admin_id){

    //     $this->query("SELECT about_id 
    //                   FROM admin 
    //                   WHERE admin_id");

    // }

    /*
     * Retrieves About Us records from the database
     */
    public function getAllAboutUs(){
        $this->query("SELECT * 
                        FROM about_us");

        return $this->getResultSet();
    }
    
    /*
     * Retrieves About us record based on the adminID
     */
    public function getAboutUs($admin_id){
        $this->query("SELECT image, text 
                        FROM about_us 
                        WHERE admin.admin_id = :admin_id 
                        JOIN admin ON about_us.admin_id = admin.admin_id");

        $this->bind(":admin_id", $admin_id);

        return $this->getSingle();
    }

    public function getAboutUsById($id){
        $this->query("SELECT image, text 
                        FROM about_us 
                        WHERE about_id = :about_id");

        $this->bind(":about_id", $id);

        return $this->getSingle();
    }

    /*
     * Updates an About us record based on the adminID
     */
    public function updateAboutUs($admin_id, $about_us){
        $this->query("UPDATE about_us 
                        SET text = :text, image = :image 
                        WHERE about_id = (
                            SELECT about_id FROM admin WHERE admin_id = :admin_id
                        )");

        $this->bind(":admin_id", $admin_id);
        $this->bind(":text", $about_us["text"]);
        $this->bind(":image", $about_us["image"]);

        return $this->execute();
    }
}
?>