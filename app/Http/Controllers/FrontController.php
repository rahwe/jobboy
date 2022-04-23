<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use App\Models\Category;
use App\Models\Location;

class FrontController extends Controller
{
    public function index(){
        $locations = Location::all();
        $users = User::all();
        $jobs = Job::orderBy('created_at','DESC')->paginate(4);
        $categories = Category::all();
        return view('frontend.index')->with([
            'locations' => $locations,
            'users' => $users,
            'jobs'=> $jobs,
            'categories' => $categories
        ]);
    }

    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('frontend.job_detail')->with('job', $job);
    }

    public function showCompany($id){
        $user = User::findOrFail($id);
        return view('frontend.company_detail')->with('user', $user);
    }

    public function showByCategory($id){
        $users = User::all();
        
        $category = Category::findOrFail($id);
        $jobs = Job::where('category_id', $id)->orderBy('id', 'desc')->get();
        //dd($jobs);
        return view('frontend.job_by_category')->with([
            'jobs'=> $jobs,
            'category' => $category
        ]);

    }
}
