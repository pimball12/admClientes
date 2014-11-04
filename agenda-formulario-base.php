		<?php if($pag=="sim") 
		{ ?>
			<input type= "hidden" name = "pag2" value="sim">
			<tr><td><div class="row">
			<div Class="col-md-1">Cliente:</div>
			<div Class="col-lg-11">
			<select name="nome" class = "form-control" >
				<?php foreach($cliente as $cli)
				{ ?>
					<option value="<?=$cli['id']?>"> <?=$cli['nome']?> </option>
				<?php } ?>
			</select>
			</div>
			</div></td></tr>
				
		<?php } else { ?>
		<tr><td><div class="row">
			<div Class="col-md-1">Cliente:</div>
			<input type="hidden" name="nome" value="<?=$cliente['id']?>">
			<div Class="col-lg-11"><input class ="form-control" type="text" name="nome1" value="<?=$cliente['nome']?>" readonly></div>
		</div></td></tr>
		<?php } ?>
		
		
		
		<tr><td><div class="row">
			<div class="col-md-1">Título:</div>
			<div class="col-md-5"><input class ="form-control" type="text" name="titulo" value="<?=$agenda['titulo']?>"></div>
			<div class="col-md-1">Data:</div>
			<div class="col-md-2"><input class="form-control" type="text" name="data" id="data" value="<?=$data?>"></div>
			<div class="col-md-1">Hora:</div>
			<div class="col-md-2"><input class="form-control" type="text" name="hora" id="hora"  onkeypress=formataHora(form1.hora) maxlength="5" value="<?=$agenda['hora']?>"></div>
		</div></tr></td>
		<tr><td><div class="row">
			<div class="col-md-1">Endereço:</div>
			<div class="col-md-11"><input class="form-control textarea" type="text" name="endereco" value="<?=$agenda['endereco']?>"></div>
		</div></tr></td>
		<tr><td><div class="row">
			<div class="col-md-1">Detalhes:</div>
			<div class="col-md-11"><textarea class="form-control" type="text" name="detalhes"><?=$agenda['detalhes']?></textarea></div>
		</div></tr></td>