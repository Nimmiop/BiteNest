<x-layout.form title="Profile Details">

    <h2 class='text-xl text-center'>
        Apply as {{ ucfirst(Auth::user()->role) }}
    </h2>
    @if ($submitted)
        <div role="alert" class="alert alert-warning">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            <span>Warning: Already submitted aplication! Please wait patiently for our admins</span>
        </div>
    @else
        <form method="POST" action="{{ route('details.store') }}">
            @csrf
            @if (Auth::user()->role == 'delivery')
                <div class='mb-2'>
                    <label for="nid" class='label'>NID Number</label>
                    <input type="text" class='input w-full' id="nid" name="nid" placeholder="xxxxxxxxxxxx"
                        required />
                    @error('nid')
                        <span class="text-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class='mb-2'>
                    <label for="vehicle">Preferred Vehicle</label>
                    <select name="vehicle" id="vehicle" class='select w-full'>
                        <option value="cycle" @selected(old('vehicle', 'cycle') == 'cycle')>Cycle</option>
                        <option value="bike" @selected(old('vehicle') == 'bike')>Bike</option>
                    </select>
                    @error('vehicle')
                        <span class="text-error">{{ $message }}</span>
                    @enderror
                </div>
            @else
                <div class='mb-2'>
                    <label for="name" class="label">Shop Name</label>
                    <input class='input w-full'type="text" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <span class="text-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class='mb-2'>
                    <label for="address" class='label'>Address</label>
                    <input type="text" class='input w-full' id="address" name="address" required />
                    @error('address')
                        <span class="text-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class='mb-2'>
                    <label for="type">Shop Type</label>
                    <select name="type" id="type" class='select w-full'>
                        <option value="food" @selected(old('type', 'food') == 'food')>Restaurant</option>
                        <option value="grocery" @selected(old('type') == 'grocery')>Grocery</option>
                    </select>
                    @error('type')
                        <span class="text-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class='mb-2'>
                    <label for="social_link" class='label'>Social Link</label>
                    <input type="url" class='input w-full' id="social_link" name="social_link" />
                    @error('social_link')
                        <span class="text-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class='mb-2'>
                    <label for="web_link" class='label'>Website Link</label>
                    <input type="url" class='input w-full' id="web_link" name="web_link" />
                    @error('web_link')
                        <span class="text-error">{{ $message }}</span>
                    @enderror
                </div>
            @endif

            <button class='btn btn-primary btn-sm mt-2'>Apply</button>
        </form>
    @endif
</x-layout.form>
