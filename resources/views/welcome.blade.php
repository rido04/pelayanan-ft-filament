<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pelayanan - Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-br from-gray-700 to-neutral-800">
    <div class="w-full max-w-md p-8 mx-4">
        <div class="bg-white rounded-xl shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-amber-400 to-blue-400 p-6 text-center">
                <h1 class="text-3xl font-bold text-white">Halo!, Selamat Datang</h1>
                <p class="text-white mt-2 opacity-90">Sistem Pelayanan Online</p>
            </div>

            <div class="p-8">
                <p class="text-gray-600 mb-8 text-center">Silakan pilih login sesuai role Anda:</p>

                <div class="space-y-4">
                    <a href="/admin/login" class="flex items-center justify-between w-full bg-gradient-to-r from-amber-500 to-amber-700 hover:from-amber-600 hover:to-amber-800 text-white font-bold py-3 px-6 rounded-lg transition duration-300 transform hover:scale-105 hover:shadow-lg">
                        <span class="flex items-center">
                            <i class="fas fa-user-shield mr-3"></i>
                            Login sebagai Admin
                        </span>
                        <i class="fas fa-arrow-right"></i>
                    </a>

                    <a href="/cs/login" class="flex items-center justify-between w-full bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 text-white font-bold py-3 px-6 rounded-lg transition duration-300 transform hover:scale-105 hover:shadow-lg">
                        <span class="flex items-center">
                            <i class="fas fa-headset mr-3"></i>
                            Login sebagai Staff CS
                        </span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="mt-10 text-center text-sm text-gray-500">
                    <p>© 2025 Summarecon Serpong</p>
                    <p>All Right Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
