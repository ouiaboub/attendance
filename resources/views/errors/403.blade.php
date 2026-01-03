{{-- resources/views/errors/403.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 Forbidden</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(220, 38, 38, 0.5), 0 0 40px rgba(220, 38, 38, 0.3); }
            50% { box-shadow: 0 0 30px rgba(220, 38, 38, 0.7), 0 0 60px rgba(220, 38, 38, 0.5); }
        }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-10px); }
            75% { transform: translateX(10px); }
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .pulse-glow {
            animation: pulse-glow 2s infinite;
        }
        .shake {
            animation: shake 0.5s;
        }
        .float {
            animation: float 3s ease-in-out infinite;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-900 via-red-900 to-black min-h-screen flex items-center justify-center p-4 relative overflow-hidden">
    <!-- Animated background elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-red-600 rounded-full opacity-10 blur-3xl float"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-red-800 rounded-full opacity-10 blur-3xl" style="animation: float 4s ease-in-out infinite;"></div>
    </div>

    <div class="relative z-10 bg-gradient-to-b from-gray-900 to-gray-950 shadow-2xl rounded-2xl max-w-2xl w-full text-center p-6 sm:p-8 md:p-12 border-2 border-red-600 pulse-glow">
        <!-- Warning Icon -->
        <div class="mb-4 sm:mb-6 flex justify-center">
            <svg class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 text-red-600 shake" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
        </div>

        <!-- Error Code -->
        <h1 class="text-6xl sm:text-7xl md:text-8xl font-black text-transparent bg-clip-text bg-gradient-to-r from-red-500 via-red-600 to-red-700 mb-3 sm:mb-4">
            403
        </h1>
        
        <!-- Warning Title -->
        <h2 class="text-xl sm:text-2xl md:text-3xl font-bold mb-3 sm:mb-4 text-red-500 uppercase tracking-wider">
            ⚠️ Access Denied ⚠️
        </h2>
        
        <!-- Warning Message -->
        <div class="bg-red-950 border-l-4 border-red-600 p-4 sm:p-5 md:p-6 mb-6 sm:mb-8 rounded-lg">
            <p class="text-red-200 text-base sm:text-lg font-semibold mb-2">
                🚫 RESTRICTED AREA 🚫
            </p>
            <p class="text-gray-400 text-sm sm:text-base">
                You have attempted to access a forbidden zone. This incident has been logged and monitored. 
                You do not have the required permissions to view this page.
            </p>
        </div>

        <!-- Additional Warning -->
        <div class="bg-yellow-950 border border-yellow-600 p-3 sm:p-4 mb-6 sm:mb-8 rounded-lg">
            <p class="text-yellow-400 text-xs sm:text-sm flex items-center justify-center gap-2 flex-wrap">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                </svg>
                <span>Unauthorized access attempts may result in account suspension</span>
            </p>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center">
            <a href="{{ url()->previous() }}" 
               class="inline-flex items-center justify-center gap-2 px-6 sm:px-8 py-3 sm:py-4 text-sm sm:text-base text-white bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 rounded-lg transition-all transform hover:scale-105 shadow-lg font-semibold">
                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Go Back
            </a>
            <a href="{{ url('/') }}" 
               class="inline-flex items-center justify-center gap-2 px-6 sm:px-8 py-3 sm:py-4 text-sm sm:text-base text-red-500 border-2 border-red-600 hover:bg-red-950 rounded-lg transition-all transform hover:scale-105 font-semibold">
                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Return Home
            </a>
        </div>

        <!-- Footer Warning -->
        <p class="mt-6 sm:mt-8 text-gray-500 text-xs sm:text-sm break-words">
            Error Code: FRB-403 | Timestamp: {{ now()->toDateTimeString() }}
        </p>
    </div>
</body>
</html>