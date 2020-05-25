<div class="col-sm-12" >
        @if ($errors->any())
        <div id="errmsg" class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
      </div>


@if(session('message'))
    <div id="successmsg" class="alert alert-info">
        {{ session('message') }}
    </div>
 @endif
    @section('scripts')
    <script type="text/javascript">
      $('#successmsg').fadeOut(1500);
      $('#errmsg').fadeOut(1500);
    </script>
@endsection