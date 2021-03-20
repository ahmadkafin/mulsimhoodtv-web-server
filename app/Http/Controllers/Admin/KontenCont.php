<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KontenM;
use App\Repositories\FunRepo;
use Illuminate\Http\Request;

class KontenCont extends Controller
{
    protected $fun, $className;
    public function __construct(FunRepo $fun)
    {
        $this->fun = $fun;
        $this->className = KontenM::class;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $selected = ['id', 'konten_title'];
        $relation = ['pivot_kon_kat', 'pivot_kon_i'];
        $kontens = $this->fun->get($this->className, $selected, $relation);
        if (!empty($kontens)) {
            return response()->json([
                'status'   => 200,
                'kontens'  => $kontens
            ]);
        } else {
            return response()->json([
                'status'   => 404,
                'kontens'  => 'Data Kosong'
            ]);
        }
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
