<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function all(Request $request){
        $validate = $request->validate([
            $page = 'integer|min:1',
            $limit = 'integer|min:1',
        ]);

        $task = Task::where('user_id', auth()->user()->user_id)
            ->paginate($request->get('limit', 10));

        return response()->json([
            'data' => $task->items(),
            'page' => $task->currentPage(),
            'limi' => $task->perPage(),
            'total' => $task->total()
        ]);
    }

    public function create(Request $request){
        $validate = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        $task = Task::create([
            'title' => $validate['title'],
            'description' => $validate['description'],
            'user_id' => auth()->user()->user_id
        ]);

        return response()->json([
            'message' => 'Task created',
            'task' => $task
        ]);
    }

    public function update(Request $request, $id){
        $task = Task::find($id);

        if(!$task){
            return response()->json([
                'message' => 'Task not found or inexistent :((('
            ], 404);
        }

        $validate = $request->validate([
            'title' => 'sometimes|string',
            'description' => 'sometimes|string',
        ]);

        $task->update($validate);

        return response()->json([
            'message' => 'Task updated',
            'task' => $task
        ]);
    }

    public function delete($id){
        $task = Task::find($id);

        if(!$task){
            return response()->json([
                'message' => 'Task not found or inexistent :((('
            ], 404);
        }

        $task->delete();

        return response()->json([
            'message' => 'Task deleted',
            'task' => $task
        ]);
    }
}
