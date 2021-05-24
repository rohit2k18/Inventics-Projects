<div class="holder">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-18 col-lg-12">
            <h2 class="text-center">Create an Account</h2>
            <div class="form-wrapper">
              <p>To access your whishlist, address book and contact preferences and to take advantage of our speedy checkout, create an account with us now.</p>
              <form action="{{route('SignUpStore')}}" method="post">
              @csrf()
              
                <div class="row">
                  <div class="col-sm-9">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="First name">
                    </div>
                  </div>
                  <div class="col-sm-9">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Last name">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="Confirm Password">
                </div>
                <div class="clearfix">
                  <input id="checkbox1" name="checkbox1" type="checkbox" checked="checked">
                  <label for="checkbox1">By registering your details you agree to our <a href="#" class="custom-color" data-fancybox data-src="#modalTerms">Terms and Conditions</a> and <a href="#" class="custom-color" data-fancybox data-src="#modalCookies">Cookie Policy</a></label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn">create an account</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>