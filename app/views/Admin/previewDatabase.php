<?php require APPROOT . '/views/includes/adminheader.php';  ?>

<div class="container">    
    <div class="container">
    <h1 style="margin-bottom: 25px;margin-top: 50px;text-align: center;">Admin Table</h1>
        <div class="table-responsive">
        <table class="table">
                <thead>
                    <tr>
                    <th>Admin ID</th>
                    <th>Contact ID</th>
                    <th>About ID</th>
                    <th>Email</th>
                    <th>Password</th>
                    </tr>
                </thead>
                <tbody>
                  <?php foreach ($data['admins'] as $admins) : ?>
                    <tr>
                      <td><?= $admins->admin_id?></td>
                      <td><?= $admins->contact_id?></td>
                      <td><?= $admins->about_id?></td>
                      <td><?= $admins->email?></td>
                      <td><?= $admins->password?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <h1 style="margin-bottom: 25px;margin-top: 50px;text-align: center;">Hookah Table</h1>
        <div class="table-responsive">
        <table class="table">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Color</th>
                    <th>Type</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                  <?php foreach ($data['hookahs'] as $hookah) : ?>
                    <tr>
                      <td><?= $hookah->hookah_id?></td>
                      <td><?= $hookah->name?></td>
                      <td><?= $hookah->brand?></td>
                      <td><?= $hookah->price?></td>
                      <td><?= $hookah->color?></td>
                      <td><?= $hookah->type?></td>
                      <td><?= $hookah->image?></td>
                      <td><?= $hookah->quantity?></td>
                      <td><?= $hookah->description?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <h1 style="margin-bottom: 25px;margin-top: 50px;text-align: center;">Accessory Table</h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                    <th>Accessory ID</th>
                    <th>Hookah ID</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($data['accessories'] as $accessory) : ?>
                    <tr>
                      <td><?= $accessory->accessory_id?></td>
                      <?php if ($accessory->hookah_id==null) : ?>
                        <td>NULL</td>
                      <?php else : ?>
                        <td><?= $accessory->hookah_id?></td>
                      <?php endif;?>                     
                      <td><?= $accessory->name?></td>
                      <td><?= $accessory->brand?></td>
                      <td><?= $accessory->price?></td>
                      <td><?= $accessory->category?></td>
                      <td><?= $accessory->image?></td>
                      <td><?= $accessory->quantity?></td>
                      <td><?= $accessory->description?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <h1 style="margin-bottom: 25px;margin-top: 50px;text-align: center;">About Us Table</h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Text</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($data['aboutUs'] as $aboutUs) : ?>
                    <tr>
                      <td><?= $aboutUs->about_id?></td>
                      <?php if ($aboutUs->image==null) : ?>
                        <td>NULL</td>
                      <?php else : ?>
                        <td><?= $aboutUs->image?></td>
                      <?php endif;?> 
                      <td><?= $aboutUs->text?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <h1 style="margin-bottom: 25px;margin-top: 50px;text-align: center;">Contact Us Table</h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($data['contacts'] as $contact) : ?>
                    <tr>
                      <td><?= $contact->contact_id?></td>
                      <td><?= $contact->name?></td>
                      <td><?= $contact->businessEmail?></td>
                      <td><?= $contact->phone?></td>
                      <td><?= $contact->location?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    
</div>
    


<?php require APPROOT . '/views/includes/footer.php';  ?>