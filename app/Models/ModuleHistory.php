<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleHistory extends Model
{
    use HasFactory;
    protected $primaryKey = 'Id_ModuleHistory';
    protected $table = 'module_histories';

    protected $fillable = [
        'Id_Module', 'value','created_at',
        'updated_at'
    ];

    public $timestamps = true;

    public function module()
    {
        return $this->belongsTo(Module::class,'Id_Module');
    }
}
