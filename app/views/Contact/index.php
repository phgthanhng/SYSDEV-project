<?php require APPROOT . '/views/includes/header.php';  ?>
<div>
    <h1 class="display-5" style="text-align: center; margin-bottom: 100px; margin-top: 40px">
        Contact us
    </h1>
    <h5 style="text-align: center; margin-bottom: 20px">
        Email: <?php echo $data['contact']->businessEmail ?>
    </h5>
    <h5 style="text-align: center; margin-bottom: 20px">
        Phone number: <?php echo $data['contact']->phone ?>
    </h5>
    <h5 style="text-align: center; margin-bottom: 150px">
        Address: <?php echo $data['contact']->location ?>
    </h5>
</div>
<?php require APPROOT . '/views/includes/footer.php';  ?>