
<?php
echo "2) Dado a sequência de Fibonacci, onde se inicia por 0 e 1 e o próximo valor sempre será a soma dos 2 valores anteriores (exemplo: 0, 1, 1, 2, 3, 5, 8, 13, 21, 34...), escreva um programa na linguagem que desejar onde, informado um número, ele calcule a sequência de Fibonacci e retorne uma mensagem avisando se o número informado pertence ou não a sequência.
IMPORTANTE:
Esse número pode ser informado através de qualquer entrada de sua preferência ou pode ser previamente definido no código ";
function fibonacci($n)
{
    if ($n == 0) {
        return 0;
    } elseif ($n == 1) {
        return 1;
    } else {
        return fibonacci($n - 1) + fibonacci($n - 2);
    }
}

$num = 21; // número a ser verificado

$encontrado = false;
for ($i = 0; $i <= $num; $i++) {
    if (fibonacci($i) == $num) {
        $encontrado = true;
        break;
    }
}
echo '<br> <br> Resultado: <br><br>';
if ($encontrado) {
    echo "O número $num pertence à sequência de Fibonacci";
} else {
    echo "O número $num não pertence à sequência de Fibonacci";
}
echo '<br> <br> <br>';


echo "3) Dado um vetor que guarda o valor de faturamento diário de uma distribuidora, faça um programa, na linguagem que desejar, que calcule e retorne:
• O menor valor de faturamento ocorrido em um dia do mês;
• O maior valor de faturamento ocorrido em um dia do mês;
• Número de dias no mês em que o valor de faturamento diário foi superior à média mensal.

IMPORTANTE:
a) Usar o json ou xml disponível como fonte dos dados do faturamento mensal;
b) Podem existir dias sem faturamento, como nos finais de semana e feriados. Estes dias devem ser ignorados no cálculo da média;";
echo '<br><br>Resultado:<br><br>';

$data = file_get_contents('dados.json');
$data = json_decode($data, true);

$valores = array_column(array_filter($data, function ($item) {
    return $item['valor'] !== 0.0;
}), 'valor');
$dias = array_column(array_filter($data, function ($item) {
    return $item['valor'] !== 0.0;
}), 'dia');

$media_mensal = array_sum($valores) / count($valores);
$menor_valor = min($valores);
$maior_valor = max($valores);

$dias_acima_media = array_filter($data, function ($item) use ($media_mensal) {
    return $item['valor'] > $media_mensal;
});

echo "A média mensal foi: $media_mensal.<br>";
echo "O maior valor mensal foi: $maior_valor.<br>";
echo "O menor valor mensal foi: $menor_valor.<br><br>";
echo "Os dias acima da média mensal foram:<br><br>";
foreach ($dias_acima_media as $dia) {
    echo "O dia: " . $dia['dia'] . ". Foi maior que a media mensal, com:" . $dia['valor'] . '<br>';
}
echo '<br><br><br>';
echo "4) Dado o valor de faturamento mensal de uma distribuidora, detalhado por estado:

SP – R$67.836,43
RJ – R$36.678,66
MG – R$29.229,88
ES – R$27.165,48
Outros – R$19.849,53

Escreva um programa na linguagem que desejar onde calcule o percentual de representação que cada estado teve dentro do valor total mensal da distribuidora.";
echo '<br><br>Resultado:<br><br>';
// Array com o faturamento mensal por estado
$faturamento_mensal = array(
    'SP' => 67836.43,
    'RJ' => 36678.66,
    'MG' => 29229.88,
    'ES' => 27165.48,
    'Outros' => 19849.53
);

// Calcula o valor total mensal
$total_mensal = array_sum($faturamento_mensal);

// Percorre o array de faturamento mensal e calcula o percentual de representação de cada estado
$percentuais = array();
foreach ($faturamento_mensal as $estado => $valor) {
    $percentual = ($valor / $total_mensal) * 100;
    $percentuais[$estado] = $percentual;
}

// Imprime os percentuais de representação de cada estado
foreach ($percentuais as $estado => $percentual) {
    echo $estado . ': ' . number_format($percentual, 2) . '%<br>';
}

echo '<br><br><br>';
echo "5) Escreva um programa que inverta os caracteres de um string.

IMPORTANTE:
a) Essa string pode ser informada através de qualquer entrada de sua preferência ou pode ser previamente definida no código;
b) Evite usar funções prontas, como, por exemplo, reverse;";
echo '<br><br>Resultado:<br><br>';

$string = "Tecnologia e programação.";

$stringInvertida = "";
for ($i = mb_strlen($string, 'UTF-8') - 1; $i >= 0; $i--) {
    $stringInvertida .= mb_substr($string, $i, 1, 'UTF-8');
}
echo $stringInvertida;

?>
