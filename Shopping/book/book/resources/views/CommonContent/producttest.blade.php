@php
  $subcounter=0;
  $product_lenght=count($cat_product);
@endphp
  @for($i=0;$i<$product_lenght;$i++)
          @if($subcounter<5)
          <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
              <div class="prd-inside">
                <div class="prd-img-area">
                  <a href="##" class="prd-img image-hover-scale image-container">
                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/books/products/product-21.png" alt="The Book 21" class="js-prd-img lazyload fade-up">
                    <div class="foxic-loader"></div>
                    <div class="prd-big-squared-labels">
                    </div>
                  </a>
                  <div class="prd-circle-labels">
                    <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                    <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                  </div>
                </div>
                <div class="prd-info">
                  <div class="prd-info-wrap">
                    <div class="prd-info-top">
                      <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                    </div>
                    <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                    <div class="prd-tag"><a href="#">Foxic</a></div>
                    <h2 class="prd-title"><a href="##">The Book 21</a></h2>
                    <div class="prd-description">
                      Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                    </div>
                    <div class="prd-action">
                      <form action="#">
                        <button class="btn js-prd-addtocart" data-product='{"name": "The Book 21", "path":"images/skins/books/products/product-21.png", "url":"##", "aspect_ratio":0.778}'>Add To Cart</button>
                      </form>
                    </div>
                  </div>
                  <div class="prd-hovers">
                    <div class="prd-circle-labels">
                      <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                      <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                    </div>
                    <div class="prd-price">
                      <div class="price-new">$ 18</div>
                    </div>
                    <div class="prd-action">
                      <div class="prd-action-left">
                        <form action="#">
                          <button class="btn js-prd-addtocart" data-product='{"name": "The Book 21", "path":"images/skins/books/products/product-21.png", "url":"##", "aspect_ratio":0.778}'>Add To Cart</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @php
          $subcounter++;
          @endphp
          @endif
          
@endfor