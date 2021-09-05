<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfoTest extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'date_birth', 'phone', 'address', 'credcard', 'franchise', 'email'];

    protected $table = 'ContactInfoTest';
}
