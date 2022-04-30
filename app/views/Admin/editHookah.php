<?php require APPROOT . '/views/includes/adminheader.php';  ?>

<div style="margin-top: 50px; margin-bottom: 50px">
    <form method="post" enctype="multipart/form-data">
        <div class="d-flex flex-column justify-content-center" id="accessory_form">
            <div class="login-box-header">
                <h4 style="
                color: #000000;
                margin-bottom: 0px;
                font-weight: 400;
                font-size: 27px;">
                    Edit Hookah
                </h4>
            </div>
            <div class="accessory_input" style="background-color: #ffffff" name="name">
            <label class="form-label">Name:</label>
            <input class="form-control form-control" type="text" required="" minlength="6" name="name" value="<?php echo $data['hookah']->name ?>"/> 
            <label class="form-label" style="margin-top: 10px">Price:</label>
            <input class="form-control form-control" type="number" required="" step="0.01" name="price" min="0" value="<?php echo $data['hookah']->price ?>"/>
            <label class="form-label" style="margin-top: 10px">Color:</label>
            <input class="form-control form-control" type="text" required="" name="color" value="<?php echo $data['hookah']->color ?>" />
            <label class="form-label" style="margin-top: 10px">Type:</label>
            <input class="form-control form-control" type="text" required="" name="type" value="<?php echo $data['hookah']->type ?>"/>
            <label class="form-label" style="margin-top: 10px">Quantity:</label>
            <input class="form-control form-control" type="number" required="" min="1" name="quantity" value="<?php echo $data['hookah']->quantity ?>" />
            <label class="form-label" style="margin-top: 10px">Description:</label>
            <textarea class="form-control" name="desc" row="10" style="height: 200px;"><?php echo $data['hookah']->description ?></textarea>
            <label class="form-label" style="margin-top: 10px">Brand:</label>
            <input class="form-control form-control" type="text" required="" name="brand" value="<?php echo $data['hookah']->brand ?>"/>
            <label class="form-label" style="margin-top: 10px">Image:</label>
            <input class="form-control form-control" type="file" required="" minlength="6" name="image"/>
        </div>
            <div class="submit-row" style="margin-bottom: 8px; padding-top: 0px">
                <button class="btn btn-primary d-block box-shadow w-100" name="submit" id="submit-id-submit" type="submit"
                    style="background: #081210; margin-top: 20px">
                    Update
                </button>
                <div class="d-flex justify-content-between"></div>
            </div>
        </div>
    </form>
</div>

<?php require APPROOT . '/views/includes/footer.php';  ?>