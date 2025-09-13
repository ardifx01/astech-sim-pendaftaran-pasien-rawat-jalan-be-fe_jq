<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'patients';
    protected $fillable = ['name', 'nik', 'gender', 'birth_date', 'phone', 'address'];
    public $timestamps = false;

    public function visits(): HasMany
    {
        return $this->hasMany(Visit::class);
    }
}
