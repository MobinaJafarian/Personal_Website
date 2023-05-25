<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ApplicationStatus;
use App\Http\Controllers\Controller;
use App\Models\ApplicationTracker as ModelsApplicationTracker;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class ApplicationTracker extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = ModelsApplicationTracker::all();
        return view('admin.applicationTracker.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $applicationStatus = ApplicationStatus::cases();
        return view('admin.applicationTracker.create', compact('applicationStatus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $inputs = $request->all();
        // $application = ModelsApplicationTracker::create($inputs);


        $request->validate([
            'company_name' => ['required'],
            'job_title' => ['required'],
            'salary' => ['required'],
            'location' => ['required'],
            // 'link' => ['required'],
            // 'note' => ['required'],
            // 'todo' => ['required'],
            'status' => 'required|in:wishlist,wantToApply,applied,interview,offer,rejected'
            
        ]);


        $application = ModelsApplicationTracker::create([
            'title' => $request->title,
            'company_name' => $request->company_name,
            'job_title' => $request->job_title,
            'salary' => $request->salary,
            'location' => $request->location,
            'link' => $request->link,
            'note' => $request->note,
            'todo' => $request->todo,
            // 'file' => $request->file,
            'status' => $request->status,
        ]);

        return redirect()->route('applicationTracker.index');


        



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $application = ModelsApplicationTracker::findOrFail($id);
        return view('admin.applicationTracker.edit', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $application = ModelsApplicationTracker::findOrFail($id);
        $result = $application->delete();

        return redirect()->route('applicationTracker.index')->with('swal-success', 'Your blog has been successfully deleted');
    }
}
