<?php

// A expressão sempre deve ficar entre duas barras: /expressao/

// ^ valida se a string começa com o(s) caractere(s) (início da expressão): ^a
//   -> valida tudo o que vem depois do ^ (e não só o primeiro caractere).
// $ valida se a string termina com o(s) caractere(s) (final da expressão): c$
// /i retira a validação de case sensitive (fica depois da barra final)
// [a-zA-Z0-9] letras de 'a' a 'z' (minúsculas), maiúsculas e números
//             -> [a-z.\-\_] aceita ponto (.), traço (-) e underline (_)
//                -> nesse caso é preciso da barra invertida para escapar os caracteres
// {} número de ocorrências a serem validadas
//    -> {6} exatamente 6 caracteres
//    -> {1-6} intervalo entre 1 e 6 (só dá inválido se passar de 6)
//    -> ? 0 ou 1 ocorrência
//    -> * 0 ou mais ocorrências
//    -> + 1 ou mais ocorrências

//Dessa forma a validação é feita apenas uma vez (uma ocorrência, um caractere):
$string = "a"; //válido
$string = "abc"; //inválido
$padrao = "/^[a-z0-9]$/i"; 

$string = "ei59";
$padrao = "/^[a-z0-9]{1,4}$/i"; //dessa forma valida de 1 a 4 caracreres

//validação de email:
// aqui a expressão começa a ser dividida em partes, sendo a primeira parte até o @
$string = "contato@gmail.com"; //inválido
$string = "contato@"; //válido
$padrao = "/^[a-z0-9.\-\_]+@$/i";

//divisões: nome do email; @; nome do provedor; . (ponto); domínio;
$string = "contato@gmail.com";
$padrao = "/^[a-z0-9.\-\_]+@[a-z0-9.\-\_]+\.(com|br|com.br|net)$/i";

//validação de data:
$string = "13/09/2018";
$padrao = "/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/";

// Retira da string o seguinte texto: 999999.4.SIGTV_EXEMPLO nos casos em que o texto continua (ex: 999999.4.SIGTV_EXEMPLO.teste)
$padrao = "/^[0-9]+\.[0-9]\.[(SIGTV)A-Z0-9\_]+/i";
preg_match($padrao, $val, $matches);
$val = $matches[0];

echo $val;

if(preg_match($padrao, $string)){
  echo "Válido";
}else{
  echo "Inválido";
}
