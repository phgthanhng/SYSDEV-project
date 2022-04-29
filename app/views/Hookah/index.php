<?php
    if (!isLoggedIn())
        require APPROOT . '/views/includes/header.php';  
    else
        require APPROOT . '/views/includes/adminheader.php';  
?>
<script src="<?php echo URLROOT ?>/public/js/hookah.js" defer></script>
<div class="wrapper">
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
            <label for="" class="category">Type</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="type-egyptian">
                <label class="form-check-label" for="type-egyptian">
                    Egyptian
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="type-syrian">
                <label class="form-check-label" for="type-syrian">
                    Syrian
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="type-indian">
                <label class="form-check-label" for="type-indian">
                    Indian
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="type-traditional">
                <label class="form-check-label" for="type-traditional">
                    Traditional
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="type-modern">
                <label class="form-check-label" for="type-modern">
                    Modern
                </label>
            </div>
            <label for="" class="category">Color</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="color-Black">
                <label class="form-check-label" for="color-Black">
                    Black
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="color-Red">
                <label class="form-check-label" for="color-Red">
                    Red
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="color-Green">
                <label class="form-check-label" for="color-Green">
                    Green
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="color-Pink">
                <label class="form-check-label" for="color-Pink">
                    Pink
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="color-Blue">
                <label class="form-check-label" for="color-Blue">
                    Blue
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="color-Yellow">
                <label class="form-check-label" for="color-Yellow">
                    Yellow
                </label>
            </div>
        </div>
    </div>

    <div class="container" style="max-width: 100rem; margin-top: 100px; margin-bottom: 100px; margin-inline:auto; padding-inline: 2rem;">
        <h1 style="text-align: center; margin-top: 50px; margin-bottom:50px">Browse products</h1>
        <div class="dropdown" style="margin-left: 30px; margin-bottom: 30px">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown button
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Price Low to High</a></li>
                <li><a class="dropdown-item" href="#">Price High to Low</a></li>
            </ul>
        </div>

        <div class="product-grid">

            <?php
            if (!empty($data["hookahs"])) {
                foreach ($data["hookahs"] as $product) {
                    echo '<div class="card stacked">';
                    echo '<a href="' . URLROOT . '/hookah/detail/' . $product->hookah_id . '" style="text-decoration: none;">';
                    echo '<img src="' . URLROOT . '/public/img/' . $product->image . '" class="card__img">';
                    echo '<div class="card__content">';
                    echo '<h2 class="card__title">' . $product->name . '</h2>';
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