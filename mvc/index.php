<?php
    $url = isset($_GET['url'])?$_GET['url']:'/';
    require_once './commons/util.php';
    require_once './vendor/autoload.php';
    require_once './commons/database-config.php';

    use App\Controllers\DashboardController;
    use App\Controllers\ProductController;
    use App\Controllers\CategoryController;
    use App\Controllers\UserController;
    use App\Controllers\InvoiceController;
    use App\Controllers\GalleryController;

    switch ($url){
        case '/':
            $ctr = new DashboardController();
            $ctr->home();
            break;

            //Product Section
        case 'product':
            $ctr = new ProductController();
            $ctr->home();
            break;
        case 'add-product':
            $ctr = new ProductController();
            $ctr->addForm();
            break;
        case 'save-add-product':
            $ctr = new ProductController();
            $ctr->saveAdd();
            break;
        case 'edit-product':
            $ctr = new ProductController();
            $ctr->editForm();
            break;
        case 'save-edit-product':
            $ctr = new ProductController();
            $ctr->saveEdit();
            break;
        case 'remove-product':
            $ctr = new ProductController();
            $ctr->remove();
            break;

            //Category Section
        case 'category':
            $ctr = new CategoryController();
            $ctr->home();
            break;
        case 'add-category':
            $ctr = new CategoryController();
            $ctr->addForm();
            break;
        case 'save-add-category':
            $ctr = new CategoryController();
            $ctr->saveAdd();
            break;
        case 'edit-category':
            $ctr = new CategoryController();
            $ctr->editForm();
            break;
        case 'save-edit-category':
            $ctr = new CategoryController();
            $ctr->saveEdit();
            break;
        case 'remove-category':
            $ctr = new CategoryController();
            $ctr->remove();
            break;

            //User Section
        case 'user':
            $ctr = new UserController();
            $ctr->home();
            break;
        case 'add-user':
            $ctr = new UserController();
            $ctr->addForm();
            break;
        case 'save-add-user':
            $ctr = new UserController();
            $ctr->saveAdd();
            break;
        case 'edit-user':
            $ctr = new UserController();
            $ctr->editForm();
            break;
        case 'save-edit-user':
            $ctr = new UserController();
            $ctr->saveEdit();
            break;
        case 'remove-user':
            $ctr = new UserController();
            $ctr->remove();
            break;

            //Invoice Section
        case 'invoice':
            $ctr = new InvoiceController();
            $ctr->home();
            break;
        case 'add-invoice':
            $ctr = new InvoiceController();
            $ctr->addForm();
            break;
        case 'save-add-invoice':
            $ctr = new InvoiceController();
            $ctr->saveAdd();
            break;
        case 'edit-invoice':
            $ctr = new InvoiceController();
            $ctr->editForm();
            break;
        case 'save-edit-invoice':
            $ctr = new InvoiceController();
            $ctr->saveEdit();
            break;
        case 'remove-invoice':
            $ctr = new InvoiceController();
            $ctr->remove();
            break;

        default :
            echo "Đường dẫn không tồn tại";
            break;
    }
?>