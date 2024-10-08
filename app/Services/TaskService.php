<?php

namespace App\Services;

use App\Enums\TaskStatus;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Log;

class TaskService
{
    public function getAllTasks($userId,$property=null) : array
    {
        try {
            return Task::where('user_id', $userId)->get()->toArray();
        } catch (\Exception $e) {
            Log::error($e);
            return [];
        }
    }
    public function getTask($taskId) : Task|null
    {
       try {
            return Task::findOrFail($taskId);
       } catch (\Exception $e) {
            Log::error($e);
            return null;
       }
    }
    public function createTask($taskData): bool
    {
        try {
            Task::create([
                'name' => $taskData['name'],
                'status' => $taskData['status'],
                'description' => $taskData['description'],
                'importance' => $taskData['importance'],
                'urgency' => $taskData['urgency'],
                'user_id' => $taskData['user_id'],
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ]);
            return true;
        } catch (\Exception $e) {
            Log::error($e);
            return false;
        }
    }

    public function updateTask($taskData) : bool
    {

        try {
            $task = Task::findOrFail($taskData['id']);
            $task->name = $taskData['name'];
            $task->description = $taskData['description'];
            $task->status = $taskData['status'];
            $task->importance = $taskData['importance'];
            $task->urgency = $taskData['urgency'];
            $task->updated_at = Carbon::now();
            dd($task);
            $task->save();
            return true;
        } catch (\Exception $e) {
            Log::error($e);
            return false;
        }
    }

    public function deleteTask($taskId) : bool
    {

        try {
            $task = Task::findOrFail($taskId);
            if ($task->user_id !== User::getActualUser()->id) {
                return false;
            }
            $task->delete();
            return true;
        } catch (\Exception $e) {
            Log::error($e);
            return false;
        }

    }
    public function getTasksByStatus(User|Authenticatable $user)
    {
        return [
            TaskStatus::todo->value => Task::where('user_id', $user->id)->where('status', TaskStatus::todo->value)->get()->toArray(),
            TaskStatus::in_progress->value => Task::where('user_id', $user->id)->where('status', TaskStatus::in_progress->value)->get()->toArray(),
            TaskStatus::done->value => Task::where('user_id', $user->id)->where('status', TaskStatus::done->value)->get()->toArray(),
        ];
    }

}
