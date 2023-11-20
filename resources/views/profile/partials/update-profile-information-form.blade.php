<section>
    @if (session('status') === 'profile-updated')
        {{-- <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
        class="text-sm text-gray-600">{{ __('Saved.') }}</p> --}}
        <div class="bg-success text-white text-center w-50 mx-auto rounded d-flex justify-content-center align-items-center" style="height: 40px">
            {{ __('Saved.') }}
        </div>
    @endif
    <header>
        <h3 class="font-weight-bold">
            {{ __('Profile Information') }}
        </h3>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>


    <form method="post" action="{{ route('profile.update') }}" class="mt-5">
        @csrf
        @method('patch')

        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input id="name" name="name" type="text" class="form-control w-50 border border-dark rounded"
                value="{{ $user->name }} " required autofocus autocomplete="name" />
            {{-- <class="mt-2" :messages="$errors->get('name')" /> --}}
        </div>

        <div class="form-group">
            <label for="email">{{ __('Email') }}</label>
            <input id="email" name="email" type="email" class="form-control w-50 border border-dark rounded"
                value="{{ $user->email }}" required autocomplete="username" />
            {{-- <x-input-error class="mt-2" :messages="$errors->get('email')" /> --}}

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div class="mt-4">
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class=" rounded bg-warning text-dark border-0">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="mt-4">
            <button class="btn btn-dark ">{{ __('Save') }}</button>
        </div>
    </form>

</section>
