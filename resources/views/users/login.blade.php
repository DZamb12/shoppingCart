<x-layout>
    <h1 class="mt-5">Login</h1>
    <form method="POST" action="/users/authenticate">
        @csrf
        <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" name="email" value="{{ old('email') }}"
                    class="form-control @error('email') is-invalid @enderror">
                <div class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" name="password" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <span> Don't have an account? <a href='/register'>Register here. </a></span>
        </div>
        <button class="btn btn-success">Login</button>
    </form>
</x-layout>
