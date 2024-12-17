<?php
namespace App\Http\Controllers;

use App\Models\Ncc; 
use Illuminate\Http\Request;

class NccController extends Controller
{
    // Display a listing of the NCCs
    public function index()
    {
        $nccs = Ncc::paginate(10);
        return view('ncc.index', compact('nccs'));
    }

    // Show the detail of an NCC
    public function detail($lvs_MaNCC)
    {
        // $ncc = Ncc::find($lvs_MaNCC);
        $ncc =Ncc::where('lvs_MaNCC',$lvs_MaNCC)->firstOrFail();
        return view('ncc.detail', compact('ncc'));
    }

    // Show the form to create a new NCC
    public function create()
    {
        return view('ncc.create');
    }

    // Handle the form submission to create a new NCC
    public function createSubmit(Request $request)
    {
        $request->validate([
            'lvs_MaNCC' => 'required|unique:lvs_nhacc',  // Updated table name
            'lvs_TenNCC' => 'required',
            'lvs_Diachi' => 'required',
            'lvs_Dienthoai' => 'required',
        ]);

        Ncc::create($request->all());

        return redirect()->route('ncc.index');
    }

    // Show the form to edit an existing NCC
    public function edit($lvs_MaNCC)
    {
        $ncc =Ncc::where('lvs_MaNCC',$lvs_MaNCC)->firstOrFail();
        return view('ncc.edit', compact('ncc'));
    }

    // Handle the form submission to update an NCC
    public function update(Request $request, $lvs_MaNCC)
{
    $request->validate([
        'lvs_TenNCC' => 'required',
        'lvs_Diachi' => 'required',
        'lvs_Dienthoai' => 'required',
    ]);

    $ncc =Ncc::where('lvs_MaNCC',$lvs_MaNCC)->first();
    $ncc->update($request->all());

    return redirect()->route('ncc.index');
}
    // Handle deleting an NCC
    public function delete($lvs_MaNCC)
{
    Ncc::where('lvs_MaNCC', $lvs_MaNCC)->delete();
    return redirect()->route('ncc.index')->with('success', 'Record deleted successfully');
}
}
