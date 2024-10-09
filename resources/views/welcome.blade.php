@php use Carbon\Carbon;
$now = Carbon::now();
@endphp
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Priority Board</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased font-sans bg-red-500/20 text-black dark:bg-gray-700 dark:text-white">

<div class="relative min-h-screen flex flex-col items-center justify-center">
    <div class="relative w-full max-w-6xl px-6 lg:px-8">
        <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
            <div class="flex items-center lg:justify-start col-span-1">
                <img src="{{ asset('image.svg') }}" alt="Logo" class="w-8 h-8">
                <h2 class="text-2xl font-bold ml-2">Priority Board</h2>
            </div>
            @if (Route::has('login'))
                <div class="lg:col-start-3 lg:justify-end col-span-2 flex justify-end">
                    <livewire:welcome.navigation />
                </div>
            @endif
        </header>


        <main class="mt-6">
            <section class="bg-gradient-to-b from-gray-200 to-gray-500 text-center py-20 rounded-lg shadow-lg transition-transform transform hover:scale-105 mt-4 mb-12">
                <div class="container mx-auto pb-3">
                    <h2 class="text-4xl font-bold mb-8 transition-colors duration-300 hover:text-blue-600">Zarządzaj zadaniami efektywnie</h2>
                    <p class="text-lg mb-8 text-white-700">Priorytetyzuj i organizuj zadania przy użyciu macierzy Eisenhowera oraz tablicy Kanban.</p>
                    <div class="flex justify-center mt-4">
                        <a href="/register" class="inline-block bg-red-500/20 text-white py-2 px-4 rounded-full shadow hover:bg-red-500 transition duration-200">Rozpocznij teraz</a>
                    </div>
                </div>
            </section>


            <section id="features" class="bg-gradient-to-b from-gray-300 to-gray-400 py-20 mt-4">
                <div class="container mx-auto">
                    <h2 class="text-3xl font-bold text-center mb-12">Funkcje aplikacji</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="grid grid-cols-2 gap-8">
                            <div class="p-6 bg-gradient-to-b rounded-lg shadow transition-transform transform hover:scale-105">
                                <h3 class="text-2xl font-semibold mb-4">Pilne i ważne</h3>
                                <p>Umożliwia dodawanie, aktualizowanie i usuwanie zadań, które muszą być wykonane natychmiast. Te zadania mają najwyższy priorytet i wpływają na osiągnięcie celów.</p>
                            </div>
                            <div class="p-6 bg-gradient-to-b rounded-lg shadow transition-transform transform hover:scale-105">
                                <h3 class="text-2xl font-semibold mb-4">Niepilne, ale ważne</h3>
                                <p>Funkcja do planowania zadań, które są istotne, ale nie wymagają natychmiastowego działania. Idealne do długoterminowych projektów i celów.</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-8">
                            <div class="p-6 bg-gradient-to-b rounded-lg shadow transition-transform transform hover:scale-105">
                                <h3 class="text-2xl font-semibold mb-4">Pilne, ale mniej ważne</h3>
                                <p>Zadania, które wymagają szybkiej reakcji, ale nie mają dużego wpływu na długoterminowe cele. Umożliwia efektywne zarządzanie czasem.</p>
                            </div>
                            <div class="p-6 bg-gradient-to-b rounded-lg shadow transition-transform transform hover:scale-105">
                                <h3 class="text-2xl font-semibold mb-4">Niepilne i mniej ważne</h3>
                                <p>Możliwość dodawania zadań, które można wykonać w wolnym czasie. Idealne do zadań, które nie mają wpływu na bieżące projekty.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section id="about" class="bg-gradient-to-b from-gray-400 to-gray-500 py-20 mt-8">
                <div class="container mx-auto">
                    <h2 class="text-3xl font-bold text-center mb-8">O nas</h2>
                    <p class="text-lg text-center mx-auto max-w-2xl">ToDo Matrix Kanban to nowoczesne narzędzie do zarządzania zadaniami, które łączy dwa najskuteczniejsze podejścia do organizacji pracy: macierz Eisenhowera oraz tablicę Kanban. Aplikacja jest idealnym rozwiązaniem dla osób, które chcą poprawić swoją produktywność i lepiej zarządzać swoim czasem.</p>
                </div>
            </section>
        </main>


        <footer class="py-16 text-center text-sm text-black dark:text-white/70">
            <p class="text-gray-500 dark:text-gray-400">© {{$now->year}} XXXX. All rights reserved.</p>
        </footer>
    </div>
</div>
</body>
</html>
