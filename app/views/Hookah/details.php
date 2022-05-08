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
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Delete
                                </button>    
                            </div>
                           <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-danger" id="exampleModalLabel">Delete Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h3> Are you sure you want to delete this product? </h3>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">No</button>
                                <a href="<?= URLROOT ?>/Admin/deleteHookah/<?=$data['hookah']->hookah_id ?>">
                                    <button type="button" class="btn btn-danger">
                                    Yes
                                </button>
                                </a>
                            </div>
                            </div>
                        </div>
                        </div>
                        <?php endif; ?>       
                    </div>
                </div>
            </div>
        </div>
    
</div>

<?php require APPROOT . '/views/includes/footer.php';  ?>