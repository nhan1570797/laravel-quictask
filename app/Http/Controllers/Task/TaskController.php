<?php

namespace App\Http\Controllers\Task;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Http\Controllers\Controller;
use Auth;

class TaskController extends Controller
{

    public function __construct(Task $modelTask)
    {
        $this->modelTask = $modelTask;
    }

    public function index()
    {
        $tasks = $this->modelTask->paginate(config('settings.row_count'));

        return view('task', compact('tasks'));
    }

    public function store(TaskRequest $request)
    {
        $arItem = [
            'name' => $request->name,
            'user_id' => Auth::user()->id,
        ];

        try {
            $this->modelTask->create($arItem);
            $messages = trans('messages.success');
        } catch (Exception $e) {
            $messages = trans('messages.failure');
        }

        return redirect()->action('Task\TaskController@index')->with('msg', $messages);
    }

    public function show($id)
    {
        try {
            $task = Task::findOrFail($id);
            $task->delete();
            $messages = trans('messages.delete');
        } catch (Exception $e) {
            $messages = trans('messages.delete_task');
        }

        return redirect()->action('Task\TaskController@index')->with('msgs', $messages);
    }
}
