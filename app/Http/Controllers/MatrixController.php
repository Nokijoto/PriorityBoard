<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MatrixController  extends Controller
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
                $tasks = $this->taskService->getAllTasks($user->id);
                return view('matrix.index', ['tasks' => $tasks]);
            } else {
                return redirect()->route('login')->withErrors('Musisz być zalogowany, aby zobaczyć zadania.');
            }
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->route('login')->withErrors('Musisz być zalogowany, aby zobaczyć zadania.');
        }
    }
}
