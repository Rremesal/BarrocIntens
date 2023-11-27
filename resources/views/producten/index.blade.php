<x-app-layout>
    <div class="flex justify-center items-center">
        @if (empty($producten))
            <p>no products were found</p>
        @else
            <x-table :linkjes="$linkjes" :items="$producten"></x-table>
        @endif
    </div>

</x-app-layout>
