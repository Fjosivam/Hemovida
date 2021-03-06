@extends('layouts.app')
@section('titulo')
{{ $titulo }}
@stop
@section('cabecalho')
@extends('layouts.cabecalho')
@stop
@section('corpo')
<div class="container-fluid mb-5" style="background-color: #182E47; margin-top: 80px;">
	<div class="row">
		<div class="col-lg-12 col-sm-12 col-">
			<div class="container" style="background-color: white; border-radius: 10px; box-shadow: 0px 0px 0px 0.4px;">
				<!-- <div class="container"> -->
					<div class="row">
						<div class="col-xl-12">
							<center>
								<h5 style="margin-top: 20px; font-family: 'Raleway', sans-serif; color: red;">
									MEU CADASTRO
								</h5>
								<hr style="background-color: red; margin-top: 5px">
							</center>
						</div>
						<!-- <div class="col-xl-12"><hr style="border: 2px solid red; margin-top: -8px;"></div> -->
					</div>

					<div class="row">
						<div class="container">
							<div class="col-lg-12 mb-3">
								
								{{-- @if (count($errors) != 0)
								<div class="alert alert-warning alert-dismissible fade show" role="alert">
									<p>Campo(s) obrigatorio(s):</p>
									<ul>
										@foreach ($errors->all() as $erro)
										<div style="border-radius: 10px">
											<li>{{ $erro }}</li>
											@endforeach
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</ul>
									</div>
									@endif --}}
									<form method="POST" action="/cadastrar_doador">
										@csrf
										<input type="hidden" id="image" name="image" value="none">
										<div class="container font">
											<div class="col-lg-12 col-sm-12">
												<p style="margin-left: -25px;">IDENTIFICAÇÃO</p>
											</div>

											<div class="form-group row">
												<label for="nome" class="col-lg-2 col-sm-2 col-form-label" style="text-align: left;"><span class="obrigatorio">*</span> Nome:</label>

												<div class="col-lg-10 col-sm-10">
													<input type="text" class="form-control {{ $errors->has('nome') ? ' is-invalid' : '' }}" id="nome" name="nome" value="{{ old('nome') }}">

													@if ($errors->has('nome'))
													<span class="invalid-feedback" role="alert">
														<strong>{{ $errors->first('nome') }}</strong>
													</span>
													@endif
												</div>
											</div>

											<div class="form-group row">
												<label for="sobrenome" class="col-lg-2 col-sm-2 col-form-label" style="text-align: left;"><span class="obrigatorio">*</span> Sobrenome:</label>
												<div class="col-lg-10 col-sm-10">
													<input type="text" class="form-control {{ $errors->has('sobrenome') ? ' is-invalid' : '' }}" id="sobrenome" name="sobrenome" value="{{ old('sobrenome') }}">

													@if ($errors->has('sobrenome'))
													<span class="invalid-feedback" role="alert">
														<strong>{{ $errors->first('sobrenome') }}</strong>
													</span>
													@endif
												</div>
											</div>

											<div class="form-group row">
												<label for="cpf" class="col-lg-2 col-sm-2 col-form-label" style="text-align: left;"><span class="obrigatorio">*</span> CPF:</label>
												<div class="col-lg-10 col-sm-10">
													<input type="text" class="form-control {{ $errors->has('cpf') ? ' is-invalid' : '' }}" id="cpf" name="cpf" value="{{ old('cpf') }}">

													@if ($errors->has('cpf'))
													<span class="invalid-feedback" role="alert">
														<strong>{{ $errors->first('cpf') }}</strong>
													</span>
													@endif
												</div>
											</div>

											<div class="form-group row">
												<label for="data_nascimento" class="col-lg-2 col-sm-2 col-form-label" style="text-align: left;"><span class="obrigatorio">*</span> Data de Nascimento:</label>
												<div class="col-lg-10 col-sm-10">
													<input type="date" class="form-control {{ $errors->has('data_nascimento') ? ' is-invalid' : '' }}" id="data_nascimento" name="data_nascimento" value="{{ old('data_nascimento') }}">

													@if ($errors->has('data_nascimento'))
													<span class="invalid-feedback" role="alert">
														<strong>{{ $errors->first('data_nascimento') }}</strong>
													</span>
													@endif
												</div>
											</div>

											<div class="row">
												<label for="sexo" class="col-lg-2 col-sm-2 col-form-label" style="text-align: left;"><span class="obrigatorio">*</span> Sexo:</label>
												<div class="col-lg-9 col-sm-9" style="margin-top: 7px">
													<div class="custom-control custom-radio custom-control-inline">
														<input type="radio" id="masculino" name="sexo" class="custom-control-input" value="m">
														<label class="custom-control-label" for="masculino">Masculino</label>
													</div>
													<div class="custom-control custom-radio custom-control-inline">
														<input type="radio" id="feminino" name="sexo" class="custom-control-input" value="f">
														<label class="custom-control-label" for="feminino">Feminino</label>
													</div>
												</div>
											</div>


											<div class="form-group row">
												<label for="email" class="col-lg-2 col-sm-2 col-form-label" style="text-align: left;"><span class="obrigatorio">*</span> E-mail:</label>
												<div class="col-lg-10 col-sm-10">
													<input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" value="{{ old('email') }}">

													@if ($errors->has('email'))
													<span class="invalid-feedback" role="alert">
														<strong>{{ $errors->first('email') }}</strong>
													</span>
													@endif
												</div>
											</div>

											<div class="form-group row">
												<label for="profissao" class="col-lg-2 col-sm-2 col-form-label" style="text-align: left;">Profissão:</label>
												<div class="col-lg-10 col-sm-10">
													<input type="text" class="form-control" id="profissao" name="profissao">
												</div>
											</div>

											<div class="form-group row">
												<label for="senha" class="col-lg-2 col-sm-2 col-form-label" style="text-align: left;"><span class="obrigatorio">*</span> Senha:</label>
												<div class="col-lg-10 col-sm-10">
													<input type="password" class="form-control {{ $errors->has('senha') ? ' is-invalid' : '' }}" id="senha" name="senha" value="{{ old('senha') }}">

													@if ($errors->has('senha'))
													<span class="invalid-feedback" role="alert">
														<strong>{{ $errors->first('senha') }}</strong>
													</span>
													@endif
												</div>
											</div>

											<div class="form-group row">
												<label for="senha_confirmada" class="col-lg-2 col-sm-2 col-form-label" style="text-align: left;"><span class="obrigatorio">*</span> Confirmar senha:</label>
												<div class="col-lg-10 col-sm-10">
													<input type="password" class="form-control" id="senha_confirmada" name="senha_confirmada">
													<div class="invalid-feedback">
														Confirmação de senha não confere
													</div>
												</div>
											</div>

											<br>

											<div class="col-lg-12 col-sm-12">
												<h6 style="margin-left: -25px">ENDEREÇO</h6><br>
											</div>

											<div class="form-group row">
												<label for="cep" class="col-lg-2 col-sm-2 col-form-label" style="text-align: left;"><span class="obrigatorio">*</span> CEP:</label>
												<div class="col-lg-10 col-sm-10">
													<input type="text" class="form-control {{ $errors->has('cep') ? ' is-invalid' : '' }}" id="cep" name="cep" maxlength="9" value="{{ old('cep') }}">

													@if ($errors->has('cep'))
													<span class="invalid-feedback" role="alert">
														<strong>{{ $errors->first('cep') }}</strong>
													</span>
													@endif
												</div>
											</div>

											<div class="row mb-2">
												<label for="rua" class="col-lg-2 col-sm-12 col-form-label" style="text-align: left;"><span class="obrigatorio">*</span> Rua:</label>
												<!-- <div class="col-sm-7 form-group row"> -->
													<div class="col-lg-6 col-sm-12">
														<input type="text" class="form-control {{ $errors->has('rua') ? ' is-invalid' : '' }}" id="rua" name="rua" value="{{ old('rua') }}">

														@if ($errors->has('rua'))
														<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('rua') }}</strong>
														</span>
														@endif
													</div>
													<!-- </div> -->
													<div class="row">
														<label for="numero" class="col-lg-3 col-sm-2 col-form-label" style="text-align: left;"><span class="obrigatorio">*</span>Nº:</label>
														<div class="col-lg-4 col-sm-4">
															<input type="text" class="form-control {{ $errors->has('numero') ? ' is-invalid' : '' }}" id="numero" name="numero" value="{{ old('numero') }}">

															@if ($errors->has('numero'))
															<span class="invalid-feedback" role="alert">
																<strong>{{ $errors->first('numero') }}</strong>
															</span>
															@endif
														</div>
													</div>
												</div>

												<div class="row">
													<label for="bairro" class="col-lg-2 col-sm-2 col-form-label" style="text-align: left;"><span class="obrigatorio">*</span> Bairro:</label>
													<div class="col-sm-4 form-group row">
														<div class="col-lg-10 col-sm-10">
															<input type="text" class="form-control {{ $errors->has('bairro') ? ' is-invalid' : '' }}" id="bairro" name="bairro" value="{{ old('bairro')}}">

															@if ($errors->has('bairro'))
															<span class="invalid-feedback" role="alert">
																<strong>{{ $errors->first('bairro') }}</strong>
															</span>
															@endif
														</div>
													</div>
													<div class="col-sm-6 form-group row">
														<label for="cidade" class="col-lg-3 col-sm-2 col-form-label" style="text-align: left;"><span class="obrigatorio">*</span> Cidade:</label>
														<div class="col-lg-9 col-sm-10">
															<input type="text" class="form-control {{ $errors->has('cidade') ? ' is-invalid' : '' }}" id="cidade" name="cidade" value="{{ old('cidade')}}">

															@if ($errors->has('cidade'))
															<span class="invalid-feedback" role="alert">
																<strong>{{ $errors->first('cidade') }}</strong>
															</span>
															@endif
														</div>
													</div>
												</div>

												<div class="form-group row">
													<label for="referencia" class="col-lg-2 col-sm-2 col-form-label" style="text-align: left;">Referência:</label>
													<div class="col-lg-10 col-sm-10">
														<input type="text" class="form-control" id="referencia" name="referencia">
													</div>
												</div>

												<div class="row">
													<label for="tipo_sanguineo" class="col-lg-2 col-sm-2 col-form-label" style="text-align: left;"><span class="obrigatorio">*</span> Tipo sanguíneo:</label>
													<div class="col-lg-10 col-sm-10">
														<select class=" custom-select {{ $errors->has('tipo_sanguineo') ? ' is-invalid' : '' }}" name="tipo_sanguineo">
															<option selected value="">Selecione...</option>
															<option value="i">Não sei qual é meu sangue</option>
															<option value="A+">A+</option>
															<option value="A-">A-</option>
															<option value="B+">B+</option>
															<option value="B-">B-</option>
															<option value="AB+">AB+</option>
															<option value="AB-">AB-</option>
															<option value="O+">O+</option>
															<option value="O-">O-</option>
														</select>
														@if ($errors->has('tipo_sanguineo'))
														<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('tipo_sanguineo') }}</strong>
														</span>
														@endif
														<p class="mt-2">Os campos com <span class="obrigatorio " style="font-size: 20px;">*</span> são de preenchimento obrigatório</p>
													</div>
												</div>
												<div class="row text-center">
													<div class="col-lg-6 col-sm-12 text-center mt-4 col-">
														<button id="cadastrar" type="submit" class="btn btn-info" style="font-weight: bold; font-size: 16px;">Cadastrar</button>
													</div>
													<div class="col-lg-6 col-sm-10 mt-4 col-">
														<button type="submit" class="btn btn-secondary" style="font-weight: bold; font-size: 16px;">Cancelar</button>		
													</div>
												</div>

											</div>
										</form>			
									</div>
								</div>
							</div>
							<!-- </div> -->
						</div>		
					</div>
				</div>
			</div>
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
			<script>
				$(document).ready(function() {
					$("#cpf").mask('000.000.000-00', {reverse: true});
					$("#cep").mask('00000-000', {reverse: true});

					function limpa_formulário_cep() {
			// Limpa valores do formulário de cep.
			$("#rua").val("");
			$("#bairro").val("");
			$("#cidade").val("");
		}

		//Quando o campo cep perde o foco.
		$("#cep").blur(function() {

			//Nova variável "cep" somente com dígitos.
			var cep = $(this).val().replace(/\D/g, '');

			//Verifica se campo cep possui valor informado.
			if (cep != "") {

				//Expressão regular para validar o CEP.
				var validacep = /^[0-9]{8}$/;

				//Valida o formato do CEP.
				if(validacep.test(cep)) {

					//Preenche os campos com "..." enquanto consulta webservice.
					$("#rua").val("...");
					$("#bairro").val("...");
					$("#cidade").val("...");

					//Consulta o webservice viacep.com.br/
					$.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

						if (!("erro" in dados)) {
							//Atualiza os campos com os valores da consulta.
							$("#rua").val(dados.logradouro);
							$("#bairro").val(dados.bairro);
							$("#cidade").val(dados.localidade);
						} //end if.
						else {
							//CEP pesquisado não foi encontrado.
							limpa_formulário_cep();
							alert("CEP não encontrado.");
						}
					});
				} //end if.
				else {
					//cep é inválido.
					limpa_formulário_cep();
					alert("Formato de CEP inválido.");
				}
			} //end if.
			else {
				//cep sem valor, limpa formulário.
				limpa_formulário_cep();
			}
		});
	});
				$("#senha_confirmada").on("change paste keyup", function() {
					confirmaSenha();
				});
				$("#senha").on("change paste keyup", function() {
					confirmaSenha();
				});
				function confirmaSenha() {
					if ($("#senha_confirmada").val() !== $("#senha").val()){
						$("#senha_confirmada").addClass("is-invalid");
						$("#cadastrar").prop('disabled', true);
					} else {
						$("#senha_confirmada").removeClass("is-invalid");
						$("#cadastrar").prop('disabled', false);
					}
				}
			</script>
			
			@stop