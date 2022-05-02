<?php
    if (!isLoggedIn())
        require APPROOT . '/views/includes/header.php';  
    else
        require APPROOT . '/views/includes/adminheader.php';  
?>

<div class="container" style="margin: 100px auto; ">

        <div class="product_details" style="border: none;">
            <div class="row" style="margin: 50px auto;">
                <div class="col-md-6 text-center align-self-center">
                    <img class="img-fluid" src="<?= URLROOT ?>/public/img/<?=$data["hookah"]->image ?>"> 
                </div>
                <div class="col-md-6 info">
                    <div class="row title">
                        <div class="col-8">
                            <h2><?= $data['hookah']->name ?></h2>
                            <br>
                            <p><?= $data['hookah']->description ?></p>
                            <p>Brand: <?= $data['hookah']->brand ?></p>
                            <p>Type: <?= $data['hookah']->type ?></p>
                            <p>Color: <?= $data['hookah']->color ?></p>
                            <p>Available quantity: <?= $data['hookah']->quantity ?></p>
                            <br>
                            <p style="font-weight: bold; font-size:xx-large">$<?= $data['hookah']->price ?></p>
                        </div>

                        <?php if(isLoggedIn()) : // only shows when login ?>
                            <div class="col-2">
                                <a href="<?= URLROOT ?>/Admin/editHookah/<?=$data['hookah']->hookah_id ?>" class="btn btn-primary">Edit</a>
                            </div>
                            <div class="col-2">
                                <a href="<?= URLROOT ?>/Admin/deleteHookah/<?=$data['hookah']->hookah_id ?>" class="btn btn-danger">Delete</a>
                            </div>
                        <?php endif; ?>

                       
                    </div>
                </div>
            </div>
        </div>
    
</div>

<?php require APPROOT . '/views/includes/footer.php';  ?>