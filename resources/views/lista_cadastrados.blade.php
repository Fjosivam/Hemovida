@extends('layouts.app')
@section('cabecalho')
@extends('layouts.cabecalho')
@stop
@section('corpo')
<div class="container-fluid mb-5" style="background-color: #182E47; margin-top: 80px;">
	<div class="row">
		<div class="col-lg-12 col-sm-12 col-">
			@if (session('success')!== null)
			<div class="row text-center">
				<div class="col-lg-3 col-sm-1"></div>
				<div class="col-lg-6 col-sm-10">
					<div class="alert alert-success alert-dismissible fade show" role="alert"">
						{{ session('success') }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
			</div>
			@endif	
			<div class="container" style="background-color: white; border-radius: 10px; box-shadow: 0px 0px 0px 0.4px;">
				<!-- <div class="container"> -->
					<div class="row">
						<div class="col-xl-12">
							<center>
								<h5 style="margin-top: 20px; font-family: 'Raleway', sans-serif; color: red;">
									Doadores
								</h5>
								<hr style="background-color: red; margin-top: 5px">
							</center>
						</div>
						<!-- <div class="col-xl-12"><hr style="border: 2px solid red; margin-top: -8px;"></div> -->
					</div>
					<div class="container">
						<div class="row">
							<div class="col-lg-4"></div>
							<div class="col-lg-4">								
								<input class="form-control mb-2" style="background: none; border-radius: 20px" id="myInput" id="" type="text" placeholder="Pesquisar...">
							</div>
							
						</div>
					</div>
					<div class="row">
						<div class="container">
							@if(isset($dados))
							<div class="col-lg-12 mb-3">
								
								<form action="/enviar_mail" class="mt-3 mb-3 ml-5 mr-5" method="post">
									@csrf
									<div class="table-responsive">

										<table class="table">
											<thead>
												<tr>
													<th>Selecione</th>
													<th>Foto</th>
													<th>Nome</th>
													<th>Tipo San</th>
													<th>Email</th>
													<th>Ações</th>
												</tr>
											</thead>
											<tbody id="myTable">
												<?php $cont = 1 ?>
												@foreach ($dados as $dado)
												<tr>
													<td>
														<div class="checkbox">
															<input type="checkbox" value={{$dado->email}} id="checkbox-1" name={{$cont}}>

														</div>
													</td>
													<td>
														@if($dado->image!=='none')
														<img class=" mb-3" src="{{url('storage/doadores/'.$dado->image)}}" class="img-fluid" style="margin:auto; width: 100px; border-radius: 100px; margin-top: 0px; box-shadow: 0px 0px 1px;width:50px;height: 50px" />
														@else
														<img class="mb-3" src="./img/icone.jpg" class="img-fluid" style="margin:auto; width: 50px; 	height:50px;border-radius: 50px; margin-top: 0px; box-shadow: 0px 0px 1px" />
														@endif
														</td>
														<td>{{ $dado->nome }}</td>
													<td>{{$dado->tipo_sanguineo}}</td>
													<td>{{ $dado->email }}</td>
													<td>
														{{-- Visualizar Doadores--}}
														<a href="/editar_doador/{{ $dado->id }}">Visualizar</a>
														<span> / </span>

														{{-- deletar Doadores--}}
														<a href="#" data-toggle="modal" data-target="#deletarDoador{{ $dado->id }}" class="btn btn-danger btn-sm" id="deletar">Deletar</a>
													</td>
												</tr>
												<!-- Modal -->
												<div class="modal fade" id="deletarDoador{{ $dado->id }}" tabindex="-1" role="dialog" aria-labelledby="deletarDoadorLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="deletarDoadorLabel">Deletar doador?</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														Você tem certeza que deseja deletar o doador {{ $dado->nome }}?
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
														<a href="/apagar_doador/{{ $dado->id }}" class="btn btn-danger btn-sm">Deletar</a>
													</div>
													</div>
												</div>
												</div>
												<?php $cont++?>
												@endforeach	

											</tbody>										
										</table>

									</div>
									<button type="submit" class="btn btn-warning" style="font-weight: bold; font-size: 16px;" id="email">Enviar Email</button>
								</form>					
							</div>
							@else
							<div class="col-lg-12 mb-3 text-center"><i class='far fa-eye-slash' style='font-size:48px'></i></div>
							@endif
						</div>
					</div>
					<!-- </div> -->
				</div>		
			</div>
		</div>
	</div>

	<script>
		$( "#searchButton" ).click(function() {
			if ($( "#search" ).val() !== "") {
				var location = window.location.href;
				location = location.split("?")[0];
				window.location.replace(location + "?name=" + $( "#search" ).val());
			} else {
				var location = window.location.href;
				location = location.split("?")[0];
				window.location.replace(location);
			}
		});
	</script>
	<script>
		$(document).ready(function(){
			$("#myInput").on("keyup", function() {
				var value = $(this).val().toLowerCase();
				$("#myTable tr").filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
			});
		});

			// 'var buttonDeletar = document.getElementById('deletar');
						// buttonDeletar.onclick = function(){
						// 	confirm("deseja realmente apagar o doador?");
						// };'
						var buttonEmail = document.getElementById('email');
						function habilidaDisable(){
							buttonEmail.disabled = true;
						}

						function desabilidaDisable(){
							buttonEmail.disabled = false;
						}
					</script>
					@stop