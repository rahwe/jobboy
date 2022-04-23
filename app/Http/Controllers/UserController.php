<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['index','show']);
        // $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        abort_unless(Gate::allows('update', $user), 403, "You are not allowed!");
        
        $users = User::where('role', '=' ,'employer')->get();
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // the policy for user can edit or not

        $user = Auth::user()->id;
        abort_unless(Gate::allows('update', $user), 403, "You are not allowed!");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(User $user)
    {
        // the policy for user can edit or not
        abort_unless(Gate::allows('update', $user), 403, "You are not allowed!");


        //$user = User::findOrFail($id);
        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user )
    {
        // the policy for user can edit or not
        abort_unless(Gate::allows('update', $user), 403, "You are not allowed!");

        if($request->hasFile('avatar')){

            $destination = public_path('/image/'.$user->avatar);

            if(File::exists($destination)){
                File::delete($destination);
            }

            $avatar = $request->file('avatar');
            $filename = time().'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/image/'.$filename));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->update();
        }

        //dd($user->avatar);
        return view('users.edit')->with('user', $user);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // the policy for user can edit or not
        abort_unless(Gate::allows('delete', $user), 403, "You are not allowed!");

    }
}
