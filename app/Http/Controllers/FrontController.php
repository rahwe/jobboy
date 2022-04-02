<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class FrontController extends Controller
{
    public function index(){
        $jobs = Job::all();
        return view('frontend.index')->with('jobs', $jobs);
    }

    public function show(Job $job)
    {
        //dd($job);
        return view('frontend.detail')->with('job', $job);
    }
}
