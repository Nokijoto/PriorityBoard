<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white dark:bg-gray-800 shadow-lg sm:rounded-lg">
                <div class="max-w-3xl mx-auto">
                    @if(session('success'))
                        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-4">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="container mx-auto">
                        <h1 class="text-4xl font-bold mb-6 text-center text-gray-800 dark:text-gray-100">Stwórz nowe zadanie</h1>

                        <form action="{{ route('tasks.store') }}" method="POST" class="bg-gray-50 dark:bg-gray-700 shadow-lg rounded-lg px-8 pt-6 pb-8 mb-6">
                            @csrf

                            <div class="mb-6">
                                <label for="name" class="block text-gray-700 dark:text-gray-200 text-lg font-semibold mb-2">Nazwa zadania:</label>
                                <input type="text" id="name" name="name" required class="w-full px-4 py-2 rounded-lg border-2 border-gray-300 dark:border-gray-600 focus:outline-none focus:border-cyan-500 text-gray-800 dark:text-gray-300 dark:bg-gray-800 transition">
                                @error('name')
                                <span class="text-red-500 text-sm italic">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="description" class="block text-gray-700 dark:text-gray-200 text-lg font-semibold mb-2">Opis zadania:</label>
                                <textarea id="description" name="description" required class="w-full h-28 px-4 py-2 rounded-lg border-2 border-gray-300 dark:border-gray-600 focus:outline-none focus:border-cyan-500 text-gray-800 dark:text-gray-300 dark:bg-gray-800 transition"></textarea>
                                @error('description')
                                <span class="text-red-500 text-sm italic">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="status" class="block text-gray-700 dark:text-gray-200 text-lg font-semibold mb-2">Status:</label>
                                <select id="status" name="status" required class="w-full px-4 py-2 rounded-lg border-2 border-gray-300 dark:border-gray-600 focus:outline-none focus:border-cyan-500 text-gray-800 dark:text-gray-300 dark:bg-gray-800 transition">
                                    <option value="todo">Do zrobienia</option>
                                    <option value="in_progress">W toku</option>
                                    <option value="done">Zakończone</option>
                                </select>
                                @error('status')
                                <span class="text-red-500 text-sm italic">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Priorytet zadania (Macierz Eisenhowera):</label>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <button type="button" class="eisenhower-btn bg-gray-200 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" data-importance="1" data-urgency="1">Ważne i Pilne</button>
                                    </div>
                                    <div>
                                        <button type="button" class="eisenhower-btn bg-gray-200 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" data-importance="1" data-urgency="0">Ważne, ale Niepilne</button>
                                    </div>
                                    <div>
                                        <button type="button" class="eisenhower-btn bg-gray-200 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" data-importance="0" data-urgency="1">Nieważne, ale Pilne</button>
                                    </div>
                                    <div>
                                        <button type="button" class="eisenhower-btn bg-gray-200 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" data-importance="0" data-urgency="0">Nieważne i Niepilne</button>
                                    </div>
                                </div>
                                @error('importance')
                                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                                @enderror
                                @error('urgency')
                                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                                @enderror
                            </div>

                            <input type="hidden" id="importance" name="importance">
                            <input type="hidden" id="urgency" name="urgency">


                            <div class="flex items-center justify-center">
                                <button type="submit" class="bg-cyan-500 hover:bg-cyan-600 text-white font-bold py-2 px-6 rounded-lg focus:outline-none focus:ring-4 focus:ring-cyan-300 transition">
                                    Stwórz zadanie
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @if($errors->any())
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow-lg sm:rounded-lg">
                        <div class="max-w-xl">
                            <div class="bg-red-100 border-l-4 border-red-500 text-red-500 p-4 mb-4 rounded-lg">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <h3 class="text-sm font-medium">Błąd</h3>
                                        <ul class="mt-2 text-sm">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
<script>
    document.querySelectorAll('.eisenhower-btn').forEach(button => {
        button.addEventListener('click', function() {
            document.querySelectorAll('.eisenhower-btn').forEach(btn => {
                btn.classList.remove('bg-blue-700', 'text-white');
                btn.classList.add('bg-gray-200', 'text-black');
            });

            this.classList.add('bg-blue-700', 'text-white');
            this.classList.remove('bg-gray-200', 'text-black');

            document.getElementById('importance').value = this.dataset.importance;
            document.getElementById('urgency').value = this.dataset.urgency;
        });
    });


</script>
