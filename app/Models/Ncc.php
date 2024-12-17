<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ncc extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'lvs_nhacc';

    // Set the primary key
    protected $primaryKey = 'lvs_MaNCC';

    // Indicate that the primary key is not auto-incrementing
    public $incrementing = false;

    // Disable the timestamps
    public $timestamps = false;

    // Define the fillable fields
    protected $fillable = [
        'lvs_MaNCC',
        'lvs_TenNCC',
        'lvs_Diachi',
        'lvs_Dienthoai',
    ];
}
