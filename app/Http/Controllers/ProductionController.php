<?php

namespace App\Http\Controllers;

use App\Models\Production;
use Illuminate\Http\Request;

class ProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Production::all();
        return view('production.index', compact('data'));
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
        $data = new Production();
        $data->qty_product = $request->qty_product;
        $data->product_id = $request->product_id;
        $data->qty_material = $request->qty_material;
        $data->material_id = $request->material_id;
        $data->save();

        return redirect()->route('production.index')->withToastSuccess('Data produksi berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function show(Production $production)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function edit(Production $production)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Production $production)
    {
        $production->qty_product = $request->qty_product;
        $production->qty_material = $request->qty_material;
        $production->material_id = $request->material_id;
        $production->save();

        return redirect()->route('production.index')->withToastSuccess('Data produksi berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function destroy(Production $production)
    {
        try {
            $production->delete();
            
            return redirect()->route('production.index')->withToastSuccess('Data production berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('production.index')->withToastError('Data production gagal dihapus');
        }
    }
}
