<x-layout.form title="Register">
    <form method="POST" action="{{ route('auth.store') }}">
        @csrf
        <div class='mb-2'>
            <label for="name" class="label"> Name</label>
            <input class='input w-full'type="text" name="name" value="{{ old('name') }}" required>
            @error('name')
                <span class="text-error">{{ $message }}</span>
            @enderror
        </div>

        <div class='mb-2'>
            <label for="email" class="label"> Email</label>
            <input class='input w-full' type= "email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <span class='text-error'>{{ $message }}</span>
            @enderror
        </div>

        <div class='mb-2'>
            <label for="phone" class="label">Phone Number</label>
            <input class='input w-full' type="tel" name="phone" value="{{ old('phone') }}" required>
            @error('phone')
                <span class="text-error">{{ $message }}</span>
            @enderror
        </div>

        <div class='mb-2'>
            <label for="password" class="label">Password</label>
            <input class='input w-full' type="password" name="password" required>
            @error('password')
                <span class="text-error">{{ $message }}</span>
            @enderror
        </div>

        <div class='mb-2'>
            <label for="password_confirmation" class="label">Confirm Password</label>
            <input class='input w-full' type="password" name="password_confirmation" required>
            @error('password_confirmation')
                <span class="text-error">{{ $message }}</span>
            @enderror
        </div>

        <div class='mb-2'>
            <label for="role-select">Role</label>
            <select name="role" id="role-select" class='select w-full'>
                <option value="customer" @selected(old('role', 'customer') == 'customer')>Customer</option>
                <option value="delivery" @selected(old('role') == 'delivery')>Delivery</option>
                <option value="shop" @selected(old('role') == 'shop')>Shop</option>
            </select>
            @error('role')
                <span class="text-error">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary ">Create New Account</button>`

        <div class="text-end">
            Already have an account?<a href="{{ route('login') }}" class="text-primart">Login</a>
        </div>
    </form>
</x-layout.form>
