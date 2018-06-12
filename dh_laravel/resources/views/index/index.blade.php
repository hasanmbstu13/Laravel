@extends('layouts.main')
@section('title', 'index')

@section('nav')
  @include('partials.nav')
@endsection

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
        <div class="col-xl-6 col-lg-12">
          <p>Professionally managed investments | ICO reviews and funds | E-learning in cryptocurrencies</p>
          <h1 class="main-title">Investing in crypto <br>made accessable for <br>everybody</h1>
          <ul class="list-inline btn-list">
            <li class="list-inline-item"><a href="#" class="btn-read borderfff">MEMBERSHIPS</a></li>
            <!-- <li class="list-inline-item"><a href="#" class="btn-participate">PARTICIPATE</a></li> -->
          </ul>
        </div>
        <div class="col-xl-6 col-lg-12 d-lg-block d-md-none d-none">
          <!-- <img src="{{ asset('img/hexa-img.svg') }}" class="w-100"> -->
          <div class="hexa-box">
            <div class="hexagon hexa1 m-0"><span><img src="{{ asset('img/img1.svg') }}"><p>Investment funds <br>in crypto</p>
            <img src="{{ asset('img/arrow.svg') }}"></span></div>

            <div class="hexagon hexa2 m-0"><span><img src="{{ asset('img/img2.svg') }}"><p>Review and Join <br>ICO’s</p>
            <img src="{{ asset('img/arrow.svg') }}"></span></div>

            <div class="hexagon hexa3 m-0"><span><img src="{{ asset('img/img3.svg') }}"><p>Learn all about <br>crypto</p>
            <img src="{{ asset('img/arrow.svg') }}"></span></div>

            <div class="hexagon hexa4 m-0"><span><img src="{{ asset('img/img4.svg') }}"><p>Buy your bitcoins</p>
            <img src="{{ asset('img/arrow.svg') }}"></span></div>              
          </div>
        </div>
        <div class="col-xl-6 col-lg-12 d-lg-none d-md-block">
          <!-- <img src="{{ asset('img/hexa-img.svg') }}" class="w-100"> -->
          <div class="row space50">
            <div class="col-md-6">
              <div class="hexagon hexa1 m-0"><span><img src="{{ asset('img/img1.svg') }}"><p>Investment funds <br>in crypto</p>
              <img src="{{ asset('img/arrow.svg') }}"></span></div>
            </div>
            <div class="col-md-6">
              <div class="hexagon hexa2 m-0"><span><img src="{{ asset('img/img2.svg') }}"><p>Review and Join <br>ICO’s</p>
              <img src="{{ asset('img/arrow.svg') }}"></span></div>
            </div>
          </div>
          <div class="row space50">
            <div class="col-md-6">
              <div class="hexagon hexa3 m-0"><span><img src="{{ asset('img/img3.svg') }}"><p>Learn all about <br>crypto</p>
              <img src="{{ asset('img/arrow.svg') }}"></span></div>
            </div>
            <div class="col-md-6">
              <div class="hexagon hexa4 m-0"><span><img src="{{ asset('img/img4.svg') }}"><p>Buy your bitcoins</p>
              <img src="{{ asset('img/arrow.svg') }}"></span></div>
            </div>
          </div>            
        </div>
      </div>
    </div>
  </div>
</section>

@include('partials.member')

<section id="investment">
  <div class="container">
    <div class="row flex-items">
      <div class="col-lg-6 col-md-6 text-center">
        <div class="hexagon"><span class="hexa-shape"><span class="rotate-hexa"><img src="{{ asset('img/bitcoin.svg') }}"></span></span></div>
      </div>
      <div class="col-lg-6 col-md-6">
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
    </div>
  </div>
</section>

<section id="ico">
  <img src="{{ asset('img/hexa-lines.svg') }}" class="hexa-lines">
  <div class="container">
    <div class="row flex-items">
      <div class="col-lg-5 offset-lg-1 col-md-6">
        <h2 class="text-center title">Invest in ICO’s</h2>

        <ul class="list-unstyled list1 space10">
          <li><span><img src="{{ asset('img/check1.svg') }}"></span> Technical & fundamental analysis </li>
          <li><span><img src="{{ asset('img/check1.svg') }}"></span> Participate in private sales </li>
          <li><span><img src="{{ asset('img/check1.svg') }}"></span> Maximum bonusses </li>
        </ul>

        <ul class="list-inline btn-list">
          <li class="list-inline-item"><a href="#" class="btn-read borderfff">ICO OVERVIEW</a></li>
          <!-- <li class="list-inline-item"><a href="#" class="btn-participate">PARTICIPATE</a></li> -->
        </ul>
      </div>

      <div class="col-lg-6 col-md-6">
        <div class="hexagon"><span class="hexa-shape"><span class="rotate-hexa"><img src="{{ asset('img/list.svg') }}"></span></span></div>
      </div>
    </div>
  </div>
</section>

<section id="course">
  <div class="container">
    <div class="row flex-items">
      <div class="col-lg-6 col-md-6">
        <div class="hexagon"><span class="hexa-shape"><span class="rotate-hexa"><img src="{{ asset('img/mortarboard.svg') }}"></span></span></div>
      </div>
      <div class="col-lg-6 col-md-6">
        <h2 class="text-center title">E-learning courses</h2>

        <ul class="list-unstyled list1 space10">
          <li><span><img src="{{ asset('img/check.svg') }}"></span> What is cryptocurrency </li>
          <li><span><img src="{{ asset('img/check.svg') }}"></span> What is blockchain </li>
          <li><span><img src="{{ asset('img/check.svg') }}"></span> Become aware of what you’re investing in </li>
        </ul>

        <ul class="list-inline btn-list">
          <li class="list-inline-item"><a href="#" class="btn-read">GET STARTED</a></li>
          <!-- <li class="list-inline-item"><a href="#" class="btn-participate">PARTICIPATE</a></li> -->
        </ul>
      </div>
    </div>
  </div>
</section>
@endsection

@section('script')
	@parent
@endsection

@section('footer-script')
  <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
@endsection