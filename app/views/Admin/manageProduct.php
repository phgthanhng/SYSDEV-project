<?php require APPROOT . '/views/includes/adminheader.php'; ?>



<div class="container">
    <h1 style="margin-bottom: 25px;margin-top: 50px;text-align: center;">Manage my Products(<?= count($data['products'])?>)</h1>
        <div class="table-responsive">
        <table class="table">
                <thead>
                    <tr>
                    <th style="background: #FDF4E5;border-bottom-color: #000000;">Group</th>
                    <th style="background: #FDF4E5;border-bottom-color: #000000;">Product Name</th>
                    <th style="background: #FDF4E5;border-bottom-color: #000000;">Price</th>
                    <th colspan="3" style="background: #FDF4E5;border-bottom-color: #000000;">Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php foreach ($data['products'] as $product) : ?>
                    <tr>
                      <td><?= $product->description?></td>
                      <td><?= $product->name?></td>
                      <td><?= $product->price?></td>
                      <?php if($product->description=="Hookah") : ?>
                        <td><a class="link-info" href="<?= URLROOT ?>/Hookah/detail/<?= $product->product_id ?>">Details</a></td>
                        <td><a class="link-success" href="<?= URLROOT ?>/Admin/editHookah/<?= $product->product_id ?>">Edit</a></td>
                        <td ><a class="link-danger" href="<?= URLROOT ?>/Admin/deleteHookah/<?= $product->product_id ?>">Delete</a></td>
                      <?php else :?>
                        <td><a class="link-info" href="<?= URLROOT ?>/Accessories/detail/<?= $product->product_id ?>">Details</a></td>
                        <td><a class="link-success" href="<?= URLROOT ?>/Admin/editAccessory/<?= $product->product_id ?>">Edit</a></td>
                        <td ><a class="link-danger" href="<?= URLROOT ?>/Admin/deleteAccessory/<?= $product->product_id ?>">Delete</a></td>
                      <?php endif; ?>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
            </table>
        </div>
</div>


<?php require APPROOT . '/views/includes/footer.php'; ?>