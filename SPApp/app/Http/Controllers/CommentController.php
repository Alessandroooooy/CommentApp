<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;

class CommentController extends Controller
{
    // Отображение списка комментариев
    public function index()
    {
        $comments = Comment::latest()->paginate(25);
        return view('comments.index', compact('comments'));
    }

    // Отображение формы создания комментария
    public function create()
    {
        return view('comments.create');
    }

    // Сохранение нового комментария
    public function store(Request $request)
    {
        // Проверка и валидация данных
        $request->validate([
            'user_name' => 'required|string|min:3|max:255',
            'email' => 'required|email',
            'text' => 'required|string|min:10',
        ]);

        // Поиск или создание пользователя
        $user = User::firstOrCreate(['email' => $request->email], [
            'name' => $request->user_name,
        ]);

        // Создание комментария и связывание с пользователем
        $comment = new Comment([
            'text' => $request->text,
        ]);

        $user->comments()->save($comment);

        return redirect()->route('comments.index')->with('success', 'Комментарий успешно создан');
    }

    // Отображение конкретного комментария
    public function show(Comment $comment)
    {
        return view('comments.show', compact('comment'));
    }

    // Отображение формы редактирования комментария
    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    // Обновление комментария
    public function update(Request $request, Comment $comment)
    {
        // Проверка и валидация данных
        $request->validate([
            'text' => 'required|string|min:10',
        ]);

        $comment->update([
            'text' => $request->text,
        ]);

        return redirect()->route('comments.show', $comment)->with('success', 'Комментарий успешно обновлен');
    }

    // Удаление комментария
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('comments.index')->with('success', 'Комментарий успешно удален');
    }
}


