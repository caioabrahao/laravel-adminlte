<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsentForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'title',
        'content',
        'effective_date',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
