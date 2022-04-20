<?php require APPROOT . '/views/includes/adminheader.php';?>

<div style="margin-top: 50px; margin-bottom: 60px">
    <form method="post" enctype="multipart/form-data">
        <div class="d-flex flex-column justify-content-center" id="accessory_form" style="margin-bottom: 50px">
            <div class="login-box-header">
                <h4 style="
                color: #000000;
                margin-bottom: 0px;
                font-weight: 400;
                font-size: 27px;">
                    Add an accessory
                </h4>
            </div>
            <div class="accessory_input" style="background-color: #ffffff" name="name">
                <label class="form-label">Name:</label><input class="form-control form-control" type="text" required=""
                    minlength="6" name="name" /><label class="form-label" style="margin-top: 10px">Price:</label><input
                    class="form-control form-control" type="number" required="" step="0.01" name="price" /><label
                    class="form-label" style="margin-top: 10px">Category:</label><input
                    class="form-control form-control" type="text" required="" name="category" /><label
                    class="form-label" style="margin-top: 10px">Quantity:</label><input
                    class="form-control form-control" type="number" required="" min="1" name="quantity" /><label
                    class="form-label" style="margin-top: 10px">Description:</label><textarea
                    class="form-control form-control" name="desc"></textarea><label class="form-label"
                    style="margin-top: 10px">Brand:</label><input class="form-control form-control" type="text"
                    required="" name="brand" /><label class="form-label" style="margin-top: 10px">Image:</label><input
                    class="form-control form-control" type="file" required="" minlength="6" name="image" />
            </div>
            <div class="submit-row" style="margin-bottom: 8px; padding-top: 0px">
                <button class="btn btn-primary d-block box-shadow w-100" id="submit-id-submit" type="submit"
                    style="background: #081210; margin-top: 20px">
                    Create
                </button>
                <div class="d-flex justify-content-between"></div>
            </div>
        </div>
    </form>
</div>

<?php require APPROOT . '/views/includes/footer.php';?>