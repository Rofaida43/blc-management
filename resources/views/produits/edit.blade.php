@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Modifier produit</h2>

<form action="{{ route('produits.update', $produit->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label>Catégorie</label>
        <select id="categorie" name="categorie" class="border p-2 w-full">
            <option value="entree" {{ $produit->categorie=='entree'?'selected':'' }}>Entrée</option>
            <option value="boisson" {{ $produit->categorie=='boisson'?'selected':'' }}>Boisson</option>
            <option value="dessert" {{ $produit->categorie=='dessert'?'selected':'' }}>Dessert</option>
            <option value="snacks" {{ $produit->categorie=='snacks'?'selected':'' }}>Snacks</option>
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
            <option value="piece" {{ $produit->unite=='piece'?'selected':'' }}>Pièce</option>
            <option value="sachet" {{ $produit->unite=='sachet'?'selected':'' }}>Sachet</option>
            <option value="bouteille" {{ $produit->unite=='bouteille'?'selected':'' }}>Bouteille</option>
            <option value="canette" {{ $produit->unite=='canette'?'selected':'' }}>Canette</option>
            <option value="plateau" {{ $produit->unite=='plateau'?'selected':'' }}>Plateau</option>
        </select>
    </div>

    <div class="mb-4">
        <label>Prix</label>
        <input type="number" step="0.01" name="prix" value="{{ $produit->prix }}" class="border p-2 w-full">
    </div>

    <div class="mb-4">
        <label>Stock</label>
        <input type="number" name="stock" value="{{ $produit->stock }}" class="border p-2 w-full">
    </div>

    <button class="bg-red-700 text-white px-4 py-2 rounded">Modifier</button>
</form>

<script>
const produits = {
    "entree": ["Salade César","Salade de fruits","Sandwich thon"],
    "boisson": ["Eau","Jus","Café","Thé","Eau minérale","Jus d’orange","Coca-Cola"],
    "dessert": ["Tarte au chocolat","Flan caramel","Yaourt nature"],
    "snacks": ["Barre chocolat","Chips nature","Biscuit sucré"]
};

function remplirNom(categorie, produitActuel){
    let nomSelect = document.getElementById('nom');
    nomSelect.innerHTML = "<option value=''>-- Choisir produit --</option>";
    if(produits[categorie]){
        produits[categorie].forEach(function(produit){
            let option = document.createElement('option');
            option.value = produit;
            option.text = produit;
            if(produit == produitActuel) option.selected = true;
            nomSelect.appendChild(option);
        });
    }
}

// Au chargement
document.addEventListener('DOMContentLoaded', function() {
    let categorie = document.getElementById('categorie').value;
    let produitActuel = "{{ $produit->nom }}";
    remplirNom(categorie, produitActuel);
});

// Au changement de catégorie
document.getElementById('categorie').addEventListener('change', function(){
    remplirNom(this.value, '');
});
</script>
@endsection


