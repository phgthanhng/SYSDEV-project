<?php require APPROOT . '/views/includes/header.php';  ?>

<div class="container" style="margin-bottom: 40px">
    <h1 style="text-align: center; margin-top: 50px">About us</h1>
    <div class="row" style="margin-top: 50px; margin-bottom: 50px">
        <div class="float-start col" style="
            height: 400px; /*width: 500px;*/
            opacity: 0.8;
            display: flex;
            justify-content: center;
            position: relative;
            margin-left: 30px;
          ">
            <img src="<?= URLROOT ?>/public/img/<?=  $data["about"]->image ?>">
        </div>
        <div class="float-start col" style="
            height: 400px; /*width: 100%;*/
            y: 0.8;
            display: flex;
            margin-right: 30px;
            margin-left: 30px;">
            <p>
                <?= $data["about"]->text ?>
                <br /><br />
            </p>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php';  ?>