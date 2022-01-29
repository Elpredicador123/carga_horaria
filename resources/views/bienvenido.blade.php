@extends('layouts.plantilla')
@section('contenido')
<div class="contenido-inicio">
     <h3 class="font-weight-bold text-center text-success my-2 pb-2 border-bottom-success col-md-10 mx-auto h1">Universidad Nacional de Trujillo</h3>
     <div class="row text-center flex-wrap-reverse py-2 justify-content-around align-items-center">
          <div class="col-md-5">
               <p class="text-dark">
                    Un saludo muy especial a la comunidad <strong class="text-success">Universidad Nacional de Trujillo</strong>  y al público en general. Quiero aprovechar la oportunidad para agradecer la participación de los docentes, estudiantes y administrativos en el manejo de la institucion durante estos meses.
                    Este 2022 hemos cumplido 197 años de Fundación (10 de mayo de 1824) <strong class="text-success">Universidad Nacional de Trujillo</strong>, y por medio de esta página web queremos reflejar lo que podemos lograr juntos y lo lejos que podemos llegar, si nos proponemos objetivos ambiciosos, nos ponemos a trabajar y los cumplimos.
                    Y con esta pandemia que nos ha golpeado a todos les dejo un mensaje
                    <br>
                    <strong class="text-success">
                         "La esperanza significa que uno no se rinde a la ansiedad, el derrotismo o la depresión cuando tropieza con dificultades y contratiempos"
                    </strong>
                    <br>
                    Por ello trabajamos conjuntamente para brindarles este servicio virtual a toda la comunidad de <strong class="text-success">Universidad Nacional de Trujillo</strong> y esperemos que esta situacion mejore,y como ultimas palabras enviarles un cordial saludo a toda la comunidad.
                    </p>
          </div>
          <div class="col-md-5 mb-1 mb-md-0 mb-5">
               {{-- <img src="https://fundacionorvalle.es/wp-content/uploads/2018/11/P1240172-scaled.jpg" class="img-fluid" alt=""> --}}
               <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="{{ asset('imagenes/unt_01.jpg') }}" class="d-block w-100 " style="height: 40vh" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="{{ asset('imagenes/unt_02.jpg') }}" class="d-block w-100 " style="height: 40vh" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="{{ asset('imagenes/unt_03.jpg') }}" class="d-block w-100 " style="height: 40vh" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="{{ asset('imagenes/unt_04.jpg') }}" class="d-block w-100 " style="height: 40vh" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="{{ asset('imagenes/unt_05.jpg') }}" class="d-block w-100 " style="height: 40vh" alt="...">
                      </div>
                    </div>
                    <button class="carousel-control-prev bg-transparent border-0" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden"></span> 
                    </button>
                    <button class="carousel-control-next bg-transparent border-0" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden"></span>
                    </button>
                  </div>
          </div>
     </div>
</div>
@endsection