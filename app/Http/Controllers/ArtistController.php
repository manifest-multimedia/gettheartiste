<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArtistController extends Controller
{

    public function displayArtistes(){
        $artistes = Artist::get();
        return view('frontend.artistes', compact('artistes'));
    }

    public function viewArtistes(){
        $artiste = Artist::get();
        return view('admin.artiste.view', compact('artiste'));
    }

    public function uploadArtiste(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255|unique:artists,name',
            'image' => 'required|max:1024',
        ],
        $messages = [
            'required' => 'The :attribute field is required.',
            'image.required' => 'You have not uploaded the Artiste image',
            'image.max' => 'Image size exceeds 1024KB',
        ]
        );

        $artiste =  Artist::create([
            'name'=> $request->name,
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $artiste->addMedia($file)->toMediaCollection('artiste');
        }

        return redirect()->route('artistes');
    }

    public function editArtiste($slug){
        $artiste = Artist::where('slug', $slug)->first();


        return view('admin.artiste.edit', compact('artiste'));
    }

    public function updateArtiste(Request $request, $slug){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'image' => 'max:1024',
        ],
        $messages = [
            'required' => 'The :attribute field is required.',
            'image.required' => 'You have not uploaded the Artiste image',
            'image.max' => 'Image size exceeds 1024KB',
        ]
        );

        $artiste =  Artist::where('slug', $slug)->update([
            'name'=> $request->name,
            'about'=> $request->about,
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $artiste->clearMediaCollection('artiste');
            $artiste->addMedia($file)->toMediaCollection('artiste');
        }

        return redirect()->route('artistes');

        return view('admin.artiste.edit', compact('artiste'));
    }

    public function deleteArtiste($slug){
        Artist::where('slug', $slug)->delete();
        return redirect()->back()->with('success','Artiste has been deleted');
    }
}
