<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

// Route for the homepage, which will show the todo list
Route::get('/', [TodoController::class, 'index'])->name('todos.index');

// Resource route for handling all Todo actions (index, create, store, edit, update, destroy)
Route::resource('todos', TodoController::class);

// Optionally, you can keep this route for testing purposes, but you already have your TodoController route handling '/'
Route::get('/welcome', function () {
    return view('welcome');
});
