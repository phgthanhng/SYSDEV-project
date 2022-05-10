<?php require APPROOT . '/views/includes/header.php';  ?>
<div style="margin-top: 100px;">
    <h1 class="display-5" style="text-align: center; margin-bottom: 100px; margin-top: 40px">
        Contact us
    </h1>
    <h5 style="text-align: center; margin-bottom: 20px">
        Name: <?= $data['contact']->name ?>
    </h5>
    <h5 style="text-align: center; margin-bottom: 20px">
        Email: <?= $data['contact']->businessEmail ?>
    </h5>
    <h5 style="text-align: center; margin-bottom: 20px">
        Phone number: <?= $data['contact']->phone ?>
    </h5>
    <h5 style="text-align: center; margin-bottom: 150px">
        Address: <?= $data['contact']->location ?>
    </h5>
</div>
<?php require APPROOT . '/views/includes/footer.php';  ?>