<x-app-layout>
    <div class="mx-auto w-1/3">
        <h1>PrivacyVerklaring</h1>
        <p>
            {{ File::get('storage/privacyverklaring.txt') }}
        </p>
    </div>
</x-app-layout>
