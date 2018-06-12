@extends('layouts.main')
@section('title', 'contact')
@section('body_class', 'contact')
@section('footer_class', 'space50')

@section('header')
	@parent
@endsection

@section('content')
	<section id="contact">
	  <div class="container">
	    <div class="row">
	      <div class="col-lg-12">
	        <h2 class="title space30">Let's talk</h2>
	        <div class="contact-box">
	          <form>
	            <div class="form-group">
	              <input type="text" class="form-control" placeholder="Full name" name="">
	            </div>
	            <div class="form-group">
	              <input type="text" class="form-control" placeholder="Phone" name="">
	            </div>
	            <div class="form-group">
	              <input type="text" class="form-control" placeholder="Email" name="">
	            </div>
	            <div class="form-group">
	              <input type="text" class="form-control" placeholder="Message" name="">
	            </div>
	            <div class="form-group">
	              <a href="#"><img src="{{ asset('img/send-btn.png') }}" class="d-block m-auto mt-5"></a>
	            </div>
	          </form>
	        </div>
	      </div>
	    </div>
	  </div>
	</section>	

	<section id="services">
	  <div class="container">
	    <div class="row">
	      <div class="col-lg-12 text-center">
	        <h2 class="text-center title">Our services</h2>
	      </div>
	    </div>
	    <div class="row space80">
	      <div class="col-xl-3 col-md-6">
	        <div class="hexagon hexa2 m-0"><span class="hexa-shape"><span class="rotate-hexa"><img src="{{ asset('img/img1.svg') }}"><p class="space30">Investment funds <br>in crypto</p>
	        <img src="{{ asset('img/arrow.svg') }}"></span></span></div>  
	      </div>  
	      <div class="col-xl-3 col-md-6">
	        <div class="space30 d-lg-none d-md-block"></div>     
	        <div class="hexagon hexa3 m-0"><span class="hexa-shape"><span class="rotate-hexa"><img src="{{ asset('img/img2.svg') }}"><p class="space30">Review and Join <br>ICO’s</p>
	        <img src="{{ asset('img/arrow.svg') }}"></span></span></div> 
	      </div>
	      <div class="col-xl-3 col-md-6"> 
	        <div class="space30 d-xl-none d-lg-block"></div>         
	        <div class="hexagon hexa3 m-0"><span class="hexa-shape"><span class="rotate-hexa"><img src="{{ asset('img/img3.svg') }}"><p class="space30">Learn all about <br>crypto</p>
	        <img src="{{ asset('img/arrow.svg') }}"></span></span></div>  
	      </div> 
	      <div class="col-xl-3 col-md-6"> 
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