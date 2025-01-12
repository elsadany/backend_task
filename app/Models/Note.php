<?php

namespace App\Models;

use App\Http\Traits\HasFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    /** @use HasFactory<\Database\Factories\NotesFactory> */
    use HasFactory, HasFile;
    protected $guarded = ['id'];

    function folder(){
        return $this->belongsTo(Folder::class);
    }
    
    function user(){
        return $this->belongsTo(User::class);
    }
}
