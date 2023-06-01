<style>
    .toggle-password-container {
        position: relative;
    }

    .toggle-password-container .form-check-label {
        position: absolute;
        top: 50%;
        right: 0;
        transform: translate(0, -50%);
        cursor: pointer;
    }

    .custom-border {
        border: 3px solid black;
    }

</style>

<x-layout>
    <div class="container mt-5">
        <div class="card custom-border">
            <div class="card-header custom-border">
                <h1 class="card-title text-left">Login</h1>
            </div>
            <div class="card-body custom-border">
                <form method="POST" action="/users/authenticate">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Username</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Enter your username here">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email here">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password here">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" id="togglePassword" class="form-check-input">
                                    <label class="form-check-label" for="togglePassword">Show Password</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success float-end">Login</button>
                    <div class="mt-3 text-left text-muted">
                        <span>Don't have an account? <a href="/register">Register here.</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

    <script>
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');
    
        togglePassword.addEventListener('change', function() {
            if (togglePassword.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
    </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#togglePassword').change(function() {
            const passwordInput = $('#password');
            passwordInput.attr('type', $(this).prop('checked') ? 'text' : 'password');
        });
    });
</script>


</x-layout>
