@extends('layouts.master')

@section('content')

		@if($message = Session::get('success'))
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">×</button> 
				<p class="sukses">{{ $message }}</p>
			</div>
		@endif
		@if ($message = Session::get('update'))
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">×</button> 
				<p class="sukses">{{ $message }}</p>
			</div>
		@endif
		@if ($message = Session::get('delete'))
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">×</button> 
				<p class="sukses">{{ $message }}</p>
			</div>
		@endif
		<div class="card-body">
			<table id="example2" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Nama</th>
						<th>Company</th>
						<th>Email</th>
						<th>Summary</th>
						<th>Action</th>
					</tr>
				</thead>
			</table>
		</div>

	@endsection

	@section('scripts')
	<script>
		$(document).ready(function(){
		var table =	$('.table-bordered').DataTable({
				processing: true,
				serverSide: true,
				responsive: true,
				autowidth: true,
				ajax: "{{ url('adviser/yajra') }}",
				columns: [
	            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
	            {data: 'nama', name: 'nama'},
	            {data: 'company', name: 'company'},
	            {data: 'email', name: 'email'},
	            {data: 'summary', name: 'summary'},
	            {data: 'action', name: 'action', orderable: false, searchable: false}
	            ]
	        });

		$('body').on('click','.deleteData',function(e){
				var id = $(this).data("id");
				if(confirm("Are You sure want to delete this Data !")){
					$.ajax({
						type: "DELETE",
						url: "adviser/delete/"+ id,
						dataType: "JSON",
						data: {
							"_token": "{{ csrf_token() }}",
							"id": id 
						},
						success: function (data)
						{
							console.log(response); 
						},
						error: function(xhr) {
						console.log(xhr.responseText); 
					}
					});
				}
				$(document).ajaxStop(function(){
					window.location.reload();
				});
			});
		})
	</script>
	@endsection