<?php require APPROOT . '/views/includes/adminheader.php';?>

<div style="margin-top: 50px; margin-bottom: 50px">
    <form method="post" enctype="multipart/form-data">
        <div class="d-flex flex-column justify-content-center" id="accessory_form">
            <div class="login-box-header">
                <h4 style="
                color: #000000;
                margin-bottom: 0px;
                font-weight: 400;
                font-size: 27px;">
                    Add an accessory
                </h4>
            <?php 
            if (isset($data['message'])) {  // check if theres an error message. If so, display it
                if (isset($data['color'])) { 
                    echo '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert" style="height:auto;">
                    <strong>'.$data['message'].'</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
                else {
                   echo '<div class="alert alert-default alert-dismissible fade show mt-3" role="alert" style="background-color:rgb(192,51,51);height:auto;">
                    <strong>'.$data['message'].'</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
            }
            ?>
            </div>
            <div class="accessory_input" style="background-color: #ffffff" name="name">
                <label class="form-label">Name:</label><input class="form-control form-control" type="text" required=""
                    minlength="6" name="name" /><label class="form-label" style="margin-top: 10px">Price:</label><input
                    class="form-control form-control" type="number" min="0" required="" step="0.01" name="price"/><label
                    class="form-label" style="margin-top: 10px">Category:</label><input
                    class="form-control form-control" type="text" required="" name="category" /><label
                    class="form-label" style="margin-top: 10px">Quantity:</label><input
                    class="form-control form-control" type="number" required="" min="1" name="quantity" /><label
                    class="form-label" style="margin-top: 10px">Description:</label><textarea
                    class="form-control form-control" name="desc" style="height: 200px;"></textarea><label class="form-label"
                    style="margin-top: 10px">Brand:</label><input class="form-control form-control" type="text"
                    required="" name="brand" /><label class="form-label" style="margin-top: 10px">Image:</label><input
                    class="form-control form-control" type="file" required="" minlength="6" name="image" />
            </div>
            <div class="submit-row" style="margin-bottom: 8px; padding-top: 0px">
                <button class="btn btn-primary d-block box-shadow w-100" id="submit-id-submit" type="submit"
                    style="background: #081210; margin-top: 20px" name="submit">
                    Create
                </button>
                <div class="d-flex justify-content-between"></div>
            </div>
        </div>
    </form>
</div>

<?php require APPROOT . '/views/includes/footer.php';?>