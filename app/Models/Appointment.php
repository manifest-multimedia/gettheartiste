<?php

namespace App\Models;

use App\Models\User;
use App\Models\Artist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Appointment extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function artiste()
    {
        return $this->belongsTo(Artist::class,'artist_id','id');
    }
}
