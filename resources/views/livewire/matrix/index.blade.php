@props(['tasks'])
<div class="container mx-auto p-6 bg-gray-50 rounded-lg shadow-lg">
    <h1 class="text-4xl font-extrabold text-center mb-8 text-gray-800">Matryca Eisenhowera</h1>
    <div class="grid grid-cols-2 gap-4">
        <div class="p-4 bg-gradient-to-b from-blue-100 to-blue-50 rounded-xl shadow-lg">
            <h3 class="text-2xl font-semibold mb-4 text-blue-600">Ważne i Pilne</h3>
            @foreach ($tasks as $task)
                @if ($task['importance'] && $task['urgency'])
                    <livewire:matrix.task :task="$task" :key="$task['id']" />
                @endif
            @endforeach
        </div>

        <div class="p-4 bg-gradient-to-b from-yellow-100 to-yellow-50 rounded-xl shadow-lg">
            <h3 class="text-2xl font-semibold mb-4 text-yellow-600">Ważne, ale Niepilne</h3>
            @foreach ($tasks as $task)
                @if ($task['importance'] && !$task['urgency'])
                    <livewire:matrix.task :task="$task" :key="$task['id']" />
                @endif
            @endforeach
        </div>

        <div class="p-4 bg-gradient-to-b from-green-100 to-green-50 rounded-xl shadow-lg">
            <h3 class="text-2xl font-semibold mb-4 text-green-600">Nieważne, ale Pilne</h3>
            @foreach ($tasks as $task)
                @if (!$task['importance'] && $task['urgency'])
                    <livewire:matrix.task :task="$task" :key="$task['id']" />
                @endif
            @endforeach
        </div>

        <div class="p-4 bg-gradient-to-b from-red-100 to-red-50 rounded-xl shadow-lg">
            <h3 class="text-2xl font-semibold mb-4 text-red-600">Nieważne i Niepilne</h3>
            @foreach ($tasks as $task)
                @if (!$task['importance'] && !$task['urgency'])
                    <livewire:matrix.task :task="$task" :key="$task['id']" />
                @endif
            @endforeach
        </div>
    </div>
</div>
