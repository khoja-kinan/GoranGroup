@extends('front.layouts.master')


@section('main-content')
@if (session('message'))
<div class="alert alert-success mt-2">
    {{ session('message') }}
</div>
@endif

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container">
          <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel" style="direction:{{__('home.dir')}}; ">

              <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

              <div class="carousel-inner" role="listbox">
                <!-- Slide 2 -->
                  <div class="carousel-item active" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.63) 0%,rgba(0, 0, 0, 0.644) 100%), url(/assets/img/slide/home_slide.jpg)">
                    <div class="carousel-container">
                      <div class="carousel-content">
                            @if ( Config::get('app.locale') == 'ar')

                            <h2 class="animate__animated animate__fadeInDown" style="font-family: 'Tajawal', sans-serif; direction:rtl; text-align: right; margin-right: 8rem" >رؤية واسعة</h2>
                            <p class="animate__animated animate__fadeInUp" style="font-family: 'Tajawal', sans-serif;direction: rtl; text-align: right;margin-right: 8rem">قوة الاتحاد بين يديك</p>
      
                          @elseif ( Config::get('app.locale') == 'en' )
                          
                            <h2 class="animate__animated animate__fadeInDown" style="font-family: 'Righteous', cursive;" >Broad Vision</h2>
                            <p class="animate__animated animate__fadeInUp" style="font-family: 'Righteous', cursive;">The Power Of Union In Your Hand</p>
                                                       
                                    
                          @endif
                      </div>
                    </div>
                  </div>
                <!-- Sliders -->
                @foreach ($sliders as $slider)
                  <div class="carousel-item " style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.64) 0%,rgba(0, 0, 0, 0.644) 100%), url({{ $slider->slider_image }})">
                      <div class="carousel-container">
                        <div class="carousel-content" >


                          @if ( Config::get('app.locale') == 'ar')

                            <h2 class="animate__animated animate__fadeInDown" style="font-family: 'Tajawal', sans-serif; direction:rtl; text-align: right; margin-right: 8rem" >{{ $slider->slider_title_ar }}</h2>
                            <p class="animate__animated animate__fadeInUp" style="font-family: 'Tajawal', sans-serif;direction: rtl; text-align: right;margin-right: 8rem">{{ $slider->slider_subtitle_ar }}</p>   
      
                          @elseif ( Config::get('app.locale') == 'en' )
                          
                            <h2 class="animate__animated animate__fadeInDown" style="font-family: 'Righteous', cursive;" >{{ $slider->slider_title }}</h2>
                            <p class="animate__animated animate__fadeInUp" style="font-family: 'Righteous', cursive;">{{ $slider->slider_subtitle }}</p>
                                                       
                                    
                          @endif

                          <div class="col-12 text-center" >
  
                            <a class="animate__animated animate__fadeInUp slider_btn " @if (Config::get('app.locale') == 'ar') style="font-family: 'Tajawal', sans-serif;"
                            @endif href="
                            @if (!empty($slider->btn_link))
                              {{ $slider->btn_link }}
                            @else
                              {{ route('blog',$slider->post_id) }}
                            @endif
                            ">
                            @if ( Config::get('app.locale') == 'ar')
    
                            {{ $slider->btn_name_ar }}
          
                            @elseif ( Config::get('app.locale') == 'en' )
                                      
                            {{ $slider->btn_name }}                  
                                      
                            @endif
                            </a> 
                          </div>
                        </div>
                        
                      </div>
                     
                  </div>
                @endforeach
                
                
                <!-- Slide 3 -->
                 {{--  <div class="carousel-item" style="background-image: linear-gradient(to bottom, rgba(22, 1, 1, 0.493) 0%,rgba(0, 0, 0, 0.644) 100%), url(/assets/img/slide/slide-3.jpg)">
                    <div class="carousel-container">
                      <div class="carousel-content">
                            <h2 class="animate__animated animate__fadeInDown" >Broad Vision</h2>
                            <p class="animate__animated animate__fadeInUp" >The Power Of Union In Your Hand</p>
                      </div>
                    </div>
                  </div> --}}
              </div>
              <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon icofont-rounded-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
      
              <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon icofont-rounded-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
          </div>
        </div>
    </section>

    <!-- End Hero -->


  <!-- ======= Clients Section ======= -->
  <section id="clients" class="clients" @if ( Config::get('app.locale') == 'ar')   style="font-family: 'Tajawal', sans-serif;"@endif>
      <div class="container">
        <div class="section-title">
          <h2>{{__('home.Our Companies')}}</h2>
          <p>{{__('home.comany h')}}</p>
        </div>

        
        <div class="owl-carousel clients-carousel">
          @foreach ($companies as $company)
            <a href="{{ route('company',$company->id ) }}"><img src="{{ asset($company->logo) }}" alt=""></a>
          @endforeach
        </div>

      </div>
  </section>
