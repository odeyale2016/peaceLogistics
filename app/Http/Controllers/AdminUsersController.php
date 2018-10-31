<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use App\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $users=User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$roles=Role::lists('name','id')->all();
        $roles=Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $input=$request->all();
        if($file=$request->file('photo_id')){
        $name=time() . $file->getClientOriginalName();
        $file->move('images', $name);
        $photo=Photo::create(['file'=>$name]);
        $input['photo_id']=$photo->id;
    }
        $this->validate($request,['email'=>'required|unique:users','password'=>'required|unique:users']);
       $input['password']=bcrypt($request->password);
       User::create($input);

       return redirect('admin/users');
   }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::findorFail($id);
    return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::findorFail($id);

        //$roles=Role::lists('name','id')->all();
        $roles=Role::all();
    return view('admin.users.edit', compact('user','roles'));
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
       $user=User::findorFail($id);
        $input=$request->all();
        if($file=$request->file('photo_id')){
        $name=time() . $file->getClientOriginalName();
        $file->move('images', $name);
        $photo=Photo::create(['file'=>$name]);
        $input['photo_id']=$photo->id;
    }
         $user->update($input);
    Session::flash('updated_user','The user has been updated');
    return redirect('admin/users');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::findorFail($id);
        unlink(public_path().$user->photo->file);
        $user->delete();
        //$user=User::whereId($id)->delete();
        Session::flash('deleted_user','The user has been deleted');
    return redirect('admin/users');
    }
}
