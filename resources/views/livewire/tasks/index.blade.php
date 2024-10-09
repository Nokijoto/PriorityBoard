@props(['tasks'])

<div class="container mx-auto p-6 bg-gray-50 rounded-lg shadow-lg">
    <h1 class="text-4xl font-extrabold text-center mb-8 text-gray-800">Kanban Board</h1>

    <div class="text-center mb-8">
        <a href="{{ route('tasks.create') }}" class="inline-block bg-gradient-to-r from-blue-500 to-blue-700 text-black font-bold py-3 px-6 rounded-full shadow-md hover:shadow-lg transition-all duration-200">
            + Dodaj zadanie
        </a>
    </div>

    <div class="flex gap-4">
        <!-- Kolumna "Do zrobienia" -->
        <div class="kanban-column flex-grow p-4 bg-gradient-to-b from-blue-100 to-blue-50 rounded-xl shadow-lg">
            <h3 class="text-2xl font-semibold mb-4 text-blue-600">Do zrobienia</h3>
            @if($tasks['todo'] == [])
                <p class="text-gray-500 italic">Brak zadań do zrobienia</p>
            @else
                @foreach($tasks['todo'] as $task)
                    <div class="kanban-item bg-white p-4 mb-4 rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 transform hover:scale-105">
                        <a href="{{ route('tasks.edit', $task['id']) }}" class="block">
                            <h5 class="font-medium text-lg text-gray-800">{{ $task['name'] }}</h5>
                            <p class="text-sm text-gray-500 mt-2">Ważność: <span class="font-semibold">{{ $task['importance'] }}</span></p>
                            <p class="text-sm text-gray-500">Pilność: <span class="font-semibold">{{ $task['urgency'] }}</span></p>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>

        <!-- Kolumna "W toku" -->
        <div class="kanban-column flex-grow p-4 bg-gradient-to-b from-yellow-100 to-yellow-50 rounded-xl shadow-lg">
            <h3 class="text-2xl font-semibold mb-4 text-yellow-600">W toku</h3>
            @if($tasks['in_progress'] == [])
                <p class="text-gray-500 italic">Brak zadań w toku</p>
            @else
                @foreach($tasks['in_progress'] as $task)
                    <div class="kanban-item bg-white p-4 mb-4 rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 transform hover:scale-105">
                        <a href="{{ route('tasks.edit', $task['id']) }}" class="block">
                            <h5 class="font-medium text-lg text-gray-800">{{ $task['name'] }}</h5>
                            <p class="text-sm text-gray-500 mt-2">Ważność: <span class="font-semibold">{{ $task['importance'] }}</span></p>
                            <p class="text-sm text-gray-500">Pilność: <span class="font-semibold">{{ $task['urgency'] }}</span></p>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>

        <!-- Kolumna "Zakończone" -->
        <div class="kanban-column flex-grow p-4 bg-gradient-to-b from-green-100 to-green-50 rounded-xl shadow-lg">
            <h3 class="text-2xl font-semibold mb-4 text-green-600">Zakończone</h3>
            @if($tasks['done'] == [])
                <p class="text-gray-500 italic">Brak zakończonych zadań</p>
            @else
                @foreach($tasks['done'] as $task)
                    <div class="kanban-item bg-white p-4 mb-4 rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 transform hover:scale-105">
                        <a href="{{ route('tasks.edit', $task['id']) }}" class="block">
                            <h5 class="font-medium text-lg text-gray-800">{{ $task['name'] }}</h5>
                            <p class="text-sm text-gray-500 mt-2">Ważność: <span class="font-semibold">{{ $task['importance'] }}</span></p>
                            <p class="text-sm text-gray-500">Pilność: <span class="font-semibold">{{ $task['urgency'] }}</span></p>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>


    </div>



</div>
