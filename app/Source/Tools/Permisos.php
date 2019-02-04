<?php

namespace App\Source\Tools;

use App\Source\Usuarios\Usuarios;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Permisos as prmisosdb;
use App\Perfiles;
use App\User;

class Permisos
{


    public static function generarMenu()
    {
        $perfiles = User::find(Auth::user()->id)->with(['perfiles.permisos' => function ($query) {
            $query->orderBy('permisos.ordenmenu', 'asc');
        }])->get()->toArray();
        $x = 0;
        for ($a = 0; $a < count($perfiles[0]['perfiles']); $a++) {
            for ($b = 0; $b < count($perfiles[0]['perfiles'][$a]['permisos']); $b++) {
                if (Auth::user()->nivelaccesso >= $perfiles[0]['perfiles'][$a]['permisos'][$b]['nivelacceso'])
                    $dat[$x++] = '<li class="nav-item"><a class="nav-link" href="' . $perfiles[0]['perfiles'][$a]['permisos'][$b]['url'] . '">' . $perfiles[0]['perfiles'][$a]['permisos'][$b]['nombre'] . '</a></li>';
            }
        }
        Session::put('menu', $dat);
    }
}
