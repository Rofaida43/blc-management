@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Ajouter un repas</h2>

<form action="{{ route('repas.store') }}" method="POST">
    @csrf

    <!-- Catégorie -->
    <div class="mb-4">
        <label class="block font-semibold">Catégorie</label>
        <select name="categorie" id="categorie" class="border p-2 w-full" required>
            <option value="">-- Choisir une catégorie --</option>
            <option value="entree">Entrée</option>
            <option value="boisson">Boisson</option>
            <option value="dessert">Dessert</option>
            <option value="snack">Snack</option>
        </select>
    </div>

    <!-- Nom -->
    <div class="mb-4">
        <label class="block font-semibold">Nom</label>
        <select name="nom" id="nom" class="border p-2 w-full" required>
            <option value="">-- Choisir un nom --</option>
        </select>
    </div>

    <!-- Prix -->
    <div class="mb-4">
        <label class="block font-semibold">Prix</label>
        <input type="number" name="prix" step="0.01" class="border p-2 w-full" required>
    </div>

    <!-- Unité -->
    <div class="mb-4">
        <label class="block font-semibold">Unité</label>
        <select name="unite" class="border p-2 w-full" required>
            <option value="piece">Pièce</option>
            <option value="sachet">Sachet</option>
            <option value="bouteille">Bouteille</option>
            <option value="canette">Canette</option>
            <option value="plateau">Plateau</option>
        </select>
    </div>

    <button type="submit" class="bg-red-700 text-white px-4 py-2 rounded hover:bg-red-800">Enregistrer</button>
</form>

<!-- JS pour select dynamique -->
<script>
const nomsParCategorie = {
    'entree': ['Salade César', 'Salade de fruits', 'Sandwich thon'],
    'boisson': ['Eau', 'Jus', 'Café', 'Thé'],
    'dessert': ['Tarte au chocolat', 'Flan caramel', 'Yaourt nature'],
    'snack': ['Barre chocolat', 'Chips nature', 'Biscuit sucre']
};

const categorieSelect = document.getElementById('categorie');
const nomSelect = document.getElementById('nom');

categorieSelect.addEventListener('change', function() {
    const cat = this.value;
    nomSelect.innerHTML = '<option value="">-- Choisir un nom --</option>';
    if(cat in nomsParCategorie){
        nomsParCategorie[cat].forEach(nom => {
            const opt = document.createElement('option');
            opt.value = nom;
            opt.text = nom;
            nomSelect.appendChild(opt);
        });
    }
});
</script>

@endsection


