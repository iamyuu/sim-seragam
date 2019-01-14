<?php

namespace App\Http\Controllers;

use DB;
use Crypt;
use App\Size;
use App\Order;
use App\Student;
use App\Uniform;
use App\DetailOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('student')->orderBy('order_date', 'desc')->get();
        return view('pages.order.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $uniforms = Uniform::orderBy('name', 'asc')->get();
        return view('pages.order.create', ['uniforms' => $uniforms]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $order = new Order();
        $order->no_faktur   = $request->input('no_faktur');
        $order->student_id  = $request->input('student_id');
        $order->model       = $request->input('model');
        $order->amount_paid = $request->input('amount_paid');
        $order->grand_total = $request->input('grand_total');
        $order->save(); 

        $count = count($request->size) - 1;
        for ($i = 0; $i < count($request->chk); $i++) {
            $size    = explode('-', $request->size[$i]);
            $qty     = explode('-', $request->qty[$i]);
            $total   = explode('-', $request->total[$i]);

            if ($i != $count) {
                $uniform = explode('-', $request->chk[$i]);

                if ($uniform[1] == $size[1]) {
                    DetailOrder::create([
                        'order_id'   => $request->input('no_faktur'),
                        'uniform_id' => $uniform[0],
                        'size_id'    => $size[0],
                        'qty'        => $qty[0],
                        'total'      => $total[0],
                    ]);
                }
            }
        }

        return redirect()
                ->route('pemesanan.show', Crypt::encrypt($order->no_faktur))
                ->with('status', 'Data di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  String  $order
     * @return \Illuminate\Http\Response
     */
    public function show($order)
    {
        $id = Crypt::decrypt($order);
        $order = Order::findOrFail($id);
        $orders = DetailOrder::with('uniform', 'size')->where('order_id', $id)->get();
        return view('pages.order.show', compact('order', 'orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  String  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($order)
    {
        $id = Crypt::decrypt($order);
        $order  = Order::with('student', 'detail')->findOrFail($id);
        $orders = DetailOrder::with('uniform', 'size')->where('order_id', $id)->get();
        $uniforms = Uniform::where('status', $order->student->jenis_kelamin)
                            ->orWhere('status', 3)
                            ->orderBy('name', 'asc')
                            ->get();
        return view('pages.order.edit', compact('order', 'uniforms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  String  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($order)
    {
        $order = Order::findOrFail($order);
        $order->delete();
        $order->detail()->delete();
        return redirect()->to('pemesanan')->with('status', 'Data berhasil di hapus');
    }

    /**
     * Search data student from storage.
     *
     * @param  string  $request->search
     * @return \Illuminate\Http\Response
     */
    public function searchStudent(Request $request)
    {
        $size  = Size::with('Uniform')->where('student_id', 'like', '%'.$request->search)->get();
        $order = Order::where('student_id', $request->search)->first();
        $student = Student::where('no_daftar', 'like', '%'.$request->search)->first();
        $uniform = Uniform::where('status', $student->jenis_kelamin)
                            ->orWhere('status', 3)
                            ->orderBy('name', 'asc')
                            ->get();

        if (empty($student)) {
            return 'null';
        } elseif ($size->isEmpty()) {
            return 'belum diukur';
        } elseif (!empty($order)) {
            return 'sudah melakukan pemesanan';
        } else {
            return response()->json([
                'student' => $student,
                'ukuran'  => $size,
                'seragam' => $uniform
            ]);
        }
    }

    /**
     * Search last no_faktur from storage
     *
     * @param String no_faktur
     * @return \Illuminate\Http\Response
     */
    public function lastId()
    {
        return response()->json([
            'last_id' => Order::select(DB::raw('RIGHT(`no_faktur`, 4) as `id`'))
                                ->orderBy('id', 'desc')->first()
        ]);
    }

    /**
     * Print data order from storage.
     *
     * @param String $order
     * @return \Illuminate\Http\Response
     */
    public function print($order)
    {
        $id     = Crypt::decrypt($order);
        $order  = Order::findOrFail($id);
        $orders = DetailOrder::with('uniform', 'size')->where('order_id', $id)->get();
        return view('prints.order', compact('order', 'orders'));
    }
}