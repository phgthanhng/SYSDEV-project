
<?php
    if (!isLoggedIn())
        require APPROOT . '/views/includes/header.php';  
    else
        require APPROOT . '/views/includes/adminheader.php';  
?>
<script src="<?php echo URLROOT ?>/public/js/hookah.js" defer></script>

<div class="wrapper" >
    <div id="viewport">
        <!-- Sidebar -->
        <div id="sidebar">
            <label for="" class="category">Price</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="price-0">
                <label class="form-check-label" for="price-0">
                    Under $25
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="price-1">
                <label class="form-check-label" for="price-1">
                    $25 to $50
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="price-2">
                <label class="form-check-label" for="price-2">
                    $50 to $100
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="price-3">
                <label class="form-check-label" for="price-3">
                    $100 to $200
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="price-4">
                <label class="form-check-label" for="price-4">
                    $200 & Above
                </label>
            </div>
            <label for="" class="category">Category</label>
            <?php
            if (!empty($data["categories"])) {
                foreach ($data["categories"] as $category) {
                    echo '<div class="form-check">';
                    echo '<input class="form-check-input" type="checkbox" value="" id="category-'.$category->category.'">';
                    echo '<label class="form-check-label" for="price-0">
                    ' . $category->category . '
                </label>';
                    echo ' </div>';
                }
            }
            ?>
            <label for="" class="category">Brand</label>
            <?php
            if (!empty($data["brands"])) {
                foreach ($data["brands"] as $brand) {
                    echo '<div class="form-check">';
                    echo '<input class="form-check-input" type="checkbox" value="" id="brand-'.$category->category.'">';
                    echo '<label class="form-check-label" for="price-0">
                    ' . $brand->brand . '
                </label>';
                    echo ' </div>';
                }
            }
            ?>
        </div>

    </div>

    <div class="container" style="max-width: 100rem; margin-top: 100px; margin-bottom: 100px; margin-inline:auto; padding-inline: 2rem;">
        <h1 style="text-align: center; margin-top: 50px; margin-bottom:50px">Browse products(<?= count($data["accessories"])?>)</h1>

        <div class="dropdown" style="margin-left: 30px; margin-bottom: 30px">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Sort Price
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#" id="sort-0">Price Low to High</a></li>
                <li><a class="dropdown-item" href="#" id="sort-1">Price High to Low</a></li>
            </ul>
        </div>

        <div class="product-grid">
            <?php
            if (!empty($data["accessories"])) {
                foreach ($data["accessories"] as $product) {
                    echo '<div class="card stacked">';
                    echo '<a href="' . URLROOT . '/accessories/detail/' . $product->accessory_id . '" style="text-decoration: none;">';
                    echo '<a href="'. URLROOT . '/accessories/detail/' . $product->accessory_id . '" style="text-decoration: none;">
                            <img src="' . URLROOT . '/public/img/' . $product->image . '" class="card__img">
                        </a>';
                    echo '<div class="card__content">';
                    echo '<a href="'. URLROOT . '/accessories/detail/' . $product->accessory_id . '" style="text-decoration: none;">
                            <h2 class="card__title">' . $product->name . '</h2>
                        </a>';
                    echo '<p class="card__price">' . $product->price . '</p>';
                    echo '</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</a>';
                }
            }
            ?>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php';  ?>