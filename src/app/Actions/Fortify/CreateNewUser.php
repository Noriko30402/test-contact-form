<?php

namespace App\Actions\Fortify;

use App\Http\Requests\RegisterRequest; // RegisterRequestのインポート
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    /**
     * 新しいユーザーを作成
     *
     * @param  array<string, string>  $input
     * @return \App\Models\User
     */
    public function create(array $input): User
    {
        $request = app(RegisterRequest::class);
        $request->merge($input);
    
        // validate()を呼び出す前に引数を渡す
        $validated = $request->validated(); // validated()を使用
    
        return User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
    }
}
