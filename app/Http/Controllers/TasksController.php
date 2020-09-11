<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Tasks::all();
        return response($tasks, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(Request $request)
    public function store()
    {
        Tasks::create([
            'responsable' => request('responsable'),
            'description' => request('description')
        ]);

        /*$task = new Tasks;
        $task->responsable = $request->responsable;
        $task->description = $request->description;
        $task->save();*/

        /*$task = Tasks::create($request->all());
        return $task;*/

        return response()->json([
            "message" => "task created"
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        if(Tasks::where('id', $id)->exists()){
            $task = Tasks::findOrFail($id);
            return $task;
        }else{
            return response()->json([
                "message" => "task not found"
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function edit(Tasks $tasks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if(Tasks::where('id', $id)->exists()){
            $task = Tasks::findOrFail($id);

            $task->responsable = is_null($request->responsable) ? $task->responsable : $request->responsable;
            $task->description = is_null($request->description) ? $task->description : $request->description;
            $task->save();

            return response()->json([
                "message" => "task updated"
            ], 200);
        }else{
            return response()->json([
                "message" => "task not found"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(Tasks::where('id', $id)->exists()){
            //Tasks::destroy($id);
            $task = Tasks::findOrFail($id);
            $task->delete();

            return response()->json([
                "message" => "task deleted"
            ], 202);
        }else{
            return response()->json([
                "message" => "task not found"
            ], 404);
        }
    }
}
