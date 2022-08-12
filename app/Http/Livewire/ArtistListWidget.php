<?php

namespace App\Http\Livewire;

use App\Models\Artist;
use Livewire\Component;

class ArtistListWidget extends Component
{

    public $artiste;
    public $user_id;


    public function render()
    {
        $this->artiste=Artist::all();
        return view('livewire.artist-list-widget');
    }
}
