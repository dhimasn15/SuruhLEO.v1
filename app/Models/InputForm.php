<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputForm extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'input_form';

    // Kolom yang dapat diisi massal
    protected $fillable = [
        'name', 'no_telp', 'prodi', 'gender', 'description', 'status','user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class); // Asumsikan tabel 'inputs' memiliki kolom 'user_id'
    }
   
}


    

