<?php

namespace App\Models;

use App\Enums\BadPointStatusEnum;
use App\Enums\RoadTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BadPoint extends Model
{
    use HasFactory;

    protected $guarded = false;
    protected $casts = [
        'status' => BadPointStatusEnum::class,
        'type' => RoadTypeEnum::class
    ];
}
