<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Product extends Model{
    protected $table = 'products';
    protected $fillable = [
        'name','cate_id', 'price','short_desc','detail','star','views'
    ];
    public function getName(){
        return $this->hasOne(Category::class,'id','cate_id');
    }
}
?>      