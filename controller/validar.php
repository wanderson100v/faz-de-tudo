<?php

use entity\Cliente;
use entity\Usuario;
use entity\Contato;

require_once('../Config.php');

function validarCliente(Cliente $cliente){
    $erro = array();
    if(!empty($cliente->getUsuario))
    {
        validarUsuario($cliente->getUsuario());
    }
    $cliente->setNome(trim($cliente->getNome()));
    $cliente->setCpfCnpj(trim($cliente->getCpfCnpj()));
    if($cliente->getNome() == null || ( $cliente->getNome() != null && $cliente->getNome() == "") )
    {
        array_push($erro,"*Não foi informado um nome");
    }
    if($cliente->getCpfCnpj() == null || ( $cliente->getCpfCnpj() != null && $cliente->getCpfCnpj() == "")){
        array_push($erro,"*Não foi informado uma CPF ou CNPJ");
    }
    return $erro;
}

function validarUsuario(Usuario $usuario)
{
    $erro = array();
    $usuario->setSenha(trim($usuario->getSenha()));
    $usuario->setLogin(trim($usuario->getLogin()));
    if(empty($usuario->getLogin()))
    {
        array_push($erro,"*Não foi informado um login");
    }
    if(empty($usuario->getSenha()))
    {
        array_push($erro,"*Não foi informado uma senha");
    }
    return $erro;    
}

function validarContato(Contato $contato){
    $erro = array();
    
    $contato->setTipo(trim($contato->getTipo()));
    $contato->setDescricao(trim($contato->getDescricao()));
    if(empty($contato->getTipo()))
    {
        array_push($erro,"*Não foi informado um tipo");
    }
    if(empty($contato->getDescricao()))
    {
        array_push($erro,"*Não foi informado uma descrição");
    }
    
    if(empty($contato->getUsuario()))
    {
        array_push($erro,"*Não foi informado um usuário");
    }
    return $erro;
}