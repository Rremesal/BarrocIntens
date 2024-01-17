<x-app-layout>
    <div class="mx-auto w-1/3">
        <h1>Privacyverklaring</h1>
        <p>
            {{ File::get('storage/privacyverklaring.txt') }}
        </p>
    </div>
</x-app-layout>
