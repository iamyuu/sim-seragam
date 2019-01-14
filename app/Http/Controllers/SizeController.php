<?php

namespace App\Http\Controllers;

use DB;
use Crypt;
use App\Size;
use App\Student;
use App\Uniform;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = Size::with(['student', 'uniform'])->groupBy('student_id')->get();
        return view('pages.size.index', ['sizes' => $sizes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $uniforms = Uniform::orderBy('id', 'asc')->get();
        return view('pages.size.create', ['uniforms' => $uniforms]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        for ($i = 0; $i < count($request->uniform); $i++) {
            $size = new Size();
            $size->student_id = $request->input('student');
            $size->Uniform_id = $request->input('uniform')[$i];
            $size->size       = strtoupper($request->input('size')[$i]);
            $size->save();
        }
        return redirect()->back()->with('status', 'Berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show($ukuran)
    {
        $id = Crypt::decrypt($ukuran);
        $sizes = Size::with('student', 'uniform')->where('student_id', $id)->get();
        return view('pages.size.show', ['sizes' => $sizes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  String  $u
     * @return \Illuminate\Http\Response
     */
    public function edit($u)
    {
        $ukuran = array();        
        $id     = Crypt::decrypt($u);
        $siswa  = Size::with('student')->where('student_id', $id)->first();
        $sizes  = Size::where('student_id', $id)->get();

        $uniforms = Uniform::where('status', $siswa->student->jenis_kelamin)
                            ->orWhere('status', 3)
                            ->orderBy('id', 'asc')
                            ->get();

        $loopu = 1; $loopi = 1;
        foreach ($uniforms as $uniform) {
            $seragam_id[$loopi++] = $uniform['id'];
            $seragam[$loopu++] = $uniform['name'];
            $check = Size::where(['student_id' => $id, 'uniform_id' => $uniform->id])->first();
            if (empty($check)) {
                $ukuran[] = '';
            } else {
                $loops = 1;
                foreach ($sizes as $size) {
                    $ukuran[$loops++] = $size['size'];
                }
            }
        }

        return view('pages.size.edit', compact('siswa', 'ukuran', 'seragam', 'seragam_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Size::where('student_id', $request->student)->delete();
        for ($i = 0; $i < count($request->uniform); $i++) {
            $size = new Size();
            $size->student_id = $request->student;
            $size->Uniform_id = $request->uniform[$i];
            $size->size       = strtoupper($request->size[$i]);
            $size->save();
        }
        return redirect()->to('ukuran')->with('status', 'Berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy($size)
    {
        Size::where('student_id', $size)->delete();
        DB::table('detail_order')->where('Uniform_id', $seragam->id)->delete();
        return redirect()->to('ukuran')->with('status', 'Berhasil di hapus');
    }

    /**
     * Search data student from storage.
     *
     * @param  string  $request->search
     * @return \Illuminate\Http\Response
     */
    public function searchStudent(Request $request)
    {
        $size = Size::where('student_id', $request->search)->first();
        $student = Student::where('no_daftar', 'like', '%'.$request->search)->first();
        $uniform = Uniform::where('status', $student->jenis_kelamin)
                            ->orWhere('status', 3)
                            ->orderBy('id', 'asc')
                            ->get();

        if (empty($student)) {
            return 'null';
        } elseif (!empty($size)) {
            return 'siswa sudah ada';
        } else {
            return response()->json([
                'student' => $student,
                'uniform' => $uniform
            ]);
        }
    }
}
