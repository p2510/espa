<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;
use App\Models\EvenementInterested;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evenements=Evenement::all();
        return view('evenement.index')->with(['evenements'=>$evenements]);
    }

   



    public function show($id)
    {
         $evenements=Evenement::findOrFail($id);
        return view('evenement.show')->with(['evenements'=>$evenements]);;
    }

 
   
    public function signIn($id,Request $request)
    {
      $data=$request->validate([
        'name'=>['required','string','max:150'],
        'email'=>['email','required'],
        'phone'=>['required','string'],
        'organism'=>['required','string'],
        'poste'=>['required','string'],
      ]);
      $data['evenement_id']=$id;
      
      EvenementInterested::create($data);
      return redirect()->back()->with('success','succès');
    }
}