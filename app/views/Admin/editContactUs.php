<?php require APPROOT . '/views/includes/adminheader.php';  ?>
<form method="post" enctype="multipart/form-data" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="d-flex flex-column justify-content-center" id="accessory_form">
        <div class="login-box-header">
            <h4 style="
              color: #000000;
              margin-bottom: 0px;
              font-weight: 400;
              font-size: 27px;
            ">
                Edit Contact Us Page
            </h4>
        </div>
        <div class="accessory_input" style="background-color: #ffffff" name="name">

        <label class="form-label">Name:</label>
        <input class="form-control form-control" type="text" required="" minlength="6" name="name" value="<?php echo $data['contact']->name?>" />
        <label class="form-label" style="margin-top: 10px">Email:</label>
        <input class="form-control form-control" type="email" required="" minlength="6" name="email" value="<?php echo $data['contact']->businessEmail?>"/>
        <label class="form-label" style="margin-top: 10px">Phone Number:</label>
        <input class="form-control form-control" type="text" required="" name="phone" pattern="^\d{3}\d{3}\d{4}$" value="<?php echo $data['contact']->phone?>" />
        <label class="form-label" style="margin-top: 10px">Address:</label>
        <input class="form-control form-control" type="text" required="" name="address" value="<?php echo $data['contact']->location?>" />
        </div>
        <div class="submit-row" style="margin-bottom: 8px; padding-top: 0px">
            <button class="btn btn-primary d-block box-shadow w-100" id="submit-id-submit" type="submit"
                style="background: #081210; margin-top: 20px" name="submit">
                Save
            </button>
            <div class="d-flex justify-content-between"></div>
        </div>
    </div>
</form>


<?php require APPROOT . '/views/includes/footer.php';  ?>