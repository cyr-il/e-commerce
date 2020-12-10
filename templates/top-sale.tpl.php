<?php

$productDatas = $product->getProducts();
shuffle($productDatas);
?>

<section id="top-sale">
    <div class="container py-5">
        <h4 class="font-rubik font-size-20">Top sale</h4>
        <hr>
        <div class="owl-carousel owl-theme">
            <?php
            foreach ($productDatas as $product) {?>
            <div class="item py-2">
                <div class="product font-barlow">
                    <a href="<?php printf('%s?item_id=%s', 'product.php', $product['item_id'])?>"><img src="<?=$product['item_image'] ?>" alt="product1" class="img-fluid"></a>
                    <div class="text-center">
                        <h6><?= $product['item_name'] ?></h6>
                        <div class="rating text-warning font-size-12">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="far fa-star"></i></span>
                        </div>
                        <div class="price py-2">
                            <span>$<?= $product['item_price'] ?></span>
                        </div>
                        <button type="submit" class="btn btn-warning font-size-12">Add to cart</button>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>