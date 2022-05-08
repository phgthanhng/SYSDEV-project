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
                          <a data-toggle="tooltip" title="View Details" class="link-info" href="<?= URLROOT ?>/Hookah/detail/<?= $product->product_id ?>" style="text-decoration: none">
                          <?= $product->name?>
                          </a>
                        </td>
                      <td class="text-center">$<?= $product->price?></td>
                      <?php if($product->description=="Hookah") : ?>
                        <td class="text-center"><a data-toggle="tooltip" title="View Details" class="link-info text-decoration-none fa-solid fa-up-right-from-square fs-3" href="<?= URLROOT ?>/Hookah/detail/<?= $product->product_id ?>"></a></td>
                        <td class="text-center"><a data-toggle="tooltip" title="Edit Hookah" class="link-success text-decoration-none fa-solid fa-pen-to-square fs-3" href="<?= URLROOT ?>/Admin/editHookah/<?= $product->product_id ?>"></a></td>
                        <td class="text-center">
                            
                            <a data-bs-toggle="modal" data-bs-target="#exampleModal" data-toggle="tooltip" title="Delete Hookah" class="link-danger text-decoration-none fa-regular fa-trash-can fs-3" href=""></a>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-danger" id="exampleModalLabel">Delete Product</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h3> Are you sure you want to delete "<div class="text-info"><?= $product->name ?></div>"? </h3>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">No</button>
                                        <a href="<?= URLROOT ?>/Admin/deleteHookah/<?= $product->product_id ?>">
                                            <button type="button" class="btn btn-danger">
                                            Yes
                                        </button>
                                        </a>
                                    </div>
                                </div>
                                </div>
                            </div>

                        </td>
                      <?php else :?>
                        <td class="text-center"><a data-toggle="tooltip" title="View Details" class="link-info text-decoration-none fa-solid fa-up-right-from-square fs-3" href="<?= URLROOT ?>/Accessories/detail/<?= $product->product_id ?>"></a></td>
                        <td class="text-center"><a data-toggle="tooltip" title="Edit Accessory" class="link-success text-decoration-none fa-solid fa-pen-to-square fs-3" href="<?= URLROOT ?>/Admin/editAccessory/<?= $product->product_id ?>"></a></td>
                        <td class="text-center">
                        <a data-bs-toggle="modal" data-bs-target="#exampleModal" data-toggle="tooltip" title="Delete Accessory" class="link-danger text-decoration-none fa-regular fa-trash-can fs-3" href=""></a>
                            <!--Modal-->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-danger" id="exampleModalLabel">Delete Product</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h3> Are you sure you want to delete "<div class="text-info"><?= $product->name ?></div>"? </h3>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">No</button>
                                        <a href="<?= URLROOT ?>/Admin/deleteAccessory/<?= $product->product_id ?>">
                                            <button type="button" class="btn btn-danger">
                                            Yes
                                        </button>
                                        </a>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                      <?php endif; ?>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
            </table>
        </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>