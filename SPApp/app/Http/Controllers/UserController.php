<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Отображение списка пользователей
    public function index()
    {
        $users = User::latest()->paginate(25);
        return view('users.index', compact('users'));
    }

    // Отображение формы создания пользователя
    public function create()
    {
        return view('users.create');
    }

    // Сохранение нового пользователя
    public function store(Request $request)
    {
        // Проверка и валидация данных
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8', // Вам нужно включить пароль
        ]);

        // Создание пользователя
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Хеширование пароля
        ]);

        return redirect()->route('users.index')->with('success', 'Пользователь успешно создан');
    }

    // Отображение конкретного пользователя
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // Отображение формы редактирования пользователя
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Обновление пользователя
    public function update(Request $request, User $user)
    {
        // Проверка и валидация данных
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('users.show', $user)->with('success', 'Пользователь успешно обновлен');
    }

    // Удаление пользователя
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Пользователь успешно удален');
    }
}




