<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class MedicineController extends Controller
{
    public function index()
    {
        $Medicine = Medicine::all();
        return view('user.medicine', compact('Medicine'));
    }

    public function report(){
        $med = Medicine::all();
        $count = $med->count();
        $totalMedicine = DB::table('medicine')->sum('medStock');
        return view('user.medicineReport', compact('med','count','totalMedicine'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'medName' => 'required|unique:medicine',
            'medType' => 'required',
            'medPrice' => 'required|numeric',
            'medStock' => 'required|integer',
            'medDesc' => 'required'
        ]);

        $medicine = new Medicine();
        $medicine->medName = $request->medName;
        $medicine->medType = $request->medType;
        $medicine->medPrice = $request->medPrice;
        $medicine->medStock = $request->medStock;
        $medicine->medDesc = $request->medDesc;

        $res = $medicine->save();

        if ($res)
            return back()->with('success', 'Medicine have registered successfully.');
        else
            return back()->with('fail', 'Something went wrong.');
    }

    public function edit($id)
    {
        $Medicine = Medicine::where('id', $id)->first();
        return view('user.editMedicine', compact('Medicine'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'medName' => ['required',Rule::unique('medicine')->ignore($id)],
            'medType' => 'required',
            'medPrice' => 'required|numeric',
            'medStock' => 'required|numeric',
            'medDesc' => 'required'
        ]);

        $update = Medicine::where('id', $id)
            ->update([
                'medName' => $request->input('medName'),
                'medType' => $request->input('medType'),
                'medPrice' => $request->input('medPrice'),
                'medStock' => $request->input('medStock'),
                'medDesc' => $request->input('medDesc'),
            ]);

        if ($update)
            return back()->with('success', 'Medicine have updated successfully.');
        else
            return back()->with('fail', 'Something went wrong.');
    }

    public function remove($id)
    {
        Medicine::where('id', $id)->delete();
        return redirect()->back();
    }
}
