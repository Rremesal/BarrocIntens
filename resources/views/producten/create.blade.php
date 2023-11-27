@props(['product' => null]);
<x-app-layout>
    <div class="flex justify-center items-center">
        <form class=" w-1/3 flex flex-col" method="POST" action="{{ route($product ? "product.update" : "product.store" , $product ? ['product' => $product] : null)}}">
            @csrf
            @method($product ? "PUT" : "POST")
            <div class="flex flex-col my-3">
                <label for="name">Naam</label>
                <input id="name" name="name" type="text" value="{{ old('name', $product ? $product->name : null) }}">
                @error('name')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col my-2">
                <label for="name">Omschrijving</label>
                <textarea name="description" id="" cols="30" rows="10">{{ old('description', $product ? $product->description : null) }}</textarea>
                @error('description')
                <p class=" text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col my-2">
                <label for="image_path">Pad naar afbeelding</label>
                <input id="image_path" name="image_path" type="text" value="{{ old('image_path', $product ? $product->image_path : null) }}">
                @error('image_path')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col my-2">
                <label for="price">Prijs</label>
                <input id="price" name="price" type="number" step="0.01" value="{{ old('price', $product ? $product->price : null) }}">
                @error('price')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col my-2">
                <label for="name">Productcategorie</label>
                <select name="product_category_id" id="product_category">
                    @foreach ($categorieen as $categorie)
                        <option value="{{ $categorie->id }}" {{ old('product_category_id', $product ? $product->product_category : null) == $categorie->name ? "selected" : ""}}>{{ $categorie->name }}</option>
                    @endforeach
                </select>
                @error('product_category')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <button class=" bg-customblack text-white rounded py-2" type="submit">Aanmaken</button>
        </form>
    </div>


</x-app-layout>
