<x-app-layout>
    @if (Auth::user()->role->role_name != 'klant')
        <div class="flex justify-center items-center">
            @if (empty($producten))
                <p>no products were found</p>
            @else
                <div class="p-5">
                    <div class="mb-3">
                        <form action="{{ route('product.index') }}" method="GET">
                            @csrf
                            <select name="stock" id="stock">
                                <option value="-1">--- kies filter ---</option>
                                <option value="0">Uit voorraad</option>
                                <option value="1">Momenteel leverbaar</option>
                            </select>
                            <input type="text" name="search">
                            <x-primary-button>Zoeken</x-primary-button>
                        </form>
                    </div>
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
{{--    <div class="grid justify-center items-center grid-cols-3 mx-auto">--}}
{{--        <div class=" w-80 h-96 flex flex-col rounded-lg hover:shadow-2xl border shadow-lg relative hover:cursor-pointer">--}}
{{--            <div class="inset-3 flex items-center justify-center p-3">--}}
{{--                <img class="w-100 h-100 object-cover" src="{{ asset('/image/machine1.png') }}" >--}}
{{--            </div>--}}
{{--            <div class="text-black h-40 mt-auto text-center rounded-b-lg font-extrabold" >--}}
{{--                NESPRESSO <BR>--}}
{{--                AGUILA 440--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                <button class="bg-yellow-300">Ontdek Machine</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
        <a href="#" class="styled-card w-80 h-104 flex flex-col rounded-lg overflow-hidden hover:shadow-2xl border shadow-lg relative hover:cursor-pointer">
            <div class="image-container flex items-center justify-center">
                <img class="w-full h-full object-cover rounded-t-lg" src="{{ asset('/image/machine1.png') }}" alt="Styled Card Image">
            </div>
            <div class="text-container text-white h-56 flex flex-col items-center justify-center rounded-b-lg px-4 bg-gradient-to-t from-gray-900 to-transparent">
                <h2 class="text-3xl font-extrabold leading-tight">Elegant Machine</h2>
                <div class="mt-2 line-container flex items-center">
                    <div class="line h-2 w-16 border-t-2 border-black mr-10"></div>
                    <div class="line h-2 w-16 border-t-2 border-black ml-10"></div>
                </div>
                <p class="mt-2 text-sm italic">Unleash the power of innovation.</p>
                <button class="bg-black hover:bg-gray-800 text-white mt-3 py-2 px-4 rounded-full focus:outline-none">Discover</button>
            </div>
        </a>














    @endif

</x-app-layout>
