<?php

namespace App\Models\Master;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Participants extends Model{
    use HasFactory;use SoftDeletes;
    use Uuids;

    protected $fillable = [
        'name','email','hp','gender','place_of_birth','date_of_birth',''
    ];


}
