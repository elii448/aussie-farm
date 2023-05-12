@extends('layouts.app')

@section('content')
<div class='container'>
  <div class='row justify-content-center'>
    <div class='col-md-12'>
      <h1>Kangaroo Data</h1>
      <div id='gridContainer'></div>
    </div>
  </div>
</div>

@vite('resources/js/index.js')

@endsection