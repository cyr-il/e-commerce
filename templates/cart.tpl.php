   <!--shopping cart section-->
<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['delete-cart-submit'])){
        $deletedCartRecord = $cart->delete($_POST['item_id']);
    }
}

?>
<section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <h5 class="font-barlow font-size-20">Shopping cart</h5>
        <div class="row">
            <div class="col-sm-9">
                <?php
                foreach($product->getProducts('cart') as $productCart):
                    $cart = $product->getProduct($productCart['item_id']);
                    $subTotal[] = array_map(function($productCart){
                ?>
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img src="<?php echo $productCart['item_image']?>" alt="product1" class="img-fluid" style="height: 120px">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-barlow font-size-20"><?php echo $productCart['item_name']?></h5>
                        <small>by <?php echo $productCart['item_brand']?></small>
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <a href="#" class="px-2 font-josefin font-size-14">20 534 ratings</a>
                        </div>
                        <div class="qty d-flex pt-2">
                            <div class="d-flex font-barlow w-25">
                                <button class="qty-up border bg-light" data-id="product1"><i class="fas fa-angle-up"></i></button>
                                <input type="text" class="qty_input border px-2 w-100 bg-light text-center" data-id="product1" disabled value="1" placeholder="1">
                                <button class="qty-down border bg-light" data-id="product1"><i class="fas fa-angle-down"></i></button>
                            </div>
                            <form method="post">
                                <input type="hidden" value="<?php echo $productCart['item_id']?? 0; ?>" name="item_id">
                                <button type="submit" name="delete-cart-submit" class="btn font-barlow text-danger px-3 border-right">Delete</button>
                            </form>
                            <button type="submit" class="btn font-barlow text-danger">Save for later</button>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="font-size-20 text-danger font-barlow text-right">
                            $<span class="product_price"><?php echo $productCart['item_price']?></span>
                        </div>
                    </div>
                </div>
                <?php  
                    return $productCart['item_price'];
                    }, $cart); 
                    endforeach;
                ?>
            </div>
        <div class="col-sm-3">
                <div class="sub-total text-center mt-2 border">
                    <h6 class="font-size-12 font-barlow py-3 text-success"><i class="fas fa-check">Your order is eligible for FREE delivery</i></h6>
                    <div class="border-top py-4">
                        <h5 class="font-josefin font-size-20">Subtotal <?= count($product->getProducts('cart')) ?? 0?>&nbsp;<span class="text-danger">$<span class="text-danger" id="deal-price"><?php echo isset($subTotal) ? $cart->array_sum($subTotal):0 ?></span></span></h5>
                        <button type="submit" class ="btn btn-warning">Proceed to buy</button>
                    </div>
                </div>  
        </div>
    </div>
    </div>
</section>