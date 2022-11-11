{{-- {{ dd($headerSections) }} --}}
<!-- ======= Header ======= -->
<header id="header"    style="font-family: 'Catamaran', sans-serif; @if ( Config::get('app.locale') == 'ar')   font-family: 'Tajawal', sans-serif;@endif">

  <div class="containerHeader container d-flex align-items-center justify-content-between ">

    <div class="logo mr-auto">
      <a href="{{ route('home') }}"><img src="{{ asset('assets/img/Goran-Group-Logo-white.png') }}"  alt="" class="img-fluid"></a>
    </div>

    <nav class="nav-menu d-none d-lg-block"      @if ( Config::get('app.locale') == 'ar')   style="font-family: 'Tajawal', sans-serif;"@endif>
      <ul>
        
        <li class="drop-down dropdown" ><a @if ( Config::get('app.locale') == 'ar')   style="font-family: 'Tajawal', sans-serif;"@endif href="#">{{__('home.Companies')}}</a>
          <div class="dropdown-content-companies">
              <div class="dropdown-div-companies">
                  <div class="div1-companies" style="text-align:{{__('home.test_align')}};direction: {{__('home.dir')}}">
                    @foreach ($headerSections as $section )
                        @if ( Config::get('app.locale') == 'ar')
                              
                               <p class="sectionName" @if ( Config::get('app.locale') == 'ar')   style="font-family: 'Tajawal', sans-serif;
                                border-right: 1px red solid;
                              } "@endif>{{ strtoupper($section->section_name_ar) }}
    
                              @elseif ( Config::get('app.locale') == 'en' )
          
                              <p class="sectionName">{{ strtoupper($section->section_name) }}
          
                              @endif

                        @foreach ( $section->companies as $company )
                          <a class="companyName" @if ( Config::get('app.locale') == 'ar')   style="font-family: 'Tajawal', sans-serif;"@endif href="{{ route('company',$company->id ) }}">
                            @if ( Config::get('app.locale') == 'ar')

                              {{ $company->company_name_arabic }}
    
                            @elseif ( Config::get('app.locale') == 'en' )
        
                              {{ $company->company_name_english }} 
        
                            @elseif ( Config::get('app.locale') == 'ku' )
        
                              {{ $company->company_name_kurdish }}  
        
                            @endif
                          </a>
                        @endforeach
                      </p>
                    @endforeach
                  </div>
            </div>
          </div>  
        </li>



        
        <li class="dropdown-submenu"  ><a @if ( Config::get('app.locale') == 'ar')   style="font-family: 'Tajawal', sans-serif;"@endif href="{{ route('home') }}#services">{{__('home.Specializations')}}</a>
        
        </li>

        <li ><a @if ( Config::get('app.locale') == 'ar')   style="font-family: 'Tajawal', sans-serif;"@endif href="{{ route('about.us') }}">{{__('home.aboutus')}}</a>
        
        </li>

        <li class="drop-down dropdown"><a @if ( Config::get('app.locale') == 'ar')   style="font-family: 'Tajawal', sans-serif;"@endif href="#">{{__('home.contactus')}}</a>
          <div class="dropdown-content">
              <div class="dropdown-div">
                  <div class="div1">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d25761.790608276973!2d43.965062!3d36.185438!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzbCsDExJzA3LjYiTiA0M8KwNTcnNTQuMiJF!5e0!3m2!1sen!2sus!4v1630497869777!5m2!1sen!2sus" width="100%" height="100%" frameborder="0" style="border:0">
                    </iframe>
                  </div>
                  <div class="div2">
                    <div class="address">
                      <i class="icofont-google-map mb"></i>
                      <span>{{__('home.location')}}</span>
                    </div>
                    <div class="email">
                      <i class="icofont-envelope mb"></i>
                      <span>info@gorangroup.com</span>
                    </div>
                    <div class="phone">
                      <i class="icofont-phone mb"></i>
                      <span>+964 750 777 7719</span>
                    </div>
                    <div class="socialMedia mt-1">
                      <a href="https://www.facebook.com/Goran-Group-2051059595197774" class="facebook"><i class="icofont-facebook"></i></a>
                      <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
                      <a href="https://www.linkedin.com/company/goran-group" class="linkedin"><i class="icofont-linkedin"></i></i></a>
                      <a href="https://youtube.com/channel/UCcN6vhVHiyB2IDSCtCv09QA" class="youtube"><i class="icofont-youtube"></i></i></a>
                    </div>
                </div>
            </div>
          </div>  
        </li>
        
      </ul>
    </nav><!-- .nav-menu -->

    <div class="dropdown show dropdown-box" id="langbtn">
      <a class="btn  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight: 800; font-family: 'Catamaran', sans-serif;@if ( Config::get('app.locale') == 'ar') font-family: 'Tajawal', sans-serif;@endif">
        {{__('home.Language')}}
      </a>
      <div class="dropdown-menu languages" aria-labelledby="dropdownMenuLink">

        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
              <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                  {{ $properties['native'] }}
              </a>

        @endforeach

      </div>
    </div>
    <div class="social-links d-none d-lg-block">
      <a href="https://www.facebook.com/Goran-Group-2051059595197774" class="facebook"><i class="icofont-facebook"></i></a>
      <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
      <a href="https://www.linkedin.com/company/goran-group" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      <a href="https://youtube.com/channel/UCcN6vhVHiyB2IDSCtCv09QA" class="youtube"><i class="icofont-youtube"></i></i></a>
    </div>
  </div>
</header><!-- End Header -->