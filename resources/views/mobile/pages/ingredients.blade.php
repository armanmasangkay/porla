
@extends('mobile.layout.mobile')

@section('title', 'Ingredients')

@section('content')
    <div class="col-md-6 offset-md-6">
        sdfs
    </div>
    <script>
      var base_url = '{!! json_encode(url("/")) !!}' + '/mobile/stocks/view';
      console.log('' + base_url);
    </script>
@endsection