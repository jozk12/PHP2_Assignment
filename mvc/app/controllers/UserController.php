<?php

namespace App\Controllers;

use App\Models\User;

class UserController extends BaseController
{
    function home()
    {
        //Paginattion
        $total_user_one_page = 5;
        $page = isset($_GET['page'])?$_GET['page']:1;
        $offset = ($page-1) * $total_user_one_page;
        $getAllUser = User::all();
        $total_rows = count($getAllUser);
        $total_page = ceil($total_rows/$total_user_one_page);
        $user = User::skip($offset)->take($total_user_one_page)->get();
        return $this->render('users.index', [
            'users' => $user,
            'total_page' => $total_page,
            'page' => $page,
            'getAllUser'=>$getAllUser,
            'offset'=>$offset,
            'total_user_one_page'=>$total_user_one_page
        ]);
    }

    public function addForm()
    {
        $this->render('users.add-form');
    }

    public function saveAdd()
    {
        $data = $_POST;
        $model = new User();
        $file = $_FILES['avatar'];
        $model->avatar = uploadImage($file, "public/uploads/users");
        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];
        $cfpassword = $data['cfpassword'];

        $nameerr = "";
        $fileerr = "";
        $emailerr = "";
        $passworderr = "";
        $cfpassworderr = "";

        //Validation
        if (strlen($name) < 2 || strlen($name) > 191) {
            $nameerr = "Yêu cầu nhập lại tên";
        }
        $getByName = User::where('name', 'like', $name)->get();
        if ($nameerr == "" && count($getByName) > 0) {
            $nameerr = "Tên đã tồn tại, vui lòng nhập tên khác";
        }
        if ($file['size'] == 0 || $file['size'] > 2097152) {
            $fileerr = "Yêu cầu thêm ảnh (Nhỏ hơn 2MB)";
        }
        if ($fileerr == "" && $file['type'] != "image/jpeg"
            && $file['type'] != "image/png") {
            $fileerr = "Yêu cầu nhập ảnh đúng định dạng (jpg-jpeg-png)";
        }
        if (strlen($email) == 0) {
            $emailerr = "Yêu cầu nhập email";
        }
        if ($emailerr == "" && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailerr = "Yêu cầu nhập đúng định dạng email";
        }
        $getByEmail = User::where('email', 'like', $email)->get();
        if ($emailerr == "" && count($getByEmail) > 0) {
            $emailerr = "Email đã tồn tại, vui lòng nhập email khác";
        }
        if (strlen($password) < 6) {
            $passworderr = "Yêu cầu nhập mật khẩu lớn hơn 6 ký tự";
        }
        if ($passworderr == "" && $cfpassword != $password) {
            $cfpassworderr = "Mật khẩu nhập lại không khớp";
        }
        if ($nameerr . $fileerr . $emailerr . $passworderr . $cfpassworderr != "") {
            header('location:' . getClientUrl('add-user', [
                    'nameerr' => $nameerr,
                    'fileerr' => $fileerr,
                    'emailerr' => $emailerr,
                    'passworderr' => $passworderr,
                    'cfpassworderr' => $cfpassworderr
                ]));
            die;
        }

        $data['password'] = password_hash($password, PASSWORD_DEFAULT);

        $model->fill($data);
        $model->save();
        header('location: user');
    }

    public function editForm()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : -1;
        $model = User::find($id);
        if ($model == null) {
            header('location: user');
        }
        $this->render('users.edit-form', ['model' => $model]);
    }

    public function saveEdit()
    {
        $id = isset($_POST['id']) ? $_POST['id'] : -1;
        $model = User::find($id);
        $file = $_FILES['avatar'];
        $newImage = uploadImage($file, "public/uploads/users");
        $data = $_POST;
        $name = $data['name'];
        $email = $data['email'];

        $nameerr = "";
        $fileerr = "";
        $emailerr = "";

        //Validation
        if (strlen($name) < 2 || strlen($name) > 191) {
            $nameerr = "Yêu cầu nhập lại tên";
        }
        $getByName = User::where('name', 'like', $name)->where('id', '!=', $id)->get();
        if ($nameerr == "" && count($getByName) > 0) {
            $nameerr = "Tên đã tồn tại, vui lòng nhập tên khác";
        }
        if ($newImage != null) {
            $model->avatar = $newImage;
            if ($file['size'] > 2097152) {
                $fileerr = "Yêu cầu nhập ảnh nhỏ hơn 2MB";
            }
            if ($fileerr == "" && $file['type'] != "image/jpeg"
                                && $file['type'] != "image/png") {
                $fileerr = "Yêu cầu nhập ảnh đúng định dạng (jpg-jpeg-png)";
            }
        }
        if (strlen($email) == 0) {
            $emailerr = "Yêu cầu nhập email";
        }
        if ($emailerr == "" && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailerr = "Yêu cầu nhập đúng định dạng email";
        }
        $getByEmail = User::where('email', 'like', $email)->where('id', '!=', $id)->get();
        if ($emailerr == "" && count($getByEmail) > 0) {
            $emailerr = "Email đã tồn tại, vui lòng nhập email khác";
        }
        if ($nameerr . $emailerr . $fileerr != "") {
            header('location:' . getClientUrl('edit-user', [
                    'id' => $id,
                    'nameerr' => $nameerr,
                    'fileerr' => $fileerr,
                    'emailerr' => $emailerr
                ]));
            die;
        }

        $model->fill($data);
        $model->save();
        header('location: user');
    }

    public function remove()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : -1;
        $model = User::find($id);
        if($model==null){
            header('location:'.BASE_URL);
        }
        $model->delete();
        header('location: user');
    }
}
