<!-- @include('layout.header' , ['title' => 'Halaman Fakultas'] ) -->

@extends('layout.master')
@section('title' , 'Halaman Fakultas')

@section('content')
<h2>Fakultas</h2>

<ul>
    @If(count($fakultas) > 0)
      @foreach ($fakultas as $item)
     <li> {{ $item }}</li>
      @endforeach
    @else
      <li>Belum Ada Data</li>
    @endif
</ul>
@endsection


<!-- @include('layout.footer') -->