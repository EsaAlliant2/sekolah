<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Validator;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapel = Mapel::all();
        return view('guru.index', compact('guru'));
    }

    public function data(){
        $guru = guru::orderBy('id', 'asc')->get();

        return datatables()
        ->of($guru)
        ->addIndexColumn()
        ->editColumn('mapel_id', function($guru){
            return $guru->mapel->nama;
        })
        ->addColumn('aksi', function($guru){
            return'
            <div class="btn-group">
            <button onclick="editData(`'.route('guru.update', $guru->id).'`)" class="btn btn-flat btn-xs btn-warning"><i class="fa fa-edit"></i></button>
            <button onclick="deleteData(`'.route('guru.destroy', $guru->id).'`)" class="btn btn-flat btn-xs btn-danger"><i class="fa fa-trash"></i></button>
            </div>
            ';
        })
        ->rawColumns(['aksi'])
        ->make(true);
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
        $validator = Validator::make($request->all(),[
            'nama' => 'required'
        ]);

       $guru = guru::create([
        'nama' => $request->nama
       ]);

       return response()->json([
        'success' => true,
        'massage' => 'Data berhasil disimpan',
        'data' => $guru
       ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guru = guru::find($id);
        return response()->json($guru);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(guru $guru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $guru = guru::find($id);
        $guru->nama = $request->nama;
        $guru->update();
        return response()->json('Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru = guru::find($id);
        $guru->delete();

        return response()->json(null, 204);
    }
}