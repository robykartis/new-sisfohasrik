<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Validator;
use Image;
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
            $data = User::select('id', 'name',  'level', 'email', 'nip')->get();
            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('users.show', $row->id) . '" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a> | ';
                    $btn = $btn . '<a href="' . route('users.edit', $row->id) . '" class="btn btn-info btn-sm"> <i class="fas fa-pencil-alt"></i></a> | ';
                    $btn = $btn . '<a href="' . url('users/hapus', $row->id) . '" onclick="confirmDelete()" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>';
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required',
            'nip' => 'required',
            'password' => 'required',
            'level' => 'required',
        ]);


        $originalImage = $request->file('image');
        $thumbnailImage = Image::make($originalImage);
        $thumbnailPath = public_path() . '/images/akun/thumbnail/';
        $originalPath = public_path() . '/images/akun/original/';
        $thumbnailImage->save($originalPath . time() . $originalImage->getClientOriginalName());
        $thumbnailImage->resize(150, 150);
        $thumbnailImage->save($thumbnailPath . time() . $originalImage->getClientOriginalName());
        $user = new User();
        $user->image = time() . $originalImage->getClientOriginalName();


        $user->name = $request->name;
        $user->email = $request->email;
        $user->nip = $request->nip;
        $user->password = Hash::make($request->password);
        $user->level = $request->level;
        $user->save();
        return redirect('users')->with('success', 'Tambah Data Berhasil');
    }


    public function show(User $user)
    {
        $title = 'User Show';
        $data = ['admin' => 'Admin', 'operator' => 'Operator', 'readonly' => 'Read Only'];
        return view('user.show')->with(['user' => $user, 'title' => $title, 'data' => $data]);
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
            'nip' => 'required',
            'level' => 'required',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->nip = $request->nip;
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
