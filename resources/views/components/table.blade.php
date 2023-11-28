@props(['linkjes'=> null,'items' => null])

<table class=" rounded border-collapse">
    <thead class=" bg-customyellow text-customblack">
        @foreach (array_keys($items[0]->getAttributes()) as $header)
            <th>{{ $header }}</th>
        @endforeach
        <th>options</th>
    </thead>
    <tbody>
        @foreach ($items as $item)
            <tr class="border">
                @foreach ($item->getAttributes() as $key => $value)
                <td class="border p-2 text-center">{{ $value }}</td>
                @endforeach
                <td>
                    @foreach ($linkjes as $link)
                            <form class=" inline" method="POST" action="{{ route('product.destroy', ['product' => $item->id]) }}">
                                @csrf
                                @method('DELETE')
                                @if ( Str::contains($link['route'], 'destroy'))
                                    <button class="{{ $link['icon'] }} border p-2 bg-gray-200 rounded hover:bg-gray-500"></button>
                                @else
                                    <a class="{{ $link['icon'] }} border p-2 bg-gray-200 rounded hover:bg-gray-500" href="{{ route($link['route'], ['product' => $item])}}"></a>
                                @endif
                            </form>
                    @endforeach
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
