<meta charset="utf-8"> 
		<div class="row tabela1">
			<div class="col-md-1" align="left">Nome:</div>
			<div class="col-md-3"><input class="form-control texto" type="text" name = "nome" value ="<?=$cliente['nome']?>"></div>
			<div class="col-md-1" align="left">Telefone:</div>
			<div class="col-md-2"><input class = "form-control" type="text" name = "telefone" value="<?=$cliente['telefone']?>"></div>
			<div class="col-md-2" align="left">Email para contato:</div>
			<div class="col-md-3"><input class="form-control email" type="email" name="email" value="<?=$cliente['email']?>"></div>
		</div><br />
		<div class="row tabela1">
			<div class="col-lg-1" align="left">CPF:</div>
			<div class="col-lg-3"><input class = "form-control" type="text" name = "cpf" value="<?=$cliente['cpf']?>"></div>
			<div class="col-lg-1" align="left">CNPJ:</div>
			<div class="col-lg-3"><input class = "form-control" type="text" name = "cnpj" value="<?=$cliente['cnpj']?>"></div>
		</div><br />
		<div class="row tabela1">
			<div class="col-md-1" align="left">Endereço:</div>
			<div class="col-md-3"><input class="form-control" type="text" name = "endereco" value ="<?=$cliente['endereco']?>"></div>
			<div class="col-md-1" align="left">N°</div>
			<div class="col-md-2"><input class = "form-control" type="text" name = "n" value="<?=$cliente['n']?>"></div>
			<div class="col-md-2" align="left">CEP:</div>
			<div class="col-md-3"><input class = "form-control" type="text" name = "cep" value="<?=$cliente['cep']?>"></div>
		</div><br />
		<div class="row">
			<div class="col-lg-1" align="left">Req. Serviço:</div>
			<div class="col-lg-3">
				<select name="servico_id" class = "form-control">
				<?php foreach($servicos as $servico)
				{
					$esseservico = $cliente['servico_id'] == $servico['id'];
					$selecao = $esseservico ? "selected='selected'": "";
					?>
					<option value="<?=$servico['id']?>" <?=$selecao?>>
						<?=$servico['nome']?>
					</option>
				<?php } ?>
				</select>
			</div>
			<div class="col-lg-1" align="left">Informações adicionais:</div>
			<div class="col-lg-4"><textarea class="form-control" name="info" ><?=$cliente['info']?></textarea></div>
		</div>