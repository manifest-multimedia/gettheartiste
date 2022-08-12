<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Artist;
use Livewire\WithFileUploads;

class ArtisteModal extends Component
{
    use WithFileUploads;

    public $artiste_name;
    public $product_category;
    public $product_description;
    public $product_cost;
    public $product_price;
    public $product_stock;

    public $artiste_image;

    public $user_id;
    public $org_id;


    public function mount() {

        $this->user_id = Auth::user()->user_id;

    }

    public function render()
    {
        return view('livewire.artiste-modal');
    }


    public function save(){


        $validate=$this->validate([

            'artiste_name' =>'required',

            'artiste_image' =>'required|max:1024',

        ], [
                'artiste_name.required' => 'Please specify a name for your product',
                'product_category.required' => 'What is the product category?',
                'product_description.required' => 'Kindly provide a product description',
                'product_cost.required' => 'Cost is required for accounting purposes',
                'product_price.required' => 'You have not provided a selling price for the product',
                'product_stock.required' => 'Please specify the available stock quantity for your product',
                'artiste_image.required' => 'You have not uploaded the Artiste image',

        ]);

        //Save
        $store_image=$this->artiste_image->store('artistes');

        $artist=new Artist;
        $artist->name=$this->artiste_name;

        $artist->picture=$store_image;

        $artist->save();


    }
}
