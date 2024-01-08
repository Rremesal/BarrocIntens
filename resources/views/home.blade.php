<x-app-layout>
    <x-cookie-alert></x-cookie-alert>
    <div class="bgimg">
        <div class="overlay">
            <img src="{{ asset('/image/Homepage.png') }}" class="image">
        </div>
        <div class="middle">
            <h1 class="text-8xl font-extrabold">KOFFIEBRAND BARROCINTENS</h1>
            <hr>
            <p class="text-base">Informatie over het bedrijf... Informatie over het bedrijf... Informatie over het bedrijf... Informatie over het bedrijf... Informatie over het bedrijf... Informatie over het bedrijf...</p>
            <br>
            <a href="{{ route('product.index') }}" class="bg-black hover:bg-black text-white font-semibold py-2 px-4 border border-white rounded shadow">
                Koffie Merken</a>
            </button>
            <a href="{{ route('product.index') }}" class="bg-black hover:bg-black text-white font-semibold py-2 px-4 border border-white rounded shadow">
                Koffie Machines
            </a>
            </button>
        </div>
    </div>
</x-app-layout>
