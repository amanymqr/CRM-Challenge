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

//scops
public function scopeSearchByName($query, $search)
{
    return $query->where('name', 'like', '%' . $search . '%');
}

public function scopeCurrentUser($query)
{
    return $query->where('user_id', auth()->id());
}

public function scopeLatestFirst($query)
{
    return $query->orderBy('id', 'DESC');
}

}
