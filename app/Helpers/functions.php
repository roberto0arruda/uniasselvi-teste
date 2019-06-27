<?php

// setMaskCpf($cpf,'###.###.###-##')
function setMaskCpf($val, $mask)
{
    $maskared = '';
    $k = 0;

    for ($i = 0; $i <= strlen($mask)-1; $i++) {
        if ($mask[$i] == '#') {
            $maskared[$i] = $val[$k++];
        } else {
            $maskared[$i] = $mask[$i];
        }
    }

    return $maskared;
}