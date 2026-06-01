<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Liste des clients
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    // Formulaire création
    public function create()
    {
        return view('clients.create');
    }

    // Enregistrer un nouveau client
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'type_client' => 'required|string|max:50',
        ]);

       Client::create($request->only(['nom', 'adresse', 'telephone', 'email', 'type_client']));

        return redirect()->route('clients.index')->with('success', 'Client créé avec succès.');
    }

    // Formulaire édition
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    // Mettre à jour le client
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'type_client' => 'required|string|max:50',
        ]);

       $client->update($request->only(['nom', 'adresse', 'telephone', 'email', 'type_client']));


        return redirect()->route('clients.index')->with('success', 'Client mis à jour avec succès.');
    }

    // Supprimer un client
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client supprimé avec succès.');
    }
}

