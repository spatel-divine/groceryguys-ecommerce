@foreach ($productData as $product)
    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
        <div class="product-cart-wrap mb-30">
            <div class="product-img-action-wrap">
                <div class="product-img product-img-zoom">
                    <a href="shop-product-right.html">
                        {{-- /images/product/29-07-2021/maincasata.jpg --}}
                        {{-- {{ asset(config('constants.PRODUCT_IMAGE_PATH') . $product->product_image) }} --}}
                        <img class="default-img"
                            src="{{ file_exists(config('constants.PRODUCT_IMAGE_PATH') . $product->product_image)? asset(config('constants.PRODUCT_IMAGE_PATH') . $product->product_image): asset(config('constants.DEFAULT_PRODUCT_IMAGE_PATH')) }}"
                            alt="logo">
                        <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg" alt="" />
                    </a>
                </div>
                <div class="product-action-1">
                    <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i
                            class="fi-rs-heart"></i></a>
                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                            class="fi-rs-shuffle"></i></a>
                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                </div>
                <div class="product-badges product-badges-position product-badges-mrg">
                    <span class="hot">Hot</span>
                </div>
            </div>

            <div class="product-content-wrap">
                {{-- <div class="product-category">
                    <a href="shop-grid-right.html">Snack</a>
                </div> --}}
                <h2><a href="shop-product-right.html">{{ $product->product_name }}</a>
                </h2>
                <div class="product-rate-cover">
                    <div class="product-rate d-inline-block">
                        <div class="product-rating" style="width: 90%"></div>
                    </div>
                    <span class="font-small ml-5 text-muted">(4.0)</span>
                </div>
                <div>
                    <span class="font-small text-muted">By <a href="vendor-details-1.html">NestFood</a></span>
                </div>
                <div class="product-card-bottom">
                    <div class="product-price">
                        <span>{{ isset($product) && !empty($product->ProductVariantwithRatings)? $product->ProductVariantwithRatings->base_price: '' }}</span>
                        <span
                            class="old-price">{{ isset($product) && !empty($product->ProductVariantwithRatings)? $product->ProductVariantwithRatings->base_mrp: '' }}</span>
                    </div>
                    <div class="add-cart">
                        <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endforeach
