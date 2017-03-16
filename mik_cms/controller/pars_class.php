<?php

header('Content-type:application/json;charset=utf-8');

$classe = $_POST['content'];
$tipo = $_POST['type'];

if ($tipo == 'img') {
    $risultato = explode('{', $classe);

    $classe1 = $risultato[1];

    $classe1 = explode('}', $classe1);
    $classe1 = $classe1[0];
    $classe1 = explode(';', $classe1);

    foreach ($classe1 as $prop) {
        $temp = explode(':', $prop);
        if (isset($temp[1]))
            $prop_totali[trim($temp[0])] = $temp[1];
    };

    //Classe hover
    $classe2 = $risultato[2];

    $classe2 = explode('}', $classe2);
    $classe2 = $classe2[0];
    $classe2 = explode(';', $classe2);

    foreach ($classe2 as $prop) {
        $temp = explode(':', $prop);
        if (isset($temp[1]))
            $prop_totali2['h-' . trim($temp[0])] = $temp[1];
    };
    if (isset($prop_totali2))
        $result = array_merge($prop_totali, $prop_totali2);
    else
        $result = $prop_totali;

    echo json_encode($result);
}

if ($tipo == 'table') {
    $risultato = explode('{', $classe);

    $classe1 = $risultato[1];

    $classe1 = explode('}', $classe1);
    $classe1 = $classe1[0];
    $classe1 = explode(';', $classe1);

    foreach ($classe1 as $prop) {
        $temp = explode(':', $prop);
        if (isset($temp[1]))
            $prop_totali[trim($temp[0])] = $temp[1];
    };

    //Classe hover
    $classe2 = $risultato[2];

    $classe2 = explode('}', $classe2);
    $classe2 = $classe2[0];
    $classe2 = explode(';', $classe2);

    foreach ($classe2 as $prop) {
        $temp = explode(':', $prop);
        if (isset($temp[1]))
            $prop_totali2['td-' . trim($temp[0])] = $temp[1];
    };
    if (isset($prop_totali2))
        $result = array_merge($prop_totali, $prop_totali2);
    else
        $result = $prop_totali;

    echo json_encode($result);
}
if ($tipo == 'text') {
    $risultato = explode('{', $classe);

    $classe1 = $risultato[1];

    $classe1 = explode('}', $classe1);
    $classe1 = $classe1[0];
    $classe1 = explode(';', $classe1);

    foreach ($classe1 as $prop) {
        $temp = explode(':', $prop);
        if (isset($temp[1]))
            $prop_totali[trim($temp[0])] = $temp[1];
    };
    $result = $prop_totali;
    echo json_encode($result);
}
?>



