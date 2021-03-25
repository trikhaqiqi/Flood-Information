<?php

namespace App\Http\Controllers;

use App\Models\Polsek;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PolsekController extends Controller
{
    public function index()
    {
        $polseks = Polsek::all();
        return view('dashboard.F_Kepolisian.tablekepolisian', compact('polseks'));
    }

    public function indexpolsek()
    {
        $polseks = Polsek::all();
        return view('call.polsek.polsek', compact('polseks'));
    }

    public function create()
    {
        return view('dashboard.F_Kepolisian.kepolisian', [
            'polsek' => new Polsek(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'namapolsek' => 'required',
            'nopolsek' => 'required',
            'alamat' => 'required',
        ]);

        Polsek::create([
            'namapolsek' => $request->namapolsek,
            'slug' => Str::slug($request->namapolsek, '-'),
            'nopolsek' => $request->nopolsek,
            'alamat' => $request->alamat,
        ]);

        return back();
    }

    public function edit($id)
    {
        $polseks = Polsek::find($id);
        return view('dashboard.F_Kepolisian.editkepolisian', compact('polseks'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'namapolsek' => 'required',
            'nopolsek' => 'required',
            'alamat' => 'required',
        ]);

        Polsek::find($id)->update([
            'namapolsek' => $request->namapolsek,
            'nopolsek' => $request->nopolsek,
            'alamat' => $request->alamat,
        ]);

        return redirect('kepolisian');
    }


    public function destroy($id)
    {
        Polsek::find($id)->delete();
        return back();
    }
}
