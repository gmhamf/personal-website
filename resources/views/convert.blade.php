<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crypto Converter</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        @keyframes float {
            0% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0); }
        }
        .floating {
            animation: float 4s ease-in-out infinite;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-900 to-black text-white flex justify-center items-center min-h-screen relative overflow-hidden">

    <!-- خلفية الأيقونات العائمة -->
    <div class="absolute inset-0 flex justify-around opacity-20 pointer-events-none">
        <img src="{{ asset('img/binance-coin-bnb-logo.png') }}" class="w-20 h-20 floating">
        <img src="{{ asset('img/bitcoin-btc-logo.png') }}" class="w-16 h-16 floating">
        <img src="{{ asset('img/ethereum-eth-logo.png') }}" class="w-16 h-16 floating">
    </div>

    <!-- محتوى النموذج -->
    <div class="bg-gray-800 p-8 rounded-xl shadow-lg w-96 z-10">
        <h1 class="text-3xl font-bold mb-4 text-center text-blue-400 animate__animated animate__fadeInDown">Crypto Converter</h1>

        @if(session('error'))
            <p class="text-red-500 text-center animate__animated animate__shakeX">{{ session('error') }}</p>
        @endif

        <form action="{{ route('convert') }}" method="POST" class="space-y-4 animate__animated animate__fadeInUp">
            @csrf

            <input type="text" name="from_currency" placeholder="Enter Crypto ID (e.g. bitcoin)" required class="w-full p-2 rounded bg-gray-700 text-white">
            <input type="text" name="to_currency" placeholder="Enter Currency (e.g. usd)" required class="w-full p-2 rounded bg-gray-700 text-white">
            <input type="number" name="amount" placeholder="Amount" required class="w-full p-2 rounded bg-gray-700 text-white">

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded w-full transition duration-300 transform hover:scale-105">
                Convert
            </button>
        </form>

        @if(isset($convertedAmount))
            <p class="mt-4 text-lg text-center font-semibold text-green-400 animate__animated animate__pulse">
                {{ $amount }} {{ strtoupper($from) }} =
                {{ $convertedAmount }} {{ strtoupper($to) }}
            </p>
        @endif
    </div>
</body>
</html>
