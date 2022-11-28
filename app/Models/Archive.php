<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'archive_number', 'inventory_id'];

    public function inventory(){
        return $this->belongsTo('App\Models\Inventory');
    }
}
