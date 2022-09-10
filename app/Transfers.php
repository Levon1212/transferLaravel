<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfers extends Model
{
    protected $fillable = ['id','date','service','description','guest_count',
                           'guest_name','car_category','guide','carseat','order-amount','status','company_id'];
//    public function company()
//    {
//        return $this->hasOne(Company::class, 'id', 'company_id');
//    }
}
