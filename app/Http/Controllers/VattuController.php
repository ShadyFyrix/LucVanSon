<?php

namespace App\Http\Controllers;

use App\Models\Vattu;
use Illuminate\Http\Request;

class VattuController extends Controller
{
    // Display all Vật Tư
    public function index()
    {
        $vattus = Vattu::paginate(10);
        return view('vattu.index', compact('vattus'));
    }

    // Show the form to create a new Vật Tư
    public function create()
    {
        return view('vattu.create');
    }

    // Handle form submission to create a new Vật Tư
    public function createSubmit(Request $request)
    {
        $request->validate([
            'lvs_Mavtu' => 'required|unique:lvs_vattu',
            'lvs_TenVtu' => 'required',
            'lvs_Dvtinh' => 'required',
            'lvs_Phantram' => 'required|numeric',
        ]);

        Vattu::create($request->all());

        return redirect()->route('vattu.index')->with('success', 'Vật Tư đã được thêm thành công!');
    }

    // Show details of a Vật Tư
    public function detail($lvs_Mavtu)
    {
        $vattu = Vattu::where('lvs_Mavtu', $lvs_Mavtu)->firstOrFail();
        return view('vattu.detail', compact('vattu'));
    }

    // Show the form to edit an existing Vật Tư
    public function edit($lvs_Mavtu)
    {
        $vattu = Vattu::where('lvs_Mavtu', $lvs_Mavtu)->firstOrFail();
        return view('vattu.edit', compact('vattu'));
    }

    // Handle the form submission to update a Vật Tư
    public function update(Request $request, $lvs_Mavtu)
    {
        $request->validate([
            'lvs_TenVtu' => 'required',
            'lvs_Dvtinh' => 'required',
            'lvs_Phantram' => 'required|numeric',
        ]);

        $vattu = Vattu::where('lvs_Mavtu', $lvs_Mavtu)->firstOrFail();
        $vattu->update($request->all());

        return redirect()->route('vattu.index')->with('success', 'Vật Tư đã được cập nhật thành công!');
    }

    // Handle deletion of a Vật Tư
    public function delete($lvs_Mavtu)
    {
        $vattu = Vattu::where('lvs_Mavtu', $lvs_Mavtu)->firstOrFail();

        try {
            $vattu->delete();
            return redirect()->route('vattu.index')->with('success', 'Vật Tư đã được xóa thành công!');
        } catch (\Exception $e) {
            return redirect()->route('vattu.index')->with('error', 'Không thể xóa Vật Tư do ràng buộc dữ liệu!');
        }
    }
}
