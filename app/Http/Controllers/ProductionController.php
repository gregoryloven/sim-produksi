<?php

namespace App\Http\Controllers;

use App\Models\Production;
use App\Models\Product;
use App\Models\Material;
use App\Models\Employee;
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
        $prod = Product::all();
        $mat = Material::all();
        $kar = Employee::all();
        $data = Production::latest()->first();
        return view('production.create', compact('data', 'prod', 'mat', 'kar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        foreach ($request->material_id as $key => $materialId) {
            $data3 = Material::where('id', $materialId)->first();
            if ($data3->qty < $request->qty_material[$key]) {
                return redirect()->route('production.create')->withToastError('Stok bahan baku kurang, isi terlebih dahulu'); 
            } else {
                $data = new Production();
                $data->kode_produksi = sprintf("%03d", $request->kode_produksi + 1);
                $data->qty_product = $request->qty_product;
                $data->product_id = $request->product_id;
                $data->qty_material = $request->qty_material[$key];
                $data->material_id = $materialId;
                $data->employee_id = $request->employee_id;
                $data->save();
            }
        } 

        $data2 = Product::where('id', $request->product_id)->first();
        $data2->stok += $request->qty_product;
        $data2->save();

        foreach($request->material_id as $key => $materialId) {
            $data3 = Material::where('id', $materialId)->first();
            $data3->qty -= $request->qty_material[$key];
            $data3->save();
        }

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
            
            return redirect()->route('production.index')->withToastSuccess('Data produksi berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('production.index')->withToastError('Data produksi gagal dihapus');
        }
    }
}
