<?php

use Illuminate\Support\Facades\Route;
use App\Models\{
    User,
    Preference,
};

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('adm.dashboard');
})->middleware(['auth'])->name('dashboard');




Route::get('/dashboard/post', function () {
    return view('adm.posts.list');
})->middleware(['auth'])->name('/dashboard/post');

Route::get('/dashboard/categoria', function () {
    return view('adm.categorias.list');
})->middleware(['auth'])->name('/dashboard/categorias');

Route::get('/dashboard/imagem', function () {
    return view('adm.imagens.list');
})->middleware(['auth'])->name('/dashboard/imagem');
Route::get('/dashboard/sessao', function () {
    return view('adm.sessoes.list');
})->middleware(['auth'])->name('/dashboard/sessao');



require __DIR__ . '/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/one-to-one', function () {
    $user = User::with('preference')->find(2);
    //$user = User::find(2);
    $data = [
        'background_color' => '#fff'
    ];

    if ($user->preference) {
        $user->preference->update($data);
    } else {
        //$user->preference()->create($data);
        $preference = new Preference($data);
        $user->preference()->save($preference);
    }
    $user->refresh();

    //delete preference :
    // $user->preference->delete();



    dd($user->preference);
});
