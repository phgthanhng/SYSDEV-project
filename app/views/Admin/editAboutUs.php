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
                Edit About US
            </h4>
        </div>
        <div class="accessory_input" style="background-color: #ffffff" name="name">
        <label class="form-label" style="margin-top: 10px">Content:</label>
        <textarea class="form-control" name="aboutus_content" row="10" style="height:350px;">
        <?php echo $data['aboutus']->text?></textarea>
        <label class="form-label" style="margin-top: 10px">Image:</label>
        <input class="form-control form-control" type="file" name="image" />
        </div>
        <div class="submit-row" style="margin-bottom: 8px; padding-top: 0px">
            <button class="btn btn-primary d-block box-shadow w-100" id="submit-id-submit" type="submit"
                style="background: #081210; margin-top: 20px" name="submit">
                Edit
            </button>
            <div class="d-flex justify-content-between"></div>
        </div>
    </div>
</form>


<?php require APPROOT . '/views/includes/footer.php';  ?>