<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Login & Register Form</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }

        .card {
            width: 350px;
        }
    </style>
</head>

<body>
    <div class="card shadow p-4">
        <h2 id="formTitle" class="text-center">Register</h2>
        <form action="{{ route('register.store') }}" method="POST">
            @csrf
            <div class="mb-3" id="usernameGroup">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
        <p class="text-center mt-3">
            <a href="{{ route('login.index') }}" class="text-decoration-none">Have an account? Login</a>
        </p>
    </div>
    @vite('resources/js/app.js')
</body>

</html>
