<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('You\'r on thte waitlist. If you have an invite code, enter it now') }}
        </div>

        <div class="mt-4">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form method="POST" action="{{ route('activate') }}">
                @csrf
                <div class="fill-current mt-4 items-center justify-between">
                    <x-label for="code" :value="__('Invite Code')" />
    
                    <x-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code')" />
                </div>
                <div class="mt-4">
                    <x-button>
                        {{ __('Check invite code') }}
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
