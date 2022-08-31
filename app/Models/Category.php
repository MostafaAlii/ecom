<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
class Category extends Model {
    use HasFactory, Translatable;
    protected $table = 'categories';
    protected $fillable = ['name', 'slug', 'status', 'description', 'parent_id'];
    protected $translatedAttributes = ['name', 'description', 'slug'];
    protected $with = ['translations'];
    public $timestamps = true;

    public function scopeParent($query){
        return $query -> whereNull('parent_id');
    }
    public function scopeActive($query){
        return $query->whereStatus('active');
    }
    public function scopeChild($query){
        return $query -> whereNotNull('parent_id');
    }

    public function _parent(){
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function getParentCategory() {
        if($this->parent_id == null) 
            return '<span class="text-success text-bold">' .trans('dashboard/category.this_is_parent_category'). '</span>';
         else 
            return $this->_parent->name;
    }
    
    public function statusWithLabel() {
        switch ($this->status) {
            case 'active': $result = '<label class="badge badge-success">'. trans('dashboard/general.active') .'</label>'; break;
            case 'notactive': $result = '<label class="badge badge-danger">'. trans('dashboard/general.notactive') .'</label>'; break;
            case 'pending': $result = '<label class="badge badge-warning">'. trans('dashboard/general.pending') .'</label>'; break;
        }
        return $result;    
    }
}
