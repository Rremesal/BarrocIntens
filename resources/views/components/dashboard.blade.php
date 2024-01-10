@props(['config' => null])

<div class="flex w-screen h-screen {{ count($config['image']) == 1 ? 'justify-center' : 'justify-around' }} items-center">
    @for ($index = 0; $index < count($config['image']); $index++)
        <div class=" w-80 h-96 flex flex-col rounded-lg justify-center hover:shadow-2xl border shadow-lg relative hover:cursor-pointer">
            <div class="absolute inset-0 flex items-center justify-center p-3">
                <img class="w-100 h-100 object-cover" src="{{ $config['image'][$index] }}" alt="Image">
            </div>
            <div class=" bg-customblack z-10 text-white h-8 mt-auto text-center rounded-b-lg">
                <a href="{{ $config['link'][$index]['href'] }}">{{ $config['link'][$index]['text'] }}</a>
            </div>
        </div>
    @endfor
</div>
