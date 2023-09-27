<?php
namespace Database\Factories;


use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class; // Убедитесь, что указано корректное имя модели

    public function definition()
    {
        return [
            'user_id' => User::factory(), // Создание пользователя и получение его ID
            'text' => $this->faker->text(255), // Генерация текстового описания комментария
        ];
    }
}
