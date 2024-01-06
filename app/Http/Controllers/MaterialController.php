<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Material::all();
        return view('material.index', compact('data'));
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
        $data = new Material();
        $data->nama = $request->nama;
        $data->qty = $request->qty;
        
        $file=$request->file('foto');
        $imgFolder = 'foto/';
        $extension = $request->file('foto')->extension();
        $imgFile=time()."_".$request->get('nama').".".$extension;
        $file->move($imgFolder,$imgFile);
        $data->foto=$imgFile;

        $data->save();

        return redirect()->route('material.index')->withToastSuccess('Data material berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        $material->nama = $request->nama;
        $material->qty = $request->qty;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imgFolder = 'foto/';
            $extension = $file->extension();
            $imgFile = time() . "_" . $request->get('nama') . "." . $extension;
            $file->move($imgFolder, $imgFile);
    
            $oldFilePath = $imgFolder . $material->foto;
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
    
            $material->foto = $imgFile;
        }

        $material->save();

        return redirect()->route('material.index')->withToastSuccess('Data material berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        try {
            $imgFolder = 'foto/';
            $filePath = $imgFolder . $material->foto;

            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $material->delete();
            
            return redirect()->route('material.index')->withToastSuccess('Data material berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('material.index')->withToastError('Data material gagal dihapus karena digunakan pada data lain');
        }
    }

    public function EditForm(Request $request)
    {
        $id = $request->get("id");
        $data = Material::find($id);

        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('material.EditForm',compact('data'))->render()),200);
    }
}
