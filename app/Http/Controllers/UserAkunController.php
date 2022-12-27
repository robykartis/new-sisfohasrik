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
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('users.edit', $row->id) . '" class="edit btn btn-info btn-sm mx-auto"><i class="fas fa-user-edit"></i></a> | ';
                    $btn = $btn . '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm"><i class="fas fa-eye"></i></a> | ';
                    $btn = $btn . '<a href="' . url('users/hapus', $row->id) . '" class="edit btn btn-danger btn-sm"><i class="fas fa-user-times"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $title = 'List Pengguna';
        return view(
            'user.index',
            [
                'title' => $title,
                'user' => User::all()
            ]
        );
    }


    public function create()
    {
        $title = 'Tambah Pengguna Baru';
        return view('user.create')->with([
            'title' => $title
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'level' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = $request->level;
        $user->save();
        return redirect('users')->with('success', 'Tambah Data Berhasil');
    }


    public function show($id)
    {
        //
    }


    public function edit(User $user)
    {
        $title = 'User Edit';
        $data = ['admin' => 'Admin', 'operator' => 'Operator', 'readonly' => 'Read Only'];
        return view('user.edit')->with(['user' => $user, 'title' => $title, 'data' => $data]);
    }



    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'level' => 'required',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password)
            $user->password = Hash::make($request->password);
        $user->level = $request->level;
        $user->save();
        return redirect('users')->with('success', 'Ubah Data Berhasil');
    }

    public function deleteuser($id)
    {
        User::find($id)->delete();
        return redirect('users')
            ->with('success', 'Data Berhasil Dihapus');
    }
}
