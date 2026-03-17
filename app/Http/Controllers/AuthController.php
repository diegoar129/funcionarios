<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showFuncionarioLogin()
    {
        return view('auth.login', [
            'loginType' => 'funcionario',
            'title' => 'Iniciar sesión de funcionario',
            'submitRoute' => route('login.funcionario.submit'),
        ]);
    }

    public function showAdminLogin()
    {
        return view('auth.login', [
            'loginType' => 'admin',
            'title' => 'Iniciar sesión de administrador',
            'submitRoute' => route('login.admin.submit'),
        ]);
    }

    private function validateLogin(Request $request)
    {
        return $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
    }

    private function setSession(User $user)
    {
        session([
            'user' => $user->name,
            'user_id' => $user->id,
            'is_admin' => (bool) $user->is_admin,
        ]);
    }

    public function loginFuncionario(Request $request)
    {
        $data = $this->validateLogin($request);

        $user = User::where('email', $data['email'])->first();

        if ($user && Hash::check($data['password'], $user->password)) {
            $this->setSession($user);
            return redirect()->intended('/funcionarios');
        }

        return back()->withErrors(['email' => 'Credenciales incorrectas'])->withInput();
    }

    public function loginAdmin(Request $request)
    {
        $data = $this->validateLogin($request);

        $user = User::where('email', $data['email'])->first();

        if ($user && Hash::check($data['password'], $user->password)) {
            if (!$user->is_admin) {
                return back()->withErrors(['email' => 'Este acceso es solo para administradores.'])->withInput();
            }

            $this->setSession($user);
            return redirect()->intended('/funcionarios');
        }

        return back()->withErrors(['email' => 'Credenciales incorrectas'])->withInput();
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $isFirstUser = User::count() === 0;
        $validated['password'] = Hash::make($validated['password']);
        $validated['is_admin'] = $isFirstUser;

        User::create($validated);

        return redirect()->route('login')->with('success', 'Usuario registrado correctamente. Ahora puedes iniciar sesión.');
    }

    public function logout()
    {
        session()->forget(['user', 'user_id', 'is_admin']);
        return redirect()->route('login.funcionario');
    }
}
