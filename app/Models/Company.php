<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'company_name',
        'company_type',
        'cContactID'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    /*public function addresses()
    {
        return $this->hasMany(CompanyAddress::class, 'CompanyID');
    }*/

    public function contactInfo()
    {
        return $this->hasMany(CompanyContactInfo::class, 'company_id');
    }
}
