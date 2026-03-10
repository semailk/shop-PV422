@extends('layouts.main')
@section('content')
    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="single-slider slider-height2 d-flex align-items-center" data-background="/img/hero/category.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>product Details</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <!--================Single Product Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="product_img_slide owl-carousel">
                        <div class="single_product_img">
                            <img src="{{ $product->getFirstMediaUrl('products') }}" alt="#" class="img-fluid">
                        </div>
                        <div class="single_product_img">
                            <img src="{{ $product->getFirstMediaUrl('products') }}" alt="#" class="img-fluid">
                        </div>
                        <div class="single_product_img">
                            <img src="{{ $product->getFirstMediaUrl('products') }}" alt="#" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="single_product_text text-center">
                        <h3>    {{ $product->name }}
                            <p>
                                {{ $product->description }}
                           </p>
            <div class="card_area">
                <div class="product_count_area">
                    <p>Quantity</p>
                    <div class="product_count d-inline-block">
                        <span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>
                        <input class="product_count_item input-number" type="text" value="1" min="0" max="10">
                        <span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
                    </div>
                    <p>$5</p>
                </div>
                <div class="add_to_cart">
                    <a href="{{ route('cart.add', $product->id) }}"
                       class="btn_3 add-to-cart-btn">add to cart</a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--================End Single Product Area =================-->
   <!-- subscribe part here -->
   <section class="subscribe_part section_padding">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-8">
                  <div class="subscribe_part_content">
                      <h2>Get promotions & updates!</h2>
                      <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources credibly innovate granular internal .</p>
                      <div class="subscribe_form">
                          <input type="email" placeholder="Enter your mail">
                          <a href="#" class="btn_1">Subscribe</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

    <script>
        document.querySelectorAll('.add-to-cart-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();

                const url = this.href;

                fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('value'),
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({
                        quantity: document.querySelector('.input-number').value
                    })
                })
                    .then(r => r.json())
                    .then(data => {
                        // обнови интерфейс
                        alert(data.message || 'Добавлено!');
                    })
                    .catch(() => alert('Ошибка'));
            });
        });
    </script>
@endsection

