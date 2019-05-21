@extends('layouts.app')

@section('content')

<div class="container">

	{{-- notifikasi form validasi --}}
	@if ($errors->has('file'))
	<span class="invalid-feedback" role="alert">
		<strong>{{ $errors->first('file') }}</strong>
	</span>
	@endif
	
	@if (session('error'))
		<div class="alert alert-danger alert-block">
			<button type="button" class="close" data-dismiss="alert">x</button>
			<strong>{{ session('error') }}</strong>
		</div>
	@endif


	{{-- notifikasi sukses --}}
	@if ($sukses = Session::get('sukses'))
	<div class="alert alert-success alert-block">
		<button type="button" class="close" data-dismiss="alert">x</button>
		<strong>{{ $sukses }}</strong>
	</div>
	@endif

	@guest
	<div>
		
	</div>
	@else
	<button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
		IMPORT
	</button>

	<a href="/pegawai/export_excel" class="btn btn-success my-3" target="_blank">EXPORT</a>
	@endguest

	<!-- Import Excel -->
	<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<form method="post" action="/pegawai/import_excel" enctype="multipart/form-data">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
					</div>

					<div class="modal-body">
						
						{{ csrf_field() }}

						<label>Pilih file excel..</label>
						<div class="form-group">
							<input type="file" name="file" required="required">
						</div>

					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Import</button>
					</div>

				</div>
			</form>
		</div>
		
	</div>
	


	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Jabatan</th>
				<th>Umur</th>
				<th>Alamat</th>
			</tr>
		</thead>

		<tbody>
			@php $i=1 @endphp
			@foreach($pegawai as $key)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{ $key->nama }}</td>
				<td>{{ $key->jabatan }}</td>
				<td>{{ $key->umur }}</td>
				<td>{{ $key->alamat }}</td>
			</tr>
			@endforeach
		</tbody>

	</table>

</div>


@endsection