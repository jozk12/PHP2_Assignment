<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Invoice extends Model{
    protected $table = 'invoices';
    protected $fillable = [
        'customer_name','customer_phone_number','customer_email','customer_address','total_price'
    ];
}
?>