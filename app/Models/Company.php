<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Plank\Mediable\Mediable;

class Company extends Model
{
    use SoftDeletes;
    use Mediable;

    protected $fillable = [
        'name',
        'description',
        'contact_number',
        'annual_turnover',
        'created_by',
        'updated_by'
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
