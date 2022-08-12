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

        return view('artiste', compact('artiste'));
    }

    public function uploadArtiste(Request $request){
     /*   Validator::make($request->all(), [
        'name' => ['required', 'string', 'max:255'],
        'image' => 'required|max:1024',
    ],[
        'image.required' => 'You have not uploaded the Artiste image',
        'image.max' => 'Image size exceeds 1024KB',
    ]); */

    $validator = Validator::make($request->all(),[
        'name' => 'required|max:255',
    ],
    $messages = [
        'required' => 'The :attribute field is required.',
    ]
);

        $data= new Artist();

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('artistes'), $filename);
            $data['picture']= 'artistes/'.$filename;
            $data['name']= $request->name;
        }
        $data->save();
        return redirect()->route('artistes');
    }
}
