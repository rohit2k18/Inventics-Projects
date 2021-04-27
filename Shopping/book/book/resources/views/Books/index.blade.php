@extends('layout.master')
@section('content')
<div class="page-content">
    @include('Books.mainad')
    @include('Books.bestseller')
    @include('Books.trendingbooks')
    @include('Books.authoroftheweek')
    @include('Books.booksforknowledge')
    @include('Books.collection')
    
    
    
  </div>
  
@endsection