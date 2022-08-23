<?php

namespace App\Models;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Artist extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    use Sluggable;

    protected $table = 'artists';
    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function registerMediaConversions(Media $media = null): void
    {

        $this->addMediaConversion('artiste')
                ->fit(Manipulations::FIT_CONTAIN, 500, 500)
                ->apply()->fit(Manipulations::FIT_FILL, 500, 500)
                ->background('f7f7f7');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
