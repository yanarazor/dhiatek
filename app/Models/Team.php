<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    // protected $fillable = ["nama","jabatan","foto"]; // ini yang boleh diisi di post
    protected $guarded = ["id"]; // ini yang ga boleh diisi di post
}
