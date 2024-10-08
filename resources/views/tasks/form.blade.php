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
                        <h1 class="text-4xl font-bold mb-6 text-center text-gray-800 dark:text-gray-100">
                            {{ isset($task) ? 'Aktualizuj zadanie' : 'Stwórz nowe zadanie' }}
                        </h1>

                        <form action="{{ isset($task) ? route('tasks.update', $task->id) : route('tasks.store') }}" method="POST" class="bg-gray-50 dark:bg-gray-700 shadow-lg rounded-lg px-8 pt-6 pb-8 mb-6">
                            @csrf
                            @if(isset($task))
                                @method('PUT')
                            @endif

                            <div class="mb-6">
                                <label for="name" class="block text-gray-700 dark:text-gray-200 text-lg font-semibold mb-2">Nazwa zadania:</label>
                                <input type="text" name="name" value="{{ isset($task) ? $task->name : old('name') }}" required class="w-full px-4 py-2 rounded-lg border-2 border-gray-300 dark:border-gray-600 focus:outline-none focus:border-cyan-500 text-gray-800 dark:text-gray-300 dark:bg-gray-800 transition">
                                @error('name')
                                <span class="text-red-500 text-sm italic">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="description" class="block text-gray-700 dark:text-gray-200 text-lg font-semibold mb-2">Opis:</label>
                                <textarea name="description" class="w-full h-28 px-4 py-2 rounded-lg border-2 border-gray-300 dark:border-gray-600 focus:outline-none focus:border-cyan-500 text-gray-800 dark:text-gray-300 dark:bg-gray-800 transition">{{ isset($task) ? $task->description : old('description') }}</textarea>
                                @error('description')
                                <span class="text-red-500 text-sm italic">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="status" class="block text-gray-700 dark:text-gray-200 text-lg font-semibold mb-2">Status:</label>
                                <select name="status" required class="w-full px-4 py-2 rounded-lg border-2 border-gray-300 dark:border-gray-600 focus:outline-none focus:border-cyan-500 text-gray-800 dark:text-gray-300 dark:bg-gray-800 transition">
                                    <option value="todo" {{ (isset($task) && $task->status == 'todo') ? 'selected' : '' }}>Do zrobienia</option>
                                    <option value="in_progress" {{ (isset($task) && $task->status == 'in_progress') ? 'selected' : '' }}>W toku</option>
                                    <option value="done" {{ (isset($task) && $task->status == 'done') ? 'selected' : '' }}>Zakończone</option>
                                </select>
                                @error('status')
                                <span class="text-red-500 text-sm italic">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-lg font-semibold mb-2">Priorytet zadania (Macierz Eisenhowera):</label>
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

                            <input type="hidden" id="importance" name="importance" value="{{ isset($task) ? $task->importance : '' }}">
                            <input type="hidden" id="urgency" name="urgency" value="{{ isset($task) ? $task->urgency : '' }}">

                            <div class="flex items-center justify-center mb-6">
                                <button type="submit" class="bg-cyan-500 hover:bg-cyan-600 text-white font-bold py-2 px-6 rounded-lg focus:outline-none focus:ring-4 focus:ring-cyan-300 transition">
                                    {{ isset($task) ? 'Aktualizuj' : 'Utwórz' }} zadanie
                                </button>
                            </div>
                        </form>

                        <!-- Formularz usuwania zadania -->
                        @if(isset($task))
                            <form action="{{ route('tasks.delete', $task->id) }}" method="POST" class="text-center mt-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-6 rounded-lg focus:outline-none focus:ring-4 focus:ring-red-300 transition">
                                    Usuń zadanie
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
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
            document.getElementById('importance').value = this.getAttribute('data-importance');
            document.getElementById('urgency').value = this.getAttribute('data-urgency');
        });
    });
</script>
