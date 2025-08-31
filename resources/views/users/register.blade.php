<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link rel="preload" href="{{ asset('dist/css/adminlte.css') }}" as="style" /> --}}
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">
    {{-- fonts --}}
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="col-md-4">
        <form method="POST" action="{{ route('register.submit') }}" class="border p-4 rounded shadow">
            @csrf

            <h3 class="text-center mb-4">Register</h3>

            <div class="mb-3">
                <label for="username" class="form-label">User Name</label>
                <input type="text" name="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="text-center mb-3">
                <button class="btn btn-primary w-100" type="submit">Register</button>
            </div>
        </form>
    </div>
</div>

</body>
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
</html>
