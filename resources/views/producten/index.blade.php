<x-app-layout>
    @if (Auth::user()->role->role_name != "klant")
        <div class="flex justify-center items-center">
            @if (empty($producten))
                <p>no products were found</p>
            @else
                <div class="p-5">
                    <x-table table="products" :linkjes="$linkjes" :items="$producten"></x-table>
                </div>

            @endif
        </div>
    @else
    {{-- hier moet de view komen voor de klanten (dit staat op koen zijn to-do) --}}

    @endif

</x-app-layout>
