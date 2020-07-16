@extends('layouts.master')

@section('content')

	<div class="col-md-10">
		<div class="card-body">
			<form role="form" id="thisform" method="post" action="{{ url('adviser/store') }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="box-body">
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" name="nama" class="form-control" placeholder="Input Nama">
					</div>
					<div class="form-group">
						<label for="company">Company</label>
						<input type="text" name="company" class="form-control" placeholder="Input Nama Company">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" name="email" class="form-control" placeholder="Input Email Valid">
					</div>
					<div class="form-group">
						<label>Summary</label>
						<textarea class="form-control" name="summary" rows="3"></textarea>
					</div>
					<div class="form-group">
						<label>Experience</label>
						<textarea class="form-control" name="experience" rows="3"></textarea>
					</div>
					<div class="form-group">
						<label>Education</label>
						<textarea class="form-control" name="education" rows="3"></textarea>
					</div>
					<div class="form-group">
						<label>Link Foto</label>
						<input type="text" name="path" class="form-control">
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
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