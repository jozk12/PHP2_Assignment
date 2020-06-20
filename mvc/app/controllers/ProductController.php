<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Category;

class ProductController extends BaseController
{
    function home()
    {
        //Paginattion
        $total_product_one_page = 7;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $offset = ($page-1) * $total_product_one_page;
        $getAllProduct = Product::all();
        $total_rows = count($getAllProduct);
        $total_page = ceil($total_rows/$total_product_one_page);
        $product = Product::skip($offset)->take($total_product_one_page)->get();
        return $this->render('products.index', [
            'products' => $product,
            'total_page' => $total_page,
            'page' => $page,
            'getAllProduct'=>$getAllProduct,
            'offset'=> $offset,
            'total_product_one_page'=> $total_product_one_page
        ]);
    }

    public function addForm()
    {
        $cates = Category::all();
        $this->render('products.add-form', [
            'cates' => $cates
        ]);
    }

    public function saveAdd()
    {
        $data = $_POST;
        $model = new Product();
        $name = $data['name'];
        $price = $data['price'];
        $short_desc = $data['short_desc'];
        $detail = $data['detail'];
        $star = $data['star'];
        $views = $data['views'];
        $file = $_FILES['image'];
        $model->image = uploadImage($file, "public/uploads/products");

        $nameerr = "";
        $priceerr = "";
        $short_descerr = "";
        $detailerr = "";
        $starerr = "";
        $viewerr = "";
        $fileerr = "";

        //Validation
        if ($file['size'] == 0 || $file['size'] > 2097152) {
            $fileerr = "Yêu cầu thêm ảnh (Nhỏ hơn 2MB)";
        }
        if ($fileerr == "" && $file['type'] != "image/jpeg"
                            && $file['type'] != "image/png") {
            $fileerr = "Yêu cầu nhập ảnh đúng định dạng (jpg-jpeg-png)";
        }

        if (strlen($name) < 2 || strlen($name) > 191) {
            $nameerr = "Yêu cầu nhập lại tên";
        }
        $getByName = Product::where('name', 'like', $name)->get();
        if ($nameerr == "" && count($getByName) > 0) {
            $nameerr = "Tên đã tồn tại, vui lòng nhập tên khác";
        }
        if (strlen($price) == 0) {
            $priceerr = "Yêu cầu nhập giá";
        }
        if ($priceerr == "" && !is_numeric($price)) {
            $priceerr = "Yêu cầu nhập giá phải là số";
        }
        if (strlen($short_desc) == 0) {
            $short_descerr = "Yêu cầu nhập mô tả ngắn";
        }
        if (strlen($detail) == 0) {
            $detailerr = "Yêu cầu nhập mô tả chi tiết";
        }
        if (strlen($star) == 0) {
            $starerr = "Yêu cầu nhập đánh giá";
        }
        if ($starerr == "" && !is_numeric($star)) {
            $starerr = "Yêu cầu nhập đánh giá phải là số";
        }
        if (strlen($views) == 0) {
            $viewerr = "Yêu cầu nhập lượt xem";
        }
        if ($viewerr == "" && !is_numeric($views)) {
            $viewerr = "Yêu cầu nhập lượt xem phải phải là số";
        }
        if ($nameerr . $fileerr . $priceerr . $short_descerr . $detailerr . $viewerr != "") {
            header('location:' . getClientUrl('add-product', [
                    'nameerr' => $nameerr,
                    'fileerr' => $fileerr,
                    'priceerr' => $priceerr,
                    'short_descerr' => $short_descerr,
                    'detailerr' => $detailerr,
                    'starerr' => $starerr,
                    'viewerr' => $viewerr
                ]));
            die;
        }

        $model->fill($data);
        $model->save();
        header('location: product');
    }

    public function editForm()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : -1;
        $cates = Category::all();
        $model = Product::find($id);
        if ($model == null) {
            header('location: product');
        }
        $this->render('products.edit-form', ['cates' => $cates, 'model' => $model]);
    }

    public function saveEdit()
    {
        $id = isset($_POST['id']) ? $_POST['id'] : -1;
        $model = Product::find($id);
        $file = $_FILES['image'];
        $newImage = uploadImage($file, "public/uploads/products");
        $data = $_POST;
        $name = $data['name'];
        $price = $data['price'];
        $short_desc = $data['short_desc'];
        $detail = $data['detail'];
        $star = $data['star'];
        $views = $data['views'];

        $nameerr = "";
        $priceerr = "";
        $short_descerr = "";
        $detailerr = "";
        $starerr = "";
        $viewerr = "";
        $fileerr = "";

        //Validation
        if (strlen($name) < 2 || strlen($name) > 191) {
            $nameerr = "Yêu cầu nhập tên";
        }
        $getByName = Product::where('name', 'like', $name)->where('id', '!=', $id)->get();
        if ($nameerr == "" && count($getByName) > 0) {
            $nameerr = "Tên đã tồn tại, vui lòng nhập tên khác";
        }
        if ($newImage != null) {
            $model->image = $newImage;
            if ($file['size'] > 2097152) {
                $fileerr = "Yêu cầu nhập ảnh nhỏ hơn 2MB";
            }
            if($file['type']!="image/jpeg"
                && $file['type']!="image/png"){
                $fileerr = "Yêu cầu nhập ảnh đúng định dạng (jpg-jpeg-png)";
            }
        }
        if (strlen($price) == 0) {
            $priceerr = "Yêu cầu nhập lại giá";
        }
        if ($priceerr == "" && !is_numeric($price)) {
            $priceerr = "Yêu cầu nhập giá phải là số";
        }
        if (strlen($short_desc) == 0) {
            $short_descerr = "Yêu cầu nhập mô tả ngắn";
        }
        if (strlen($detail) == 0) {
            $detailerr = "Yêu cầu nhập mô tả chi tiết";
        }
        if (strlen($star) == 0) {
            $starerr = "Yêu cầu nhập đánh giá";
        }
        if ($starerr == "" && !is_numeric($star)) {
            $starerr = "Yêu cầu nhập đánh giá phải là số";
        }
        if (strlen($views) == 0) {
            $viewerr = "Yêu cầu nhập lượt xem";
        }
        if ($viewerr == "" && !is_numeric($views)) {
            $viewerr = "Yêu cầu nhập lượt xem phải phải là số";
        }
        if ($nameerr. $fileerr. $priceerr. $short_descerr. $detailerr. $viewerr != "") {
            header('location:' . getClientUrl('edit-product', [
                    'id' => $id,
                    'nameerr' => $nameerr,
                    'fileerr' => $fileerr,
                    'priceerr' => $priceerr,
                    'short_descerr' => $short_descerr,
                    'detailerr' => $detailerr,
                    'starerr' => $starerr,
                    'viewerr' => $viewerr
                ]));
            die;
        }
        $model->fill($data);
        $model->save();
        header('location: product');
    }

    public function remove()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : -1;
        $model = Product::find($id);
        if($model==null){
            header('location:'.BASE_URL);
        }
        $model->delete();
        header('location: product');
    }
}
