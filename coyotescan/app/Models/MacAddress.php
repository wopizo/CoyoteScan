<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MacAddress extends Model
{
    use HasFactory;

    public function entryRecordes(){
        return $this->hasMany(EntryRecord::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