<!-- End Clients Section -->
    




     <!-- ======= Services Section ======= -->
    <section id="services" class="services"      @if ( Config::get('app.locale') == 'ar')   style="font-family: 'Tajawal', sans-serif;"@endif>
        <div class="container">
  
          <div class="section-title" data-aos="fade-up">
            <h2>{{__('home.Our Spec')}}</h2>
          </div>
  
          <div class="row">
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="icon-box">
                <div class="icon"><i class="fas fa-handshake"></i></div>
                <h4><a href="">{{__('home.General Trading')}}</a></h4>
                <p>{{__('home.K-Goran co')}}</p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
              <div class="icon-box">
                <div class="icon"><i class="fas fa-briefcase-medical"></i></div>
                <h4><a href="">{{__('home.Health Care')}}</a></h4>
                <p>{{__('home.Health company')}}</p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
              <div class="icon-box">
                <div class="icon"><i class="fas fa-gas-pump"></i></div>
                <h4><a href="">{{__('home.Oil')}}</a></h4>
                <p>{{__('home.oil companys')}}</p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
              <div class="icon-box">
                <div class="icon"><i class="fas fa-utensils"></i></div>
                <h4><a href="">{{__('home.Food')}}</a></h4>
                <p>{{__('home.food comp')}}</p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
              <div class="icon-box" >
                <div class="icon"><i class="fas fa-bolt"></i></div>
                <h4><a href="">{{__('home.Power')}}</a></h4>
                <p>{{__('home.power comp')}}</p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
              <div class="icon-box">
                <div class="icon"><i class="fas fa-hard-hat"></i></div>
                <h4><a href="">{{__('home.General Constructions')}}</a></h4>
                <p>{{__('home.Swar Chak')}}</p>
              </div>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Services Section -->

    <!-- ======= Counter Section ======= -->
    <br>
    <div class="container containerCounter" style="max-width: 100%;font-family: 'Catamaran', sans-serif;@if ( Config::get('app.locale') == 'ar')   font-family: 'Tajawal', sans-serif;@endif">
      <h3 class="counter-title" data-aos="fade-up"      >{{__('home.Our achievements')}}</h3>
      <div class="row text-center" id="Counter-Section">
            <div class="col mt-1">
              <div class="counter" style="border: 2px solid red; padding:2rem;">
                <h2 class="timer count-title count-number" data-to="26750" data-speed="1500" style="font-size: xx-large; font-weight: bolder;color:black;font-family: 'Catamaran', sans-serif;@if ( Config::get('app.locale') == 'ar')   font-family: 'Tajawal', sans-serif;@endif"></h2>
                <p class="count-text " style="font-size: larger; font-weight: bolder; color: black;     @if ( Config::get('app.locale') == 'ar')font-family: 'Tajawal', sans-serif;@endif">{{__('home.Clients')}}</p>
              </div>
            </div>
            <div class="col mt-1">
              <div class="counter" style="border: 2px solid red; padding:2rem;">
                <h2 class="timer count-title count-number" data-to="6010" data-speed="1500" style="font-size: xx-large; font-weight: bolder;color:black;font-family: 'Catamaran', sans-serif;@if ( Config::get('app.locale') == 'ar')   font-family: 'Tajawal', sans-serif;@endif"></h2>
                <p class="count-text " style="font-size: larger; font-weight: bolder; color: black;@if ( Config::get('app.locale') == 'ar')font-family: 'Tajawal', sans-serif;@endif">{{__('home.Projects')}}</p>
              </div>
            </div>
            <div class="col mt-1">
              <div class="counter" style="border: 2px solid red; padding:2rem;">
                <h2 class="timer count-title count-number" data-to="400" data-speed="1500" style="font-size: xx-large; font-weight: bolder;color:black;font-family: 'Catamaran', sans-serif;@if ( Config::get('app.locale') == 'ar')   font-family: 'Tajawal', sans-serif;@endif"></h2>
                <p class="count-text " style="font-size: larger; font-weight: bolder; color: black;@if ( Config::get('app.locale') == 'ar')font-family: 'Tajawal', sans-serif;@endif">{{__('home.Employee')}}</p>
              </div>
            </div>
            <div class="col mt-1">
                <div class="counter" style="border: 2px solid red; padding:2rem;">
                  <h2 class="timer count-title count-number" data-to="120" data-speed="1500" style="font-size: xx-large; font-weight: bolder;color:black;font-family: 'Catamaran', sans-serif;@if ( Config::get('app.locale') == 'ar')   font-family: 'Tajawal', sans-serif;@endif"></h2>
                  <p class="count-text" style="font-size: larger; font-weight: bolder; color: black;@if ( Config::get('app.locale') == 'ar')font-family: 'Tajawal', sans-serif;@endif">{{__('home.Awards')}}</p>
                </div>
            </div>
        </div>
      </div>
