<?php require APPROOT . '/views/includes/header.php';  ?>
<style>
    .product-grid {
        display: grid;
        gap: 0.25rem;
        grid-template-columns: repeat(auto-fit, minmax(15rem, 0.25fr));
    }

    .card {
        aspect-ratio: 1 / 1.5;
        border: none;
    }

    img {
        max-width: 100%;
        display: block;
    }

    .stacked {
        display: grid;
    }

    .stacked>* {
        grid-column: 1 / 2;
        grid-row: 1 / 2
    }

    .card__img {
        width: 100%;
        aspect-ratio: 1 / 1.25;
        object-fit: cover;
    }

    .card__title {
        font-size: 1.25rem;
        line-height: 1.1;
        color: firebrick;
    }

    .card__price {
        font-size: 1.75rem;
    }

    .card__content {
        background-color: white;
        align-self: end;
        margin: .5rem .5rem 2rem;
        padding: .5rem;
        box-shadow: 0 0.25rem 1rem rgb(0 0 0 / 0.1);
    }

    p.max-content {
        width: max-content;
    }

    p.min-content {
        width: min-content;
    }
</style>
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