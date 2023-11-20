<section>

    <header>
        <h3 class="font-weight-bold">
            {{ __('Delete Account') }}
        </h3>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>




    <form method="post" action="{{ route('profile.destroy') }}" class="mt-5">
        @csrf
        @method('delete')


        <div class="mb-3">
            <label for="password" class="sr-only">{{ __('Password') }}</label>

            <input id="password" name="password" type="password" class="form-control w-50 border border-dark rounded"
                placeholder="{{ __('Enter password for delete account') }}" />

            <x-input-error :messages="$errors->userDeletion->get('password')" class="mb-2" />
        </div>

        <div class="mt-6 flex justify-end">
            <button class="btn btn-danger">
                {{ __('Delete Account') }}
            </button>
        </div>
    </form>




    {{-- <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Delete Account') }}</x-danger-button> --}}

    {{-- <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal> --}}

</section>
