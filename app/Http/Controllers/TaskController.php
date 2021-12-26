<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return TaskResource
     */
    public function index()
    {
        if (\request()->has('filter')){

            if (\request()->get('filter') === 'active'){
                return Task::orderBy('created_at', 'desc')->whereNull('done')->get();
            }

            if (\request()->get('filter') === 'completed'){
                return Task::orderBy('created_at', 'desc')->whereNotNull('done')->get();
            }

        }

        return Task::orderBy('created_at', 'desc')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required'
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors());
        }

        $task = Task::create($request->all());

        return response(['task' => new TaskResource($task), 'message' => 'Task created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return $task;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $validator = Validator::make($request->all(),[
            'done' => 'required'
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors());
        }

        $task->done = $request->done ? Carbon::now() : null;
        $task->save();

        return $task;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return ['message' => 'Task deleted successfully'];
    }
}
