@props(['array' => null])

<div class="flex w-screen h-screen justify-around items-center">
    @for ($index = 0; $index < count($array); $index++)
        <div class=" w-80 h-96 flex flex-col rounded-lg hover:shadow-2xl border shadow-lg">
            <div id="image-container" class="h-100">
                <img src="{{ $array['image'][$index] }}">
            </div>
            <div class=" bg-customblack text-white h-8 mt-auto text-center rounded-b-lg">
                <a href="{{ $array['link'][$index]['href'] }}">{{ $array['link'][$index]['text'] }}</a>
            </div>
        </div>
    @endfor
<div>
