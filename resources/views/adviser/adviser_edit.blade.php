@extends('layouts.master')

@section('content')

	<div class="col-md-10">
		<div class="card-body">
			<form role="form" id="thisform" method="post" action="{{ url('adviser/'. $data->id) }}">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class="box-body">
					<div class="form-group">
						<label for="nama">Nama</label>
					<input type="text" name="nama" class="form-control" value="{{ $data->nama }}" placeholder="Input Nama">
					</div>
					<div class="form-group">
						<label for="company">Company</label>
						<input type="text" name="company" class="form-control" value="{{ $data->company }}" placeholder="Input Nama Company">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" name="email" class="form-control" value="{{ $data->email }}" placeholder="Input Email Valid">
					</div>
					<div class="form-group">
						<label>Summary</label>
						<textarea class="form-control" name="summary" rows="3"> {{ $data->summary }}</textarea>
					</div>
					<div class="form-group">
						<label>Experience</label>
						<textarea class="form-control" name="experience" rows="3"> {{ $data->experience }}</textarea>
					</div>
					<div class="form-group">
						<label>Education</label>
						<textarea class="form-control" name="education" rows="3"> {{ $data->education }}</textarea>
					</div>
					<div class="form-group">
						<label>Link Foto</label>
						<input type="text" name="path" class="form-control" value="{{ $data->path }}" placeholder="Input Link Image">
					</div>
					<div class="form-group">
						<label> Foto</label>
						<img class="img-foto" src={{ $data->path }}/>
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<button type="submit" class="btn btn-primary"> Update</button>
					<a href="/adviser" class="btn btn-warning">Back</a>
				</div>
			</form>
		</div>
	</div>

@endsection


@section('scripts')
<script>
	$(function () {
		$( "#thisform" ).validate({
		rules: {
			nama: { required: true },
			company: { required: true },
			email: { required: true, email: true },
			summary: { required: true, minlength: 12},
			experience: { required: true, minlength: 12},
			education: { required: true, minlength: 12}
			},
			messages: {
			nama: {
				required: "Nama mohon di isi dulu"
			},
			company: {
				required: "Company mohon di isi dulu"
			},
			email: {
				required: "Email mohon di isi dulu",
				email: "Email Harus Valid"
			},
			summary: {
				required: "summary mohon di isi dulu",
				minlength: "summary Min 12 Character"
			},
			experience: {
				required: "Experience mohon di isi dulu",
				minlength: "experience Min 12 Character"
			},
			education: {
				required: "education mohon di isi dulu",
				minlength: "education Min 12 Character"
			},
		}
		});
	})
</script>
@endsection
