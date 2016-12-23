<!-- MODAL PARA EDIÇÃO DE INSTALAÇÃO FTTH-->
<?php
	$tipo = $_SESSION['tipo'];
?>
<div class="modal fade" id="UpdateRetorno" role="dialog">
	<div class="modal-dialog modal-lg">
		<form method="POST" id="form_geral">
			<div class="box box-primary">
				<div class="modal-content">
					<div class="box-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="box-title">Informações do retorno</h3>
					</div>
					<div class="modal-body">
						<div class="box-body">
							<div class="row">
								<div id="div">
								</div>
					              <pre id="pre">
					              </pre>
							</div><!-- /.row -->
							<div class="col-md-13">
								<input type="hidden" name="id" id="id">
								<input type="hidden" name="tipo" id="tipo" value="<?=$tipo; ?>">
								<input type="hidden" name="user" id="user" value="<?=$nomeUsuario; ?>">
								<div class="col-md-6">
								<div class="form-group has-feedback">
										<label>Usuário Atribuido</label>
										<select class="form-control" id="usuario" name="usuario">
											
										</select>
									</div>
									<div class="form-group has-feedback">
										<label>Transferir Setor</label>
										<select class="form-control" id="setor" name="setor">
											<option selected="" disabled="">Setores</option>
											<option value="Suporte">Suporte</option>
					                          <option value="Suporte 2">Suporte 2</option>
					                          <option value="Comercial">Comercial</option>  
					                          <option value="Recepção">Recepção</option>
					                          <option value="Cobrança">Cobrança</option> 
					                          <option value="Ouvidoria">Ouvidoria</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label>Status</label>
										<select class="form-control" id="status" name="status">
											<option value="Aguardando retorno">Aguardando Retorno</option>
					                          <option value="Agendado">Agendado</option>  
					                          <option value="Retornando">Retornando</option>
					                          <option value="Sem retorno">Sem retorno</option>
					                          <option value="Em atendimento">Em atendimento</option>
										</select>
									</div>
									<div class="form-group has-feedback" style="display: none" id="div_hora">
							      		<label>Data Agendada</label>
							      		<input type="datetime-local" name="agendado" id="agendado" class="form-control">
							      	</div>
								</div>
								<div class="col-md-6">
									<label>Fazer ligação</label>
									<div class="input-group">
										<i class="fa fa-refresh fa-spin" style="display: none"></i>
										<span class="input-group-btn">
								        <button class="btn btn-primary" onclick="ligar()" type="button">Ligar!</button>
								      </span>
								      <select class="form-control" id="numeros">
								      	<option>Selecione um Número</option>
								      </select><br>
							      	</div>
							      	<div class="form-group has-feedback">
										<label>Observação</label>
										<textarea id="obs" name="obs" class="form-control" rows="3" cols="10"></textarea>
									</div>
								</div>
							</div>
						</div><!-- /.box-body -->
					</div><!-- /.box -->
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Salvar</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" id="finalizar" class="btn btn-success">Finalizar</button>
				</div>
			</div>
		</form>
	</div>
</div>


<!-- MODAL PARA EDIÇÃO DE INSTALAÇÃO FTTH-->
<div class="modal fade" id="finalizado" role="dialog">
	<div class="modal-dialog modal-lg">
		<form method="POST" id="form_2">
			<div class="box box-primary">
				<div class="modal-content">
					<div class="box-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="box-title">Informações do retorno</h3>
					</div>
					<div class="modal-body">
						<div class="box-body">
							<div class="row">
								<div id="div_2">
								</div>
					              <pre id="pre_2">
					              </pre>
							</div><!-- /.row -->
							<div class="col-md-13">
								<input type="hidden" name="id" id="id_2">
								<input type="hidden" name="user" id="user_2" value="<?=$nomeUsuario; ?>">
								<div class="col-md-6">
									<div class="form-group has-feedback">
										<label>Transferir Setor</label>
										<select class="form-control" id="setor_2" name="setor">
											<option selected="" disabled="">Setores</option>
											<option value="Suporte">Suporte</option>
					                          <option value="Suporte 2">Suporte 2</option>
					                          <option value="Comercial">Comercial</option>  
					                          <option value="Recepção">Recepção</option>
					                          <option value="Cobrança">Cobrança</option> 
					                          <option value="Ouvidoria">Ouvidoria</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label>Status</label>
										<select class="form-control" id="status_2" name="status">
											<option value="Aguardando retorno">Aguardando Retorno</option>
					                          <option value="Agendado">Agendado</option>  
					                          <option value="Retornando">Retornando</option>
					                          <option value="Sem retorno">Sem retorno</option>
					                          <option value="Em atendimento">Em atendimento</option>
					                          <option value="Finalizado">Finalizado</option>
										</select>
									</div>
									<div class="form-group has-feedback" style="display: none" id="div_hora_2">
							      		<label>Data Agendada</label>
							      		<input type="datetime-local" name="agendado" id="agendado_2" class="form-control">
							      	</div>
								</div>
								<div class="col-md-6">
									<label>Fazer ligação</label>
									<div class="input-group">
										<i class="fa fa-refresh fa-spin" style="display: none"></i>
										<span class="input-group-btn">
								        <button class="btn btn-primary" onclick="ligar()" type="button">Ligar!</button>
								      </span>
								      <select class="form-control" id="numeros_2">
								      	<option>Selecione um Número</option>
								      </select><br>
							      	</div>
							      	<div class="form-group has-feedback">
										<label>Observação</label>
										<textarea id="obs_2" name="obs" class="form-control" rows="3" cols="10"></textarea>
									</div>
								</div>
							</div>
						</div><!-- /.box-body -->
					</div><!-- /.box -->
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Salvar</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="modal fade" id="md_sms" role="dialog">
  <div class="modal-dialog">
    <form method="POST" id="enviar_sms">
      <div class="box box-primary">
        <div class="modal-content">
          <div class="box-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="box-title">Enviar SMS</h3>
          </div>
          <div class="modal-body">
            <div class="box-body">
                <div class="col-md-12">
	                <div class="form-group has-feedback">
	                	<label>Selecione um numero:</label>
						<select class="form-control" name="tel_sms" id="tel_sms">
						</select>
	              	</div>
              	<div class="col-md-5">
              		<div class="form-group has-feedback">
	                	<label>Selecione uma mensagem:</label>
						<select class="form-control" id="msg" name="msg" required="">
							<option selected="" disabled="">Selecione uma Mensagem</option>
						</select>
	              	</div>
              	</div>
              		<div class="col-md-7">
              			<div class="form-group has-feedback">
							<label>Mensagem:</label>
							<textarea id="ver_msg" name="ver_msg" readonly="" class="form-control" rows="4"></textarea>
						</div>
                	</div>
                </div>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Enviar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>