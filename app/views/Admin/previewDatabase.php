<?php require APPROOT . '/views/includes/adminheader.php';  ?>

<div class="container">    
    <div class="container">
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
                <?php
                    if (!empty($data["hookahs"])) {
                      foreach($data["hookahs"] as $hookah) {
                        echo "<tr>";
                        echo "<td>
                       $hookah->
                        </td>";
                        echo "<td>
                       $hookah->
                        </td>";
                        echo "<td>
                       $hookah->
                        </td>";
                        echo "<td>
                       $hookah->
                        </td>";
                        echo "<td>
                        $hookah->
                        </td>";
                        echo "<td>
                        $hookah->
                        </td>";
                        echo "<td>
                        $hookah->
                        </td>";
                        echo "<td>
                        $hookah->
                        </td>";
                      } 
                    }
                  ?>
                </tbody>
            </table>
        </div>
    </div>

    <h1 style="margin-bottom: 25px;margin-top: 50px;text-align: center;">Accessory Table</h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Color</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if (!empty($data["accessories"])) {
                      foreach($data["accessories"] as $accessory) {
                        echo "<tr>";
                        echo "<td>
                       $accessory->
                        </td>";
                        echo "<td>
                       $accessory->
                        </td>";
                        echo "<td>
                       $accessory->
                        </td>";
                        echo "<td>
                       $accessory->
                        </td>";
                        echo "<td>
                       $accessory->
                        </td>";
                        echo "<td>
                        $accessory->
                        </td>";
                        echo "<td>
                        $accessory->
                        </td>";                       
                        echo "<td>
                        $accessory->
                        </td>";                       
                        echo "</tr>";
                      } 
                    }
                  ?>
                </tbody>
            </table>
        </div>
    </div>
    <h1 style="margin-bottom: 25px;margin-top: 50px;text-align: center;">About Us Table</h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Content</th>
                    <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if (!empty($data["about_us"])) {
                      foreach($data["about_us"] as $about_us) {
                        echo "<tr>";
                        echo "<td>
                       $about_us->
                        </td>";
                        echo "<td>
                       $about_us->
                        </td>";
                        echo "<td>
                       $about_us->
                        </td>";
                        echo "<td>";                  
                        echo "</tr>";
                      } 
                    }
                  ?>
                </tbody>
            </table>
        </div>
    </div>
    <h1 style="margin-bottom: 25px;margin-top: 50px;text-align: center;">Contact Us Table</h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if (!empty($data["contact_us"])) {
                      foreach($data["contact_us"] as $contact_us) {
                        echo "<tr>";
                        echo "<td>
                       $contact_us->
                        </td>";
                        echo "<td>
                       $contact_us->
                        </td>";
                        echo "<td>
                       $contact_us->
                        </td>";
                        echo "<td>";                  
                        echo "<td>
                       $contact_us->
                        </td>";
                        echo "<td>";                  
                        echo "</tr>";
                      } 
                    }
                  ?>
                </tbody>
            </table>
        </div>
    </div>

<?php require APPROOT . '/views/includes/footer.php';  ?>