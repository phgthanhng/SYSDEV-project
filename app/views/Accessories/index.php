<?php require APPROOT . '/views/includes/header.php';  ?>

<h1 style="text-align: center; margin-top: 50px">Browse products</h1>

<div class="container" style="max-width: 100rem; margin-top: 100px; margin-bottom: 100px; margin-inline:auto; padding-inline: 2rem;">
    <div class="product-grid">
        <?php
        if (!empty($data["accessories"])) {
            foreach ($data["accessories"] as $product) {
                echo '<div class="card stacked">';
                echo '<a href="'.URLROOT.'/accessories/detail/'.$product->accessory_id.'" style="text-decoration: none;">';
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

<?php require APPROOT . '/views/includes/footer.php';  ?>