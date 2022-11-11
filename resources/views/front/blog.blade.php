@extends('front.layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/blog.css') }}">
@endsection

@section('main-content')
    <div class="heroImg" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.64) 0%,rgba(0, 0, 0, 0.644) 100%), url({{ asset($post->header_image) }})">
        
        @if ( Config::get('app.locale') == 'ar')

        <h2 style="font-family: 'Tajawal', sans-serif;">{{ $post->header_title_ar }}</h2>  
      
        @elseif ( Config::get('app.locale') == 'en' )
                
        <h2>{{ $post->header_title }}</h2>   
                
        @endif
        
    </div>
    <section class="blogs">
            <div class="blog">
                <div class="blog-text">


                    @if ( Config::get('app.locale') == 'ar')

                        <p class="blogTitle" style="font-family: 'Tajawal', sans-serif; direction: rtl; text-align: right;">{{ $post->post_title_ar }}</p>
                        <div class="blogBody" style="font-family: 'Tajawal', sans-serif;direction: rtl; text-align: right;">
                            <p class="blogBody" >{!!html_entity_decode($post->post_body_ar)!!}</p>     
                        </div>
      
                    @elseif ( Config::get('app.locale') == 'en' )
                              
                        <p class="blogTitle">{{ $post->post_title }}</p>
                        <div class="blogBody">
                            <p class="blogBody">{!!html_entity_decode($post->post_body)!!}</p>                          
                        </div>
                              
                    @endif

                </div>
            </div>
            @if (!empty($images[0]))
                
                <div class="blog-pic">
                    @foreach ($images as $img)
                        <a href="{{ asset($img->path) }}"><img src="{{ asset($img->path) }}" alt=""></a>
                    @endforeach
                </div>
            @endif
            
    </section>
@endsection