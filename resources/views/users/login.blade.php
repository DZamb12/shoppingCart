<x-layout>
    <div class="container mt-5">
        <div class="card">
            <div class="row g-0">
                <div class="col-md-6">
                    <img src="https://www.freshproduce.com/siteassets/images/various-f-and-v/collageoffruitandveg.jpg" style="object-fit: cover; width: 100%; height: 100%" alt="Image">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h1 class="card-title">Login</h1>
                        <form method="POST" action="/authenticate">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="text" value="{{ old('email') }}" name="email" class="form-control @error('email') is-invalid @enderror" />
                                <div class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" />
                                <div class="text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="text-end">
                                <button class="btn btn-primary btn-lg" type="submit">Login</button>
                            </div>
                        </form>

                        <div class="text-left mt-3 text-muted">
                            <span>Don't have an account? <a href="/register" style="text-decoration: none; color: green;">Register Here</a></span>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>


<style>
    .card-header {
        background-color: inherit; /* Override default background color */
    }
</style>
