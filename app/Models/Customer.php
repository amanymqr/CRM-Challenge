<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;
protected $fillable=[
'name',
'address',
'phone',
'email',
'user_id'
];
    public function user()
    {
        return $this->belongsTo(User::class); //one customer belongs to one user. One
    }

    // $customer = Customer::paginate(15);


}
