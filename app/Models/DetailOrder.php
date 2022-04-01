<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function chef(){
        return $this->belongsTo(Employee::class, 'chef_id', 'id');
    }

    public function waiter(){
        return $this->belongsTo(Employee::class, 'waiter_id', 'id');
    }

    public function menu(){
        return $this->belongsTo(Menu::class);
    }

    public function table(){
        return $this->belongsTo(User::class, 'table_id', 'id');
    }



}
