<?php
require './external/tarefa.model.php';
require './external/tarefa.service.php';
require './external/conexao.php';

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;


if ($acao == 'inserir') {

    $tarefa = new Tarefa();
    $tarefa->__set('tarefa', $_POST['tarefa']);


    $conexao = new Conexao();

    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefaService->inserir();

    header('Location: ./nova_tarefa.php?inclusao=1');
} elseif ($acao == 'recuperar') {
    $tarefa = new Tarefa();
    $conexao = new Conexao();
    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefas = $tarefaService->recuperar();
} else if ($acao == 'atualizar') {
    $tarefa = new Tarefa();
    $tarefa->__set('id', $_POST['id']);
    $tarefa->__set('tarefa', $_POST['tarefa']);

    $conexao = new Conexao();
    $tarefaService = new TarefaService($conexao, $tarefa);
    if ($tarefaService->atualizar()) {
        header('Location: ./todas_tarefas.php?atualizacao=1');
    }
} else if ($acao == 'remover') {
    $tarefa = new Tarefa();
    $tarefa->__set('id', $_GET['id']);

    $conexao = new Conexao();
    $tarefaService = new TarefaService($conexao, $tarefa);
    if ($tarefaService->remover()) {
        header('Location: ./todas_tarefas.php?remocao=1');
    }
} else if ($acao == 'marcarRealizada') {
    $tarefa = new Tarefa();
    $tarefa->__set('id', $_GET['id']);
    $tarefa->__set('id_status', 2);

    $conexao = new Conexao();
    $tarefaService = new TarefaService($conexao, $tarefa);
    if ($tarefaService->marcarRealizada()) {
        header('Location: ./todas_tarefas.php');
    }
}
