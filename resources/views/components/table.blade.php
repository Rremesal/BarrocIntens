@props(['linkjes'=> null,'items' => null, 'table' => null])

<table class=" rounded border-collapse">
    <thead class=" bg-customyellow text-customblack">
        @foreach (array_keys($items[0]->getAttributes()) as $header)
            @if (!Str::contains($header, "foreign"))
                <th>{{ $header }}</th>
            @endif
        @endforeach
        <th>options</th>
    </thead>
    <tbody>
        @foreach ($items as $item)
            <tr class="border">
                @foreach ($item->getAttributes() as $key => $value)
                        @if (Str::contains($key, "amount"))
                            <td class="border p-2 text-center flex">
                                <p class="text-center p-1">{{ $value }}</p>
                                <form method="POST" action="{{ url("/stockchange/{$item->id}") }}">
                                    @csrf
                                    @method('PUT')
                                    <input name="table" value="{{ $table }}" type="password" hidden>
                                    <input name="amount" class=" w-20 h-9 amount" type="number" min="0" value="0">
                                    <button type="submit"><i class="fa-solid fa-plus border p-2 bg-green-400 rounded hover:bg-green-200"></i></button>
                                </form>
                            </td>
                        @else
                            @if (!Str::contains($key,"foreign"))
                                <td class="border p-2 text-center">{{ $value }}</td>
                            @endif
                        @endif
                @endforeach
                <td>
                    @foreach ($linkjes as $link)
                    @if ( Str::contains($link['route'], 'destroy'))
                            <form class=" inline" method="POST" action="{{ route($link['route'], [($table == "products" ? 'product' : 'notification') => $item->id]) }}">
                                @csrf
                                @method('DELETE')

                                    <button class="{{ $link['icon'] }} border p-2 bg-gray-200 rounded hover:bg-gray-500"></button>
                    @else
                                    <a class="{{ $link['icon'] }} border p-2 bg-gray-200 rounded hover:bg-gray-500" href="{{ route($link['route'], [($table == "products" ? 'product' : 'notification') => $item])}}"></a>
                    @endif
                            </form>
                    @endforeach
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
