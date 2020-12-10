<?php
$brand = array_map(function($produit){return $produit['item_brand'];}, $productDatas);
$unique = array_unique(($brand));
sort($unique);
shuffle($productDatas);

?>
<section id="special-price">
    <div class="container">
        <h4 class="font-rubik font-size-20">Special price</h4>
        <hr>
        <div id="filters" class="button-group text-right">
            <button class="btn is-checked" data-filter="*">All brand</button> 
            <?php
            array_map(function($brand){
                printf('<button class="btn" data-filter=".%s">%s</button>', $brand, $brand);
            },$unique);
            ?>          
        </div>
        <div class="grid">
            <?php 
                array_map(function($product){
            ?>
            <div class="grid-item <?=$product['item_brand'] ?? "Brand"; ?>">
                <div class="item py-2" style="width:200px">
                <div class="product font-barlow">
                    <a href="<?php printf('%s?item_id=%s', 'product.php', $product['item_id'])?>"><img src="<?=$product['item_image'] ?>" alt="product13" class="img-fluid"></a>
                    <div class="text-center">
                        <h6><?=$product['item_name'] ?? "Name" ?></h6>
                        <div class="rating text-warning font-size-12">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="far fa-star"></i></span>
                        </div>
                        <div class="price py-2">
                            <span>$<?=$product['item_price'] ?></span>
                        </div>
                        <button type="submit" class="btn btn-warning font-size-12">Add to cart</button>
                    </div>
                </div>
                </div>
            </div>
            <?php
            }, $productDatas) 
            ?> 
        </div>
    </div>
</section>