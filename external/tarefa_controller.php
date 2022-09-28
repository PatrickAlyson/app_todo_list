<?php
require './external/tarefa.model.php';
require './external/tarefa.service.php';
require './external/conexao.php';

$tarefa = new Tarefa();
$tarefa->__set('tarefa', $_POST['tarefa']);

$conexao = new Conexao();

$tarefaService = new TarefaService();
