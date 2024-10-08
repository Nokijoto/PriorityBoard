@props(['task'])
<div class="kanban-item bg-white p-4 mb-4 rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 transform hover:scale-105">
    <h5 class="font-medium text-lg text-gray-800">{{ $task['name'] }}</h5>
    <p class="text-sm text-gray-500 mt-2">Ważność: <span class="font-semibold">{{ $task['importance'] ? 'Tak' : 'Nie' }}</span></p>
    <p class="text-sm text-gray-500">Pilność: <span class="font-semibold">{{ $task['urgency'] ? 'Tak' : 'Nie' }}</span></p>
    <div class="mt-2">
        <a href="{{ route('tasks.edit', $task['id']) }}" class="text-blue-500 hover:underline">Edytuj</a>
        <form action="{{ route('tasks.delete', $task['id']) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500 hover:underline">Usuń</button>
        </form>
    </div>
</div>
