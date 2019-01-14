<?php

namespace App\Http\Controllers;

use DB;
use App\Uniform;
use Illuminate\Http\Request;

class UniformController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uniforms = Uniform::orderBy('name', 'asc')->get();
        return view('pages.uniform', ['uniforms' => $uniforms]);
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
            'name'   => 'required|string|unique:seragam',
            'price'  => 'required|string|numeric',
            'status' => 'required|integer',
        ]);

        Uniform::create([
            'name'   => $request->input('name'),
            'price'  => $request->input('price'),
            'status' => $request->input('status')
        ]);

        return redirect()->to('seragam')->with('status', 'Data berhasil di tambah');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Uniform  $uniform
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name'   => 'required|string',
            'price'  => 'required|string|numeric',
            'status' => 'required|integer',
        ]);

        Uniform::findOrFail($request->id)->update([
                    'name'   => $request->input('name'),
                    'price'  => $request->input('price'),
                    'status' => $request->input('status')
                ]);

        return redirect()->to('seragam')->with('status', 'Data berhasil di ubah');
    }

    /**
     * Move the specified resource to trash.
     *
     * @param  \App\Uniform  $uniform
     * @return \Illuminate\Http\Response
     */
    public function destroy(Uniform $seragam)
    {
        $seragam->delete();
        DB::table('ukuran')->where('Uniform_id', $seragam->id)->delete();
        DB::table('detail_order')->where('Uniform_id', $seragam->id)->delete();
        return redirect()->to('seragam')->with('status', 'Data berhasil di hapus');
    }

    /**
     * Display a listing of the trash.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $uniforms = Uniform::onlyTrashed()->get();
        return view('pages.trash', ['uniforms' => $uniforms]);
    }

    /**
     * Resore the specified resource in trash
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        // 
    }

    /**
     * Delete the specified resource from storage
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Uniform $seragam)
    {
        $uniform = Uniform::findOrFail($seragam);
        $uniform->forceDelete();
        return redirect()->to('seragam')->with('status', 'Data di hapus');
    }
}
