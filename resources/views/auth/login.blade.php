<x-layout.form title="Login">
    <form method="POST" action="{{ route('authenticate') }}">
        @csrf

        <div class='mb-2'>
            <label for="email" class='label'>Email</label>
            <input type="email"class='input w-full' id="email" name="email" placeholder="Email"  required/>
            @error('email')
                <span class="text-error">{{ $message }}</span>
            @enderror
        </div>
        <div class='mb-2'>
            <label for="password" class='label'>Password</label>
            <input type="password" class='input w-full' id="password" name="password" placeholder="Password" required/>
            @error('password')
                <span class="text-error">{{ $message }}</span>
            @enderror
        </div>

        <label for="remember" class="label">
            <input type="checkbox" id="remember" name="remeber" checked="checked" class="checkbox checkbox-primary" value="1" />
            Remember Me
        </label>

        <div>
            Don't have an account? <a href="{{ route('register') }}" class="link link-primary"> Register Now </a>
            </div>

            <button class='btn btn-primary btn-sm mt-2'>Login</button>
        </form>
    </x-layout.form>
        