<br>
    <!-- ======= Our Founder Section ======= -->
      <section class="founder" style="  background-image: linear-gradient(to bottom, rgba(22, 1, 1, 0.493) 0%,rgba(0, 0, 0, 0.644) 100%), url(/assets/img/home/{{__('home.img_layer')}});background-size:cover;text-align:{{__('home.test_align')}};@if ( Config::get('app.locale') == 'ar')font-family: 'Tajawal', sans-serif;@endif">
        <div class="container" style="direction: {{__('home.dir')}}">
          <h1      @if ( Config::get('app.locale') == 'ar')   style="font-family: 'Tajawal', sans-serif;"@endif>{{__('home.Mr')}}</h1>
          <h3      @if ( Config::get('app.locale') == 'ar')   style="font-family: 'Tajawal', sans-serif;"@endif>{{__('home.The')}} <span>{{__('home.CEO')}}</span> {{__('home.of Goran Group')}}</h3>
          <p>{{__('home.bio')}}</p>
        </div>
      </section>
          <!-- ======= Map ======= -->
  <section class="Map">
    <div class="container-fluid" style="padding-right:0px;padding-left:0px;">
      <div class="map-responsive">
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d25761.790608276973!2d43.965062!3d36.185438!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzbCsDExJzA3LjYiTiA0M8KwNTcnNTQuMiJF!5e0!3m2!1sen!2sus!4v1630497869777!5m2!1sen!2sus" width="100%" height="100%" frameborder="0" style="border:0"></iframe>
      </div>
    </div>
  </section>

@endsection

@section('js')
<script>
    (function ($) {
  $.fn.countTo = function (options) {
    options = options || {};
    
    return $(this).each(function () {
      // set options for current element
      var settings = $.extend({}, $.fn.countTo.defaults, {
        from:            $(this).data('from'),
        to:              $(this).data('to'),
        speed:           $(this).data('speed'),
        refreshInterval: $(this).data('refresh-interval'),
        decimals:        $(this).data('decimals')
      }, options);
      
      // how many times to update the value, and how much to increment the value on each update
      var loops = Math.ceil(settings.speed / settings.refreshInterval),
        increment = (settings.to - settings.from) / loops;
      
      // references & variables that will change with each update
      var self = this,
        $self = $(this),
        loopCount = 0,
        value = settings.from,
        data = $self.data('countTo') || {};
      
      $self.data('countTo', data);
      
      // if an existing interval can be found, clear it first
      if (data.interval) {
        clearInterval(data.interval);
      }
      data.interval = setInterval(updateTimer, settings.refreshInterval);
      
      // initialize the element with the starting value
      render(value);
      
      function updateTimer() {
        value += increment;
        loopCount++;
        
        render(value);
        
        if (typeof(settings.onUpdate) == 'function') {
          settings.onUpdate.call(self, value);
        }
        
        if (loopCount >= loops) {
          // remove the interval
          $self.removeData('countTo');
          clearInterval(data.interval);
          value = settings.to;
          
          if (typeof(settings.onComplete) == 'function') {
            settings.onComplete.call(self, value);
          }
        }
      }
      
      function render(value) {
        var formattedValue = settings.formatter.call(self, value, settings);
        $self.html(formattedValue);
      }
    });
  };
  //Added by taher:
  //keep track on scrolling
  window.addEventListener('scroll', function(){
    //if the numbers section is visible now
    if(isInViewport())
    {
      //Start the counter for each counting object
      $('.timer').each(count);  
      //Stop traking the scroll
      this.removeEventListener('scroll', arguments.callee, false);
    }
  });
$(document.body).on('touchmove', onScroll); // for mobile
$(window).on('scroll', onScroll); 

// callback
function onScroll(){ 
      $('.timer').each(count);  
      //Stop traking the scroll
      this.removeEventListener('scroll', arguments.callee, false);
}

  //This function is used to check if counters section is visible
  function isInViewport() {
    const rect = document.getElementById('Counter-Section').getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  }

  $.fn.countTo.defaults = {
    from: 0,               // the number the element should start at
    to: 0,                 // the number the element should end at
    speed: 1000,           // how long it should take to count between the target numbers
    refreshInterval: 100,  // how often the element should be updated
    decimals: 0,           // the number of decimal places to show
    formatter: formatter,  // handler for formatting the value before rendering
    onUpdate: null,        // callback method for every time the element is updated
    onComplete: null       // callback method for when the element finishes updating
  };

  function formatter(value, settings) {
    return value.toFixed(settings.decimals);
  }
  }(jQuery));
    //Added by taher:
    //Start counting
    function count(options) {
      var $this = $(this);
      options = $.extend({}, options || {}, $this.data('countToOptions') || {});
      $this.countTo(options);
    }
  jQuery(function ($) {
  // custom formatting example
  $('.count-number').data('countToOptions', {
    formatter: function (value, options) {
    return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
    }
  });

  // start all the timers
  ////lines wtih (////) are commented by Taher Hassan:
  ////   $('.timer').each(count);  

  ////   function count(options) {
  //// 	var $this = $(this);
  //// 	options = $.extend({}, options || {}, $this.data('countToOptions') || {});
  //// 	$this.countTo(options);
  ////   }
  });
</script>
@endsection