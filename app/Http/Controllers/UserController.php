<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
class UserController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:Show User', ['only' => ['index']]);
        $this->middleware('permission:Create User', ['only' => ['create','store']]);
        $this->middleware('permission:Edit User', ['only' => ['edit','update']]);
        $this->middleware('permission:Delete User', ['only' => ['destroy']]);
    }//end of __construct


    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        $users = User::orderBy('id','DESC')->paginate(5);
        return view('backEnd.users.show',compact('users'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }//end of index

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('backEnd.users.create',compact('roles'));
    }//endd of create

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|same:confirm-password',
        'roles_name' => 'required'
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('roles_name'));
        return redirect()->route('users.index')
        ->with('success','User created successfully');
    }//end of store

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }//end of show

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('backEnd.users.edit',compact('user','roles','userRole'));
    }//end of edit

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email|unique:users,email,'.$id,
        'password' => 'same:confirm-password',
        'roles_name' => 'required'
        ]);
        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,('password'));
        }
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles_name'));
        return redirect()->route('users.index')
        ->with('success','User updated successfully');
    }//end of update

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
    User::find($id)->delete();
    return redirect()->route('users.index')
    ->with('success','User deleted successfully');
    }//end of destroy

}//end of UserController