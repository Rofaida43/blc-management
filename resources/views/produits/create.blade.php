@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Ajouter un produit</h2>

<form action="{{ route('produits.store') }}" method="POST">
    @csrf

    <div class="mb-4">
        <label>Catégorie</label>
        <select id="categorie" name="categorie" class="border p-2 w-full">
            <option value="">-- Choisir catégorie --</option>
            <option value="entree">Entrée</option>
            <option value="boisson">Boisson</option>
            <option value="dessert">Dessert</option>
            <option value="snacks">Snacks</option>
        </select>
    </div>

    <div class="mb-4">
        <label>Nom du produit</label>
        <select id="nom" name="nom" class="border p-2 w-full">
            <option value="">-- Choisir produit --</option>
        </select>
    </div>

    <div class="mb-4">
        <label>Unité</label>
        <select name="unite" class="border p-2 w-full">
            <option value="piece">Pièce</option>
            <option value="sachet">Sachet</option>
            <option value="bouteille">Bouteille</option>
            <option value="canette">Canette</option>
            <option value="plateau">Plateau</option>
        </select>
    </div>

    <div class="mb-4">
        <label>Prix</label>
        <input type="number" step="0.01" name="prix" class="border p-2 w-full">
    </div>

    <div class="mb-4">
        <label>Stock</label>
        <input type="number" name="stock" class="border p-2 w-full" value="0">
    </div>

    <button class="bg-red-700 text-white px-4 py-2 rounded">Enregistrer</button>
</form>

<script>
const produits = {
    "entree": ["Salade César","Salade de fruits","Sandwich thon"],
    "boisson": ["Eau","Jus","Café","Thé","Eau minérale","Jus d’orange","Coca-Cola"],
    "dessert": ["Tarte au chocolat","Flan caramel","Yaourt nature"],
    "snacks": ["Barre chocolat","Chips nature","Biscuit sucré"]
};

document.getElementById('categorie').addEventListener('change', function() {
    let categorie = this.value;
    let nomSelect = document.getElementById('nom');
    nomSelect.innerHTML = "<option value=''>-- Choisir produit --</option>";
    if(produits[categorie]){
        produits[categorie].forEach(function(produit){
            let option = document.createElement('option');
            option.value = produit;
            option.text = produit;
            nomSelect.appendChild(option);
        });
    }
});
</script>
@endsection



