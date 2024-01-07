<x-app-layout>
    @if (Auth::user()->role->role_name != 'klant')
        <div class="flex justify-center items-center">
            @if (empty($producten))
                <p>no products were found</p>
            @else
                <div class="p-5">
                    <table>
                        <thead class="bg-customyellow">
                            <th>Naam</th>
                            <th>Omschrijving</th>
                            <th>Afbeelding</th>
                            <th>Prijs</th>
                            <th>Categorie</th>
                            <th>Aantal</th>
                            <th>nieuwe voorraad</th>
                            <th>Opties</th>
                        </thead>
                        <tbody>
                            @foreach ($producten as $product)
                                <tr class="border-t border-b border-gray-300">
                                    @foreach ($product->getAttributes() as $key => $value)
                                        @if ($key != "id")
                                                @if ($key == 'new_stock' && $value == null)
                                                    <td class="text-center pt-4 pb-4">N.V.T</td>
                                                @else
                                                    <td class="text-center pt-4 pb-4">{{ $value }}</td>
                                                @endif
                                        @endif
                                    @endforeach
                                    <td class="flex gap-2 pt-4 pb-4">
                                        <button class=" h-8 w-8 border border-gray-400 hover:bg-gray-200 rounded-sm"><a href="{{ route("product.edit", ["product" => $product]) }}"><i class="fa-solid fa-edit"></i></a></button>
                                        <form method="POST" action="{{ route("product.destroy", ["product" => $product] ) }}">
                                            @csrf
                                            @method("DELETE")
                                            <button class="h-8 w-8 border border-gray-400 hover:bg-gray-200 rounded-sm"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    @else
        {{-- hier moet de view komen voor de klanten (dit staat op koen zijn to-do) --}}

    @endif

</x-app-layout>
