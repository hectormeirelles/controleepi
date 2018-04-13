<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
        <link rel="stylesheet" href="<?= base_url('bootstrap-3.3.7/css/bootstrap.css')?>">
        <link rel="stylesheet" href="<?= base_url('css/css.css')?>">
        <link rel="stylesheet" href="<?= base_url('plugins/bootstrap-select-1.12.4/css/bootstrap-select.css')?>">
		<link rel="stylesheet" href="<?= base_url('plugins/datables-1.10.16/css/datatables.min.css')?>">
        
        <script type="text/javascript" src="<?= base_url('plugins/jQuery/jQuery-3.2.1.js')?>"></script>
        <script type="text/javascript" src="<?= base_url('bootstrap-3.3.7/js/bootstrap.js')?>"></script>
		<script type="text/javascript" src="<?= base_url('plugins/jQuery-Mask/jquery.mask.min.js')?>"></script>
        <script type="text/javascript" src="<?= base_url('plugins/bootstrap-select-1.12.4/js/bootstrap-select.js')?>"></script>
        <script type="text/javascript" src="<?= base_url('plugins/bootstrap-select-1.12.4/js/i18n/defaults-pt_BR.js')?>"></script>
		<script type="text/javascript" src="<?= base_url('plugins/datables-1.10.16/js/datatables.min.js')?>"></script>
		<style>
			#posiciona {
				position: absolute; /* posição absoluta ao elemento pai, neste caso o BODY */
				/* Posiciona no meio, tanto em relação a esquerda como ao topo */
				left: 50%; 
				top: 50%;
				width: 500px;
				height: 100px; 
				margin-left: -250px;
				margin-top: -50px;
				text-align: center; /* Centraliza o texto */
				/*background-color: #FFF;
				color: #000;
				border: 5px solid #000;*/
				line-height: 1;
				z-index: 1000; /* Faz com que fique sobre todos os elementos da página */
			}
			
			#fechar { margin: 5px; font-size: 12px; }
	  </style>
    </head>
    <body>
		<?php if($this->session->has_userdata('tipo')){ ?>
		<div>
			<div id="posiciona" class="alert <?= ($this->session->flashdata('tipo') == 1) ? 'alert-success' : 'alert-danger'?>">
				<div style="font-size:20px"><strong><?=$this->session->flashdata('titulo')?></strong></div><br>
				<div><span><?=$this->session->flashdata('mensagem')?><br></span></div>	
			</div>
		</div>
		<?php } ?>
		
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="index.php">Controle de EPI</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Funcionários <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= base_url('funcionario/cadastro')?>">Cadastro</a></li>
                                <li><a href="<?= base_url('funcionario/listagem')?>">Listagem</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">EPI's <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= base_url('epi/cadastro')?>">Cadastro</a></li>
								<li><a href="<?= base_url('epi/disponiveis')?>">Disponíveis</a></li>
								<li><a href="<?= base_url('epi/entregues')?>">Entregues</a></li>
                                <li><a href="<?= base_url('epi/vencidos')?>">Vencidos</a></li>
                            </ul>
                        </li>
                    </ul>
					<?php if(!$this->session->has_userdata('usuario')){ ?>
					<form action="<?= base_url('usuario/logar')?>" class="navbar-form navbar-right" role="form" method="post">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input id="usuario" type="text" class="form-control" name="usuario" value="" placeholder="Usuário">                                        
						</div>

						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input id="senha" type="password" class="form-control" name="senha" value="" placeholder="Senha">                                        
						</div>
						<button type="submit" class="btn btn-default" style="background-color: transparent; color: #9d9d9d; border: none"><span class="glyphicon glyphicon-log-in"></span> Entrar</button>
					</form>
					<?php } else { ?>
					<ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><?= $this->session->usuario?></a></li>
						<li><a href="<?= base_url('usuario/deslogar')?>"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
                    </ul>
					<?php } ?>
                </div>
            </div>
        </nav>