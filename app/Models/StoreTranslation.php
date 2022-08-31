<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class StoreTranslation extends Model {
    use HasFactory;
    protected $table = 'store_translations';
    protected $fillable = ['name', 'slug', 'description'];
    public $timestamps = false;
}
