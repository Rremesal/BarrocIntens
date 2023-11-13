@if (!isset($_COOKIE['acceptedCookieTerms']))
    <div id="modal" class="fixed w-screen h-screen flex justify-center items-center bg-gray-800/75 top-0 z-10 overflow-auto">
        <div class="flex justify-around flex-col w-100 h-40 bg-white p-5 rounded">
            <h1>Cookies</h1>
            <p class=" text-black">
                Hierbij vragen we om toestemming om wat gegevens bij te houden in een cookie. Verder kunt
                u onze privacyverklaring vinden,  door <br/> op de knop hieronder te klikken
            </p>
            <div class="flex justify-around mt-3">
                <x-primary-button id="acceptCookie-button">Accept</x-primary-button>
                <x-secondary-button><a href="{{ route('privacy') }}">Privacyverklaring</a></x-secondary-button>
            </div>
        </div>
    </div>



    @push('scripts')
        <script src="{{ asset('js/cookiealert.js') }}"></script>
    @endpush
@endif





