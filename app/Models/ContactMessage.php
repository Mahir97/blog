<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable= [
        'contact_name',
        'contact_email',
        'contact_subject',
        'contact_message'
    ];
    use HasFactory;
}
