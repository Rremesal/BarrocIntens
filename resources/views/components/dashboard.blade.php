@props(['config' => null])

<div class="flex w-screen h-screen justify-around items-center">
    @for ($index = 0; $index < count($config); $index++)
        <div class=" w-80 h-96 flex flex-col rounded-lg hover:shadow-2xl border shadow-lg">
            <div id="image-container" class="h-100">
                <img src="{{ $config['image'][$index] }}">
            </div>
            <div class=" bg-customblack text-white h-8 mt-auto text-center rounded-b-lg">
                <a href="{{ $config['link'][$index]['href'] }}">{{ $config['link'][$index]['text'] }}</a>
            </div>
        </div>
    @endfor
<div>
