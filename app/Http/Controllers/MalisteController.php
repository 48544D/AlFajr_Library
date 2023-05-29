<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Mylists;
use Illuminate\Http\Request;

class MalisteController extends Controller
{
    public function index()
    {
        return view('maliste.index');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'tele' => 'required|numeric',
            'etablissement' => 'required',
            'niveau' => 'required|numeric',
            'doc' => 'required|mimes:pdf,jpg,png,doc,docx',
        ]);
        // dd($request->all());

        $client = new Clients([
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'telephone' => $request->get('tele'),
            'email' => $request->get('email'),
        ]);
        $client->save();

        $nomDoc = $request->file('doc')->getClientOriginalName();
        $mylist = new Mylists([
            'Etablissement' => $request->get('etablissement'),
            'Niveau' => $request->get('niveau'),
            'Nom_doc' => $nomDoc,
        ]);
        $mylist['client_id'] = $client['id'];
        $mylist['Emplac_fich'] = $request->file('doc')->store('images/maliste', 'public');
        $mylist->save();

        session()->flash('message', 'Votre liste a été envoyée avec succès.');
        return redirect()->route('home');
    }
}
