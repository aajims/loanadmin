@extends('layouts.master')

@section('content')

	<div class="col-md-10">
		<div class="card-body">
			<form role="form" id="myform" method="post" action="{{ url('cabang/'. $data->id) }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class="box-body">
					<div class="form-group">
						<label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ $data->nama }}" placeholder="Input Nama">
					</div>
					<div class="form-group">
						<label>Kota</label><br/>
						<span>{{ $data->nama_kota }}</span>
					<input type="hidden" name="kota" value="{{ $data->kota }}"/>
						<select class="form-control" name="kota" id="kota"></select>
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea class="form-control" name="alamat" rows="3">{{ $data->alamat }}</textarea>
					</div>
					<div class="form-group">
						<label>Telpon</label>
						<input type="text" name="telp" class="form-control" value="{{ $data->telp }}" placeholder="Input No Telp">
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="/cabang" class="btn btn-warning">Back</a>
				</div>
			</form>
		</div>
	</div>

@endsection

@section('scripts')
<script type="text/javascript">
        $('#kota').select2({
            placeholder: 'Select an Kota',
            ajax: {
            url: '/cabang-getdata',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                results:  $.map(data, function (item) {
                        return {
                            text: item.nama_kota,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
            }
        });
	$(function () {
		$( "#myform" ).validate({
		rules: {
			nama: { required: true },
			// kota: { required: true },
			alamat: { required: true, minlength: 4},
			telp: { required: true, digits: true, minlength: 7, maxlength: 13},
			},
			messages: {
			nama: {
				required: "Nama mohon di isi dulu"
			},
			// kota: {
			// 	required: "Kota mohon di pilih dulu"
			// },
			alamat: {
				required: "Alamat mohon di isi dulu",
				minlength: "Alamat Min 7 Character"
			},
			telp: {
				required: "Telpon mohon di isi dulu",
                minlength: "Telpon Min 7 Digit",
                digits: "Telpon harus Digit",
                maxlength: "Telpon Max 13 Digit",
			},
		}
		});
	})
</script>
@endsection