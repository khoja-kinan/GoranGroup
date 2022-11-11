@extends('backEnd.layouts.master')
@section('css')
<!--  Owl-carousel css-->
<link href="{{URL::asset('backEnd/assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('backEnd/assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<div>
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Hi, welcome back!</h2>
						</div>
					</div>
					
				</div>
				<!-- /breadcrumb -->
@endsection
@section('content')
		<!-- Container closed -->
@endsection
@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('backEnd/assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('backEnd/assets/plugins/raphael/raphael.min.js')}}"></script>
<!--Internal  Flot js-->
<script src="{{URL::asset('backEnd/assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('backEnd/assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{URL::asset('backEnd/assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{URL::asset('backEnd/assets/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
<script src="{{URL::asset('backEnd/assets/js/dashboard.sampledata.js')}}"></script>
<script src="{{URL::asset('backEnd/assets/js/chart.flot.sampledata.js')}}"></script>
<!--Internal Apexchart js-->
<script src="{{URL::asset('backEnd/assets/js/apexcharts.js')}}"></script>
<!-- Internal Map -->
<script src="{{URL::asset('backEnd/assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{URL::asset('backEnd/assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{URL::asset('backEnd/assets/js/modal-popup.js')}}"></script>
<!--Internal  index js -->
<script src="{{URL::asset('backEnd/assets/js/index.js')}}"></script>
<script src="{{URL::asset('backEnd/assets/js/jquery.vmap.sampledata.js')}}"></script>	
@endsection