<?php

namespace App\Http\Controllers;

use App\Models\tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    public function index()
    {
        $Task = tasks::all();
        return view('user.allTasks', compact('Task'));
    }

    public function passID($employeeID)
    {
        $collection = tasks::where('employeeID', $employeeID)->first();
        return view('user.addTask', compact('collection'));
    }

    public  function passNewID($passEmpID)
    {
        $task = $passEmpID;
        return view('user.addTask', compact('task'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'taskName' => 'required',
            'taskDesc' => 'required',
        ]);

        $task = new tasks();
        $employeeID = $request->input('employeeID');
        $EmpEmployeeID = $request->input('EmpEmployeeID');

        if (!empty($employeeID))
            $task->employeeID = $employeeID;

        else
            $task->employeeID = $EmpEmployeeID;

        $task->taskName = $request->taskName;
        $task->taskDesc = $request->taskDesc;
        $task->taskStatus = $request->input('taskStatus');

        $res = $task->save();
        if ($res)
            return back()->with('success', 'Task have added successfully.');
        else
            return back()->with('fail', 'Something went wrong.');
    }

    public function show($employeeID)
    {
        $passEmpID = $employeeID;
        $collection = tasks::where('employeeID', $employeeID)->first();
        $Task = DB::table('tasks')
            ->join('employees', 'tasks.employeeID', '=', 'employees.employeeID')
            ->where('tasks.employeeID', '=', $employeeID)
            ->select(
                'tasks.taskName',
                'tasks.taskDesc',
                'tasks.taskStatus',
                'tasks.id',
            )
            ->get();

        if ($Task->isEmpty())
            return view('user.emptyTask', compact('passEmpID'));

        return view('user.tasks', compact('Task', 'collection'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function edit(tasks $tasks)
    {
        //
    }

    public function updateStatus(Request $request, $id)
    {
        $update = tasks::where('id', $id)
            ->update(['taskStatus' => $request->input('taskStatus')]);

        if ($update)
            return redirect()->back();
    }

    public function destroy($id)
    {
        tasks::find($id)->delete();
        return redirect()->back();
    }
}
