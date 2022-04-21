<?php require APPROOT . '/views/includes/header.php';  ?>
<div style="margin-top: 50px; margin-bottom: 60px">
    <form method="post" enctype="multipart/form-data">
        <div class="d-flex flex-column justify-content-center" id="accessory_form" style="margin-bottom: 50px">
            <div class="login-box-header">
                <h4 style="
                color: #000000;
                margin-bottom: 0px;
                font-weight: 400;
                font-size: 27px;">
                    Edit an accessory
                </h4>
            </div>
            <div class="accessory_input" style="background-color: #ffffff" name="name">
                <label class="form-label">Name:</label>
                <input class="form-control form-control" type="text" required="" minlength="6" name="name" value="" />
                <label class="form-label" style="margin-top: 10px">Price:</label>
                <input class="form-control form-control" type="number" required="" step="0.01" min="0" name="price" value=""/>
                <label class="form-label" style="margin-top: 10px">Category:</label>
                <input class="form-control form-control" type="text" required="" name="category" value=""/>
                <label class="form-label" style="margin-top: 10px">Quantity:</label>
                <input class="form-control form-control" type="number" required="" min="1" name="quantity" value=""/>
                <label class="form-label" style="margin-top: 10px">Description:</label>
                <textarea class="form-control form-control" name="desc" style="height: 200px;"> <?php ?> </textarea>
                <label class="form-label" style="margin-top: 10px">Brand:</label>
                <input class="form-control form-control" type="text" required="" name="brand" />
                <label class="form-label" style="margin-top: 10px" >Image:</label>
                <input class="form-control form-control" type="file" required="" minlength="6" name="image" value=""/>
            </div>
            <div class="submit-row" style="margin-bottom: 8px; padding-top: 0px">
                <button class="btn btn-primary d-block box-shadow w-100" name="" id="submit-id-submit" type="submit"
                    style="background: #081210; margin-top: 20px">
                    Update
                </button>
                <div class="d-flex justify-content-between"></div>
            </div>
        </div>
    </form>
</div>
<?php require APPROOT . '/views/includes/footer.php';  ?>