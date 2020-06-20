<?php
namespace App\Controllers;
use App\Models\Category;
class CategoryController extends BaseController{
    function home()
    {
        //Paginattion
        $total_category_one_page = 5;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $offset = ($page-1) * $total_category_one_page;
        $getAllCategory = Category::all();
        $total_rows = count($getAllCategory);
        $total_page = ceil($total_rows/$total_category_one_page);
        $category = Category::skip($offset)->take($total_category_one_page)->get();
        return $this->render('categories.index', [
            'categories' => $category,
            'total_page' => $total_page,
            'page' => $page,
            'getAllCategory'=>$getAllCategory,
            'offset'=> $offset,
            'total_category_one_page'=> $total_category_one_page
        ]);
    }
    public function addForm(){
        $this->render('categories.add-form');
    }
    public function saveAdd(){
        $data = $_POST;
        $model = new Category();
        $name = $data['cate_name'];
        $desc = $data['desc'];

        $nameerr = "";
        $descerr = "";

        //Validation
        if(strlen($name)<2 || strlen($name)>191){
            $nameerr = "Yêu cầu nhập lại tên";
        }
        $getByName = Category::where('cate_name','like',$name)->get();
        if($nameerr==""&& count($getByName)>0){
            $nameerr = "Tên đã tồn tại, yêu cầu nhập tên khác";
        }
        if(strlen($desc)==0){
            $descerr = "Yêu cầu nhập mô tả";
        }
        if($nameerr .$descerr !=""){
            header('location:'.getClientUrl('add-category',[
                'nameerr' => $nameerr,
                'descerr' => $descerr
                ]));
            die;
        }

        $model->fill($data);
        $model->save();
        header('location: category');
    }
    public function editForm(){
        $id = isset($_GET['id'])?$_GET['id']:-1;
        $model = Category::find($id);
        if($model==null){
            header('location: category');
        }
        $this->render('categories.edit-form',['model'=>$model]);
    }
    public function saveEdit(){
        $id = isset($_POST['id'])?$_POST['id']:-1;
        $model = Category::find($id);
        $data = $_POST;
        $name = $data['cate_name'];
        $desc = $data['desc'];

        $nameerr = "";
        $descerr = "";

        //Validation
        if(strlen($name)<2 || strlen($name)>191){
            $nameerr = "Yêu cầu nhập lại tên";
        }
        $getByName = Category::where('cate_name','like',$name)->where('id','!=',$id)->get();
        if($nameerr==""&& count($getByName)>0){
            $nameerr = "Tên đã tồn tại, yêu cầu nhập tên khác";
        }
        if(strlen($desc)==0){
            $descerr = "Yêu cầu nhập mô tả";
        }
        if($nameerr .$descerr !=""){
            header('location:'.getClientUrl('add-category',[
                    'id' => $id,
                    'nameerr' => $nameerr,
                    'descerr' => $descerr
                ]));
            die;
        }
        $model->fill($data);
        $model->save();
        header('location: category');
    }
    public function remove(){
        $id = isset($_GET['id'])?$_GET['id']:-1;
        $model = Category::find($id);
        $model->delete();
        header('location: category');
    }
}
