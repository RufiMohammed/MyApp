<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller as Controller;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Task as TaskResources;
use App\Http\Controllers\API\BaseController as BaseController;

use function PHPUnit\Framework\isNull;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $task = Task::all();
        return $this->sendResponse(TaskResources::collection($task),
          'All Task Sent');
    }

    public function store(Request $request)
    {
        $input =$request->all();
        $validator = Validator::make($input , [
            'list_id '=>'required',
            'titel'=>'required',
            'due_date'=>'required',
            'description'=>'required',
            'status'=>'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Please validate error' ,$validator->errors() );
        }
        $task = Task::create($input);
        return $this->sendResponse(new TaskResources($task) ,'Task Created Successfully' );
    }

    public function show($id)
    {
        $task = Task::find($id);
        if(isNull($task)){
            return $this->sendError('Task not Found');
        }
        return $this->sendResponse(new TaskResources($task) ,'Task Found Successfully' );


    }

    public function update(Request $request, Task $task)
    {
        $input =$request->all();
        $validator = Validator::make($input , [
            'list_id '=>'required',
            'titel'=>'required',
            'due_date'=>'required',
            'description'=>'required',
            'status'=>'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Please validate error' ,$validator->errors() );
        }
        $task->name = $input['name'];
        $task->titel = $input['titel'];
        $task->due_date = $input['due_date'];
        $task->description = $input['description'];
        $task->status = $input['status'];
        return $this->sendResponse(new TaskResources($task) ,'Task Update Successfully' );
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return $this->sendResponse(new TaskResources($task) ,'Task Deleted Successfully' );

    }
}
