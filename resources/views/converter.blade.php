<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Converter</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white flex justify-center items-center h-screen">
    <div class="bg-gray-800 p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Crypto Converter</h1>

        @if(session('error'))
            <p class="text-red-500">{{ session('error') }}</p>
        @endif

        <form action="{{ route('convert') }}" method="POST" class="space-y-4">
            @csrf
            <input type="text" name="from_currency" placeholder="Enter Crypto ID (e.g. bitcoin)" required class="w-full p-2 rounded bg-gray-700 text-white">
            <input type="text" name="to_currency" placeholder="Enter Currency (e.g. usd)" required class="w-full p-2 rounded bg-gray-700 text-white">
            <input type="number" name="amount" placeholder="Amount" required class="w-full p-2 rounded bg-gray-700 text-white">
            <button type="submit" class="bg-blue-500 px-4 py-2 rounded w-full">Convert</button>
        </form>

        @if(isset($convertedAmount))
            <p class="mt-4 text-lg"> {{ $amount }} {{ strtoupper($from) }} = {{ $convertedAmount }} {{ strtoupper($to) }}</p>
        @endif
    </div>
</body>
</html>
