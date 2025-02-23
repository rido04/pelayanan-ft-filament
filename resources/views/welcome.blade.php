<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">

    <div class="bg-white p-8 rounded-lg shadow-lg text-center">
        <h1 class="text-2xl font-bold mb-4">Selamat Datang</h1>
        <p class="mb-6">Silakan pilih login sebagai:</p>

        <a href="/admin/login" class="block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-2">
            Login sebagai Admin
        </a>

        <a href="/cs/login" class="block bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
            Login sebagai Staff CS
        </a>
    </div>

</body>
</html>
