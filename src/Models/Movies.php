<?php

namespace Go4tech\Moviex\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    use HasFactory;

    protected $fillable = ['api_id','image','title','duration','chart_rating','year'];

}
