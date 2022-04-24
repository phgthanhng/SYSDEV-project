<?php
    if (!isLoggedIn())
        require APPROOT . '/views/includes/header.php';  
    else
        require APPROOT . '/views/includes/adminheader.php';  
?>

<div class="container" style="margin: 100px auto; ">

        <div class="card" style="border: none;">
            <div class="row" style="margin: 50px auto;">
                <div class="col-md-6 text-center align-self-center">
                    <img class="img-fluid" src="<?php echo URLROOT.'/public/img/'.$data["hookah"]->image; ?>"> 
                </div>
                <div class="col-md-6 info">
                    <div class="row title">
                        <div class="col-8">
                            <h2><?php echo $data['hookah']->name ?></h2>
                            <p><?php echo $data['hookah']->description ?></p>
                            <p>Brand: <?php echo $data['hookah']->brand ?></p>
                            <p>Available quantity: <?php echo $data['hookah']->quantity ?></p>
                            <p>$<?php echo $data['hookah']->price ?></p>
                        </div>
                        <?php 
                            echo '
                            <div class="col-2">
                                <a href="'.URLROOT.'/Admin/editHookah/'.$data['hookah']->hookah_id.'" class="btn btn-primary">Edit</a>
                            </div>
                            <div class="col-2">
                                <a href="'.URLROOT.'/Admin/deleteHookah/'.$data['hookah']->hookah_id.'" class="btn btn-danger">Delete</a>
                            </div>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    
</div>

<?php require APPROOT . '/views/includes/footer.php';  ?>