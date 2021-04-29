@extends('layout.master')
@section('content')
  @include('Product.header_pannel')
  @include('Product.header_side_pannel')
  <div class="page-content">
    <div class="holder breadcrumbs-wrap mt-0">
      <div class="container">
        <ul class="breadcrumbs">
          <li><a href="index.html">Home</a></li>
          <li><a href="category.html">Women</a></li>
          <li><span>Leather Pegged Pants</span></li>
        </ul>
      </div>
    </div>
    <div class="holder">
      <div class="container js-prd-gallery" id="prdGallery">
        @include('Product.product_header')
        <div class="row prd-block prd-block--prv-bottom">
          @include('Product.product_image')
          @include('Product.product_short_description')
        </div>
      </div>
    </div>
    @include('Product.product_text_holder')

    @include('Product.more_details')
    @include('Product.product_you_may_like')
  </div>
  @include('Product.product_footer')

@endsection