<?php

namespace App\Http\Controllers;

use App\Models\Sar;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SarController extends Controller
{
    public function index()
    {
        $sars = Sar::all();
        return view('dashboard.F_Timsar.tabletimsar', compact('sars'));
    }

    public function indextimsar()
    {
        $sars = Sar::all();
        return view('call.timsar.timsar', compact('sars'));
    }

    public function create()
    {
        return view('dashboard.F_Timsar.timsar', [
            'sar' => new Sar(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'namatimsar' => 'required',
            'notimsar' => 'required',
            'alamat' => 'required',
        ]);

        Sar::create([
            'namatimsar' => $request->namatimsar,
            'slug' => Str::slug($request->namatimsar, '-'),
            'notimsar' => $request->notimsar,
            'alamat' => $request->alamat,
        ]);

        return back();
    }

    public function edit($id)
    {
        $sars = Sar::find($id);
        return view('dashboard.F_Timsar.edittimsar', compact('sars'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'namatimsar' => 'required',
            'notimsar' => 'required',
            'alamat' => 'required',
        ]);

        Sar::find($id)->update([
            'namatimsar' => $request->namatimsar,
            'notimsar' => $request->notimsar,
            'alamat' => $request->alamat,
        ]);

        return redirect('timsar');
    }

    public function destroy($id)
    {
        Sar::find($id)->delete();
        return back();
    }
}
