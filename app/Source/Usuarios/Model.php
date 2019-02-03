<?php

namespace App\Source\Usuarios;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Model
{

    public static function listarUsuariospaginados()
    {
        return User::with('bodegas')->with(['ventas' => function ($query) {
            $query->whereRaw('date(created_at) = "' . Carbon::now()->toDateString() . '"');
        }])->paginate(10);
    }

    public static function todasLasPropiedades()
    {
        return User::with('perfiles')->with('bodegas')->get();
    }

    public static function todasLasPropiedadesPaginados()
    {
        return User::with('perfiles')->with('bodegas')->paginate(25);
    }

    public static function observarDetalles($id)
    {
        return User::where('id', $id)->with('perfiles')->with('tipodocumento')->with('bodegas')->with('compras.productos')->with(['ventas.carrito.productos', 'ventas.metododepago', 'ventas.metododeenvio'])->get();
    }

    public static function eliminarUsuario($id)
    {
        return User::where('id', $id)->delete();
    }

    public static function editarUsuario($id, $data)
    {
        return DB::table('users')
            ->where('id', $id)
            ->update([
                'name' => $data['nombre'],
                'email' => $data['email'],
                'rutaimg' => $data['rutaimg'],
                'telefono' => $data['telefono'],
                'documento' => $data['documento'],
                'tipodocumento' => $data['tipodocumento'],
                'direccion' => $data['dirccion'],
                'nivelaccesso' => $data['nivelacceso']
            ]);
    }

    public static function crearUsuario($data)
    {
        return User::create([
            'name' => $data['nombre'],
            'email' => $data['email'],
            'rutaimg' => $data['rutaimg'],
            'telefono' => $data['telefono'],
            'password' => Hash::make($data['password']),
            'documento' => $data['documento'],
            'tipodocumento' => $data['tipodocumento'],
            'direccion' => $data['direccion'],
            'ciudad' => 1,
            'nivelaccesso' => $data['nivelacceso']
        ]);
    }

    public static function relacionBodegas($idbodega, $idusuario)
    {
        return DB::table('bodegas_user')->insert([
            'bodegas_id' => $idbodega,
            'user_id' => $idusuario
        ]);
    }
}
