<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyContactInfo extends Model
{
    use HasFactory;

    protected $table = 'company_contact_info';

    protected $fillable = [
        'emailAddress',
        'phoneNumber',
        'address'
    ];

    public function companies()
    {
        return $this->hasMany(Company::class, 'cContactID');
    }
}
