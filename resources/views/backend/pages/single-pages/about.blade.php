@extends('backend.layout.app')
@section('content')

<div class="x_content">
	<div class="row">
	<form id="demo-form" data-parsley-validate>
		<div class="col-xs-6">
		<label for="fullname">Nepali-Title * :</label>
		<input type="text" id="fullname" class="form-control" name="fullname" required />

		<label for="fullname">Nepali-Description * :</label>
		@include('backend.pages.single-pages.editor')
	</div>
		<div class="item form-group">
			<div class="col-md-6 col-sm-6 offset-md-3">
				<button class="btn btn-primary" type="button">Cancel</button>
				<button type="submit" class="btn btn-success">Submit</button>
			</div>
		</div>
	</form>
</div>
</div>
@endsection
