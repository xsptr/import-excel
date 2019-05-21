<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pegawai;

use Session;

use App\Exports\PegawaiExport;
use App\Imports\PegawaiImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class PegawaiController extends Controller
{
    //
    public function index()
    {
    	$pegawai = Pegawai::all();
    	return view('pegawai',['pegawai'=>$pegawai]);
    }

    public function export_excel()
    {

    	return Excel::download(new PegawaiExport, 'pegawai.xlsx');
    }

    public function import_excel(Request $request)
    {
    	//validasi
    	$this->validate($request, [
    		'file' => 'required|mimes:csv,xls,xlsx'
    		]);

    	// menangkap file excel
    	$file = $request->file('file');

    	//membuat nama file
    	$nama_file = rand().$file->getClientOriginalName();

    	//upload ke folder file_pegawai di dalam folder public
    	$file->move('file_pegawai', $nama_file);

    	try {
    	// import data
    		Excel::import(new PegawaiImport, public_path('/file_pegawai/'.$nama_file));
    	} catch (\Exception $ex) {
    		return back()->withError('Terdapat kesalahan format pada kolom.');
    	}

    	// notifikasi dengan session
    	Session::flash('sukses', 'Data Berhasil Diimport!');

    	// alihkan halaman kembali
    	return redirect('/');
    }
}
