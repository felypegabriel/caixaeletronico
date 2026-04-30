<?php

$saldo = 0;
$extrato = "";

while (true) {

    echo "\n===== CAIXA ELETRÔNICO =====\n";
    echo "1 - Depositar\n";
    echo "2 - Sacar\n";
    echo "3 - Ver Extrato\n";
    echo "4 - Sair\n";

    echo "Escolha uma opção: ";
    $opcao = trim(fgets(STDIN));

    if ($opcao == "1") {
        echo "Digite o valor do depósito: ";
        $valor = floatval(trim(fgets(STDIN)));

        if ($valor > 0) {
            $saldo = $saldo + $valor;
            $extrato = $extrato . "Depósito: R$ " . number_format($valor, 2, ',', '.') . "\n";
            echo "Depósito realizado com sucesso!\n";
        } else {
            echo "Valor inválido.\n";
        }

    } elseif ($opcao == "2") {
        echo "Digite o valor do saque: ";
        $valor = floatval(trim(fgets(STDIN)));

        if ($valor > $saldo) {
            echo "Saldo insuficiente!\n";
        } elseif ($valor <= 0) {
            echo "Valor inválido.\n";
        } else {
            $saldo = $saldo - $valor;
            $extrato = $extrato . "Saque: R$ " . number_format($valor, 2, ',', '.') . "\n";
            echo "Saque realizado com sucesso!\n";
        }

    } elseif ($opcao == "3") {
        echo "\n===== EXTRATO =====\n";
        echo $extrato;
        echo "Saldo atual: R$ " . number_format($saldo, 2, ',', '.') . "\n";

    } elseif ($opcao == "4") {
        echo "Saindo do sistema...\n";
        break;

    } else {
        echo "Opção inválida.\n";
    }
}