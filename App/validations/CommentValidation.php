<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class CommentValidation
{
    public static function createClient(): bool
    {
        $is_valid = true;

        // tên loại sản phẩm
        if (!isset($_POST['content']) || $_POST['content'] === '') {
            NotificationHelper::error('content', 'không để trống nội dung bình luận');
            $is_valid = false;
        }
        if (!isset($_POST['product_id']) || $_POST['product_id'] === '') {
            NotificationHelper::error('product_id', 'không để trống mã sản phẩm bình luận');
            $is_valid = false;
        }
        if (!isset($_POST['user_id']) || $_POST['user_id'] === '') {
            NotificationHelper::error('user_id', 'không để trống mã người dùng bình luận');
            $is_valid = false;
        }

        return $is_valid;
    }

    public static function editClient(): bool
    {
        $is_valid = true;

        // tên loại sản phẩm
        if (!isset($_POST['content']) || $_POST['content'] === '') {
            NotificationHelper::error('content', 'không để trống nội dung bình luận');
            $is_valid = false;
        }

        return $is_valid;
    }
    public static function edit(): bool
    {
        $is_valid = true;

        // trạng thái
        if (!isset($_POST['status']) || $_POST['status'] === '') {
            NotificationHelper::error('password', 'không để trống trạng thái');
            $is_valid = false;
        }


        return $is_valid;
    }
}
