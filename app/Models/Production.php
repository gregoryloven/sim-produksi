<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    use HasFactory;
    protected $table = 'productions';
    protected $primaryKey = 'id';

    public function product()
    {
    	return $this->belongsTo(Product::class, 'category_id');
    }

    public function material()
    {
    	return $this->belongsTo(Material::class, 'material_id');
    }
}
