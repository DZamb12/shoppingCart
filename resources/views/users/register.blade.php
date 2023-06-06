<x-layout>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Register Form</h1>
                        <form method="POST" action="/users">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Username:</label>
                                <input type="text" value="{{old('name')}}" name="name" class="form-control @error('name') is-invalid @enderror"/>
                                <div class="invalid-feedback">
                                    @error('name')
                                        {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="text" value="{{old('email')}}" name="email" class="form-control @error('email') is-invalid @enderror"/>
                                <div class="invalid-feedback">
                                    @error('email')
                                        {{$message}}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"/>
                                <div class="invalid-feedback">
                                    @error('password')
                                        {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password:</label>
                                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror"/>
                                <div class="invalid-feedback">
                                    @error('password_confirmation')
                                        {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="text-end">
                                <button class="btn btn-primary btn-lg" type="submit">Register</button>
                            </div>
                        </form>
                        <span class="mt-3">Already have an account? <a href="/login" style="text-decoration: none; color: green;">Login Here</a></span>
                    </div>
                    <div class="col-md-6">
                        <img src="https://www.gannett-cdn.com/-mm-/c514c14b303d781f411cbaec5870f0e84b1d19e4/c=0-349-3404-2272/local/-/media/2017/08/17/USATODAY/USATODAY/636385912845640499-28-Mercado-Livramento-09-Photo-credit-to-Camara-Municipal-de-Setubal.jpg?width=1200" style="object-fit: cover; width: 100%; height: 100%" alt="Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
