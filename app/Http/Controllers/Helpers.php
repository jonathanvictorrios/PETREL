<?php

function obtenerDescripcionEstado($id)
{
    $descripcion = "";
    if ($id == 1) {
        $descripcion = "falta firma Santiago";
    }
    return $descripcion;
}