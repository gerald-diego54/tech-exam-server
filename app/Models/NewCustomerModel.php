<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewCustomerModel extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'new_customer';

    protected $fillable = [
        'users_id',
        'firstname',
        'lastname',
        'email',
        'address'
    ];
}
