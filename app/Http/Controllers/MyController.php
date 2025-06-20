<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    private $arr = [
            ['id'=> 1,'nama'=>'naisa','kelas'=>'xii rpl 1'],
            ['id'=> 2,'nama'=>'intan','kelas'=>'xii rpl 2'],
            ['id'=> 3,'nama'=>'khansa','kelas'=>'xii rpl 3'],
        ];

    public function index() //memberikan daftar data
    {
        $siswa = session('siswa_data',$this->arr);
        return view('siswa.index',['siswa'=> $siswa]); //array asosiatif (bisa pke 'compact')
    }

    public function show($id) {
        //ambil data siswa dari session
        $data = session('siswa_data',$this->arr);

        //cari data berdasarkan id
        $siswa = collect($data)->firstWhere('id',$id);

        //jika data tdk ada
        if (! $siswa) {
            abort(404);
        }

        // dd(siswa); (dummydata) untuk cek data
        return view('siswa.show',compact('siswa'));
    }

    public function create() {
        return view('siswa.create');
    }

    public function store(Request $request) {
        $siswa = session('siswa_data',$this->arr);

        // membuat increment id otomatis
        $newId = collect($siswa)->max('id')+1;

        //tambah data siswa
        $siswa[] = [
            'id' => $newId,
            'kelas' => $request->kelas,
            'nama' => $request->nama
        ];

        //simpan ke array siswa
        session(['siswa_data' => $siswa]);

        //simpan data siswa ke array
        return redirect('/siswa');
    }

    public function edit($id) {
        //ambil data siswa dari session
        $data = session('siswa_data',$this->arr);

        //cari data berdasarkan id
        $siswa = collect($data)->firstWhere('id',$id);

        //jika data tdk ada
        if (! $siswa) {
            abort(404);
        }

        // dd(siswa); (dummydata) untuk cek data
        return view('siswa.edit',compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $data = session('siswa_data', $this->arr);

        foreach ($data as &$item){
            if ($item['id'] == $id){
                // mengubah isi data nama dan kelas
                $item['nama'] = $request->nama;
                $item['kelas'] = $request->kelas;
                break;
            }
        }
    
        // menyimpan data yg telah diupdate ke session
        session(['siswa_data' => $data]);

        return redirect('/siswa');
    }

    public function destroy($id) {
        $siswa = session('siswa_data', $this->arr);
        //mencari array yg sama dari column id
        $index = array_search($id, array_column($siswa, 'id'));

        //hapus data berdasarkan id dari index array nya
        array_splice($siswa ,$index, 1);

        // merefresh data id
        session(['siswa_data' => $siswa]);

        return redirect('/siswa');

    }

}