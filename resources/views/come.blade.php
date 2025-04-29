<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قريبًا | محمد صادق زهير</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-black min-h-screen flex items-center justify-center">

    <div class="text-center space-y-8 px-4">
        <!-- الاسم -->
        <h1 class="text-4xl md:text-6xl font-bold text-amber-500 mb-4 animate-pulse">
            محمد صادق زهير
        </h1>

        <!-- العنوان الرئيسي -->
        <div class="relative inline-block">
            <h2 class="text-3xl md:text-5xl text-amber-400 font-bold relative z-10">
                قريبًا
            </h2>
            <div class="absolute inset-0 bg-amber-500 blur-2xl opacity-30 animate-pulse"></div>
        </div>

        <!-- الوصف -->
        <p class="text-gray-400 max-w-2xl mx-auto text-lg md:text-xl leading-relaxed">
            مشروعي القادم قيد التطوير حالياً.. شكراً لاهتمامكم
        </p>

        <!-- الخط الفاصل -->
        <div class="w-24 h-1 bg-amber-500 mx-auto rounded-full"></div>

        <!-- وسائل التواصل -->
        <div class="flex justify-center space-x-6 mt-8">
            <a href="https://github.com/gmhamf"
               class="text-amber-500 hover:text-amber-400 text-2xl transition-colors"
               target="_blank">
                <i class="fab fa-github"></i>
            </a>
            <a href="https://www.linkedin.com/in/mohammed-sadeq-zuhair-sadeq-1aa6112b7/"
               class="text-amber-500 hover:text-amber-400 text-2xl transition-colors"
               target="_blank">
                <i class="fab fa-linkedin"></i>
            </a>
        </div>
    </div>

    <style>
        @keyframes subtle-glow {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }
        .animate-pulse {
            animation: subtle-glow 2s ease-in-out infinite;
        }
    </style>

</body>
</html>
