<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntryRecord extends Model
{
    use HasFactory;

    public function record(){
        return $this->belongsTo(Record::class);
    }

    public function macAddress(){
        return $this->belongsTo(MacAddress::class);
    }
}
