<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\User;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('DisablePreventBack');
    }

    public function index()
    {
    //     $tampil = Student::join('users', 'students.user_id', '=', 'users.id')->select(
    //     'users.*',
    //     'students.*')->get();

    // return view('Student.index', ['tampil' => $tampil]);

    $users = User::join('students', 'users.id', '=', 'students.user_id')->select(
        'users.*',
        'students.*')->get();

    return view('Student.index', ['users' => $users]);

        // $students = Student::get();
        // return view('Student.index', compact('students'));
    }

    public function create()
    {
        return view('Student.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'nis'       => 'required',  
            'email'     => 'required|unique:users|max:255',
            'gender'    => 'required',
            'class'     => 'required'

        ]);
        // dd($request);
        //ini untuk insert ke table user
        $user = new User;
        $user->role = 'siswa';
        $user->name = $request->name;
        $user->email = $request->email;

        $user->password = bcrypt('123456789');
        $user->remember_token = str_random(60);
        $user->save();

        //insert ke table siswa
        $request->request->add(['user_id' => $user->id]);
        $siswa = Student::create($request->all());

        \Session::flash('sukses', 'Data Siswa Berhasil di tambahkan');
        return redirect('/Students');
    }
    public function destroy($id)
    {
        try {
            User::where('id', $id)->delete();
            \Session::flash('sukses', 'Data berhasil dihapus');
        } catch (Exception $e) {
            \Session::flash('gagal', $e->getMessage());
        }
        return redirect('/Students');
    }
}
