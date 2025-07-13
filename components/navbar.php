 <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasCart" aria-labelledby="My Cart">
      <div class="offcanvas-header justify-content-center">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div class="order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Your cart</span>
            <span class="badge bg-primary rounded-pill">3</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Growers cider</h6>
                <small class="text-body-secondary">Brief description</small>
              </div>
              <span class="text-body-secondary">$12</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Fresh grapes</h6>
                <small class="text-body-secondary">Brief description</small>
              </div>
              <span class="text-body-secondary">$8</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Heinz tomato ketchup</h6>
                <small class="text-body-secondary">Brief description</small>
              </div>
              <span class="text-body-secondary">$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>$20</strong>
            </li>
          </ul>
  
          <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
        </div>
      </div>
    </div>
    
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasSearch" aria-labelledby="Search">
      <div class="offcanvas-header justify-content-center">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div class="order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Search</span>
          </h4>
          <form role="search" action="index.html" method="get" class="d-flex mt-3 gap-0">
            <input class="form-control rounded-start rounded-0 bg-light" type="email" placeholder="What are you looking for?" aria-label="What are you looking for?">
            <button class="btn btn-dark rounded-end rounded-0" type="submit">Search</button>
          </form>
        </div>
      </div>
    </div>

    <header>
      <div class="container-fluid">
        <div class="row py-3 border-bottom">
          
          <div class="col-sm-4 col-lg-3 text-center text-sm-start">
            <div class="main-logo">
              <a href="index.html">
                <img src="images/logo.png" alt="logo" class="img-fluid">
              </a>
            </div>
          </div>
          
          <div class="col-sm-6 offset-sm-2 offset-md-0 col-lg-5 d-none d-lg-block">
            <div class="search-bar row bg-light p-2 my-2 rounded-4">
              <div class="col-md-4 d-none d-md-block">
                <select class="form-select border-0 bg-transparent">
                  <option>All Categories</option>
                  <option>Groceries</option>
                  <option>Drinks</option>
                  <option>Chocolates</option>
                </select>
              </div>
              <div class="col-11 col-md-7">
                <form id="search-form" class="text-center" action="index.html" method="post">
                  <input type="text" class="form-control border-0 bg-transparent" placeholder="Search for more than 20,000 products" />
                </form>
              </div>
              <div class="col-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z"/></svg>
              </div>
            </div>
          </div>
          
          <div class="col-sm-8 col-lg-4 d-flex justify-content-end gap-5 align-items-center mt-4 mt-sm-0 justify-content-center justify-content-sm-end">
            <div class="support-box text-end d-none d-xl-block">
              <span class="fs-6 text-muted">For Support?</span>
              <h5 class="mb-0">+980-34984089</h5>
            </div>

            <ul class="d-flex justify-content-end list-unstyled m-0">
              <li>
                <a data-bs-toggle="modal" data-bs-target="#loginModal" href="" class="rounded-circle bg-light p-2 mx-1">
                  <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#user"></use></svg>
                </a>
              </li>
              <!-- login Modal -->
                <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content py-3">
                  <div class="modal-header p-3 mx-4 border-0">
                      <img src="assets/images/RECIPELogo.png" alt="Food Fusion Logo">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body-login w-100">
                    <div class="p-4 d-flex">
                      <div class="leftlogin p-4">
                        <h3 class="mb-2 fs-4">Login With</h3>
                        <div class="connect-container">
                          <p>Connect with</p>
                          <button class="w-100 btn-facebook">
                            <i class="fab fa-facebook-f me-2"></i> Sign in with Facebook
                          </button>
                        </div>                        
                      </div>
                      
                      <div class="rightlogin p-4">
                        <h3 class="mb-3 fs-4">Login Via Email</h3>
                        <input loginput class="w-100 mb-2 loginput" type="text" placeholder="Email">
                        <input class="w-100 mb-2 loginput" type="text" placeholder="Password">
                        <button class="w-100">LOGIN</button>
                      </div>
                    </div>
                    <p class="text-center">Dont have an account? <a data-bs-toggle="modal" data-bs-target="#SignModal" href="">Sign Up Now</a></p>
                  </div>
              </div>
          </div>
        </div>
        <!-- Signin Modal -->
          <div class="modal fade" id="SignModal" tabindex="-1" aria-labelledby="SignModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content py-3">
                  <div class="modal-header p-3 mx-4 border-0">
                      <img src="assets/images/RECIPELogo.png" alt="Food Fusion Logo">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body-login w-100">
                    <div class="p-4 d-flex">
                      <div class="leftlogin p-4">
                        <h3 class="mb-2 fs-4">Signup With</h3>
                        <div class="connect-container">
                          <p>Connect with</p>
                          <button class="w-100 btn-facebook">
                            <i class="fab fa-facebook-f me-2"></i> Sign in with Facebook
                          </button>
                        </div>                        
                      </div>
                      
                      <div class="rightlogin p-4">
                        <h3 class="mb-3 fs-4">Login Via Email</h3>
                        <input loginput class="w-100 mb-2 loginput" type="text" placeholder="First Name">
                        <input class="w-100 mb-2 loginput" type="text" placeholder="Last Name">
                        <input class="w-100 mb-2 loginput" type="text" placeholder="Username">
                        <input class="w-100 mb-2 loginput" type="text" placeholder="Email">
                        <input class="w-100 mb-2 loginput" type="text" placeholder="Password">
                        <button class="w-100">LOGIN</button>
                      </div>
                    </div>
                    <p class="text-center">Dont have an account? <a href="" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a></p>
                  </div>
              </div>
          </div>
        </div>
              <li>
                <a href="#" class="rounded-circle bg-light p-2 mx-1">
                  <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#heart"></use></svg>
                </a>
              </li>
              <li class="d-lg-none">
                <a href="#" class="rounded-circle bg-light p-2 mx-1" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                  <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#cart"></use></svg>
                </a>
              </li>
              <li class="d-lg-none">
                <a href="#" class="rounded-circle bg-light p-2 mx-1" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearch" aria-controls="offcanvasSearch">
                  <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#search"></use></svg>
                </a>
              </li>
            </ul>

            <div class="cart text-end d-none d-lg-block dropdown">
              <button class="border-0 bg-transparent d-flex flex-column gap-2 lh-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                <span class="fs-6 text-muted dropdown-toggle">Your Cart</span>
                <span class="cart-total fs-5 fw-bold">$1290.00</span>
              </button>
            </div>
          </div>

        </div>
      </div>
      <div class="container-fluid">
        <div class="row py-3">
          <div class="d-flex  justify-content-center justify-content-sm-between align-items-center">
            <nav class="main-menu d-flex navbar navbar-expand-lg">

              <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

                <div class="offcanvas-header justify-content-center">
                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body">
              
                  <select class="filter-categories border-0 mb-0 me-5">
                    <option>Shop by Departments</option>
                    <option>Groceries</option>
                    <option>Drinks</option>
                    <option>Chocolates</option>
                  </select>
              
                  <ul class="navbar-nav justify-content-end menu-list list-unstyled d-flex gap-md-3 mb-0">
                    <li class="nav-item active">
                      <a href="#women" class="nav-link">Women</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="#men" class="nav-link">Men</a>
                    </li>
                    <li class="nav-item">
                      <a href="#kids" class="nav-link">Kids</a>
                    </li>
                    <li class="nav-item">
                      <a href="#accessories" class="nav-link">Accessories</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" role="button" id="pages" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
                      <ul class="dropdown-menu" aria-labelledby="pages">
                        <li><a href="index.html" class="dropdown-item">About Us </a></li>
                        <li><a href="index.html" class="dropdown-item">Shop </a></li>
                        <li><a href="index.html" class="dropdown-item">Single Product </a></li>
                        <li><a href="index.html" class="dropdown-item">Cart </a></li>
                        <li><a href="index.html" class="dropdown-item">Checkout </a></li>
                        <li><a href="index.html" class="dropdown-item">Blog </a></li>
                        <li><a href="index.html" class="dropdown-item">Single Post </a></li>
                        <li><a href="index.html" class="dropdown-item">Styles </a></li>
                        <li><a href="index.html" class="dropdown-item">Contact </a></li>
                        <li><a href="index.html" class="dropdown-item">Thank You </a></li>
                        <li><a href="index.html" class="dropdown-item">My Account </a></li>
                        <li><a href="index.html" class="dropdown-item">404 Error </a></li>
                      </ul>
                    </li>
                    <li class="nav-item">
                      <a href="#brand" class="nav-link">Brand</a>
                    </li>
                    <li class="nav-item">
                      <a href="#sale" class="nav-link">Sale</a>
                    </li>
                    <li class="nav-item">
                      <a href="#blog" class="nav-link">Blog</a>
                    </li>
                  </ul>
                
                </div>

              </div>
          </div>
        </div>
      </div>
    </header>