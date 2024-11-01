<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Models\User;
use App\Validations\Authvalidation;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Auth\ChangePassword;
use App\Views\Client\Pages\Auth\Edit;
use App\Views\Client\Pages\Auth\ForgotPassword;
use App\Views\Client\Pages\Auth\Login;
use App\Views\Client\Pages\Auth\Register;
use App\Views\Client\Pages\Auth\ResetPassword;

class AuthController
{
    //Hiển thị form Register
    public static function Register()
    {
        //Hien thị header
        Header::render();

        //Hiển thị form đăng ký
        Register::render();

        //Hiển thị thông báo
        Notification::render();

        //Hủy session thông báo
        NotificationHelper::unset();

        //Hiển thị footer
        Footer::render();
    }


    //thuực hiện đăng ký
    public static function registerAction()
    {
        // bắt lỗi validation
        // kiểm tra có thỏa điều kiện ko?
        // nếu có: chạy lệnh ở dưới
        // nếu không có(sai): thông báo và chuyển hướng về trang đăng ký

        $is_valid = Authvalidation::register();

        if (!$is_valid) {
            NotificationHelper::error('register_valid', 'Đăng ký thất bại');
            header('location: /register');
            exit();
        }


        // lấy dữ liệu người dùng nhập vào
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $email = $_POST['email'];
        $name = $_POST['name'];

        //đưa dữ liệu vào mảng, "key" phải trùng với cơ sở dữ liệu
        $data = [
            'username' => $username,
            'password' => $hash_password,
            'email' => $email,
            'name' => $name
        ];

        $result = AuthHelper::register($data);

        if ($result) {
            // var_dump('OK');
            header('location: /login');
        } else {
            // var_dump('loi roi');
            header('location: /register');
        }
    }



    public static function Login()
    {
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Login::render();
        Footer::render();
    }

    public static function loginAction()
{
    // Bắt lỗi 
    $is_valid = Authvalidation::login();

    if (!$is_valid) {
        NotificationHelper::error('login', 'Đăng nhập thất bại');
        header('location: /login');
        exit;
    }

    $data = [
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'remember' => isset($_POST['remember'])
    ];

    $result = AuthHelper::login($data);

    if ($result) {
        // Lưu thông tin username và email vào session
        $_SESSION['user']['username'] = $_POST['username'];
        $_SESSION['user']['email'] =$_POST['username']; // Giả định có hàm lấy email

        // NotificationHelper::success('login', 'Đăng nhập thành công');
        header('location: /');
    } else {
        // NotificationHelper::error('login', 'Đăng nhập thất bại');
        header('location: /login');
    }
}


    public static function logout()
    {
        AuthHelper::logout();
        NotificationHelper::success('logout', 'Đăng xuất thành công');
        header('location: /');
    }

    public static function edit($id)
    {
        $result = AuthHelper::edit($id);

        if (!$result) {
            if (isset($_SESSION['error']['login'])) {
                header('location: /login');
                exit;
            }
            if (isset($_SESSION['error']['user_id'])) {

                $data = $_SESSION['user'];
                $user_id = $data['id'];
                header("location: /users/edit/$user_id");
                exit;
            }
        }

        $data = $_SESSION['user'];
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        //giao diện thông tin user
        Edit::render($data);
        // var_dump($data);

        Footer::render();
    }



    public static function update($id)
    {
        $is_valid = Authvalidation::edit();

        if (!$is_valid) {
            NotificationHelper::error('update_user', 'Cập nhật thông tin tài khoản thất bại');
            header("location: /users/$id");
            exit;
        }

        $data = [
            'email' => $_POST['email'],
            'name' => $_POST['name'],
        ];

        //kiểm tra có uploads hình ảnh không. nếu có kiểm tra xem có hợp lệ không
        $is_upload = Authvalidation::uploadAvatar();
        if ($is_upload) {
            $data['avatar'] = $is_upload;
        }


        //gọi helper để update
        $result = AuthHelper::update($id, $data);
        //kiểm tra kết quả trả về và chuyển hướng
        header("location: /users/$id");
    }






    //hiển thị giao diện form lấy lại mật khẩu
    public static function forgotPassword()
    {
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        ForgotPassword::render();
        Footer::render();
    }


    // thực hiện lấy lại mật khẩu
    public static function forgotPasswordAction()
    {
        //validation
        $is_valid = Authvalidation::forgotPassword();

        if (!$is_valid) {
            NotificationHelper::error('forgot_password', 'Lấy lại mật khẩu thất bại');
            header('location: /forgot-password');
            exit;
        }

        $username = $_POST['username'];
        $email = $_POST['email'];

        $data = [
            'username' => $username
        ];

        //authHelper
        $result = AuthHelper::forgotPassword($data);

        if (!$result) {
            NotificationHelper::error('username_exist', 'Không tồn tại tài khoản này');
            header('location: /forgot-password');
            exit;
        }

        if ($result['email'] != $email) {
            NotificationHelper::error('email_exist', 'Email không đúng');
            header('location: /forgot-password');
            exit;
        }


        $_SESSION['reset_password'] = [
            'username' => $username,
            'email' => $email
        ];

        header('location: /reset-password');

        // echo 'Thanh cong';
    }


    //hiển thị giao diện form đặt lại mật khẩu
    public static function resetPassword()
    {
        if(!isset($_SESSION['reset_password'] )){
            NotificationHelper::error('reset_password', 'Vui lòng nhập đầy đủ thông tin của form này');
            header('location: /forgot-password');
            exit;
        }
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        ResetPassword::render();
        Footer::render();
    }

    public static function resetPasswordAction()
    {
        //validation
        $is_valid=Authvalidation::resetPassword();

        if(!$is_valid){
            NotificationHelper::error('reset_password', 'Đặt lại mật khẩu thất bại');
            header('location: /reset-password');
            exit;
        }

        $password=$_POST['password'];
        $hash_password=password_hash($password, PASSWORD_DEFAULT);

        $data=[
            'username'=>$_SESSION['reset_password']['username'],
            'email'=>$_SESSION['reset_password']['email'],
            'password'=>$hash_password
        ];

         $result=AuthHelper::resetPassword($data);

         if($result){
            NotificationHelper::success('reset_password', 'Đặt lại mật khẩu thành công');
            unset($_SESSION['reset_password']);
            header('location: /login');
         }else{
            NotificationHelper::error('reset_password', 'Đặt lại mật khẩu thất bại');
            header('location: /reset-password');
         }

    }


    public static function changePassword()
    {
        
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        ChangePassword::render();
        Footer::render();
    }

    public static function changePasswordAction()
    {
        // Xác thực
        $is_valid = Authvalidation::changePassword();
    
        if (!$is_valid) {
            NotificationHelper::error('change_password', 'Đặt lại mật khẩu thất bại');
            header('location: /change-password');
            exit;
        }
    
        // Lấy username và email từ session
        $username = $_SESSION['user']['username'];
        $email = $_SESSION['user']['email'];
    
        // Băm mật khẩu mới
        $password = $_POST['password'];
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
    
        $data = [
            'username' => $username,
            'email' => $email,
            'password' => $hash_password
        ];
    
        $result = AuthHelper::changePassword($data);
    
        if ($result) {
            NotificationHelper::success('change_password', 'Đặt lại mật khẩu thành công');
            unset($_SESSION['change_password']);
            header('location: /login');
        } else {
            NotificationHelper::error('change_password', 'Đặt lại mật khẩu thất bại');
            header('location: /change-password');
        }
    }
    

}
