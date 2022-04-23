<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Category;
use App\Models\Education;
use App\Models\Shift;
use App\Models\Salary;
use App\Models\Location;

use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Session;

class JobController extends Controller
{

    public function __construct(){
        //$this->middleware('auth')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user() AND Auth::user()->isAdmin()){
            $jobs = Job::all()->paginate(8);
            return view('jobs.index', ['jobs' => $jobs]);
        }

        if(Auth::user() AND Auth::user()->isEmployer()){
            $jobs = Job::select()
            ->where('user_id', auth()->id())
            ->orderBy('updated_at', 'DESC')
            ->paginate(8);
            return redirect('home')->with([
                'jobs' => $jobs,
                'message_success' => Session::get('message_success')
            ]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        $educations = Education::orderBy('id', 'DESC')->get();
        $shifts = Shift::orderBy('id', 'DESC')->get();
        $salaries = Salary::orderBy('id', 'DESC')->get();
        $locations = Location::orderBy('id', 'DESC')->get();

        if($categories->isEmpty()){
            return back()->with('warning',"You must create category first.");
        }
        return view('jobs.create')->with([
            'categories'=> $categories,
            'educations' => $educations,
            'shifts' => $shifts,
            'salaries' => $salaries,
            'locations' => $locations
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJobRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobRequest $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'description' => 'required',
            'requirement' => 'required',

            'category_id' => 'required',
            'education_id' => 'required',
            'shift_id' => 'required',
            'salary_id' => 'required',
            'location_id' => 'required',
        ]);

        Job::insert([
            'name' => $request->name,
            'description' => $request->description,
            'requirement' => $request->requirement,

            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'education_id' => $request->education_id,
            'shift_id' => $request->shift_id,
            'salary_id' => $request->salary_id,
            'location_id' => $request->location_id,

        ]);
        
        return back()->with('success',"The job was created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //dd($job);
        return view('jobs.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        // the policy for user can edit or not
        abort_unless(Gate::allows('update', $job), 403);

        $shifts = Shift::all();
        $educations = Education::all();
        $categories = Category::all();
        $salaries = Salary::all();
        $locations = Location::all();
        return view('jobs.edit')->with([
            'categories' => $categories,
            'job' => $job,
            'shifts' => $shifts,
            'educations' => $educations,
            'salaries' => $salaries,
            'locations' => $locations
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJobRequest  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        // the policy for user can update or not
        abort_unless(Gate::allows('update', $job), 403, "You are not allowed!");

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'requirement' => 'required',

            'category_id' => 'required',
            'education_id' => 'required',
            'shift_id' => 'required',
            'salary_id' => 'required',
            'location_id' => 'required',
        ]);

        
        $job->update([
            'name' => $request['name'],
            'description' => $request['description'],
            'requirement' => $request['requirement'],

            'category_id' => $request['category_id'],
            'education_id' => $request['education_id'],
            'shift_id' => $request['shift_id'],
            'salary_id' => $request['salary_id'],
            'location_id' => $request['location_id'],
        ]);

        return redirect('/jobs')->with([
            'success' => "The job ".$job->name." was updated."
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //dd($job);
        // the policy for user can delete or not
        abort_unless(Gate::allows('delete', $job), 403);
        $oldName = $job->name;
        $job->delete();
        return redirect()->back()->with([
            'success' => "The job ".$oldName." was deleted"
        ]);

    }


    public function changeStatus($id){
        
        $row = Job::where('id', $id)->get()->first();
        if($row->status === "active"){
            Job::where('id',$id)->update(['status'=>'deactive']);

            return redirect('/jobs')->with([
                'warning' => "The job was deactive!"
            ]);
        }

        if($row->status === "deactive"){
            Job::where('id',$id)->update(['status'=>'active']);

            return redirect('/jobs')->with([
                'warning' => "The job was active!"
            ]);
        }

        
    }
}
