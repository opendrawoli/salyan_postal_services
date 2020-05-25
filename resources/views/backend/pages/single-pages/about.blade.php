@extends('backend.layout.app')
@section('content')

<div class="x_content">
		<form method="POST" action="@if(isset($about)) {{route('admin.postAbout',$about->id)}} @else {{route('admin.getAbout')}} @endif">
			@csrf
			
	<div class="row">
			<div class="col-md-6">
				<label for="title">Title (नेपालीमा) * :</label>
				<input type="text" id="title_nepali" class="form-control" name="title_nepali" required />

				<label for="description">Description (नेपालीमा) * :</label>
				@include('backend.pages.single-pages.editor_nepali')
			</div>
			<div class="col-md-6">
				<label for="Title">Title * :</label>
				<input type="text" id="title_english" class="form-control" name="title_english"  />

				<label for="description">Description * :</label>
				@include('backend.pages.single-pages.editor_english')
			</div>
		</div>
		<br>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3" style="text-align: center;">
					<button type="submit" class="btn btn-success">Submit</button>
				</div>
			</div>
		</form>
</div>
@endsection