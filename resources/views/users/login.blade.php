<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    {{-- <link rel="preload" href="{{ asset('dist/css/adminlte.css') }}" as="style" /> --}}
    {{-- <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('dist/css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
    {{-- fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Battambang:wght@100;300;400;700;900&family=Hanuman:wght@100..900&family=Noto+Sans+Khmer:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
<div class="container">
        <!-- Login Form -->
        <div class="form-box login">
            <form action="{{ route('login.submit') }}" method="POST">
                @csrf
                <h1>ចូលប្រព័ន្ធ</h1>
                <div class="input-box">
                    <input type="text" name="username" placeholder="ឈ្មោះអ្នកប្រើ" required>
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="លេខសម្ងាត់" required>
                    <i class="fa-solid fa-lock"></i>
                </div>
                <div class="forgot-link">
                    <a href="#">ភ្លេចលេខសម្ងាត់</a>
                </div>
                <button class="btn" type="submit">ចូល</button>
                <p>ចូលតាមរយៈកម្មវិធីខាងក្រោម</p>
                <div class="social-icons">
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-telegram"></i></a>
                    <a href="#"><i class="fa-brands fa-swift"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                </div>
            </form>
        </div>

        <!-- Register Form -->
        <div class="form-box register">
                <form action="{{ route('register.submit') }}" method="POST">
                    @csrf
                    <h1>បង្កើតគណនីថ្មី</h1>
                    <div class="input-box">
                        <input type="text" name="username" placeholder="ឈ្មោះអ្នកប្រើ" required>
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="input-box">
                        <input type="email" name="email" placeholder="អ៊ីមែល" required>
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div class="input-box">
                        <input type="password" name="password" placeholder="លេខសម្ងាត់" required>
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <button class="btn btn-success" type="submit">បង្កើត</button>
                    <p>ចូលតាមរយៈកម្មវិធីខាងក្រោម</p>
                    <div class="social-icons">
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-telegram"></i></a>
                        <a href="#"><i class="fa-brands fa-swift"></i></a>
                        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                    </div>
                </form>
        </div>

        <!-- Toggle Box -->
        <div class="toggle-box"></div>

        <!-- Toggle Box Left -->
        <div class="toggle-panel toggle-left">
            <h1>ប្រព័ន្ធគ្រប់គ្រងហាង សារុំ</h1>
            <p>តើមានគណនីរួចហើយឬនៅ?</p>
            <button class="btn register-btn">បង្កើតគណនីថ្មី</button>
        </div>

        <!-- Toggle Box right -->
        <div class="toggle-panel toggle-right">
            <h1>ប្រព័ន្ធគ្រប់គ្រងហាង សារុំ</h1>
            <p>តើមានគណនីរួចហើយឬនៅ?</p>
            <button class="btn login-btn">ចូលប្រព័ន្ធ</button>
        </div>
    </div>
</body>
    {{-- sweetalert --}}
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if(session('failed'))
        Swal.fire({
            position: "center",
            icon: "error",
            text: "{{ session('failed')}}",
            showConfirmButton: false,
            timer: 2500
        });
    @endif
</script>
{{-- <script src="{{ asset('dist/js/adminlte.js') }}"></script> --}}
<script src="{{ asset('dist/js/login.js') }}"></script>
</html>


