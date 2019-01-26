<?php

namespace FileInviteExam\Http\Controllers;

use Illuminate\Http\Request;
use FileInviteExam\Task;

class TaskController extends Controller
{
    public function fetchAll()
    {
        $tasks = Task::select([
            'id',
            'item',
            'due_date',
            'is_completed'
        ])
        ->orderBy('id', 'DESC')
        ->get();

        if (!empty($tasks))
        {
            return response()->json([
                'success' => true,
                'tasks' => $tasks->toArray()
            ]);
        }

        return response()->json([
            'success' => false
        ]);
    }

    public function fetchOne(Request $request, $id)
    {
        $task = Task::find($id);
        if (!is_null($task))
        {
            return response()->json([
                'success' => true,
                'task' => $task->toArray()
            ]);
        }

        return response()->json([
            'success' => false
        ]);
    }

    public function saveTask(Request $request)
    {
        dd($request->all());
        $item = $request->item;
        $due_date = null;
        if ($request->has('due_date'))
        {
            $due_date = $request->due_date;
        }
        $task = Task::createTask(
                    $item,
                    $due_date
                );

        if ($task !== false)
        {
            return response()->json([
                'success' => true,
                'task' => $task->toArray()
            ]);
        }

        return response()->json([
            'success' => false
        ]);
    }

    public function updateTask(Request $request)
    {
        $task_id = $request->task_id;
        $item = $request->item;
        $due_date = null;
        $is_completed = false;
        if ($request->has('due_date'))
        {
            $due_date = $request->due_date;
        }
        if ($request->has('is_completed'))
        {
            $is_completed = $request->is_completed;
        }
        $task = Task::updateTask(
            $task_id,
            $item,
            $due_date,
            $is_completed
        );

        if ($task !== false)
        {
            return response()->json([
                'success' => true,
                'task' => $task->toArray()
            ]);
        }

        return response()->json([
            'success' => false
        ]);
    }

    public function completeTask(Request $request)
    {
        $task = Task::find($request->task_id);
        if (!is_null($task))
        {
            $task->setCompleted();
            return response()->json([
                'success' => true
            ]);
        }

        return response()->json([
            'success' => false
        ]);
    }

    public function negateCompleteTask(Request $request)
    {
        $task = Task::find($request->task_id);
        if (!is_null($task))
        {
            $task->setNotCompleted();
            return response()->json([
                'success' => true
            ]);
        }

        return response()->json([
            'success' => false
        ]);
    }
}
