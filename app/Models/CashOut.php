<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashOut extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasOne(User::class, 'id','user_id');

    }

    public function profile()
    {
        return $this->hasOne(profile::class, 'id','user_id');

    }

    public function coupon_plan()
    {
        return $this->hasOne(coupon::class, 'id','user_id');

    }
}
