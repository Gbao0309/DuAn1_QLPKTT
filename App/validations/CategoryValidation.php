<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class CategoryValidation
{
    public static function create(): bool
    {
        $is_valid = true;

        // tên loại sản phẩm
        if (!isset($_POST['name']) || $_POST['name'] === '') {
           NotificationHelper::error('username', 'không để trống loại sản phẩm');
            $is_valid = false;
        }

        // trạng thái
        if (!isset($_POST['status']) || $_POST['status'] === '') {
            NotificationHelper::error('password', 'không để trống trạng thái');
            $is_valid = false;
        }


        return $is_valid;
    }
    public static function edit(): bool
    {
        $is_valid = true;

        // tên loại sản phẩm
        if (!isset($_POST['name']) || $_POST['name'] === '') {
           NotificationHelper::error('username', 'không để trống loại sản phẩm');
            $is_valid = false;
        }

        // trạng thái
        if (!isset($_POST['status']) || $_POST['status'] === '') {
            NotificationHelper::error('password', 'không để trống trạng thái');
            $is_valid = false;
        }


        return $is_valid;
    }
}
