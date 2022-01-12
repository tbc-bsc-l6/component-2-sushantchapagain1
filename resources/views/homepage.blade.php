<section class="section-hero">
        <div class="hero">
          <div class="hero-text-box">
            <h1 class="heading-primary">
              A healthy life delivered to your door, every single day
            </h1>
            <p class="hero-description">
             Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias possimus reprehenderit, architecto inventore tempora asperiores! Sit facilis reiciendis harum odit hic enim blanditiis?
            </p>
            <a href="#" class="btn btn--full margin-right-sm"
              >Buy Now</a
            >

            <a href="#" class="btn btn--outline">Learn more &darr;</a>
          </div>
          <div class="hero-img-box">
            <picture>
              <img
                src="./Images/hero-min.png"
                class="hero-img"
                alt="images of book cd and game"
              />
            </picture>
          </div>
        </div>
      </section>
          <!--Services   -->
          <div class="services">
      <h1>Our Services</h1>
      <div class="cen">
        <div class="service">
        <i class="fa fa-book"></i>
          <h2>Book</h2>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        </div>

        <div class="service">
        <i class="fa fa-gamepad"></i>
          <h2>Game</h2>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        </div>

        <div class="service">
        <i class="fa fa-play-circle"></i>
          <h2>Cd</h2>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        </div>
      </div>
    </div>
<!-- Ends Services -->


<!-- ******************************************* -->
    <!-- category -->
    <div class="text-center p-3" style="font-size: 20px">Category</div>
    <div class="category">
      @foreach($categories as $category)  
    <a href="/?category={{$category->name}}">{{$category->name}}</a>
      @endforeach
    </div>
  
<!-- ******************************************* -->


  <!-- Products -->
  <h1 class="text-center p-3" style="font-size: 20px">Products</h1>
  <div class="products">
    <!-- Product -->
    @foreach($products as $product)
    <div class="product-card">
      <img src="{{ asset('Uploads/products/'.$product->Image) }}" alt="product image" class="product-img" />
      <h4 class="product-title">{{$product->productname}}</h4>
      <p class="card-desc">{{$product->title}}</p>
      <p class="product-category">{{$product->category->name}}</p>
      <p class="product-price">${{$product->productprice}}</p>
      <button class="buy-now">Buy Now</button>
    </div>
    @endforeach
    <!-- product Ends -->
  </div>
  <span>{{$products->links()}} </span>
      @yield('home')