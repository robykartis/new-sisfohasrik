<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $users = DB::table('users')->paginate(2);

        if ($request->ajax()) {
            $data = User::select('id', 'name', 'level', 'email')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $button = '<a type="button" href="' . route('users.index', $data->id) . '"  class="edit btn btn-primary btn-sm"> <i class="bi bi-pencil-square"></i>Edit</a>';
                    $button .= '   <a type="button" href="' . route('users.index') . '" class="delete btn btn-danger btn-sm"> <i class="bi bi-backspace-reverse-fill"></i> Users</a>';
                    $button .= '   <button type="button" name="edit" id="' . $data->id . '" class="delete btn btn-danger btn-sm"> <i class="bi bi-backspace-reverse-fill"></i> Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('user.index');
    }
    public function user_data()
    {
        $users = User::select(['id', 'name', 'email', 'level']);
        return DataTables::of($users)->make();
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
    public function store(Request $request)
    {
        $rules = array(
            'name'    =>  'required',
            'email'     =>  'required',
            'level'     =>  'required',
            'password'     =>  'required'
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $pass = $request->password;
        $postpass = Hash::make($pass);

        $form_data = array(
            'name'        =>  $request->name,
            'email'         =>  $request->email,
            'level'         =>  $request->level,
            'password'         =>  $postpass
        );

        User::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);
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
        if (request()->ajax()) {
            $data = User::findOrFail($id);
            return response()->json(['result' => $data]);
        }
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
        $rules = array(
            'name' =>  'required',
            'email' =>  'required',
            'level' => 'required'
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'name'    =>  $request->name,
            'email'     =>  $request->email,
            'level'     =>  $request->level
        );

        User::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return back()->with('delete', 'success');
    }
}
