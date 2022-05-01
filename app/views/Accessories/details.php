<?php
    if (!isLoggedIn())
        require APPROOT . '/views/includes/header.php';  
    else
        require APPROOT . '/views/includes/adminheader.php';  
?>

<div class="container" style="margin: 100px auto;">
        <div class="product_details" style="border: none;">
            <div class="row" style="margin: 50px auto;">
                <div class="col-md-6 text-center align-self-center">
                    <img class="img-fluid" src="<?php echo URLROOT.'/public/img/'.$data["accessory"]->image; ?>"> 
                </div>
                <div class="col-md-6 info">
                    <div class="row title">
                        <div class="col-8">
                            <h2><?php echo $data['accessory']->name ?></h2>
                            <br>
                            <p><?php echo $data['accessory']->description ?></p>
                            <p>Category: <?php echo $data['accessory']->category ?></p>
                            <p>Brand: <?php echo $data['accessory']->brand ?></p>
                            <p>Available quantity: <?php echo $data['accessory']->quantity ?></p>
                            <br>
                            <p style="font-weight: bold; font-size:xx-large">$<?php echo $data['accessory']->price ?></p>
                        </div>

                        <?php 
                        // only shows when login
                        if(isLoggedIn()) {
                            echo '
                            <div class="col-2">
                                <a href="'.URLROOT.'/Admin/editAccessory/'.$data['accessory']->accessory_id.'" class="btn btn-primary">Edit</a>
                            </div>
                            <div class="col-2">
                                <a href="'.URLROOT.'/Admin/deleteAccessory/'.$data['accessory']->accessory_id.'" class="btn btn-danger">Delete</a>
                            </div>';
                        }
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
</div>

<?php require APPROOT . '/views/includes/footer.php';  ?>