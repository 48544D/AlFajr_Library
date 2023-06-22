<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\Mylists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'niveau' => 'required',
            'doc' => 'required|mimes:pdf,jpg,png,doc,docx',
        ]);
        // dd($request->all());

        DB::beginTransaction();
        try {
            $client = new client([
                'nom' => $request->get('nom'),
                'prenom' => $request->get('prenom'),
                'telephone' => $request->get('tele'),
                'email' => $request->get('email'),
            ]);
            $client->save();

            $ref = date('dmY') . $client->id;

            $nomDoc = $request->file('doc')->getClientOriginalName();
            $mylist = new Mylists([
                'Etablissement' => $request->get('etablissement'),
                'Niveau' => $request->get('niveau'),
                'Nom_doc' => $nomDoc,
                'reference'=> $ref,
            ]);
            $mylist['client_id'] = $client['id'];
            $mylist['Emplac_fich'] = $request->file('doc')->store('images/maliste', 'public');
            $mylist->save();

            DB::commit();
            session(['ref' => $ref]);
            return redirect()->route('maliste.success');
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('message', 'Une erreur est survenue lors de l\'envoi de votre liste.');
            return redirect()->route('home');
        }
    }
}
