<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";

    protected $fillable = [
        'num','issue_date','origin_company_id','target_company_id','deleted'
    ];
}
