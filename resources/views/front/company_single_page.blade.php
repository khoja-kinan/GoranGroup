@extends('front.layouts.master')
@section('main-content')
    <!-- ======= Hero Section ======= -->
    <section class="bgimage" style="font-family: 'Catamaran', sans-serif;@if ( Config::get('app.locale') == 'ar') font-family: 'Tajawal', sans-serif;@endif  background-image: linear-gradient(to bottom, rgba(22, 1, 1, 0.747) 0%,rgba(0, 0, 0, 0.767) 100%), url({{ asset($company->background_image) }})">
        <div class="container-fluid " style="padding: 7% 0 0 0;direction:{{__('home.dir')}}; ">
            <div class="row" style=" margin-right: 0;width: 100%; margin-top: 1rem">
                <div class="animate__animated animate__fadeInDown col-lg-5 col-md-6 col-sm-5 col-xs-5" style="padding-right: 0">
                    <div class="card col-lg-12 companyCard" style=" background-color: rgb(31, 30, 30); min-height:50%;">
                        <div class="logo mt-5">
                            <img src="{{ asset($company->logo) }}" alt="">
                        </div>
                        <iframe class="card-img-top mt-5" src="{{ $company->location }}" allowfullscreen="" loading="lazy" style="height: 20rem"></iframe>
                        <div class="card-body cardBody " >
                            <ul class="list-group " style="list-style: none" >
                                {{-- phone number --}}
                                @if (!empty($company->phone))
                                    <li class="listItem" @if ( Config::get('app.locale') == 'ar')   style="text-align: right;direction: rtl;"@endif >
                                        <div class="phone" @if ( Config::get('app.locale') == 'ar')    style="direction: ltr;" @endif>
                                            @if ( Config::get('app.locale') == 'en')
                                            <i  class="icofont-phone mb" style="color: red"></i>
                                            <span style="color: white;">{{ $company->phone }}</span>
                                            @else
                                            <span style="color: white;">{{ $company->phone }}</span>
                                            <i  class="icofont-phone mb icona1" style="color: red"></i>
                                            @endif
                                        </div>
                                    </li>
                                @endif

                                {{-- whatsapp number --}}
                                @if (!empty($company->whatsapp_num))
                                    <li class="listItem" @if ( Config::get('app.locale') == 'ar')   style="text-align: right;direction: rtl;"@endif >
                                        <div class="phone"  @if ( Config::get('app.locale') == 'ar')    style="direction: ltr;" @endif>
                                            @if ( Config::get('app.locale') == 'en')
                                            <i class="icofont-whatsapp mb" style="color: red;"></i>
                                            <span style="color: white;">{{ $company->whatsapp_num }}</span>
                                            @else
                                            <span style="color: white;">{{ $company->whatsapp_num }}</span>
                                            <i class="icofont-whatsapp mb" style="color: red;"></i>
                                            @endif
                                        </div>
                                    </li>
                                @endif

                                {{-- Address --}}
                                <li class="listItem" @if ( Config::get('app.locale') == 'ar')   style="text-align: right;direction: rtl;"@endif >
                                    <div class="address" @if ( Config::get('app.locale') == 'ar')   style="text-align: right;direction: rtl;"@endif>
                                            @if ( Config::get('app.locale') == 'ar')
                                                 {{-- <i class="icofont-google-map mb" style="color: red;"></i> --}}
                                                <span style="color: white;">{{ $company->address_arabic }}</span>
                                                <i class="icofont-google-map mb" style="color: red;"></i>

                                            @elseif ( Config::get('app.locale') == 'en' )

                                                <i class="icofont-google-map mb" style="color: red;"></i>
                                                <span style="color: white">{{ $company->address_english }}</span>
                                            @endif
                                    </div>
                                </li>

                                {{-- E-mail --}}
                                @if (!empty($company->email))
                                    <li class="listItem" @if ( Config::get('app.locale') == 'ar')   style="text-align: right;direction: rtl;"@endif >
                                        <div class="email">
                                            @if ( Config::get('app.locale') == 'en')
                                            <i class="icofont-envelope mb" style="color: red"></i>
                                            <span style="color: white">{{ $company->email }}</span>
                                            @else 
                                            <span style="color: white">{{ $company->email }}</span>
                                            <i class="icofont-envelope mb" style="color: red"></i>
                                            @endif
                                        </div>
                                    </li>
                                @endif

                                {{-- WebSite --}}
                                @if (!empty($company->web_site))
                                    <li class="listItem" @if ( Config::get('app.locale') == 'ar')   style="text-align: right;direction: rtl;"@endif >
                                        <div class="webSite">
                                            @if ( Config::get('app.locale') == 'en')
                                                <i class="icofont-web mb" style="color: red"></i>
                                                <span style="color: white">{{ $company->web_site }}</span>
                                            @else 
                                                <span style="color: white">{{ $company->web_site }}</span>
                                                <i class="icofont-web mb" style="color: red"></i>
                                            @endif
                                        </div>
                                    </li>
                                @endif
                                <br>
                                <br>
                                {{-- Catalogs --}}
                                @if (!empty($files[0]->file))
                                @foreach ($files as $file )
                                    <li class="listItem" @if ( Config::get('app.locale') == 'ar')   style="text-align: right;direction: rtl;"@endif >
                                        <div class="doc">
                                                <i class="icofont-download" style="color: red"></i>
                                                <a href="{{ url('download/attachments') }}/{{ $company_path }}/catalogs/{{ $file->file }}" role="button">
                                                <span style="color: white">
                                                    
                                                    @if ( Config::get('app.locale') == 'ar')

                                                    حمل المرفقات    {{ $file->file }}  من هنا
      
                                                    @elseif ( Config::get('app.locale') == 'en' )
                                                            
                                                        Download Our cataloug   {{ $file->file }}   from here
                                                                                
                                                            
                                                    @endif
                                                
                                                
                                                </span>
                                                </a>
                                        </div>
                                    </li>
                                    @endforeach
                                @endif
                            </ul>
                            <br>
                            <div class="social-links" @if ( Config::get('app.locale') == 'ar')   style="text-align: right;direction: rtl; margin-right: 2rem;"@endif >
                                @if (!empty($company->facebook_link))
                                    <a href="{{ $company->facebook_link }}" class="facebook"><i class="icofont-facebook" ></i></a>
                                @endif
                                @if (!empty($company->instagram_link))
                                    <a href="{{ $company->instagram_link }}" class="instagram"><i class="icofont-instagram"></i></a>
                                @endif
                                @if (!empty($company->linkedin_link))
                                    <a href="{{ $company->linkedin_link }}" class="linkedin"><i class="icofont-linkedin"></i></i></a>
                                @endif
                                @if (!empty($company->youtube_link))
                                    <a href="{{ $company->youtube_link }}" class="youtube"><i class="icofont-youtube"></i></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="animate__animated animate__fadeInUp col-lg-6 col-md-6 col-sm-12 col-xs-12 companyDescription" style="text-align:{{__('home.test_align')}}">
                    @if ( Config::get('app.locale') == 'ar')

                        <h3 class="companyTitle" style="direction:{{__('home.dir')}}; @if ( Config::get('app.locale') == 'ar') font-family: 'Tajawal', sans-serif;margin-right: .5rem; @endif">{{ $company->company_name_arabic }}</h3>

                        <div class="companyPara" style="font-family: 'Tajawal', sans-serif;">
                            <p class="companyPara " style="direction:{{__('home.dir')}};@if ( Config::get('app.locale') == 'ar') margin-right: .5rem;@endif">
                                {!!html_entity_decode($company->bio_arabic)!!}
                            </p>
                        </div>

                    @elseif ( Config::get('app.locale') == 'en' )

                        <h3 class="companyTitle" style="font-family: 'Righteous', cursive;">{{ $company->company_name_english }}</h3>

                        <div class="companyPara" style="font-family: 'Catamaran', sans-serif;">
                            <p class="companyPara">
                                
                                {!!html_entity_decode($company->bio_english)!!}
                            </p>
                        </div>

                    @elseif ( Config::get('app.locale') == 'ku' )

                        <h3 class="companyTitle">{{ $company->company_name_kurdish }}</h3>
                        <p class="companyPara ">{{ strip_tags($company->bio_kurdish) }}</p>

                    @endif
                    
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero -->
    <section class="video_section ">
        <div class="container" >
            <div class="row">
                <div class="animate__animated animate__fadeInUp  video_div col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                    @if (!empty($company->video_link))
                         <iframe  src="{{$company->video_link}}" >fsdf </iframe>
                    @endif
                </div>
            </div>
            <!-- Gallery -->
            <div class="row">
                {{-- <div class="lightbox-gallery">
                    <div class="container">
                        <div class="row photos">
                            @foreach ($images as $img )
                                 <div class="col-sm-6 col-md-4 col-lg-3 item">
                                     <a href="{{ asset($img->path) }}" data-lightbox="photos">
                                        <img class="img-fluid " src="{{ asset($img->path) }}">
                                    </a>
                                 </div>
                            @endforeach
                        </div>
                    </div>
                </div> --}}
                <div id="clients" class="gallery col-md-12" >
                    <div class="container" >
                      <div class="owl-carousel gallery-carousel ">
                        @foreach ($images as $img)
                          <a href="{{ asset($img->path) }}"><img src="{{ asset($img->path) }}" alt=""></a>
                        @endforeach
                      </div>
                    </div>
                </div>    
            </div>
            <!-- End Gallery -->
            {{-- <section id="clients" class="clients">
                <div class="container">
                  <div class="owl-carousel clients-carousel">
                    @foreach ($images as $img)
                      <a href="{{ asset($img->path) }}"><img src="{{ asset($img->path) }}" alt=""></a>
                    @endforeach
                  </div>
          
                </div>
            </section> --}}
        </div>
    </section>


@endsection

@section('footer')

@endsection
