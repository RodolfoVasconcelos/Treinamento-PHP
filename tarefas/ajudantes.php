<?php
	function traduzir_prioridade($prioridade){
		if ($prioridade == 1){
			echo "Baixa";
		}
		if($prioridade == 2){
			echo "Média";
		}
		if($prioridade == 3){
			echo "Alta";
		}
	}

	function traduz_data_para_banco($data){
		if($data == ''){
			return '';
		}

		$dados = explode("/", $data);

		$data_mysql = "{$dados[2]}-{$dados[1]}-{$dados[0]}";
		return $data_mysql;
	}

	function traduz_data_para_exibir($data){
		if($data == "" OR $data == "0000-00-00"){
			return "";
		}

		$dado = explode("-",$data);

		$data_exibir = "{$dado[2]}/{$dado[1]}/{$dado[0]}";

		return $data_exibir;
	}

	function traduz_concluida($concluida){
		if($concluida == 1){
			echo "Sim";
		}else{
			echo "Não";
		}
	}
?>