<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class SiswaController extends Controller
{
    public function index()
    {
        $data = Siswa::all();

        return view('crud', compact('data'));
    }

    public function store(Request $request)
    {
        // $data = $request->all();
        // dd($data->nama);
        Siswa::create([
            'nama'  => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data Berhasil Ditambahkan!!');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        // dd($siswa);
        return view('edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);
        if ($request->password) {
            $this->validate(
                $request,
                [
                    'password' => 'required|min:6|confirmed',
                    'password_confirmation' => 'required'
                ],
                [
                    'password.confirmed' => 'Password Tidak sama!',
                ]
            );
            $siswa->nama     = $request->nama;
            $siswa->email    = $request->email;
            $siswa->password = Hash::make($request->password);
            $siswa->save();
            return redirect()->route('siswa.index')->with('success', 'Password Berhasil Diganti');
        } else {
            $siswa->nama = $request->nama;
            $siswa->email = $request->email;
            $siswa->save();
            return redirect()->route('siswa.index')->with('success', 'Data Berhasil Diganti');
        }
    }

    public function delete($id)
    {
        Siswa::findOrFail($id)->delete();
        return redirect()->route('siswa.index')->with('success', 'Data Berhasil Dihapus!');
    }
}
