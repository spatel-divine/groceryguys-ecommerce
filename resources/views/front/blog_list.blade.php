@extends('front_layout.app')
@section('title', 'Dashboard')
@section('content')
    <main class="main">
        <div class="page-header mt-30 mb-75">
            <div class="container">
                <div class="archive-header">
                    <div class="row align-items-center">
                        <div class="col-xl-3">
                            <h1 class="mb-15">Blog & News</h1>
                            <div class="breadcrumb">
                                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                                <span></span> Blog & News
                            </div>
                        </div>
                        <div class="col-xl-9 text-end d-none d-xl-block">
                            <ul class="tags-list">
                                <li class="hover-up">
                                    <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Shopping</a>
                                </li>
                                <li class="hover-up active">
                                    <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Recips</a>
                                </li>
                                <li class="hover-up">
                                    <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Kitchen</a>
                                </li>
                                <li class="hover-up">
                                    <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>News</a>
                                </li>
                                <li class="hover-up mr-0">
                                    <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Food</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-content mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="shop-product-fillter mb-50 pr-30">
                            <div class="totall-product">
                                <h2>
                                    <img class="w-36px mr-10" src="assets/imgs/theme/icons/category-1.svg" alt="" />
                                    Kitchen Articles
                                </h2>
                            </div>
                            <div class="sort-by-product-area">
                                <div class="sort-by-cover mr-10">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps"></i>Show:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="active" href="#">50</a></li>
                                            <li><a href="#">100</a></li>
                                            <li><a href="#">150</a></li>
                                            <li><a href="#">200</a></li>
                                            <li><a href="#">All</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sort-by-cover">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps-sort"></i>Sort:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span>Featured <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="active" href="#">Featured</a></li>
                                            <li><a href="#">Newest</a></li>
                                            <li><a href="#">Most comments</a></li>
                                            <li><a href="#">Release Date</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="loop-grid loop-list pr-30 mb-50">
                            <article class="wow fadeIn animated hover-up mb-30 animated">
                                <div class="post-thumb" style="background-image: url(assets/imgs/blog/blog-1.png)">
                                    <div class="entry-meta">
                                        <a class="entry-meta meta-2" href="blog-category-grid.html"><i
                                                class="fi-rs-play-alt"></i></a>
                                    </div>
                                </div>
                                <div class="entry-content-2 pl-50">
                                    <h3 class="post-title mb-20">
                                        <a href="blog-post-right.html">9 Tasty Ideas That Will Inspire You to Grow a Home
                                            Herb Garden Today</a>
                                    </h3>
                                    <p class="post-exerpt mb-40">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                        veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                        dolore eu fugiat nulla pariatur.</p>
                                    <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                        <div>
                                            <span class="post-on">25 April 2021</span>
                                            <span class="hit-count has-dot">126k Views</span>
                                        </div>
                                        <a href="blog-post-right.html" class="text-brand font-heading font-weight-bold">Read
                                            more <i class="fi-rs-arrow-right"></i></a>
                                    </div>
                                </div>
                            </article>
                            <article class="wow fadeIn animated hover-up mb-30 animated">
                                <div class="post-thumb" style="background-image: url(assets/imgs/blog/blog-2.png)">
                                </div>
                                <div class="entry-content-2 pl-50">
                                    <h3 class="post-title mb-20">
                                        <a href="blog-post-right.html">The Easy Italian Chicken Dinner I Make Over and Over
                                            Again</a>
                                    </h3>
                                    <p class="post-exerpt mb-40">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                        veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                        dolore eu fugiat nulla pariatur.</p>
                                    <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                        <div>
                                            <span class="post-on">25 April 2021</span>
                                            <span class="hit-count has-dot">126k Views</span>
                                        </div>
                                        <a href="blog-post-right.html" class="text-brand font-heading font-weight-bold">Read
                                            more <i class="fi-rs-arrow-right"></i></a>
                                    </div>
                                </div>
                            </article>
                            <article class="wow fadeIn animated hover-up mb-30 animated">
                                <div class="post-thumb" style="background-image: url(assets/imgs/blog/blog-3.png)">
                                    <div class="entry-meta">
                                        <a class="entry-meta meta-2" href="blog-category-grid.html"><i
                                                class="fi-rs-picture"></i></a>
                                    </div>
                                </div>
                                <div class="entry-content-2 pl-50">
                                    <h3 class="post-title mb-20">
                                        <a href="blog-post-right.html">I Tried 38 Different Bottles of Mustard — These Are
                                            the Ones I’ll Buy Again</a>
                                    </h3>
                                    <p class="post-exerpt mb-40">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                        veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                        dolore eu fugiat nulla pariatur.</p>
                                    <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                        <div>
                                            <span class="post-on">25 April 2021</span>
                                            <span class="hit-count has-dot">126k Views</span>
                                        </div>
                                        <a href="blog-post-right.html" class="text-brand font-heading font-weight-bold">Read
                                            more <i class="fi-rs-arrow-right"></i></a>
                                    </div>
                                </div>
                            </article>
                            <article class="wow fadeIn animated hover-up mb-30 animated">
                                <div class="post-thumb" style="background-image: url(assets/imgs/blog/blog-4.png)">
                                    <div class="entry-meta">
                                        <a class="entry-meta meta-2" href="blog-category-grid.html"><i
                                                class="fi-rs-play-alt"></i></a>
                                    </div>
                                </div>
                                <div class="entry-content-2 pl-50">
                                    <h3 class="post-title mb-20">
                                        <a href="blog-post-right.html">How I Prep a Week of Absolutely Simple Summer Meals
                                            in Just 1 Hour</a>
                                    </h3>
                                    <p class="post-exerpt mb-40">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                        veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                        dolore eu fugiat nulla pariatur.</p>
                                    <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                        <div>
                                            <span class="post-on">25 April 2021</span>
                                            <span class="hit-count has-dot">126k Views</span>
                                        </div>
                                        <a href="blog-post-right.html" class="text-brand font-heading font-weight-bold">Read
                                            more <i class="fi-rs-arrow-right"></i></a>
                                    </div>
                                </div>
                            </article>
                            <article class="wow fadeIn animated hover-up mb-30 animated">
                                <div class="post-thumb" style="background-image: url(assets/imgs/blog/blog-5.png)">
                                    <div class="entry-meta">
                                        <a class="entry-meta meta-2" href="blog-category-grid.html"><i
                                                class="fi-rs-heart"></i></a>
                                    </div>
                                </div>
                                <div class="entry-content-2 pl-50">
                                    <h3 class="post-title mb-20">
                                        <a href="blog-post-right.html">Jenny Rosenstrach Has a Game Plan for the Weekday
                                            Vegetarian</a>
                                    </h3>
                                    <p class="post-exerpt mb-40">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                        veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                        dolore eu fugiat nulla pariatur.</p>
                                    <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                        <div>
                                            <span class="post-on">25 April 2021</span>
                                            <span class="hit-count has-dot">126k Views</span>
                                        </div>
                                        <a href="blog-post-right.html"
                                            class="text-brand font-heading font-weight-bold">Read more <i
                                                class="fi-rs-arrow-right"></i></a>
                                    </div>
                                </div>
                            </article>
                            <article class="wow fadeIn animated hover-up mb-30 animated">
                                <div class="post-thumb" style="background-image: url(assets/imgs/blog/blog-6.png)">
                                </div>
                                <div class="entry-content-2 pl-50">
                                    <h3 class="post-title mb-20">
                                        <a href="blog-post-right.html">Prime Day Is Here and These Are the Best Kitchen
                                            Deals to Shop ASAP</a>
                                    </h3>
                                    <p class="post-exerpt mb-40">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                        veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                        dolore eu fugiat nulla pariatur.</p>
                                    <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                        <div>
                                            <span class="post-on">25 April 2021</span>
                                            <span class="hit-count has-dot">126k Views</span>
                                        </div>
                                        <a href="blog-post-right.html"
                                            class="text-brand font-heading font-weight-bold">Read more <i
                                                class="fi-rs-arrow-right"></i></a>
                                    </div>
                                </div>
                            </article>
                            <article class="wow fadeIn animated hover-up mb-30 animated">
                                <div class="post-thumb" style="background-image: url(assets/imgs/blog/blog-1.png)">
                                </div>
                                <div class="entry-content-2 pl-50">
                                    <h3 class="post-title mb-20">
                                        <a href="blog-post-right.html">9 Tasty Ideas That Will Inspire You to Grow a Home
                                            Herb Garden Today</a>
                                    </h3>
                                    <p class="post-exerpt mb-40">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                        veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                        dolore eu fugiat nulla pariatur.</p>
                                    <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                        <div>
                                            <span class="post-on">25 April 2021</span>
                                            <span class="hit-count has-dot">126k Views</span>
                                        </div>
                                        <a href="blog-post-right.html"
                                            class="text-brand font-heading font-weight-bold">Read more <i
                                                class="fi-rs-arrow-right"></i></a>
                                    </div>
                                </div>
                            </article>
                            <article class="wow fadeIn animated hover-up mb-30 animated">
                                <div class="post-thumb" style="background-image: url(assets/imgs/blog/blog-7.png)">
                                    <div class="entry-meta">
                                        <a class="entry-meta meta-2" href="blog-category-grid.html"><i
                                                class="fi-rs-headset"></i></a>
                                    </div>
                                </div>
                                <div class="entry-content-2 pl-50">
                                    <h3 class="post-title mb-20">
                                        <a href="blog-post-right.html">How I Prep a Week of Absolutely Simple Summer Meals
                                            in Just 1 Hour</a>
                                    </h3>
                                    <p class="post-exerpt mb-40">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                        veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                        dolore eu fugiat nulla pariatur.</p>
                                    <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                        <div>
                                            <span class="post-on">25 April 2021</span>
                                            <span class="hit-count has-dot">126k Views</span>
                                        </div>
                                        <a href="blog-post-right.html"
                                            class="text-brand font-heading font-weight-bold">Read more <i
                                                class="fi-rs-arrow-right"></i></a>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item">
                                        <a class="page-link" href="#"><i class="fi-rs-arrow-small-left"></i></a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><i class="fi-rs-arrow-small-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="widget-area">
                            <div class="sidebar-widget-2 widget_search mb-50">
                                <div class="search-form">
                                    <form action="#">
                                        <input type="text" placeholder="Search…" />
                                        <button type="submit"><i class="fi-rs-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="sidebar-widget widget-category-2 mb-50">
                                <h5 class="section-title style-1 mb-30">Category</h5>
                                <ul>
                                    <li>
                                        <a href="shop-grid-right.html"> <img src="assets/imgs/theme/icons/category-1.svg"
                                                alt="" />Milks & Dairies</a><span class="count">30</span>
                                    </li>
                                    <li>
                                        <a href="shop-grid-right.html"> <img src="assets/imgs/theme/icons/category-2.svg"
                                                alt="" />Clothing</a><span class="count">35</span>
                                    </li>
                                    <li>
                                        <a href="shop-grid-right.html"> <img src="assets/imgs/theme/icons/category-3.svg"
                                                alt="" />Pet Foods </a><span class="count">42</span>
                                    </li>
                                    <li>
                                        <a href="shop-grid-right.html"> <img src="assets/imgs/theme/icons/category-4.svg"
                                                alt="" />Baking material</a><span class="count">68</span>
                                    </li>
                                    <li>
                                        <a href="shop-grid-right.html"> <img src="assets/imgs/theme/icons/category-5.svg"
                                                alt="" />Fresh Fruit</a><span class="count">87</span>
                                    </li>
                                </ul>
                            </div>
                            <!-- Product sidebar Widget -->
                            <div class="sidebar-widget product-sidebar mb-50 p-30 bg-grey border-radius-10">
                                <h5 class="section-title style-1 mb-30">Trending Now</h5>
                                <div class="single-post clearfix">
                                    <div class="image">
                                        <img src="assets/imgs/shop/thumbnail-3.jpg" alt="#" />
                                    </div>
                                    <div class="content pt-10">
                                        <h5><a href="shop-product-detail.html">Chen Cardigan</a></h5>
                                        <p class="price mb-0 mt-5">$99.50</p>
                                        <div class="product-rate">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-post clearfix">
                                    <div class="image">
                                        <img src="assets/imgs/shop/thumbnail-4.jpg" alt="#" />
                                    </div>
                                    <div class="content pt-10">
                                        <h6><a href="shop-product-detail.html">Chen Sweater</a></h6>
                                        <p class="price mb-0 mt-5">$89.50</p>
                                        <div class="product-rate">
                                            <div class="product-rating" style="width: 80%"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-post clearfix">
                                    <div class="image">
                                        <img src="assets/imgs/shop/thumbnail-5.jpg" alt="#" />
                                    </div>
                                    <div class="content pt-10">
                                        <h6><a href="shop-product-detail.html">Colorful Jacket</a></h6>
                                        <p class="price mb-0 mt-5">$25</p>
                                        <div class="product-rate">
                                            <div class="product-rating" style="width: 60%"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-post clearfix">
                                    <div class="image">
                                        <img src="assets/imgs/shop/thumbnail-6.jpg" alt="#" />
                                    </div>
                                    <div class="content pt-10">
                                        <h6><a href="shop-product-detail.html">Lorem, ipsum</a></h6>
                                        <p class="price mb-0 mt-5">$25</p>
                                        <div class="product-rate">
                                            <div class="product-rating" style="width: 60%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-widget widget_instagram mb-50">
                                <h5 class="section-title style-1 mb-30">Gallery</h5>
                                <div class="instagram-gellay">
                                    <ul class="insta-feed">
                                        <li>
                                            <a href="#"><img class="border-radius-5" src="assets/imgs/shop/thumbnail-1.jpg"
                                                    alt="" /></a>
                                        </li>
                                        <li>
                                            <a href="#"><img class="border-radius-5" src="assets/imgs/shop/thumbnail-2.jpg"
                                                    alt="" /></a>
                                        </li>
                                        <li>
                                            <a href="#"><img class="border-radius-5" src="assets/imgs/shop/thumbnail-3.jpg"
                                                    alt="" /></a>
                                        </li>
                                        <li>
                                            <a href="#"><img class="border-radius-5" src="assets/imgs/shop/thumbnail-4.jpg"
                                                    alt="" /></a>
                                        </li>
                                        <li>
                                            <a href="#"><img class="border-radius-5" src="assets/imgs/shop/thumbnail-5.jpg"
                                                    alt="" /></a>
                                        </li>
                                        <li>
                                            <a href="#"><img class="border-radius-5" src="assets/imgs/shop/thumbnail-6.jpg"
                                                    alt="" /></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--Tags-->
                            <div class="sidebar-widget widget-tags mb-50 pb-10">
                                <h5 class="section-title style-1 mb-30">Popular Tags</h5>
                                <ul class="tags-list">
                                    <li class="hover-up">
                                        <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Cabbage</a>
                                    </li>
                                    <li class="hover-up">
                                        <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Broccoli</a>
                                    </li>
                                    <li class="hover-up">
                                        <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Smoothie</a>
                                    </li>
                                    <li class="hover-up">
                                        <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Fruit</a>
                                    </li>
                                    <li class="hover-up mr-0">
                                        <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Salad</a>
                                    </li>
                                    <li class="hover-up mr-0">
                                        <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Appetizer</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="banner-img wow fadeIn mb-50 animated d-lg-block d-none">
                                <img src="assets/imgs/banner/banner-11.png" alt="" />
                                <div class="banner-text">
                                    <span>Oganic</span>
                                    <h4>
                                        Save 17% <br />
                                        on <span class="text-brand">Oganic</span><br />
                                        Juice
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
