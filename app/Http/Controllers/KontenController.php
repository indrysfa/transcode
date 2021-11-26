<?php

namespace App\Http\Controllers;

use App\Jeniskonten;
use App\Konten;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KontenController extends Controller
{
    public function index()
    {
        $data = Konten::all();
        $konten = DB::table('kontens')->paginate(10);
        return view('admin.konten.index', compact('data', 'konten'));
    }

    public function getIndex()
    {
        return view('admin.konten.index1');
    }



    public function anyData()
    {
        return Datatables::of(Konten::query())->make(true);
    }

    public function getKonten(Request $request)
    {
        if ($request->ajax()) {
            $data = Konten::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function index1(Request $request)
    {
        // if ($request->ajax()) {
            // return datatables()->of(Konten::all())->toJson();
            return Datatables::of(Konten::query())->make(true);
        // }
        // return view('admin.konten.index1');
        // $konten = DB::table('kontens')->paginate(10);
        // $konten = Konten::paginate(10);

        // return view('admin.konten.index1', compact('konten'));
    }

    public function showForm()
    {
        $data = Jeniskonten::all();
        return view('admin.konten.showform', compact('data'));
    }

    public function addKontenv1(Request $request)
    {
        $data = new Konten();
        $data->date = $request->date;
        $data->title = $request->title;
        $data->jenis_konten_id = $request->jenis_konten_id;
        $data->code = $request->code;
        $data->detail = $request->detail;
        $data->image = $request->image;

        $data->save();

        if ($data) {
            return redirect()->route('data.konten');
        }
    }

    public function addKonten(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:png,jpg,jpeg',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/image', $image->hashName());

        $data = Konten::create([
            'date' => $request->date,
            'title' => $request->title,
            'jenis_konten_id' => $request->jenis_konten_id,
            'code' => $request->code,
            'detail' => $request->detail,
            'image' => $image->hashName()
        ]);

        if ($data) {
            return redirect()->route('data.konten');
        }
    }

    public function deleteKonten(Konten $konten)
    {
        $konten->find($konten->id)->all();

        $konten->delete();

        if ($konten) {
            return redirect()->route('data.konten');
        }
    }

    public function editKonten(Konten $konten)
    {
        $data = Jeniskonten::all();
        return view('admin.konten.edit', compact('konten', 'data'));
    }

    public function updateKonten(Request $request, Konten $data)
    {
        $data = Konten::findOrFail($data->id);

        if ($request->file('image') == "") {
            $data->update([
                "date" => $request->date,
                "title" => $request->title,
                "jenis_konten_id" => $request->jenis_konten_id,
                "code" => $request->code,
                'detail' => $request->detail
            ]);
        } else {
            Storage::disk('local')->delete('public/image/' . $data->image);
            $image = $request->file('image');
            $image->storeAs('public/image', $image->hashName());

            $data->update([
                "date" => $request->date,
                "title" => $request->title,
                "jenis_konten_id" => $request->jenis_konten_id,
                "code" => $request->code,
                'detail' => $request->detail,
                "image" => $image->hashName()
            ]);
        }

        if ($data) {
            return redirect()->route('data.konten');
        }
    }

    public function detailKonten(Konten $data)
    {

        // $data = Konten::all();
        return view('admin.konten.detail', compact('data'));
    }

    public function searchKonten(Request $request)
    {
        // menangkap data pencarian
		$cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $konten = DB::table('kontens')
        ->where('title','like',"%".$cari."%")
        ->paginate(5);

        // mengirim data pegawai ke view index
        return view('admin.konten.index',['kontens' => $konten]);
    }
}
