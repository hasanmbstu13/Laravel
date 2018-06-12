@extends('layouts.main')
@section('title', 'invest')
@section('body_class', 'invest')
@section('footer_class', 'space80')

@section('header')
  <header>
    @include('partials.header_partial')
  </header>
@endsection

@section('content')
	<section id="banner">
	  <div class="overlay"></div>
	  <img src="{{ asset('img/hexa-lines.svg') }}" class="hexa-lines">
	  <div class="caption">
	    <div class="container">
	      <div class="row flex-items">
	        <div class="col-xl-6 col-lg-6">
	          <h2 class="text-center title">Investment funds</h2>

	          <ul class="list-unstyled list1 space10">
	            <li><span><img src="{{ asset('img/check.svg') }}"></span> Professionally managed </li>
	            <li><span><img src="{{ asset('img/check.svg') }}"></span> Insights through your own dashboard </li>
	            <li><span><img src="{{ asset('img/check.svg') }}"></span> Choose your strategy </li>
	          </ul>

	          <ul class="list-inline btn-list">
	            <li class="list-inline-item"><a href="#" class="btn-read">READ MORE</a></li>
	            <li class="list-inline-item"><a href="#" class="btn-participate">PARTICIPATE</a></li>
	          </ul>
	        </div>
	        <div class="col-xl-6 col-lg-6 d-lg-block d-md-none d-none">
	          <!-- <img src="{{ asset('img/hexa-img.svg') }}" class="w-100"> -->
	          <div class="hexa-box">
	            <div class="hexagon hexa1 m-0"><span class="hexa-shape"><span class="rotate-hexa"><p>Total portfolio</p><h5>&euro; 164.619,03</h5></span></span></div>

	            <div class="hexagon hexa2 m-0"><span class="hexa-shape"><span class="rotate-hexa"><p>Number of <br>investment funds</p><h5>5</h5></span></span></div>

	            <div class="hexagon hexa3 m-0"><span class="hexa-shape"><span class="rotate-hexa"><p>Average profit</p><h5>28% <sup><i class="fa fa-caret-up"></i></sup></h5></span></span></div>

	            <!-- <div class="hexagon hexa4 m-0"><span><img src="{{ asset('img/img4.svg') }}"><p>Buy your bitcoins</p>
	            <img src="{{ asset('img/arrow.svg') }}"></span></div>    -->           
	          </div>
	        </div>
	        <div class="col-xl-6 col-lg-6 d-lg-none d-md-block">
	          <!-- <img src="{{ asset('img/hexa-img.svg') }}" class="w-100"> -->
	          <div class="row space100">
	            <div class="col-md-6 col-12">
	              <div class="hexagon hexa1 m-0"><span class="hexa-shape"><span class="rotate-hexa"><p>Total portfolio</p><h5>&euro; 164.619,03</h5></span></span></div>
	            </div>
	            <div class="col-md-6 col-12">
	              <div class="hexagon hexa2 m-0"><span class="hexa-shape"><span class="rotate-hexa"><p>Number of <br>investment funds</p><h5>5</h5></span></span></div>
	            </div>
	          </div>
	          <div class="row">
	            <div class="col-md-12 col-12">
	              <div class="hexagon hexa3 m-0"><span class="hexa-shape"><span class="rotate-hexa"><p>Average profit</p><h5>28% <sup><i class="fa fa-caret-up"></i></sup></h5></span></span></div>
	            </div>              
	          </div>            
	        </div>
	      </div>
	    </div>
	  </div>
	</section>

	<section id="hexa">
	  <div class="container">
	    <div class="row">
	      <div class="col-lg-10 offset-lg-1">
	        <div class="row">
	          <div class="col-lg-6">
	            <img src="{{ asset('img/bar-chart.svg') }}" class="d-block">
	            <h2 class="title space30">Why should HEXA <br>invest your money</h2>
	          </div>
	        </div>

	        <div class="row">
	          <div class="col-lg-6">
	            
	            <p class="space40">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin leifend lacus velit, et bibendum odio faucibus in. Nullam alesuada enim at leo sagittis, at dictum dui blandit. Phasellus get vulputate arcu, eu varius diam. Suspendisse lobortis, justo at uctor eleifend, nisl leo luctus nisl, sit amet pharetra tortor justo at lit. Sed non ullamcorper metus, egestas dictum leo. Aenean ravida tempor dolor, eget pharetra sem.</p>

	            <p class="space30">Nam ullamcorper velit in urna venenatis eleifend. In venenatis a magna sit amet feugiat. Donec feugiat risus a nibh auctor, non tempor nulla maximus. Pellentesque at aliquam purus. Mauris scelerisque odio efficitur condimentum suscipit.</p>
	          </div>

	          <div class="col-lg-6">
	            
	            <p class="space40">Donec scelerisque massa velit, sit amet aliquam tortor rutrum id. In velit urna, interdum sollicitudin rutrum in, aliquet id quam. Vestibulum ac dui ac lorem bibendum placerat sed in felis.</p>

	            <p class="space30">Suspendisse vitae massa mattis urna lacinia mattis sed vitae mi. Nullam sed neque nunc. Maecenas sollicitudin quam at nisl accumsan consequat. Aenean vel sollicitudin mi. Aenean pulvinar vehicula leo at interdum. Aliquam eget orci porttitor, malesuada ante vel, molestie dolor. Mauris auctor metus eu volutpat mollis. Etiam porta lobortis sollicitudin. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus..</p>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	</section>

	@include('partials.member')
	
	<section id="services">
	  <div class="container">
	    <div class="row">
	      <div class="col-lg-12 text-center">
	        <h2 class="text-center title">Other services</h2>
	      </div>
	    </div>
	    <div class="row space50">
	      <div class="col-xl-4 col-lg-4">
	        <div class="space30 d-xl-none d-lg-block"></div>           
	        <div class="hexagon hexa3 m-0"><span class="hexa-shape"><span class="rotate-hexa"><img src="{{ asset('img/img2.svg') }}"><p class="space30">Review and Join <br>ICO’s</p>
	        <img src="{{ asset('img/arrow.svg') }}"></span></span></div> 
	      </div>
	      <div class="col-xl-4 col-lg-4"> 
	        <div class="space30 d-xl-none d-lg-block"></div>         
	        <div class="hexagon hexa3 m-0"><span class="hexa-shape"><span class="rotate-hexa"><img src="{{ asset('img/img3.svg') }}"><p class="space30">Learn all about <br>crypto</p>
	        <img src="{{ asset('img/arrow.svg') }}"></span></span></div>  
	      </div> 
	      <div class="col-xl-4 col-lg-4"> 
	        <div class="space30 d-xl-none d-lg-block"></div>         
	        <div class="hexagon hexa3 m-0"><span class="hexa-shape"><span class="rotate-hexa"><img src="{{ asset('img/img4.svg') }}"><p class="space30">Buy your bitcoins</p>
	        <img src="{{ asset('img/arrow.svg') }}"></span></span></div>  
	      </div>      
	    </div>
	  </div>
	</section>																																																												
@endsection

@section('script')
	@parent
@endsection

@section('footer-script')
	@parent
@endsection