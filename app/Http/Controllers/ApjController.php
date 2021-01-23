<?php

namespace App\Http\Controllers;

use App\Apj;
use App\Jenisstatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApjController extends Controller
{
    public function index()
    {
        $data = Apj::all();
        $apj = DB::table('apjs')->paginate(10);
        return view('apj.index', compact('data', 'apj'));
    }

    public function showForm()
    {
        $data = Jenisstatus::all();
        return view('apj.show', compact('data'));
    }

    public function create(Request $request)
    {
        
        $data = Apj::create([
            'nama' => $request->nama,
            'tgl_lahir' => $request->tgl_lahir,
            'gaji' => $request->gaji,
            'jenis_status_id' => $request->jenis_status_id
        ]);

        if ($data) {
            return redirect()->route('data.apj');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Apj  $apj
     * @return \Illuminate\Http\Response
     */
    public function show(Apj $apj)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Apj  $apj
     * @return \Illuminate\Http\Response
     */
    public function edit(Apj $apj)
    {
        $data = Jenisstatus::all();
        return view('apj.edit', compact('apj', 'data'));
    }

    public function update(Request $request, Apj $data)
    {
        $data = Apj::findOrFail($data->id);

            $data->update([
                "nama" => $request->nama,
                "tgl_lahir" => $request->tgl_lahir,
                "gaji" => $request->gaji,
                "jenis_status_id" => $request->jenis_status_id
            ]);
        

        if ($data) {
            return redirect()->route('data.apj');
        }
    }

    public function destroy(Apj $apj)
    {
        $apj->find($apj->id)->all();

        $apj->delete();

        if ($apj) {
            return redirect()->route('data.apj');
        }
    }
}
