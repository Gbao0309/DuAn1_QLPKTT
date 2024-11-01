<?php

namespace App\Controllers\Client;

use App\Controllers\Admin\CategoryController;
use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Helpers\ViewProductHelper;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Views\Client\Components\Category as ComponentsCategory;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Product\Category as ProductCategory;
use App\Views\Client\Pages\Product\Detail;
use App\Views\Client\Pages\Product\Index;

class ProductController
{
    // hiển thị danh sách
    public static function index()
    {
        // giả sử data là mảng dữ liệu lấy được từ database
        // $categories = [
        //     [
        //         'id' => 1,
        //         'name' => 'Category 1',
        //         'status' => 1
        //     ],
        //     [
        //         'id' => 2,
        //         'name' => 'Category 2',
        //         'status' => 1
        //     ],
        //     [
        //         'id' => 3,
        //         'name' => 'Category 3',
        //         'status' => 0
        //     ],

        // ];

        $category = new Category();
        $categories = $category->getAllCategoryByStatus();


        $product = new Product();
        $products = $product->getAllProductByStatus();
        // $products = [
        //     [
        //         'id' => 1,
        //         'name' => 'Product 1',
        //         'description' => 'Description Product 1',
        //         'price' => 100000,
        //         'discount_price' => 10000,
        //         'image' => 'product.jpg',
        //         'status' => 1
        //     ],
        //     [
        //         'id' => 2,
        //         'name' => 'Product 2',
        //         'description' => 'Description Product 2',
        //         'price' => 200000,
        //         'discount_price' => 20000,
        //         'image' => 'product.jpg',
        //         'status' => 1
        //     ],
        //     [
        //         'id' => 3,
        //         'name' => 'Product 3',
        //         'description' => 'Description Product 3',
        //         'price' => 300000,
        //         'discount_price' => 30000,
        //         'image' => 'product.jpg',
        //         'status' => 1
        //     ],

        // ];
        $data = [
            'products' => $products,
            'categories' => $categories
        ];
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Index::render($data);
        Footer::render();
    }
    public static function detail($id)
    {
        // $product_detail = [
        //     'id' => $id,
        //     'name' => 'Product 1',
        //     'description' => 'Description Product 1',
        //     'price' => 100000,
        //     'discount_price' => 10000,
        //     'image' => 'product.jpg',
        //     'status' => 1
        // ];

        $product = new Product();
        $product_detail = $product->getOneProductByStatus($id);

        if(!$product_detail){
            NotificationHelper::error('product_detail', 'Không thể xem sản phẩm này');
            header('location: /products');
            exit;
        }


        $comment = new Comment();
        $comments = $comment->get5CommentNewsByProductAndStatus($id);



        $data = [
            'product' => $product_detail,
            'comments' => $comments
        ];

        $view_result=ViewProductHelper::cookView($id, $product_detail['view']);
        // var_dump($view_result);

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Detail::render($data);
        Footer::render();
    }
    public static function getProductByCategory($id)
    {
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();

        $product = new Product();
        $products = $product->getAllProductByCategoryAndStatus($id);

        $data = [
            'products' => $products,
            'categories' => $categories
        ];


        Header::render();
        ProductCategory::render($data);
        Footer::render();
    }
}
