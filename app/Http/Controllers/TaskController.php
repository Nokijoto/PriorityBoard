<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Services\TaskService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    private $taskService;
    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index(Request $request)
    {

        try {
            $user = auth()->user();
            if ($user) {
                $tasks = $this->taskService->getTasksByStatus($user);
                return view('tasks.index', ['tasks' => $tasks]);
            } else {
                return redirect()->route('login')->withErrors('Musisz być zalogowany, aby zobaczyć zadania.');
            }
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->route('login')->withErrors('Musisz być zalogowany, aby zobaczyć zadania.');
        }
    }

    public function create(Request $request)
    {

        return view('tasks.form');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
            'importance' => 'required|boolean',
            'urgency' => 'required|boolean',
            'description' => 'nullable',
        ]);

        $isCreated = $this->taskService->createTask([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'importance' => (int) $request->importance,
            'urgency' => (int) $request->urgency,
        ]);

        if ($isCreated) {
            return redirect()->route('tasks')->with('success', 'Zadanie zostało utworzone pomyślnie.');
        } else {
            return redirect()->back()->with('error', 'Nie udało się utworzyć zadania. Spróbuj ponownie.')->withInput();
        }
    }
    public function update(Request $request, $taskId)
    {
        $request->validate([
            'name' => 'required',
            'importance' => 'required|boolean',
            'urgency' => 'required|boolean',
        ]);

        $task = $this->taskService->getTask($taskId);
        $this->taskService->updateTask([
            'id' => $taskId,
            'name' => $request->name,
            'completed' => $request->completed,
            'importance' => $request->importance,
            'urgency' => $request->urgency,
        ]);
        dd($task);
        $task->save();

        return redirect()->route('tasks');
    }
    public function edit(Request $request, $taskId)
    {
        $task = $this->taskService->getTask($taskId);
        return view('tasks.form', compact('task'));
    }

    public function delete(Request $request, $taskId)
    {
        $task =$this->taskService->getTask($taskId);
        if ($this->taskService->deleteTask($taskId)) {
            return redirect()->route('tasks');
        }
        return redirect()->route('tasks');
    }

    public function show(Request $request, $taskId)
    {
        $task = $this->taskService->getTask($taskId);
        return view('tasks.show', compact('task'));
    }
}
