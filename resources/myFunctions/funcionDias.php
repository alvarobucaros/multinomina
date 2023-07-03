<?php

class funcionesGenerales
{

public function diferenciaDiasCorrientes($fchIni, $fchFin)
{
    $diasFchIni = Carbon::createFromFormat('Y-m-d', $fchIni);
    $diasFchIni = Carbon::createFromFormat('Y-m-d', $fchFin);
    $diferencia_en_dias = $diasFchIni->diffInDays($diasFchIni);
    return($diferencia_en_dias);
}

}