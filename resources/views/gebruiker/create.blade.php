@props(['email' => null, 'name' => null])
<x-app-layout>
    <div class="flex justify-center items-center min-h-screen">
        <form class="border-2 px-12 py-4 w-1/4 bg-white shadow-md rounded" method="POST" action="{{ route("user.store") }}">
            @csrf
            @if (session('message'))
                <div class=" flex items-center justify-center text-center bg-green-200 text-green-600 p-3 border-2 border-green-700 rounded">
                    {{ session('message') }}
                </div>
            @endif
            <div class="flex flex-col">
                <label for="name">Naam</label>
                <input type="text" name="name" id="name" value="{{ $name ?  old("name", $name)  : null}}">
            </div>
            <div class="flex flex-col">
                <label for="">Email</label>
                <input type="text" name="email" id="email" value="{{$email ?  old("email", $email) : null }}">
            </div>
            <div class="flex justify-end">
                <x-primary-button class="mt-3" type="submit">Maak account aan</x-primary-button>
            </div>

        </form>
    </div>
</x-app-layout>
