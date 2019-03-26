<?php


function active($ruta)
{
    // dd(route("persons"));
    return (request()->is($ruta) || request()->is("$ruta/*")) ? 'active' : '';
}
