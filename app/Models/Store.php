<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Astrotomic\Translatable\Translatable;
class Store extends Model {
    use HasFactory, Translatable, SoftDeletes;
    protected $table = 'stores';
    protected $fillable = ['name', 'description', 'status', 'slug'];
    protected $translatedAttributes = ['name', 'slug', 'description'];
    protected $with = ['translations'];
    public $timestamps = true;
}
