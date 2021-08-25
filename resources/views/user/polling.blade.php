@extends('templateuser.layout')
@section('title','Vote')
@section('content')
<div class="alert alert-primary w-100">
	<li>Gunakan hak pilih anda</li>
</div>
<div class="row">
	@foreach($poll->choice as $data)
	<div class="col-md-4 mb-5" id="card-paslon">
		<div class="card shadow h-100 " style="width: 18rem;"  id="paslon">
			<center>
				<img src="{{asset($data->sampul)}}" alt="" class=" w-100">
			</center>
			<div class="card-body">
				<center>
					<h5 class="card-title">{{ $data->name }}</h5>
				</center>
			</div>
			<a onClick="uservote({{$data->id}})" data-toggle="modal" href='#modal-id' class="btn w-100 text-light" style="background-color:#045de9;" id="btn-vote">Vote <li class="fa fa-direction-right"></li></a>
		</div>
	</div>
	@endforeach
	<?php
	$max = 6;
	$jlm = $max - $hitung;
	?>
	@for($i=0 ; $i < $jlm ; $i++)
	<div class="col-md-4 mb-3" id="img-none">
		<div class="card shadow" style="width: 18rem;"  id="paslon">
			<center>
				<button type="submit" class="bg-transparent" style="border:none;outline: none;"><img src="{{asset('gambar/deafult.png')}}" alt="" class="w-100"></button>
			</center>
			<div class="card-body">
				<center>
					<i class="fa fa-2x fa-ban mt-3" aria-hidden="true"></i>
				</center>
			</div>
		</div>
	</div>
	@endfor
</div>

<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<h4 class="modal-title text-light">Vote</h4>
				<button type="button" class="close text-light" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">

			</div>
		</div>
	</div>
</div>
<div style="margin-bottom: 100px;"></div>
<script type="text/javascript">
	$('.modal-body').html('<div class="h4 mt-2">Memuat data..</div>');
	function uservote(id){
		$.get("{{url('vote/')}}/"+id,{}, function(data,status) {

			$('.modal-body').html(data);
		});
	}
</script>

@endsection
