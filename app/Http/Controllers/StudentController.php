<?php

namespace App\Http\Controllers;

use DB;
use Excel;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::orderBy('nama_lengkap', 'asc')->get();
		return view('pages.student.index', ['students' => $students]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'no_daftar'     => 'required|numeric|unique:siswa',
            'nama_lengkap'  => 'required|string',
            'jenis_kelamin' => 'required|integer',
            'agama'         => 'required|string',
            'asal_smp'      => 'required|string'
        ]);

        Student::create([
            'no_daftar'     => $request->input('no_daftar'),
            'nama_lengkap'  => $request->input('nama_lengkap'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'agama'         => $request->input('agama'),
            'asal_smp'      => $request->input('asal_smp')
        ]);

        return redirect()->to('siswa')->with('status', 'Data berhasil di tambah');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'no_daftar'     => 'required|numeric',
            'nama_lengkap'  => 'required|string',
            'jenis_kelamin' => 'required|integer',
            'agama'         => 'required|string',
            'asal_smp'      => 'required|string'
        ]);

        Student::findOrFail($request->no_daftar)->update([
                    'no_daftar'     => $request->input('no_daftar'),
                    'nama_lengkap'  => $request->input('nama_lengkap'),
                    'jenis_kelamin' => $request->input('jenis_kelamin'),
                    'agama'         => $request->input('agama'),
                    'asal_smp'      => $request->input('asal_smp')
                ]);

        return redirect()->to('siswa')->with('status', 'Data berhasil di ubah');
    }

    /**
     * Move the specified resource to trash.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $siswa)
    {
        $siswa->delete();

        $order = \App\Order::where('student_id', $siswa->no_daftar);
        $order->delete();
        $order->detail()->delete();

        DB::table('ukuran')->where('student_id', $siswa->no_daftar)->delete();

        return redirect()->to('siswa')->with('status', 'Data berhasil di hapus');
    }

    /**
     * Import excel data to storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->validate($request, [
            'file'  => 'required|max:2048|mimes:xls,xlsx,xlsx,csv',
        ]);

        if ($request->hasFile('file')) {
        	$path = $request->file('file')->getRealPath();
        	$data = Excel::load($path, function($reader){})->get();
        	if (!empty($data)) {
        		foreach ($data as $key => $value) {
        			$student = new Student;
        			$student->no_daftar     = $value->no_daftar;
        			$student->nama_lengkap  = $value->nama_lengkap;
        			$student->jenis_kelamin = $value->jenis_kelamin;
        			$student->agama 		= $value->agama;
        			$student->asal_smp 		= $value->asal_smp;
        			$student->save();
        		}

                return redirect()->to('siswa')->with('status', 'Berhasil diupload');
        	}
        }

        return redirect()->back()->with('errors', 'Gagal diupload');
    }

    /**
     * Download excel template for import data to storage.
     * 
     * @return \Illuminate\Http\Response
     */
    public function download()
    {
        return response()->download(public_path('file\Template Excel Siswa.xls'));
    }
}
