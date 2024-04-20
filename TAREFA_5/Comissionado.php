<?php

class Comissionado extends Funcionario{
    private $vendas;

    public function __construct($_codigo, $_nome, $_valorHora, $_horasTrabalhadas, $_vendas){
        parent::__construct($_codigo, $_nome, $_valorHora, $_horasTrabalhadas);
        $this -> vendas = $_vendas;
    }

    public function getTotalVendas(){
        return $this -> vendas;
    }

    public function calcularSalario(){
        $salario = parent::calcularSalario();
        $vendas = $this->vendas * 0.15;
        return $salario + $vendas;
    }
}