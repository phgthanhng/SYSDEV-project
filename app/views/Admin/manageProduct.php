<?php require APPROOT . '/views/includes/adminheader.php'; ?>

<div class="container">
    <h1 style="margin-bottom: 25px;margin-top: 50px;text-align: center;">Manage my Products(<?= count($data['products'])?>)</h1>
        <div class="table-responsive">
        <table class="table table-bordered">
                <thead class="table-light">
                    <tr class="border border-warning">
                    <th class="text-center" style="background: #FDF4E5;border-bottom-color: #000000;">Group</th>
                    <th class="text-center" style="background: #FDF4E5;border-bottom-color: #000000;">Product Name</th>
                    <th class="text-center" style="background: #FDF4E5;border-bottom-color: #000000;">Price</th>
                    <th class="text-center" colspan="3" style="background: #FDF4E5;border-bottom-color: #000000;">Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php foreach ($data['products'] as $product) : ?>
                    <tr class="border border-warning ">
                      <td class="text-center"><?= $product->description?></td>
                      <td>
                          <a href="<?= URLROOT ?>/Hookah/detail/<?= $product->product_id ?>" style="text-decoration: none">
                          <?= $product->name?>
                          </a>
                        </td>
                      <td class="text-center"><?= $product->price?></td>
                      <?php if($product->description=="Hookah") : ?>
                        <td class="text-center"><a class="link-info" href="<?= URLROOT ?>/Hookah/detail/<?= $product->product_id ?>">Details</a></td>
                        <td class="text-center"><a class="link-success" href="<?= URLROOT ?>/Admin/editHookah/<?= $product->product_id ?>">Edit</a></td>
                        <td class="text-center"><a class="link-danger" href="<?= URLROOT ?>/Admin/deleteHookah/<?= $product->product_id ?>">Delete</a></td>
                      <?php else :?>
                        <td class="text-center"><a class="link-info" href="<?= URLROOT ?>/Accessories/detail/<?= $product->product_id ?>">Details</a></td>
                        <td class="text-center"><a class="link-success" href="<?= URLROOT ?>/Admin/editAccessory/<?= $product->product_id ?>">Edit</a></td>
                        <td class="text-center"><a class="link-danger" href="<?= URLROOT ?>/Admin/deleteAccessory/<?= $product->product_id ?>">Delete</a></td>
                      <?php endif; ?>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
            </table>
        </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>