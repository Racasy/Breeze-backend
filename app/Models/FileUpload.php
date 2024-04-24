<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    use HasFactory;
<<<<<<< HEAD
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'user_id',
=======
    protected $fillable = [
>>>>>>> ed3fe74c0edc0b9289cfd240b85781e01a2ec818
        'name',
        'path',
        'comment',
        'size'
    ];
}
