<section>

    @if (session('status') === 'password-updated')
        {{-- <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
    class="text-sm text-gray-600">{{ __('Saved.') }}</p> --}}
        <div class="bg-success text-white text-center w-50 mx-auto rounded d-flex justify-content-center align-items-center"
            style="height: 40px">
            {{ __('Changed') }}
        </div>
    @endif
    <header>
        <h3 class="font-weight-bold">
            {{ __('Update Password') }}
        </h3>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-5">
        @csrf
        @method('put')

        <div>
            <label for="current_password">{{ __('Current Password') }}</label>
            <input id="current_password" name="current_password" type="password"
                class="form-control w-50 border border-dark rounded" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <label for="password">{{ __('New Password') }}</label>
            <input id="password" name="password" type="password" class="form-control w-50 border border-dark rounded"
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <label for="password_confirmation">{{ __('Confirm Password') }}</label>
            <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                class="form-control w-50 border border-dark rounded" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4">
            <button class="btn btn-dark ">{{ __('Save') }}</button>


            {{-- @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif --}}
        </div>
    </form>
</section>
