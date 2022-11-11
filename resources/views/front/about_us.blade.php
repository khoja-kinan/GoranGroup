@extends('front.layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/aboutUs.css') }}">
@endsection

@section('main-content')
    <div class="about-us">

        @if ( Config::get('app.locale') == 'ar')

            <h2 class="about-us-title" @if ( Config::get('app.locale') == 'ar') style="font-family: 'Tajawal', sans-serif;"@endif>ما هي مجموعة شركات كوران ؟</h2>
            <p class="about-us-paragraph" @if ( Config::get('app.locale') == 'ar') style="font-family: 'Tajawal', sans-serif;direction: rtl;"@endif >تتكون مجموعة جوران من عدة قطاعات ذات مناهج مختلفة وبفريق موحد ومهني يهدف إلى زيادة الفوائد وتوسيع نطاق عملها بناءً على قرارات الرئيس التنفيذي ولجنة المراقبة والتخطيط.
                تتكون المجموعة من العديد من الشركات والمصانع والمستشفيات وصيدلية. تأسست الشركة الأولى للسيد خليل جوران تحت اسم شركة خليل جوران للمولدات ومحطات الطاقة التجارية والمعدات الثقيلة. تم تطويرها تدريجياً حتى أصبحت مجموعة جوران في عام 2005.
            مجموعة جوران عضو نشط في غرفة التجارة العربية البريطانية. كما أنها الموزع الرئيسي لمنتجات PERKINS & VOLVO PENTA العالمية بالإضافة إلى أبراج الإضاءة وقطع الغيار.</p>            
      
        @elseif ( Config::get('app.locale') == 'en' )
                
            <h2 class="about-us-title">What is Goran Group?</h2>
            <p class="about-us-paragraph">Goran Group comprises of several sectors with different approaches and with a united and professional team aiming at increasing the benefits and the expansion of its work based on the decisions of the Chief Executive Officer and the committee of monitoring and planning. 
            The group consists of many companies, factories, hospitals and a drugstore. Mr. Khalil Goran’s first company was founded under the name of Khalil Goran Company for generators and trading power plants and heavy equipment; it is gradually developed until it became Goran Group in 2005.  
            Goran Group is an active member of the Arabic-British Trade Chamber. It is also the main distributor of global PERKINS & VOLVO PENTA products as well as light towers and spare parts.</p>                  
                
        @endif

    </div>
    @if (!empty($video->video_url))
    <section class="video_section about-us-video">
        <div class="container">
            <div class="row">
                <div class="animate__animated animate__fadeInUp  video_div col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                    
                         <iframe  src="{{$video->video_url}}" > </iframe>
                    
                </div>
            </div>
            
        </div>
    </section>
    @endif
@endsection