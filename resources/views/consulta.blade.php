@extends('plantilla')

@section('consulta')
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#343a40 " fill-opacity="1" d="M0,192L30,213.3C60,235,120,277,180,256C240,235,300,149,360,128C420,107,480,149,540,154.7C600,160,660,128,720,133.3C780,139,840,181,900,181.3C960,181,1020,139,1080,149.3C1140,160,1200,224,1260,240C1320,256,1380,224,1410,208L1440,192L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z"></path></svg>

<div class="container" id="consulta">
 <hr>
 <br>

 <h2 class="display-8 text-center">Consultas:</h2>


     <section class="section-50 section-md-75 section-lg-100edit">
        <div class="container">
          <div class="row row-40">
            <div class="col-md-4 col-lg-4 height-fill">
              <article class="icon-box">
                <div class="box-top">
                  <div class="box-icon"><span class="novi-icon icon icon-primary icon-lg mercury-icon-users"></span></div>
                  <div class="box-header">
                  	<h5><a href="/crear"> <img src="images/agenda.png" alt="" width="50px"> </a></h5>
                    <h5><a href="/crear">Presencial</a></h5>
                  </div>
                </div>
                <div class="divider bg-accent"></div>
                <div class="">
                  <p>Para realizar una consulta de manera presencial</p>
                </div>
              </article>
            </div>
            <div class="col-md-4 col-lg-4 height-fill">
              <article class="icon-box">
                <div class="box-top">
                  <div class="box-icon"><span class="novi-icon icon icon-primary icon-lg mercury-icon-lib"></span></div>
                  <div class="box-header">
                  	<a href="https://api.whatsapp.com/send?phone={{$user->telephone_pri}}"> <img src="images/whatsapp.png" alt="" width="50px"></a>
                    <h5><a href="hhttps://api.whatsapp.com/send?phone={{$user->telephone_pri}}">	Whatsapp</a></h5>
                  </div>
                </div>
                <div class="divider bg-accent"></div>
                <div class="">
                  <p>Para realizar una consulta de manera a través de whatsapp</p>
                </div>
              </article>
            </div>
          </div>
        </div>
      </section>
      </div>
@endsection
