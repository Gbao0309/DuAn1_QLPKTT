<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;


class Login extends BaseView
{
    public static function render($data = null)
    {
?>
        <!-- code HTML hien thi giao dien -->
        <!-- <section id="company-services" class="padding-large">
            </section> -->


        <div class="container mt-5">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <div class="card card-body">
                        <h4 class="text-center text-danger">Đăng nhập</h4>
                        <form action="/login" method="post">
                            <input type="hidden" name="method" id="" value="POST">
                            <div class="form-group">
                                <label for="username">Tên đăng nhập*</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập" value="">
                            </div>
                            <div class="form-group">
                                <label for="password">Mật khẩu* </label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Nhập Mật khẩu" value="">
                            </div>
                            <div class="form-check">
                                <label class="form-check-lable">
                                    <input type="checkbox" class="form-check-input" name="" id="" checked>
                                    Ghi nhớ đăng nhập
                                </label>
                            </div>
                            <button type="reset" class="btn btn-outline-danger">Nhập lại</button>
                            <button type="submit" class="btn btn-outline-info">Đăng nhập</button>
                            <br>
                            <a href="/forgot-password" class="text-danger">Quên mật khẩu?</a><br>
                            <h7>Chưa có tài khoản? <a href="/register" class="text-danger">Đăng ký</a></h7>
                        </form>
                    </div>
                </div>
            </div>
        </div>


<?php
    }
}
