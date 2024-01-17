@props(['message' => null])
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        @if (session('message'))
            <div class=" flex items-center justify-center text-center bg-green-200 text-green-600 p-3 border-2 border-green-700 rounded">
                {{ session('message') }}
            </div>
        @endif

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <p class="text-red-500">{{ $errors->get('email') ? "This email already has a account request pending" : "" }}</p>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Account aanvragen') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
