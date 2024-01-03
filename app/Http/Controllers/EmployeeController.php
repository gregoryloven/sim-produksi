<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Employee::all();
        return view('employee.index', compact('data'));
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
        $data = new Employee();
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->save();

        return redirect()->route('employee.index')->withToastSuccess('Data karyawan berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $employee->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('employee.index')->withToastSuccess('Data karyawan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        try {
            $employee->delete();
            return redirect()->route('employee.index')->withToastSuccess('Data karyawan berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('employee.index')->withToastError('Data karyawan gagal dihapus');
        }
    }

    public function EditForm(Request $request)
    {
        $id = $request->get("id");
        $data = Employee::find($id);

        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('employee.EditForm',compact('data'))->render()),200);
    }
}
