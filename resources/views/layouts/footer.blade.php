 <!-- Footer -->
 @if (session('subscribe_success'))
    <script>
        alert('{{ session('subscribe_success') }}');
    </script>
@endif
@if (session('subscribe_error'))
    <script>
        alert('{{ session('subscribe_error') }}');
    </script>
@endif
 <footer class="footer padding-t-100 bg-off-white">
     <div class="container">
         <div class="row footer-top padding-b-100">
             <div class="col-xl-4 col-lg-6 col-sm-12 col-12 cr-footer-border">
                 <div class="cr-footer-logo">
                     <div class="image">
                         <img src="{{ asset('img/logo/ecomlogo.png') }}" alt="logo" class="logo mb-2">
                         <img src="{{ asset('img/logo/ecomlogo.png') }}" alt="logo" class="dark-logo mb-2">
                     </div>
                     <p>Embark on a journey to wellness with {{ $comp_name }}. Embrace nature's gifts for a healthier, happier you. Explore our herbal products and start your path to holistic well-being today!</p>
                 </div>
                 <div class="cr-footer">
                     <h4 class="cr-sub-title cr-title-hidden">
                         Contact us
                         <span class="cr-heading-res"></span>
                     </h4>
                     <ul class="cr-footer-links cr-footer-dropdown">
                         <li class="location-icon">
                             <a href="{{ $comp_map_link }}" target="_blank">{{ $comp_add}}</a>
                         </li>
                         <li class="mail-icon">
                             <a href="mailto:{{ $comp_email }}">{{ $comp_email }}</a>
                         </li>
                         <li class="phone-icon">
                             <a href="tel:{{ $comp_mob }}"> {{ $comp_mob }}</a>
                             &nbsp; &nbsp;
                             <a href="tel:{{ $comp_mob1 }}"> {{ $comp_mob1 }}</a>
                         </li>
                     </ul>
                 </div>
             </div>
             <div class="col-xl-2 col-lg-3 col-sm-12 col-12 cr-footer-border">
                 <div class="cr-footer">
                     <h4 class="cr-sub-title">
                         Company
                         <span class="cr-heading-res"></span>
                     </h4>
                     <ul class="cr-footer-links cr-footer-dropdown">
                         <li><a href="{{ route('about.page') }}">About Us</a></li>
                         <li><a href="{{ route('contact.us') }}">Contact Us</a></li>
                         <li><a href="#">Delivery Information</a></li>
                         <li><a href="{{ route('privacy.policy.page') }}">Privacy Policy</a></li>
                         <li><a href="{{ route('terms.conditions.page') }}">Terms & Conditions</a></li>
                         <li><a href="{{ route('returns.refunds.page') }}">Returns and refunds</a></li>
                         <li><a href="{{ route('shipping.policy.page') }}">Shipping Policy</a></li>
                         <li><a href="#">Support Center</a></li>
                     </ul>
                 </div>
             </div>
             <div class="col-xl-2 col-lg-3 col-sm-12 col-12 cr-footer-border">
                 <div class="cr-footer">
                     <h4 class="cr-sub-title">
                         Category
                         <span class="cr-heading-res"></span>
                     </h4>
                     <ul class="cr-footer-links cr-footer-dropdown">
                         <li><a href="#">Supplements Products</a></li>
                         <li><a href="#">Herbal First Aid</a></li>
                         <li><a href="#">Beverages</a></li>
                         <li><a href="#">Home Care</a></li>
                         <li><a href="#">Skincare</a></li>
                         <li><a href="#">Remedies</a></li>
                     </ul>
                 </div>
             </div>
             <div class="col-xl-4 col-lg-12 col-sm-12 col-12 cr-footer-border">
                 <div class="cr-footer cr-newsletter">
                     <h4 class="cr-sub-title">
                         Subscribe Our Newsletter
                         <span class="cr-heading-res"></span>
                     </h4>
                     <style>
                         .cr-search-footer .search-btn {
                             background: none;
                             border: none;
                         }

                     </style>
                     <div class="cr-footer-links cr-footer-dropdown">
                         <form class="cr-search-footer" action="{{ route('newsletter.post') }}" method="POST">
                             @csrf
                             <input class="search-input" type="email" placeholder="Enter your email ..." name="email" required>
                             @if ($errors->has('email'))
                             <p class="text-danger">{{ $errors->first('email') }}</p>
                             @endif
                             <button class="search-btn" type="submit">
                                 <i class="ri-send-plane-fill"></i>
                             </button>
                         </form>
                     </div>

                     <div class="cr-social-media">
                         <span><a href="https://www.facebook.com/Aanandaherbals/" target="_blank"><i class="ri-facebook-line"></i></a></span>
                         <span><a href="https://www.instagram.com/aanandaherbals/" target="_blank"><i class="ri-instagram-line"></i></a></span>
                         <span><a href="https://in.pinterest.com/aanandaherbals0/" target="_blank"><i class="ri-pinterest-line"></i></a></span>
                         <span><a href="https://www.linkedin.com/company/aanandaherbals" target="_blank"><i class="ri-linkedin-line"></i></a></span>
                     </div>

                 </div>
             </div>
         </div>
         <div class="cr-last-footer">
             <p>&copy; <span id="copyright_year"></span> <a href="{{ url('/') }}">{{ $comp_name }}</a>, All rights reserved.</p>
         </div>
     </div>
 </footer>

 <!-- Tab to top -->
 <a href="#Top" class="back-to-top result-placeholder">
     <i class="ri-arrow-up-line"></i>
     <div class="back-to-top-wrap">
         <svg viewBox="-1 -1 102 102">
             <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
         </svg>
     </div>
 </a>



 {{-- <!-- Cart -->
    <div class="cr-cart-overlay"></div>
    <div class="cr-cart-view">
        <div class="cr-cart-inner">
            <div class="cr-cart-top">
                <div class="cr-cart-title">
                    <h6>My Cart</h6>
                    <button type="button" class="close-cart">×</button>
                </div>
                <ul class="crcart-pro-items">
                    <li>
                        <a href="#" class="crside_pro_img"><img src="{{ asset('img/product/4.jpg') }}"
 alt="product-1"></a>
 <div class="cr-pro-content">
     <a href="#" class="cart_pro_title">Fresh Pomegranate</a>
     <span class="cart-price"><span>$56.00</span> x 1kg</span>
     <div class="cr-cart-qty">
         <div class="cart-qty-plus-minus">
             <button type="button" class="plus">+</button>
             <input type="text" placeholder="." value="1" minlength="1" maxlength="20" class="quantity">
             <button type="button" class="minus">-</button>
         </div>
     </div>
     <a href="javascript:void(0)" class="remove">×</a>
 </div>
 </li>
 <li>
     <a href="#" class="crside_pro_img"><img src="{{ asset('img/product/2.jpg') }}" alt="product-2"></a>
     <div class="cr-pro-content">
         <a href="#" class="cart_pro_title">Green Apples</a>
         <span class="cart-price"><span>$75.00</span> x 1kg</span>
         <div class="cr-cart-qty">
             <div class="cart-qty-plus-minus">
                 <button type="button" class="plus">+</button>
                 <input type="text" placeholder="." value="1" minlength="1" maxlength="20" class="quantity">
                 <button type="button" class="minus">-</button>
             </div>
         </div>
         <a href="javascript:void(0)" class="remove">×</a>
     </div>
 </li>
 <li>
     <a href="#" class="crside_pro_img"><img src="{{ asset('img/product/3.jpg') }}" alt="product-3"></a>
     <div class="cr-pro-content">
         <a href="#" class="cart_pro_title">Watermelon - Small</a>
         <span class="cart-price"><span>$48.00</span> x 5kg</span>
         <div class="cr-cart-qty">
             <div class="cart-qty-plus-minus">
                 <button type="button" class="plus">+</button>
                 <input type="text" placeholder="." value="1" minlength="1" maxlength="20" class="quantity">
                 <button type="button" class="minus">-</button>
             </div>
         </div>
         <a href="javascript:void(0)" class="remove">×</a>
     </div>
 </li>
 </ul>
 </div>
 <div class="cr-cart-bottom">
     <div class="cart-sub-total">
         <table class="table cart-table">
             <tbody>
                 <tr>
                     <td class="text-left">Sub-Total :</td>
                     <td class="text-right">$300.00</td>
                 </tr>
                 <tr>
                     <td class="text-left">VAT (20%) :</td>
                     <td class="text-right">$60.00</td>
                 </tr>
                 <tr>
                     <td class="text-left">Total :</td>
                     <td class="text-right primary-color">$360.00</td>
                 </tr>
             </tbody>
         </table>
     </div>
     <div class="cart_btn">
         <a href="#" class="cr-button">View Cart</a>
         <a href="#" class="cr-btn-secondary">Checkout</a>
     </div>
 </div>
 </div>
 </div> --}}



 <!-- Vendor Custom -->
 <script src="{{ asset('js/vendor/jquery-3.6.4.min.js') }}"></script>
 <script src="{{ asset('js/vendor/jquery.zoom.min.js') }}"></script>
 <script src="{{ asset('js/vendor/mixitup.min.js') }}"></script>
 <script src="{{ asset('js/vendor/bootstrap.bundle.min.js') }}"></script>
 <script src="{{ asset('js/vendor/range-slider.js') }}"></script>
 <script src="{{ asset('js/vendor/aos.min.js') }}"></script>
 <script src="{{ asset('js/vendor/swiper-bundle.min.js') }}"></script>
 <script src="{{ asset('js/vendor/slick.min.js') }}"></script>

 <!-- Main Custom -->
 <script src="{{ asset('js/main.js') }}"></script>

 </body>


 </html>
