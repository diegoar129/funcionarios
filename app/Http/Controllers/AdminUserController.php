<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    private function requireAdmin()
    {
        if (!session()->has('user')) {
            return redirect()->route('login')->with('error', 'Por favor inicia sesión para continuar.');
        }

        if (!session('is_admin')) {
            return redirect()->route('funcionarios.index')->with('error', 'No tienes permisos de administrador.');
        }

        return null;
    }

    public function index()
    {
        if ($redirect = $this->requireAdmin()) {
            return $redirect;
        }

        $users = User::orderByDesc('id')->paginate(10);

        return view('admin.usuarios', compact('users'));
    }

    public function verify($id)
    {
        if ($redirect = $this->requireAdmin()) {
            return $redirect;
        }

        $user = User::findOrFail($id);
        $user->email_verified_at = now();
        $user->save();

        return back()->with('success', 'Usuario verificado correctamente.');
    }

    public function unverify($id)
    {
        if ($redirect = $this->requireAdmin()) {
            return $redirect;
        }

        $user = User::findOrFail($id);
        $user->email_verified_at = null;
        $user->save();

        return back()->with('success', 'Verificación removida correctamente.');
    }

    public function destroy($id)
    {
        if ($redirect = $this->requireAdmin()) {
            return $redirect;
        }

        $user = User::findOrFail($id);

        if ((int) session('user_id') === (int) $user->id) {
            return back()->with('error', 'No puedes eliminar tu propio usuario.');
        }

        $user->delete();

        return back()->with('success', 'Usuario eliminado correctamente.');
    }
}
