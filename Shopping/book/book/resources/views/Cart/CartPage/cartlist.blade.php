
@foreach($cart_ids as $cartid)
<!-- <hr style="height:2px;border-width:0;color:gray;background-color:gray"> -->
<div class="col-lg-11 col-xl-13">

            <div class="cart-table">
              <div class="cart-table-prd cart-table-prd--head py-1 d-none d-md-flex">
                <div class="cart-table-prd-image text-center">
                  Image
                </div>
                <div class="cart-table-prd-content-wrap">
                  <div class="cart-table-prd-info">Name</div>
                  <div class="cart-table-prd-qty">Qty</div>
                  <div class="cart-table-prd-price">Price</div>
                  <div class="cart-table-prd-action">&nbsp;</div>
                </div>
              </div>
              @foreach($cart_data as $cart)
              @if($cart->cart_id == $cartid->id)
              
              <div class="cart-table-prd">
                <div class="cart-table-prd-image">
                @foreach($inventory_images as $inv)
                @if($inv->id==$cart->inventory_id)
                  <a href="##" class="prd-img"><img class="lazyload fade-up" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="   data-src="{{$img_url}}{{$inv->img_path}}"  alt=""></a>
                @php
                  break;
                @endphp
                @endif 
                @endforeach
                </div>
                <div class="cart-table-prd-content-wrap">
                  <div class="cart-table-prd-info">
                    <div class="cart-table-prd-price">
                      <!-- <div class="price-old">$200.00</div> -->
                      <div class="price-new">{{$current_currency}} {{$cart->unit_price+0}}</div>
                    </div>
                    <h2 class="cart-table-prd-name"><a href="##">{{$cart->name}}</a></h2>
                  </div>
                  <div class="cart-table-prd-qty">
                    <div class="qty qty-changer">
                      <button class="decrease" onclick="decrease({{$cart->inventory_id}})"></button>
                      <input type="text" class="qty-input" id="test{{$cart->inventory_id}}" name="{{$cart->inventory_id}}" value="{{$cart->item_quantity}}" data-min="0" data-max="1000">
                      <button class="increase" onclick="increase({{$cart->inventory_id}})"></button>
                    </div>
                  </div>
                  <div class="cart-table-prd-price-total" id="price{{$cart->inventory_id}}">
                  <input type="hidden" id="unit_price{{$cart->inventory_id}}" value="{{$cart->unit_price+0}}">
                   {{$current_currency}} {{$cart->total+0}}
                  </div>
                </div>
                <div class="cart-table-prd-action">
                  <a href="#" class="cart-table-prd-remove" data-tooltip="Remove Product"><i class="icon-recycle"></i></a>
                </div>
              </div>
              
              @endif
              @endforeach
              <!-- <hr style="height:2px;border-width:0;color:gray;background-color:gray"> -->
              <!-- <div class="cart-table-prd">
                <div class="cart-table-prd-image">
                  <a href="##" class="prd-img"><img class="lazyload fade-up" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-01-1.jpg" alt=""></a>
                </div>
                <div class="cart-table-prd-content-wrap">
                  <div class="cart-table-prd-info">
                    <div class="cart-table-prd-price">
                      <div class="price-old">$200.00</div>
                      <div class="price-new">$180.00</div>
                    </div>
                    <h2 class="cart-table-prd-name"><a href="##">Leather Pegged Pants</a></h2>
                  </div>
                  <div class="cart-table-prd-qty">
                    <div class="qty qty-changer">
                      <button class="decrease"></button>
                      <input type="text" class="qty-input" value="2" data-min="0" data-max="1000">
                      <button class="increase"></button>
                    </div>
                  </div>
                  <div class="cart-table-prd-price-total">
                    $360.00
                  </div>
                </div>
                <div class="cart-table-prd-action">
                  <a href="#" class="cart-table-prd-remove" data-tooltip="Remove Product"><i class="icon-recycle"></i></a>
                </div>
              </div>
              <div class="cart-table-prd">
                <div class="cart-table-prd-image">
                  <a href="##" class="prd-img"><img class="lazyload fade-up" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-16-1.jpg" alt=""></a>
                </div>
                <div class="cart-table-prd-content-wrap">
                  <div class="cart-table-prd-info">
                    <div class="cart-table-prd-price">
                      <div class="price-new">$220.00</div>
                    </div>
                    <h2 class="cart-table-prd-name"><a href="##">Cascade Casual Shirt</a></h2>
                  </div>
                  <div class="cart-table-prd-qty">
                    <div class="qty qty-changer">
                      <button class="decrease"></button>
                      <input type="text" class="qty-input" value="2" data-min="0" data-max="1000">
                      <button class="increase"></button>
                    </div>
                  </div>
                  <div class="cart-table-prd-price-total">
                    $360.00
                  </div>
                </div>
                <div class="cart-table-prd-action">
                  <a href="#" class="cart-table-prd-remove" data-tooltip="Remove Product"><i class="icon-recycle"></i></a>
                </div>
              </div>
              <div class="cart-table-prd">
                <div class="cart-table-prd-image">
                  <a href="##" class="prd-img"><img class="lazyload fade-up" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-02-1.jpg" alt=""></a>
                </div>
                <div class="cart-table-prd-content-wrap">
                  <div class="cart-table-prd-info">
                    <div class="cart-table-prd-price">
                      <div class="price-new">$75.00</div>
                    </div>
                    <h2 class="cart-table-prd-name"><a href="##">Oversize Cotton Dress</a></h2>
                  </div>
                  <div class="cart-table-prd-qty">
                    <div class="qty qty-changer">
                      <button class="decrease"></button>
                      <input type="text" class="qty-input" value="2" data-min="0" data-max="1000">
                      <button class="increase"></button>
                    </div>
                  </div>
                  <div class="cart-table-prd-price-total">
                    $360.00
                  </div>
                </div>
                <div class="cart-table-prd-action">
                  <a href="#" class="cart-table-prd-remove" data-tooltip="Remove Product"><i class="icon-recycle"></i></a>
                </div>
              </div> -->
            </div>

            <div class="text-center mt-1"><a href="#" class="btn btn--grey">Clear All</a></div>
            
          </div>
          
          @include('Cart.CartPage.cartoptions')
         
          @endforeach
       
        <div class="col-lg-11 col-xl-13">
            <div class="d-none d-lg-block">
              <div class="mt-4"></div>
              @include('CommonContent.youmayalsolike')
            </div>
          </div>
          
          <div class="col-lg-7 col-xl-5 mt-3 mt-md-0">
          
            <div class="panel-group panel-group--style1 prd-block_accordion" id="productAccordion">
              <div class="panel">
                <div class="panel-heading active">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#productAccordion" href="#collapse1">Shipping options</a>
                    <span class="toggle-arrow"><span></span><span></span></span>
                  </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse show">
                  <div class="panel-body">
                    <label>Country:</label>
                    <div class="form-group select-wrapper select-wrapper-sm">
                      <select class="form-control form-control--sm">
                        <option value="United States">United States</option>
                        <option value="Canada">Canada</option>
                        <option value="China">China</option>
                        <option value="India">India</option>
                        <option value="Italy">Italy</option>
                        <option value="Mexico">Mexico</option>
                      </select>
                    </div>
                    <label>State:</label>
                    <div class="form-group select-wrapper select-wrapper-sm">
                      <select class="form-control form-control--sm">
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="DC">District Of Columbia</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                      </select>
                    </div>
                    <label>Zip/Postal code:</label>
                    <div class="form-group">
                      <input type="text" class="form-control form-control--sm">
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel">
                <div class="panel-heading active">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#productAccordion" href="#collapse2">Discount Code</a>
                    <span class="toggle-arrow"><span></span><span></span></span>
                  </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse show">
                  <div class="panel-body">
                    <p>Got a promo code? Then you're a few randomly combined numbers & letters away from fab savings!</p>
                    <div class="form-inline mt-2">
                      <input type="text" class="form-control form-control--sm" placeholder="Promotion/Discount Code">
                      <button type="submit" class="btn">Apply</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel">
                <div class="panel-heading active">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#productAccordion" href="#collapse3">Note for the seller</a>
                    <span class="toggle-arrow"><span></span><span></span></span>
                  </h4>
                </div>
                <div id="collapse3" class="panel-collapse collapse show">
                  <div class="panel-body">
                    <textarea class="form-control form-control--sm textarea--height-100" placeholder="Text here"></textarea>
                    <div class="card-text-info mt-2">
                      <p>*Savings include promotions, coupons, rueBUCKS, and shipping (if applicable).</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
        

<script>

function increase(id)
{
  var y = document.getElementById("test"+id).value;
  var temp=parseInt(y);
  document.getElementById("test"+id).value=temp+1;

  var unit_price = document.getElementById("unit_price"+id).value;
  document.getElementById("price"+id).innerHTML="{{$current_currency}} "+(temp+1)*parseInt(unit_price);

  var grand_total = document.getElementById("grand_total"+id).value;
  document.getElementById("grand_total"+id).innerHTML="{{$current_currency}} "+(parseInt(grand_total)-parseInt(unit_price));
}

function decrease(id)
{
  var x = document.getElementById("test"+id).value;
  var temp=parseInt(x);
  if(temp>1)
  document.getElementById("test"+id).value=temp-1;

  var unit_price = document.getElementById("unit_price"+id).value;
  document.getElementById("price"+id).innerHTML="{{$current_currency}} "+(temp-1)*parseInt(unit_price);

  var grand_total = document.getElementById("grand_total"+id).value;
  document.getElementById("grand_total"+id).innerHTML="{{$current_currency}} "+(parseInt(grand_total)-parseInt(unit_price));
}

</script>