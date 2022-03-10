<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branch extends Model
{
    use HasFactory;
    protected $table = 'branches';
    protected $fillable = [
        'vendorId',
        'branchName',
        'phone',
        'lon',
        'lat',
        'address',
    ];
}
