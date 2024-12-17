<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vattu extends Model
{
    protected $table = 'lvs_vattu'; // Table name
    protected $primaryKey = 'lvs_Mavtu'; // Primary key column
    public $incrementing = false; // Disable auto-increment
    public $timestamps = false; // Disable timestamps (created_at, updated_at)

    protected $fillable = [
        'lvs_Mavtu',
        'lvs_TenVtu',
        'lvs_Dvtinh',
        'lvs_Phantram'
    ];
}
