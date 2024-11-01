<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;
use App\Views\Client\Components\Category;

class Index extends BaseView
{
    public static function render($data = null)
    {

?>


        <section id="mobile-products" class="product-store position-relative padding-large no-padding-top">
            <div class="container">
                <div class="row">
                    <?php
                    Category::render($data['categories']);
                    ?>
                    <?php
                    if (count($data) && count($data['products'])) :
                    ?>
                        <div class="display-header d-flex justify-content-between pb-3">

                            <h2 class="display-7 text-dark text-uppercase">Sản phẩm</h2>
                            <!-- <div class="btn-right">
                                <a href="shop.html" class="btn btn-medium btn-normal text-uppercase">Go to Shop</a>
                            </div> -->
                        </div>

                        <div class="swiper product-swiper">
                            <div class="swiper-wrapper">
                                <?php
                                foreach ($data['products'] as $item) :
                                ?>
                                    <div class="swiper-slide">
                                        <div class="product-card position-relative">
                                            <div class="image-holder">
                                                <img src="<?= APP_URL ?>/public/uploads/products/<?= $item['image'] ?>" class="card-img-top" alt="" style="width: 100%; height: 350px; display: block;" data-holder-rendered="true">
                                            </div>
                                            <div class="cart-concern position-absolute">
                                                <div class="cart-button d-flex">
                                                    <a href="/products/<?= $item['id'] ?>" type="button" class="btn btn-medium btn-black">Chi tiết<svg class="cart-outline">
                                                            <use xlink:href="#cart-outline"></use>
                                                        </svg></a>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text"><?= $item['name'] ?></p>
                                                <?php
                                                if ($item['discount_price'] > 0) :
                                                ?>
                                                    <p>Giá gốc: <strike><?= number_format($item['price']) ?> đ</strike></p>
                                                    <p>Giá giảm: <strong class="text-danger"><?= number_format($item['price'] - $item['discount_price']) ?> đ</strong></p>

                                                <?php
                                                else :
                                                ?>
                                                    <p>Giá tiền: <?= number_format($item['price']) ?> đ</p>

                                                <?php
                                                endif;
                                                ?>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="btn-group">
                                                        <!-- <a href="/products/<?= $item['id'] ?>" type="button" class="btn btn-sm btn-outline-info">Chi tiết</a> -->
                                                        <form action="/cart/add" method="post">
                                                            <input type="hidden" name="method" id="" value="POST">
                                                            <input type="hidden" name="id" id="" value="<?= $item['id'] ?>" required>
                                                            <button type="submit" class="btn btn-sm btn-outline-success">Thêm vào giỏ hàng</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="cart-concern position-absolute">
                                                <div class="cart-button d-flex">
                                                    <a href="/products/<?= $item['id'] ?>" type="button" class="btn btn-medium btn-black">Chi tiết<svg class="cart-outline">
                                                            <use xlink:href="#cart-outline"></use>
                                                        </svg></a>
                                                </div>
                                            </div> -->
                                            <!-- <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                                                <h5 class="card-title text-uppercase">
                                                    <a href="#"><?= $item['name'] ?></a>
                                                </h5>
                                                <span class="item-price text-primary"><?= number_format($item['price'] - $item['discount_price']) ?>đ</span>
                                            </div> -->
                                        </div>
                                    </div>

                                <?php
                                endforeach;
                                ?>
                            </div>
                        </div>

                    <?php
                    else :
                    ?>
                        <h3 class="text-center text-danger">Không có sản phẩm</h3>
                    <?php
                    endif;
                    ?>
                </div>
            </div>
            <div class="swiper-pagination position-absolute text-center"></div>
        </section>




        <!-- <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-3">
                    <?php
                    Category::render($data['categories']);
                    ?>
                </div>
                <div class="col-md-9">
                    <?php
                    if (count($data) && count($data['products'])) :
                    ?>
                        <h1 class="text-center mb-3">Sản phẩm</h1>

                        <div class="row">
                            <?php
                            foreach ($data['products'] as $item) :
                            ?>
                                <div class="col-md-4">
                                    <div class="card mb-4 shadow-sm">
                                        <img src="<?= APP_URL ?>/public/uploads/products/<?= $item['image'] ?>" class="card-img-top" alt="" style="width: 100%; display: block;" data-holder-rendered="true">
                                        <div class="card-body">
                                            <p class="card-text"><?= $item['name'] ?></p>
                                            <?php
                                            if ($item['discount_price'] > 0) :
                                            ?>
                                                <p>Giá gốc: <strike><?= number_format($item['price']) ?> đ</strike></p>
                                                <p>Giá giảm: <strong class="text-danger"><?= number_format($item['price'] - $item['discount_price']) ?> đ</strong></p>

                                            <?php
                                            else :
                                            ?>
                                                <p>Giá tiền: <?= number_format($item['price']) ?> đ</p>

                                            <?php
                                            endif;
                                            ?>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <a href="/products/<?= $item['id'] ?>" type="button" class="btn btn-sm btn-outline-info">Chi tiết</a>
                                                    <form action="/cart/add" method="post">
                                                        <input type="hidden" name="method" id="" value="POST">
                                                        <input type="hidden" name="id" id="" value="<?= $item['id'] ?>" required>
                                                        <button type="submit" class="btn btn-sm btn-outline-success">Thêm vào giỏ hàng</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            endforeach;
                            ?>
                        </div>
                    <?php
                    else :
                    ?>
                        <h3 class="text-center text-danger">Không có sản phẩm</h3>
                    <?php
                    endif;
                    ?>
                </div>
            </div>
        </div> -->
<?php

    }
}
