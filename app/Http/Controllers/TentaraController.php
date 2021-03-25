<?php

namespace App\Http\Controllers;

use App\Models\Tentara;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TentaraController extends Controller
{
    public function index()
    {
        $tentaras = Tentara::all();
        return view('dashboard.F_Tentara.tabletentara', compact('tentaras'));
    }

    public function indextentara()
    {
        $tentaras = Tentara::all();
        return view('call.tentara.tni', compact('tentaras'));
    }

    public function create()
    {
        return view('dashboard.F_Tentara.tentara', [
            'tentara' => new Tentara(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'namakoramil' => 'required',
            'nokoramil' => 'required',
            'alamat' => 'required',
        ]);

        Tentara::create([
            'namakoramil' => $request->namakoramil,
            'slug' => Str::slug($request->namakoramil, '-'),
            'nokoramil' => $request->nokoramil,
            'alamat' => $request->alamat,
        ]);

        return back();
    }

    public function edit($id)
    {
        $tentaras = Tentara::find($id);
        return view('dashboard.F_Tentara.edittentara', compact('tentaras'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'namakoramil' => 'required',
            'nokoramil' => 'required',
            'alamat' => 'required',
        ]);

        Tentara::find($id)->update([
            'namakoramil' => $request->namakoramil,
            'nokoramil' => $request->nokoramil,
            'alamat' => $request->alamat,
        ]);

        return redirect('tentara');
    }

    public function destroy($id)
    {
        Tentara::find($id)->delete();
        return back();
    }
}
