<?php
namespace App\Controllers;
use App\Models\Invoice;
class InvoiceController extends BaseController
{
    function home()
    {
        //Paginattion
        $total_invoice_one_page = 5;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $offset = ($page-1) * $total_invoice_one_page;
        $getAllInvoice = Invoice::all();
        $total_rows = count($getAllInvoice);
        $total_page = ceil($total_rows/$total_invoice_one_page);
        $invoice = Invoice::skip($offset)->take($total_invoice_one_page)->get();
        return $this->render('invoices.index', [
            'invoices' => $invoice,
            'total_page' => $total_page,
            'page' => $page,
            'getAllInvoice'=>$getAllInvoice,
            'offset'=> $offset,
            'total_invoice_one_page'=> $total_invoice_one_page
        ]);
    }

    public function addForm()
    {
        $this->render('invoices.add-form');
    }

    public function saveAdd()
    {
        $data = $_POST;
        $model = new Invoice();
        $name = $data['customer_name'];
        $phone = $data['customer_phone_number'];
        $email = $data['customer_email'];
        $address = $data['customer_address'];
        $price = $data['total_price'];

        $nameerr = "";
        $phoneerr = "";
        $emailerr = "";
        $addresserr = "";
        $priceerr = "";

        //Validate
        if(strlen($name)<2 || strlen($name)>191){
            $nameerr = "Yêu cầu nhập lại tên khách hàng";
        }
        if(strlen($phone)==0){
            $phoneerr = "Yêu cầu nhập số điện thoại";
        }
        if($phoneerr=="" && !is_numeric($phone)){
            $phoneerr = "Yêu cầu nhập ký tự là số";
        }
        if($phoneerr=="" &&  strlen($phone)!=10){
            $phoneerr = "Số điện thoại bắt buộc 10 ký tự";
        }
        if(strlen($email)==0){
            $emailerr = "Yêu cầu nhập email khách hàng";
        }
        if($emailerr=="" && !filter_var($email,FILTER_VALIDATE_EMAIL)){
            $emailerr = "Yêu cầu nhập đúng định dạng email";
        }
        if(strlen($address)==0){
            $addresserr = "Yêu cầu nhập địa chỉ khách hàng";
        }
        if(strlen($price)==0){
            $priceerr = "Yêu cầu nhập tổng giá hóa đơn";
        }
        if($priceerr=="" && !is_numeric($price)){
            $priceerr = "Yêu cầu nhập giá phải là dạng số";
        }
        if($nameerr. $phoneerr. $emailerr. $addresserr. $priceerr !=""){
            header('location:'.getClientUrl('add-invoice',[
                'nameerr' => $nameerr,
                'phoneerr' => $phoneerr,
                'emailerr' => $emailerr,
                'addresserr' => $addresserr,
                'priceerr' => $priceerr
                ]));
            die;
        }

        $model->fill($data);
        $model->save();
        header('location: invoice');
    }

    public function editForm()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : -1;
        $model = Invoice::find($id);
        if ($model == null) {
            header('location: invoice');
        }
        $this->render('invoices.edit-form', ['model' => $model]);
    }

    public function saveEdit()
    {
        $id = isset($_POST['id']) ? $_POST['id'] : -1;
        $model = Invoice::find($id);
        $data = $_POST;
        $name = $data['customer_name'];
        $phone = $data['customer_phone_number'];
        $email = $data['customer_email'];
        $address = $data['customer_address'];
        $price = $data['total_price'];

        $nameerr = "";
        $phoneerr = "";
        $emailerr = "";
        $addresserr = "";
        $priceerr = "";

        //Validate
        if(strlen($name)<2 || strlen($name)>191){
            $nameerr = "Yêu cầu nhập lại tên khách hàng";
        }
        if(strlen($phone)==0){
            $phoneerr = "Yêu cầu nhập số điện thoại";
        }
        if($phoneerr=="" && !is_numeric($phone)){
            $phoneerr = "Yêu cầu nhập ký tự là số";
        }
        if($phoneerr=="" &&  strlen($phone)!=10){
            $phoneerr = "Số điện thoại bắt buộc 10 ký tự";
        }
        if(strlen($email)==0){
            $emailerr = "Yêu cầu nhập email khách hàng";
        }
        if($emailerr=="" && !filter_var($email,FILTER_VALIDATE_EMAIL)){
            $emailerr = "Yêu cầu nhập đúng định dạng email";
        }
        if(strlen($address)==0){
            $addresserr = "Yêu cầu nhập địa chỉ khách hàng";
        }
        if(strlen($price)==0){
            $priceerr = "Yêu cầu nhập tổng giá hóa đơn";
        }
        if($priceerr=="" && !is_numeric($price)){
            $priceerr = "Yêu cầu nhập giá phải là dạng số";
        }
        if($nameerr. $phoneerr. $emailerr. $addresserr. $priceerr !=""){
            header('location:'.getClientUrl('edit-invoice',[
                    'id' => $id,
                    'nameerr' => $nameerr,
                    'phoneerr' => $phoneerr,
                    'emailerr' => $emailerr,
                    'addresserr' => $addresserr,
                    'priceerr' => $priceerr
                ]));
            die;
        }

        $model->fill($data);
        $model->save();
        header('location: invoice');
    }

    public function remove()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : -1;
        $model = Invoice::find($id);
        $model->delete();
        header('location: invoice');
    }
}
