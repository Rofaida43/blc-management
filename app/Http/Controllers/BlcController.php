<?php
namespace App\Http\Controllers;

use App\Models\Blc;
use App\Models\BlcLigne;
use App\Models\Client;
use App\Models\Vol;
use App\Models\Repas;
use Illuminate\Http\Request;

class BlcController extends Controller
{
    public function index()
    {
        $blcs = Blc::with(['client','vol','lignes.repas'])->get();
        return view('blcs.index', compact('blcs'));
    }

    public function create()
    {
        $clients = Client::all();
        $vols = Vol::all();
        $repas = Repas::all();
        return view('blcs.create', compact('clients','vols','repas'));
    }

 public function store(Request $request)
{
    $request->validate([
        'client_id' => 'required',
        'vol_id' => 'required',
        'date' => 'required|date',
    ]);

    $blc = Blc::create([
        'numero_blc' => 'BLC-' . time(),
        'client_id' => $request->client_id,
        'vol_id' => $request->vol_id,
        'date' => $request->date,
        'total' => 0
    ]);

    $total = 0;

    foreach ($request->repas as $id => $data) {

        if (isset($data['selected']) && !empty($data['quantite'])) {

            $repas = Repas::find($id);

            $ligneTotal = $repas->prix * $data['quantite'];

            BlcLigne::create([
                'blc_id' => $blc->id,
                'repas_id' => $id,
                'quantite' => $data['quantite'],
                'prix_unitaire' => $repas->prix,
                'total' => $ligneTotal
            ]);

            $total += $ligneTotal;
        }
    }

    $blc->update(['total' => $total]);

    return redirect()->route('blcs.index');
}



    public function show(Blc $blc)
    {
        $blc->load(['client','vol','lignes.repas']);
        return view('blcs.show', compact('blc'));
    }
    public function destroy(Blc $blc)
{
    $blc->delete();

    return redirect()->route('blcs.index')
        ->with('success', 'BLC supprimé avec succès.');
}
public function edit(Blc $blc)
{
    $clients = Client::all();
    $vols = Vol::all();
    $repas = Repas::all();

    return view('blcs.edit', compact('blc', 'clients', 'vols', 'repas'));
}
public function update(Request $request, Blc $blc)
{
    $request->validate([
        'client_id' => 'required',
        'vol_id' => 'required',
        'date' => 'required|date',
    ]);

    $blc->update([
        'client_id' => $request->client_id,
        'vol_id' => $request->vol_id,
        'date' => $request->date,
    ]);

    // Supprimer anciennes lignes
    $blc->lignes()->delete();

    $total = 0;

    foreach ($request->repas as $id => $data) {

        if (isset($data['selected']) && !empty($data['quantite'])) {

            $repas = Repas::find($id);

            $ligneTotal = $repas->prix * $data['quantite'];

            BlcLigne::create([
                'blc_id' => $blc->id,
                'repas_id' => $id,
                'quantite' => $data['quantite'],
                'prix_unitaire' => $repas->prix,
                'total' => $ligneTotal
            ]);

            $total += $ligneTotal;
        }
    }

    $blc->update(['total' => $total]);

    return redirect()->route('blcs.index')
        ->with('success', 'BLC modifié avec succès.');
}

}



