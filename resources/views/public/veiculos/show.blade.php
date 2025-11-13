@extends('layouts.carbook')

@section('title', $veiculo->marca->nome . ' ' . $veiculo->modelo->nome)

@section('hero-section')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset('carbook/images/bg_3.jpg') }}');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
      <div class="col-md-9 ftco-animate pb-5">
      	<p class="breadcrumbs">
          <span class="mr-2"><a href="{{ route('veiculos.index') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> 
          <span>Detalhes do Veículo <i class="ion-ios-arrow-forward"></i></span>
        </p>
        <h1 class="mb-3 bread">{{ $veiculo->marca->nome }} {{ $veiculo->modelo->nome }}</h1>
      </div>
    </div>
  </div>
</section>
@endsection

@section('content')
<section class="ftco-section ftco-car-details">
  <div class="container">
  	<div class="row justify-content-center">
  		<div class="col-md-12">
  			<div class="car-details">
  				<div class="img rounded" style="background-image: url('{{ $veiculo->foto_principal }}'); background-size: cover; background-position: center;" onerror="this.style.backgroundImage='url({{ asset('carbook/images/car-1.jpg') }})'"></div>
  				<div class="text text-center">
  					<span class="subheading">{{ $veiculo->marca->nome }}</span>
  					<h2>{{ $veiculo->modelo->nome }}</h2>
  				</div>
  			</div>
  		</div>
  	</div>
  	<div class="row">
  		<div class="col-md d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services">
          <div class="media-body py-md-4">
          	<div class="d-flex mb-3 align-items-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-dashboard"></span></div>
            	<div class="text">
	              <h3 class="heading mb-0 pl-3">
	              	Quilometragem
	              	<span>{{ number_format($veiculo->quilometragem, 0, ',', '.') }} km</span>
	              </h3>
              </div>
            </div>
          </div>
        </div>      
      </div>
      <div class="col-md d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services">
          <div class="media-body py-md-4">
          	<div class="d-flex mb-3 align-items-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-pistons"></span></div>
            	<div class="text">
	              <h3 class="heading mb-0 pl-3">
	              	Ano
	              	<span>{{ $veiculo->ano_fabricacao }}</span>
	              </h3>
              </div>
            </div>
          </div>
        </div>      
      </div>
      <div class="col-md d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services">
          <div class="media-body py-md-4">
          	<div class="d-flex mb-3 align-items-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car-seat"></span></div>
            	<div class="text">
	              <h3 class="heading mb-0 pl-3">
	              	Cor
	              	<span>{{ $veiculo->cor->nome }}</span>
	              </h3>
              </div>
            </div>
          </div>
        </div>      
      </div>
      <div class="col-md d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services">
          <div class="media-body py-md-4">
          	<div class="d-flex mb-3 align-items-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-backpack"></span></div>
            	<div class="text">
	              <h3 class="heading mb-0 pl-3">
	              	Valor
	              	<span>R$ {{ number_format($veiculo->valor, 2, ',', '.') }}</span>
	              </h3>
              </div>
            </div>
          </div>
        </div>      
      </div>
  	</div>
  	<div class="row">
  		<div class="col-md-12 pills">
				<div class="bd-example bd-example-tabs">
					<div class="d-flex justify-content-center">
					  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
					    <li class="nav-item">
					      <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Descrição</a>
					    </li>
					    <li class="nav-item">
					      <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Galeria</a>
					    </li>
					  </ul>
					</div>

				  <div class="tab-content" id="pills-tabContent">
				    <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
				    	<div class="row">
				    		<div class="col-md-12">
				    			@if($veiculo->descricao)
				    				<p>{{ $veiculo->descricao }}</p>
				    			@else
				    				<p>Veículo em excelente estado, pronto para uso.</p>
				    			@endif
				    		</div>
				    	</div>
				    </div>

				    <div class="tab-pane fade" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
				      <div class="row">
				      	@if($veiculo->foto_principal)
				      		<div class="col-md-6 mb-3">
				      			<img src="{{ $veiculo->foto_principal }}" alt="Foto 1" class="img-fluid rounded" onerror="this.src='{{ asset('carbook/images/car-1.jpg') }}'">
				      		</div>
				      	@endif
				      	@if($veiculo->foto_2)
				      		<div class="col-md-6 mb-3">
				      			<img src="{{ $veiculo->foto_2 }}" alt="Foto 2" class="img-fluid rounded" onerror="this.src='{{ asset('carbook/images/car-2.jpg') }}'">
				      		</div>
				      	@endif
				      	@if($veiculo->foto_3)
				      		<div class="col-md-6 mb-3">
				      			<img src="{{ $veiculo->foto_3 }}" alt="Foto 3" class="img-fluid rounded" onerror="this.src='{{ asset('carbook/images/car-3.jpg') }}'">
				      		</div>
				      	@endif
				      	@if($veiculo->foto_4)
				      		<div class="col-md-6 mb-3">
				      			<img src="{{ $veiculo->foto_4 }}" alt="Foto 4" class="img-fluid rounded" onerror="this.src='{{ asset('carbook/images/car-4.jpg') }}'">
				      		</div>
				      	@endif
				      </div>
				    </div>
				  </div>
				</div>
			</div>
  	</div>
  </div>
</section>
@endsection
