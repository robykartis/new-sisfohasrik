<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user)
    {
        // $users = DB::table('users')->paginate(2);
        if ($request->ajax()) {
            $data = User::select('id', 'name',  'level', 'email', 'nip')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('users.edit', $row->id) . '"class="btn btn-sm btn-info" data-bs-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-pencil-alt"></i></a> |';
                    $btn = $btn . '<a href="' . url('users/hapus', $row->id) . '" onclick="confirmDelete()"class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-times"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $title = 'Daftar Pengguna Aplikasi';
        return view(
            'user.index',
            [
                'title' => $title,
                'user' => User::all(),
                'user' => $user,
            ]
        );
    }

    public function create()
    {
        $title = 'Tambah Pengguna Apllikasi';
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
        try {
            $image = $request->file('image');
            $file_name = rand(1000, 9999) . $image->getClientOriginalName();

            $img = Image::make($image->path());
            $img->resize('180', '120')
                ->save(public_path('images/akun/smal') . '/small_' . $file_name);
            $image->move('images/akun', $file_name);

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->nip = $request->nip;
            $user->level = $request->level;
            $user->password = Hash::make($request->password);
            $user->image = $file_name;
            $user->save();

            return redirect('users')->with('success', 'Tambah Data Berhasil');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return back()->with('error', 'Email Sudah Terdaftar')->withInput();
            }
        }
    }


    public function show(User $user)
    {
        $title = 'Detail Pengguna Aplikasi';
        $user['user'] = $user;
        $data = ['admin' => 'Admin', 'operator' => 'Operator', 'readonly' => 'Read Only'];
        return view('user.show')->with(['user' => $user, 'title' => $title, 'data' => $data]);
    }


    public function edit(User $user)
    {
        $title = 'Edit Pengguna Aplikasi';
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

        if ($request->hasFile('image')) {
            $user->delete_image();
            $image = $request->file('image');
            $file_name = rand(1000, 9999) . $image->getClientOriginalName();
            $img = Image::make($image->path());
            $img->resize('180', '120')
                ->save(public_path('images/akun/smal') . '/small_' . $file_name);
            $image->move('images/akun', $file_name);
            $user->image = $file_name;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->nip = $request->nip;
        if ($request->password)
            $user->password = Hash::make($request->password);
        $user->level = $request->level;
        $user->save();
        return redirect('users')->with('success', 'Ubah Data Berhasil');
    }

    public function deleteuser(User $user, $id)
    {
        $user->delete_image();
        $user = User::find($id);
        $user->delete();
        return redirect('users')
            ->with('success', 'Data Berhasil Dihapus');
    }
}
