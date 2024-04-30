<?php

namespace App\Http\Controllers;

use App\Models\Casal;
use App\Models\Ciutat;


class CasalController extends Controller
{
    public function listCasals(){
        $result = Casal::get();
        $casals = [];
        foreach($result as $casal){
            $casal->ciutat = Ciutat::getCityById($casal->id_ciutat)->nom;
            $casals[$casal->id] = $casal;
        }
        return view('main', compact('casals'));
    }

    public function casalForm($casalId){
        $casal = Casal::where('id', $casalId)->get()->first();
        $ciutats = Ciutat::get();
        return view('casalForm', compact('casal', 'ciutats'));
    }

    public function addCasalForm(){
        $ciutats = Ciutat::get();
        return view('newCasal', compact('ciutats'));
    }

    public function addCasal(){
        request()->validate([
            'nom' => 'required',
            'data_inici' => 'required',
            'data_final' => 'required',
            'n_places' => 'required',
            'ciutat' => 'required'
        ]);

        $casal = new Casal();

        $casal->nom = request()->input('nom');
        $casal->data_inici = request()->input('data_inici');
        $casal->data_final = request()->input('data_final');
        $casal->n_places = request()->input('n_places');
        $casal->id_ciutat = request()->input('ciutat');

        $casal->save();

        return redirect()->route('main');

    }

    public function updateCasal(){
        request()->validate([
            'nom' => 'required',
            'data_inici' => 'required',
            'data_final' => 'required',
            'n_places' => 'required',
            'ciutat' => 'required'
        ]);

        $casal = Casal::where('id', request()->input('id'));
        $casal->update([
            'nom' => request()->input('nom'),
            'data_inici' => request()->input('data_inici'), 
            'data_final' =>  request()->input('data_final'),
            'n_places' => request()->input('n_places'),
            'id_ciutat' =>  request()->input('ciutat')
        ]);

        return redirect()->route('main');
    }

    public function deleteCasal($casalId){
        Casal::where('id', $casalId)->delete();
        return redirect()->route('main');
    }
}