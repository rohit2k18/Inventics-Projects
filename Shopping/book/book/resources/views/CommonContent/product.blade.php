@php
  $subcounter=0;
@endphp
@for($i=$counter;$i<count($cat_product);$i++)
          @if($subcounter<5)
          
          <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
            <div class="prd-inside">
              <div class="prd-img-area">
                <a href="{{asset('product/'.$cat_product[$i]->product_sub_cat.'/'.$cat_product[$i]->product_cat.'/'.$cat_product[$i]->slug)}}" class="prd-img image-hover-scale image-container">
                  <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{$img_url}}{{$cat_product[$i]->img_path}}" alt="The Book 01" class="js-prd-img lazyload fade-up">
                  <div class="foxic-loader"></div>
                  <div class="prd-big-squared-labels">
                  </div>
                </a>
                <div class="prd-circle-labels">
                  <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                  <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.blade.php"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                </div>
              </div>
              <div class="prd-info">
                <div class="prd-info-wrap">
                  <div class="prd-info-top">
                    <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                  </div>
                  <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                  <div class="prd-tag"><a href="#">{{$cat_product[$i]->id}}||{{$cat_product[$i]->brand}}</a></div>
                  <h2 class="prd-title"><a href="#">{{$cat_product[$i]->name}}</a></h2>
                  <div class="prd-description">
                  {!! $cat_product[$i]->description !!}
                    
                  </div>
                  <div class="prd-action">
                    <form action="#">
                      <button class="btn js-prd-addtocart" data-product='{"name": "The Book 01", "path":"images/skins/books/products/product-01.png", "url":"product", "aspect_ratio":0.778}'>Add To Cart</button>
                    </form>
                  </div>
                </div>
                <div class="prd-hovers">
                  <div class="prd-circle-labels">
                    <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                    <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.blade.php"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                  </div>
                  <div class="prd-price">
                    <div class="price-new">{{$current_currency}} {{$cat_product[$i]->min_price+0}}</div>
                  </div>
                  <div class="prd-action">
                    <div class="prd-action-left">
                    <!-- <form action="{{route('addtocart')}}" method="POST"> -->
                    {{--@csrf()--}}
                          
                        <!-- <input type="hidden" id="productid" name="productid" value="{{$cat_product[$i]->id}}"> -->
                        
                        <!-- <button onclick="onaddtocartclick1({{$cat_product[$i]->id}})" class="btn js-prd-addtocart">Hello</button> -->
                        <button  onclick="onaddtocartclick({{$cat_product[$i]->id}})" class="btn js-prd-addtocart" data-product='{"name": "{{$cat_product[$i]->name}}", "path":"{{$img_url}}{{$cat_product[$i]->img_path}}", "url":"#", "aspect_ratio":0.778}'>Add To Cart</button>
                      <!-- </form> -->
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          @php
          $subcounter++;
          $counter++;
          @endphp
          @endif
          
@endfor

<script>
function onaddtocartclick(id)
{
  
  $.ajax({
      url: "{{route('addtocart')}}",
      type: 'POST',
      // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
      data: {
        productid: id,
        _token:'{{ csrf_token() }}'
      },
         success: function(response){
          console.log(response);
          var dataResult = JSON.parse(response);
          if(dataResult.data=="login")
          window.location = "{{route('login')}}";
          else
          document.getElementById("addedtocarttext").innerHTML=dataResult.data;
          
          }
  })
}

function onaddtocartclick1(id)
{
  $.ajax({
    type:'GET',
    url:'add_to_cart1/'+id,
  });
  
}

</script>
