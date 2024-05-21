<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $table = 'modules';
    protected $primaryKey = 'Id_Module';

    protected $fillable = [
        'name',
        'description',
        'status',
        'created_at',
        'updated_at'
    ];

    public function moduleHistories()
    {
        return $this->hasMany(ModuleHistory::class, 'Id_Module');
    }
}
