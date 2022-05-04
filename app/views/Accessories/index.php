
<?php
    if (!isLoggedIn())
        require APPROOT . '/views/includes/header.php';  
    else
        require APPROOT . '/views/includes/adminheader.php';  
?>
<script src="<?= URLROOT ?>/public/js/hookah.js" defer></script>

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

            <?php if(!empty($data["categories"])) : ?>
                <?php foreach($data["categories"] as $category) : ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="category-<?=$category->category?>">
                        <label class="form-check-label" for="category-<?=$category->category?>"><?=$category->category?></label>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <label for="" class="category">Brand</label>

            <?php if(!empty($data["brands"])) : ?>
                <?php foreach($data["brands"] as $brand) : ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="brand-<?=$brand->brand?>">
                        <label class="form-check-label" for="brand-<?=$brand->brand?>"><?=$brand->brand?></label>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            
        </div>

    </div>

    <div class="products" >
        <h1 style="text-align: center; margin-top: 50px; margin-bottom:50px">Browse Accessories(<?= count($data["accessories"])?>)</h1>

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

            <?php if(!empty($data["accessories"])) : ?>
                <?php foreach ($data["accessories"] as $product) : ?>
                    <div class="card stacked">
                        <a href="<?= URLROOT ?>/accessories/detail/<?= $product->accessory_id ?>" style="text-decoration: none;">
                            <a href="<?= URLROOT ?>/accessories/detail/<?= $product->accessory_id ?>" style="text-decoration: none;">
                                <img src="<?= URLROOT ?>/public/img/<?= $product->image ?>" class="card__img">
                            </a>
                            <div class="card__content">
                                <a href="<?= URLROOT ?>/accessories/detail/<?= $product->accessory_id ?>" style="text-decoration: none;">
                                    <h2 class="card__title"><?= $product->name ?></h2>
                                    <p class="card__price"><?= $product->price ?></p>
                                </a>
                                
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>


            
        </div>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php';  ?>