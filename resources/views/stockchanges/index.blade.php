<x-app-layout>
    <div class="flex justify-center my-28">
        <div class="flex flex-col items-center">
            <form class="mb-3" method="POST" action="{{ route("stockchange.index") }}">
                @method("GET")
                @csrf
                <label for="product">Product</label>
                <select name="product" id="product">
                    <option value="0">--- kies een product ---</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
                <x-primary-button type="submit">Filter</x-primary-button>
            </form>
            @if (count($stockchanges) == 0)
                <p>No stock changes were found for this product</p>
            @else
                <table>
                    <thead>
                        <th>Product</th>
                        <th>aantal</th>
                        <th>Opties</th>
                    </thead>

                    <tbody>
                        @foreach ($stockchanges as $stockchange)
                        <tr class="border-t border-b border-gray-300">
                            @foreach ($stockchange->getAttributes() as $key => $value)
                                @if ($key != "id" && $key != "isApproved")
                                        @if ($key == 'new_stock' && $value == null)
                                            <td class="text-center pt-4 pb-4">N.V.T</td>
                                        @else
                                            <td class="text-center pt-4 pb-4">{{ $value }}</td>
                                        @endif
                                @endif
                            @endforeach
                            <td class="flex gap-2 pt-4 pb-4">
                                <form method="POST" action="{{ route("stockchange.destroy", ["stockchange" => $stockchange]) }}">
                                    @csrf
                                    @method("DELETE")
                                    <button class="h-8 w-8 border border-gray-400 hover:bg-gray-200 rounded-sm"><i class="fa-solid fa-xmark"></i></button>
                                </form>
                                <form method="POST" action="{{ route("stockchange.update", ["stockchange" => $stockchange]) }}">
                                    @csrf
                                    @method("PATCH")
                                    <button class=" h-8 w-8 border border-gray-400 hover:bg-gray-200 rounded-sm"><i class="fa-solid fa-check"></i></button>
                                    @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>

    </div>

</x-app-layout>
