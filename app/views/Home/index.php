<?php require APPROOT . '/views/includes/header.php';  ?>
    <div class="container" style="margin:auto">
        <h1 style="text-align: center; padding-top:4rem; margin-top: 100px">Browse products</h1>
        <div class="row" style="margin-top: 50px; margin-bottom: 50px">
        
            <div class="float-start col" style="
            height: 80%;
            opacity: 0.8;
            display: flex;
            justify-content: center;
            position: relative;
            margin-left: 30px;">
                <a href="<?= URLROOT ?>/Hookah/index" style="text-decoration: none;">
                     <img class="img-responsive" src="<?= URLROOT ?>/img/hookah.jpg" />
                </a>
                <div class="d-xxl-flex" style="position: absolute; bottom: 0; margin-bottom: 10px">
                    <a href="<?= URLROOT ?>/Hookah/index" style="text-decoration: none;">
                        <h1 class="d-xxl-flex align-items-center" style="color: #ffffff; font-weight: bold">
                            Hookahs
                        </h1>
                    </a>
                </div>
            </div>
            
            <div class="float-start col" style="
            height: 80%; 
            opacity: 0.8;
            display: flex;
            justify-content: center;
            position: relative;
            margin-right: 30px;
            margin-left: 30px;">
                <a href="<?= URLROOT ?>/Accessories/index" style="text-decoration: none;">
                <img class="img-responsive" src="<?= URLROOT ?>/img/accessories1%20(1).jpg" />
                </a>
                <div class="d-xxl-flex" style="position: absolute; bottom: 0; margin-bottom: 10px">
                    <a href="<?= URLROOT ?>/Accessories/index" style="text-decoration: none;">
                        <h1 class="d-xxl-flex align-items-center" style="color: #ffffff; font-weight: bold">
                            Accessories
                        </h1>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/includes/footer.php';  ?>