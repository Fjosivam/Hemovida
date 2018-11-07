@extends('layouts.app')
@section('cabecalho')
@extends('layouts.cabecalho')
@stop
@section('corpo')
@if (isset($success))
<script type="text/javascript">
	alert({{ $success }});
</script>
@endif
<div class="container-fluid mb-5" style="background-color: #182E47; margin-top: 80px;">
	<div class="row">
		<div class="col-lg-12 col-sm-12 col-">
			<div class="container" style="background-color: white; border-radius: 10px; box-shadow: 0px 0px 0px 0.4px;">
				<!-- <div class="container"> -->
					<div class="row">
						<div class="col-xl-12">
							<center>
								<h5 style="margin-top: 20px; font-family: 'Raleway', sans-serif; color: red;">
									{{ $nome }} CADASTRADOS
								</h5>
								<hr style="background-color: red; margin-top: 5px">
							</center>
						</div>
						<!-- <div class="col-xl-12"><hr style="border: 2px solid red; margin-top: -8px;"></div> -->
					</div>

					<div class="row">
						<div class="container">
							<div class="col-lg-12 mb-3">
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												{{-- <th>Selecionar</th> --}}
												<th>Nome</th>
												<th>Email</th>
												<th>Ações</th>
											</tr>
										</thead>
										<tbody>
											
												@foreach ($dados as $dado)
												<tr>
													{{-- <td>
														<input class="form-check-input" type="checkbox" value="" id="defaultCheck1"></td> --}}
														<td>{{ $dado->nome }}</td>
													<td>{{ $dado->email }}</td>
													<td>
														<a href="/editar_funcionario/{{ $dado->id }}">visualizar</a>
														<form method="POST" action="/apagar_funcionario">
															@csrf
															<input type="hidden" name="id" value="{{$dado->id}}">
															<button class="btn btn-danger" type="submit">apagar</button>
														</form>
													</td>
												</tr>

												@endforeach	
											


										</tbody>
									</table>	
								</div>
								@if ($nome == "DOADORES")
								<button type="submit" class="btn btn-warning disabled" style="font-weight: bold; font-size: 16px;">Enviar Email</button>
								@endif
								
							</div>
						</div>
					</div>
					<!-- </div> -->
				</div>		
			</div>
		</div>
	</div>
	@stop