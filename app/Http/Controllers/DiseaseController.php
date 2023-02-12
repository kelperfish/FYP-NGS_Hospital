<?php

namespace App\Http\Controllers;

use App\Models\Diseases;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DiseaseController extends Controller
{
    public function index()
    {
        $Disease = Diseases::all();
        return view('user.diseases', compact('Disease'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'diseaseName' => 'required|unique:diseases',
            'diseaseDesc' => 'required',
            'diseaseType' => 'required',
            'diseaseCrit' => 'required',
        ]);

        $disease = new Diseases();
        $disease->diseaseName = $request->diseaseName;
        $disease->diseaseDesc = $request->diseaseDesc;
        $disease->diseaseType = $request->diseaseType;
        $disease->diseaseCrit = $request->diseaseCrit;

        $res = $disease->save();

        if ($res)
            return back()->with('success', 'Disease have registered successfully.');
        else
            return back()->with('fail', 'Something went wrong.');
    }

    public function edit($id)
    {
        $disease = Diseases::where('id', $id)->first();
        return view('user.editDisease', compact('disease'));
    }

    public function update(Request $request, $id)
    {
        $disease = Diseases::where('id', $id)->first();

        $request->validate([
            'diseaseName' => ['required',Rule::unique('diseases')->ignore($id)],
            'diseaseDesc' => 'required',
            'diseaseType' => 'required',
            'diseaseCrit' => 'required',
        ]);

        $update = Diseases::where('id', $id)
            ->update([
                'diseaseName' => $request->input('diseaseName'),
                'diseaseDesc' => $request->input('diseaseDesc'),
                'diseaseType' => $request->input('diseaseType'),
                'diseaseCrit' => $request->input('diseaseCrit'),
            ]);

        if ($update)
            return back()->with('success', 'Disease have updated successfully.');
        else
            return back()->with('fail', 'Something went wrong.');
    }

    public function remove($id)
    {
        Diseases::where('id', $id)->delete();
        return redirect()->back();
    }
}
