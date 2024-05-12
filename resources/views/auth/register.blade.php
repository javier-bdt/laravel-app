<x-layouts.layout>
    <x-slot:heading>
        Create a New User
    </x-slot:heading>
    <form method="POST" action="/register">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="first_name">First Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="first_name" id="first_name" placeholder="John"
                                class="{{ $errors->has('first_name') ? 'border-red-500 border-2 rounded-md' : '' }}"
                                value="{{ old('first_name') }}" required />
                            <x-form-error name="first_name" for="first_name" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="last_name">Last Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="last_name" id="last_name" placeholder="Doe"
                                class="{{ $errors->has('last_name') ? 'border-red-500 border-2 rounded-md' : '' }}"
                                value="{{ old('last_name') }}" required />
                            <x-form-error name="last_name" for="last_name" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="email">Email Address</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="email" name="email" id="email" placeholder="john.doe@mail.com"
                                class="{{ $errors->has('email') ? 'border-red-500 border-2 rounded-md' : '' }}"
                                value="{{ old('email') }}" required />
                            <x-form-error name="email" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="password" name="password" id="password"
                                class="{{ $errors->has('password') ? 'border-red-500 border-2 rounded-md' : '' }}"
                                value="{{ old('password') }}" required />
                            <x-form-error name="password" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="password_confirmation" name="password_confirmation"
                                id="password_confirmation"
                                class="{{ $errors->has('password_confirmation') ? 'border-red-500 border-2 rounded-md' : '' }}"
                                value="{{ old('password_confirmation') }}" required />
                            <x-form-error name="password_confirmation" />
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <x-form-button>Register</x-form-button>
        </div>
    </form>

</x-layouts.layout>
