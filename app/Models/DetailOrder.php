<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function chef(){
        return $this->belongsTo(User::class, 'chef_id', 'id');
    }

    public function menu(){
        return $this->belongsTo(Menu::class);
    }

}
