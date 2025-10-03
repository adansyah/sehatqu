<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body
    style="font-family: 'Roboto', sans-serif; background-color: #f0f0f0; display: flex; justify-content: center; align-items: center; height: 100vh;">
    @include('sweetalert::alert')
    <div
        style="width: 100%; max-width: 400px; background-color: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
        <h2 style="text-align: center; margin-bottom: 20px; color: #333;">Register</h2>
        <form action="/saveregis" method="post">
            @csrf
            <div style="margin-bottom: 20px;">
                <label for="name"
                    style="display: block; margin-bottom: 8px; font-weight: bold; color: #333;">Nama:</label>
                <input type="text" id="name" name="name"
                    style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px;" required>
            </div>
            <div style="margin-bottom: 20px;">
                <label for="email"
                    style="display: block; margin-bottom: 8px; font-weight: bold; color: #333;">Email:</label>
                <input type="email" id="email" name="email"
                    style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px;" required>
            </div>
            <div style="margin-bottom: 20px;">
                <label for="password"
                    style="display: block; margin-bottom: 8px; font-weight: bold; color: #333;">password:</label>
                <input type="password" id="password" name="password"
                    style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px;" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</body>
<script src="sweetalert2.all.min.js"></script>

</html>
