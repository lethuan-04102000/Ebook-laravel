<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'coupon_name' ,'coupon_code','coupon_time','coupon_number','couponcon'
    ];
    protected $primaryKey ='coupon_id';
    protected $table = 'tbl_coupon';

}
