<x-layout.form title="Register">
<form method="POST" action="{{ route('auth.store') }}">
    @csrf
    <div>
        <label for="name" class="label"> Name</label>
        <input type ="text" name="name" value="{{ old('name') }}">
        @error('name')
            <span class="text-error">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="email" class="label"> Email</label>
        <input type= "email" name="email" value="{{ old('email') }}">
        @error('email')
            <span class='text-error'>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="phone" class="label">Phone Number</label>
        <input type="tel" name="phone" value="{{ old('phone') }}">
        @error('phone')
            <span class="text-error">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="password" class="label">Password</label>
        <input type="password" name="password">
        @error('password')
            <span class="text-error">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="password_confirmation" class="label">Confirm Password</label>
        <input type="password" name="password_confirmation">
        @error('password_confirmation')
            <span class="text-error">{{ $message }}</span>
        @enderror
    </div>

    <label for="remember" class="label">
        <input type="checkbox" id="remeber" name="remember" @checkbox(old('remember')) class="checkbox checkbox-primary"
            value="1" />
        Remember Me
    </label>
    <div>
        <label for="role-select">Role</label>
        <select name="role" id="role-select">
            <option value="customer" @selected(old('role', 'customer') == 'customer')>Customer</option>
            <option value="delivery" @selected(old('role') == 'delivery')>Delivery</option>
            <option value="shop" @selected(old('role') == 'shop')>Shop</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Create New Account</button>`

    <div class="text-end">
        Already have an account?<a href="{{ route('login') }}" class="text-primart">Login</a>
    </div>
</form>
</x-layout.form>
