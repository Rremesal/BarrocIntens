<x-app-layout>
    <div class="flex justify-center items-center">
        @if (empty($producten))
            <p>no products were found</p>
        @else
            <div class="p-5">
                <x-table table="products" :linkjes="$linkjes" :items="$producten"></x-table>
            </div>

        @endif
    </div>

</x-app-layout>
