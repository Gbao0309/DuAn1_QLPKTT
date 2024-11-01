<?php

namespace App\Views\Client\Layouts;

use App\Views\BaseView;

class Footer extends BaseView
{
    public static function render($data = null)
    {
?>

        <footer id="footer" class="overflow-hidden">
            <div class="container">
                <div class="row">
                    <div class="footer-top-area">
                        <div class="row d-flex flex-wrap justify-content-between">
                            <div class="col-lg-3 col-sm-6 pb-3">
                                <div class="footer-menu">
                                    <img src="/public/assets/client/images/main-logo.png" alt="logo">
                                    <p>Nisi, purus vitae, ultrices nunc. Sit ac sit suscipit hendrerit. Gravida massa volutpat aenean odio erat nullam fringilla.</p>
                                    <div class="social-links">
                                        <ul class="d-flex list-unstyled">
                                            <li>
                                                <a href="#">
                                                    <svg class="facebook">
                                                        <use xlink:href="#facebook" />
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <svg class="instagram">
                                                        <use xlink:href="#instagram" />
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <svg class="twitter">
                                                        <use xlink:href="#twitter" />
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <svg class="linkedin">
                                                        <use xlink:href="#linkedin" />
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <svg class="youtube">
                                                        <use xlink:href="#youtube" />
                                                    </svg>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 pb-3">
                                <div class="footer-menu text-uppercase">
                                    <h5 class="widget-title pb-2">Liên kết nhanh</h5>
                                    <ul class="menu-list list-unstyled text-uppercase">
                                        <li class="menu-item pb-2">
                                            <a href="/">Trang chủ</a>
                                        </li>
                                        <!-- <li class="menu-item pb-2">
                                            <a href="#">About</a>
                                        </li> -->
                                        <li class="menu-item pb-2">
                                            <a href="/products">Sản phẩm</a>
                                        </li>
                                        <!-- <li class="menu-item pb-2">
                                            <a href="#">Blogs</a>
                                        </li> -->
                                        <!-- <li class="menu-item pb-2">
                                            <a href="#">Contact</a>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 pb-3">
                                <div class="footer-menu text-uppercase">
                                    <h5 class="widget-title pb-2">Trợ giúp & Thông tin Trợ giúp</h5>
                                    <ul class="menu-list list-unstyled">
                                        <li class="menu-item pb-2">
                                            <a href="/">Theo dõi đơn hàng của bạn</a>
                                        </li>
                                        <li class="menu-item pb-2">
                                            <a href="/">Chính sách trả hàng</a>
                                        </li>
                                        <li class="menu-item pb-2">
                                            <a href="/">Vận chuyển + Giao hàng</a>
                                        </li>
                                        <li class="menu-item pb-2">
                                            <a href="/">Liên hệ với chúng tôi</a>
                                        </li>
                                        <li class="menu-item pb-2">
                                            <a href="/">Câu hỏi thường gặp</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 pb-3">
                                <div class="footer-menu contact-item">
                                    <h5 class="widget-title text-uppercase pb-2">Liên hệ với chúng tôi</h5>
                                    <p>Bạn có thắc mắc hoặc góp ý gì không? <a href="mailto:">nguyenltpc08324@gmail.com</a>
                                    </p>
                                    <p>Nếu bạn cần hỗ trợ? Chỉ cần gọi cho chúng tôi. <a href="">+0708510026</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </footer>
        <div id="footer-bottom">
            <div class="container">
                <div class="row d-flex flex-wrap justify-content-between">
                    <div class="col-md-4 col-sm-6">
                        <div class="Shipping d-flex">
                            <p>Chúng tôi giao hàng với:</p>
                            <div class="card-wrap ps-2">
                                <img src="/public/assets/client/images/dhl.png" alt="visa">
                                <img src="/public/assets/client/images/shippingcard.png" alt="mastercard">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="payment-method d-flex">
                            <p>Các phương thức thanh toán:</p>
                            <div class="card-wrap ps-2">
                                <img src="/public/assets/client/images/visa.jpg" alt="visa">
                                <img src="/public/assets/client/images/mastercard.jpg" alt="mastercard">
                                <img src="/public/assets/client/images/paypal.jpg" alt="paypal">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="copyright">
                            <p>©Bản quyền 2023 MiniStore. Thiết kế bởi <a href="https://templatesjungle.com/">TemplatesJungle</a> Phân phối bởi <a href="https://themewagon.com">ThemeWagon</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?= APP_URL ?>/public/assets/client/js/jquery-1.11.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
        <script type="text/javascript" src="<?= APP_URL ?>/public/assets/client/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="<?= APP_URL ?>/public/assets/client/js/plugins.js"></script>
        <script type="text/javascript" src="<?= APP_URL ?>/public/assets/client/js/script.js"></script>
        <!-- </body>

        </html> -->


        <!-- <footer class="footer">Đây là footer client. Copyright &copy; Chihihi</footer> -->

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        </body>

        </html>


<?php

        // unset($_SESSION['success']);
        // unset($_SESSION['error']);
    }
}

?>