<?php require APPROOT . '/views/includes/header.php';  ?>

    <div class="container" style="margin-bottom: 40px">
        <h1 style="text-align: center; margin-top: 50px">Browse products</h1>
        <div class="row" style="margin-top: 50px; margin-bottom: 50px">
            <div class="float-start col" style="
            height: 400px; /*width: 500px;*/
            opacity: 0.8;
            display: flex;
            justify-content: center;
            position: relative;
            margin-left: 30px;
          ">
                <img class="img-responsive" src="<?php echo URLROOT; ?>/img/hookah.jpg" />
                <div class="d-xxl-flex" style="position: absolute; bottom: 0">
                    <a href="browse_hookah.html" style="text-decoration: none;">
                        <h1 class="d-xxl-flex align-items-center" style="color: #ffffff; font-weight: bold">
                            Hookahs
                        </h1>
                    </a>
                </div>
            </div>
            <div class="float-start col" style="
            height: 400px; /*width: 100%;*/
            opacity: 0.8;
            display: flex;
            justify-content: center;
            position: relative; /*object-fit: cover;*/
            margin-right: 30px;
            margin-left: 30px;
          ">
                <img class="img-responsive" src="<?php echo URLROOT; ?>/img/accessories1%20(1).jpg" />
                <div class="d-xxl-flex" style="position: absolute; bottom: 0">
                    <a href="browse_accessory.html" style="text-decoration: none;">
                        <h1 class="d-xxl-flex align-items-center" style="color: #ffffff; font-weight: bold">
                            Accessories
                        </h1>
                    </a>
                </div>
            </div>
        </div>
    </div>



<?php require APPROOT . '/views/includes/footer.php';  ?>