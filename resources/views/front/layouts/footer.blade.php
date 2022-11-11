  <!-- ======= Footer ======= -->
<footer id="footer"      @if ( Config::get('app.locale') == 'ar')   style="font-family: 'Tajawal', sans-serif;"@endif>
<div class="footer-top">
    <div class="container">
        <div class="row ">
            <div class="col-lg-4 col-md-4">
				<img src="{{ asset('assets/img/Goran-Group-Logo-white.png') }}"  alt="" class="img-fluid">
				<div class="footetInfo" @if ( Config::get('app.locale') == 'ar')   style="text-align: right;"@endif>
					@if ( Config::get('app.locale') == 'en')
						<i class="icofont-google-map mb"></i>
						<span>{{__('home.location')}}</span>
					@else 
						<span>{{__('home.location')}}</span>
						<i class="icofont-google-map mb"></i>
					@endif
				</div>
				<div class="footetInfo"@if ( Config::get('app.locale') == 'ar')   style="text-align: right;"@endif>
					@if ( Config::get('app.locale') == 'en')
						<i class="icofont-envelope mb"></i>
						<span>info@gorangroup.com</span>
					@else 
						<span>info@gorangroup.com</span>
						<i class="icofont-envelope mb"></i>
					@endif
				</div>
				<div class="footetInfo" @if ( Config::get('app.locale') == 'ar')   style="text-align: right;"@endif>
					@if ( Config::get('app.locale') == 'en')
						<i class="icofont-phone mb"></i>
						<span>+964 750 777 7719</span>
					@else 
						<span>+964 750 777 7719</span>
						<i class="icofont-phone mb"></i>
					@endif
				</div>
				<div class="social-links" @if ( Config::get('app.locale') == 'ar')   style="font-family: 'Tajawal', sans-serif;text-align:right;"@endif>
					<a href="https://www.facebook.com/Goran-Group-2051059595197774" class="facebook"><i class="icofont-facebook"></i></a>
					<a href="#" class="instagram"><i class="icofont-instagram"></i></a>
					<a href="https://www.linkedin.com/company/goran-group" class="linkedin"><i class="icofont-linkedin"></i></i></a>
					<a href="https://youtube.com/channel/UCcN6vhVHiyB2IDSCtCv09QA" class="youtube"><i class="icofont-youtube"></i></i></a>
				</div>
            </div>
			<div class="col-lg-2 col-md-2 fast-link">
				<h3      @if ( Config::get('app.locale') == 'ar')   style="font-family: 'Tajawal', sans-serif;text-align:right;"@endif >{{__('home.links')}}</h3>
				<ul class="list-group">
					<li @if ( Config::get('app.locale') == 'ar')   style="text-align: right;direction: rtl; margin-right: 1rem;"@endif><a href="{{ route('home') }}#clients">{{__('home.Companies')}}</a></li>
					<li @if ( Config::get('app.locale') == 'ar')   style="text-align: right;direction: rtl; margin-right: 1rem;"@endif><a href="{{ route('home') }}#services">{{__('home.Specializations')}}</a></li>
					<li @if ( Config::get('app.locale') == 'ar')   style="text-align: right;direction: rtl; margin-right: 1rem;"@endif ><a href="{{ route('about.us') }}">{{__('home.aboutus')}}</a></li>
					<li @if ( Config::get('app.locale') == 'ar')   style="text-align: right;direction: rtl; margin-right: 1rem;"@endif><a href="{{ route('home') }}#header">{{__('home.contactus')}}</a></li>
				</ul>
			</div>
			 <!--Grid column-->
			<div class="col-lg-6 col-md-6 ">
				<div class="row">
					<p class="label-footer col-lg-12" style="text-align:{{__('home.test_align')}};direction: {{__('home.dir')}}">{{__('home.touch')}}</p>
					<form  name="contact-form" action="{{ route('sendmail') }}" method="POST" class="col-lg-12">
						<!--Grid column-->
						<div class="md-form form-input ">
							@if ( Config::get('app.locale') == 'en')
								<input type="email" id="email" name="email" class="form-control inputStyle" placeholder="Email..." required>
							@else 
								<input style="direction:rtl;text-align:right;" type="email" id="email" name="email" class="form-control inputStyle" placeholder="البريد الالكتروني" required>
							@endif
						</div>
						<!--Grid column-->
						
						<div class="md-form form-input">
							@if ( Config::get('app.locale') == 'en')
								<textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea inputStyle" placeholder="Message..." required></textarea>
							@else 
								<textarea  style="direction:rtl;text-align:right;"  type="text" id="message" name="message" rows="2" class="form-control md-textarea inputStyle" placeholder="نص الرسالة" required></textarea>
							@endif

						</div>
						@csrf
						<button class="btn inputStyle" id="sendbtn" type="submit">
							@if ( Config::get('app.locale') == 'en')
							Send
							@elseif ( Config::get('app.locale') == 'ar') 
							إرسال
							@endif
						</button>
						@if (session('success'))
							<div class="alert alert-success mt-2">
								{{ session('success') }}
							</div>
						@endif
					</form>
				</div>
			</div>

			<!--Grid column-->
        </div>
    </div>
    </div>
</div>
<div class="container">
    <div class="copyright">
    	<h5>&copy 2021 Powered by NINE-9 | Technology & Marketing Co.</h5>
    </div>
</div>
</footer><!-- End Footer -->
<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  
<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-sticky/jquery.sticky.js') }}"></script>
<script src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/vendor/counterup/counterup.min.js') }}"></script>
<script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendor/venobox/venobox.min.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>
@yield('js')