<?php

	$bancoServidor = '127.0.0.1';
	$bancoUsuario = 'root';
	$bancoSenha = 'go1do2fo3';
	$bancoBanco = 'tarefas';

	$conexao = mysqli_connect($bancoServidor,$bancoUsuario,$bancoSenha,$bancoBanco);

	if(mysqli_connect_errno($conexao)){
		echo "Problemas para concetar ao banco.";
		die();
	}

	function busca_tarefas($conexao){
		$sqlBusca = 'SELECT * FROM tarefa';
		$resultado = mysqli_query($conexao,$sqlBusca);

		$tarefas = array();

		while($tarefa = mysqli_fetch_assoc($resultado)){
			$tarefas[] = $tarefa;
		}

		return $tarefas;
	}

	function gravar_tarefa($conexao,$tarefa){
		$sqlGravar = "INSERT INTO tarefa 
						(nome,descricao,prioridade,prazo,concluida) 
						VALUES (
								'{$tarefa['nome']}',
								'{$tarefa['descricao']}',
								{$tarefa['prioridade']},
								'{$tarefa['prazo']}',
								{$tarefa['concluida']})
					 ";

		//mysqli_query - Serve para executar comandos do MySQL
		mysqli_query($conexao,$sqlGravar);
	}

	function buscar_tarefa($conexao,$id){
		$sqlBusca = 'SELECT * FROM tarefa WHERE id = ' . $id;
		$resultado = mysqli_query($conexao,$sqlBusca);
		return mysqli_fetch_assoc($resultado);
	}

	function editar_tarefa($conexao, $tarefa){

		$sqlEditar = "
				UPDATE tarefa SET 
					nome = '{$tarefa['nome']}',
					descricao = '{$tarefa['descricao']}',
					prioridade = {$tarefa['prioridade']},
					prazo = '{$tarefa['prazo']}',
					concluida = {$tarefa['concluida']}
				WHERE id = {$tarefa['id']}	
		";

		mysqli_query($conexao,$sqlEditar);
	}

	function remover_tarefa($conexao,$id){

		$sqlRemover = "DELETE FROM tarefa WHERE id = {$id}";

		mysqli_query($conexao,$sqlRemover);
	}
?>