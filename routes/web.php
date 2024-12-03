<?php
use Illuminate\Support\Facades\Route;

//Controladores adicionais do sistema
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Contracts\ContractController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\TermosController;
use App\Http\Controllers\Mail\ContactController;
use App\Http\Controllers\Public\PublicUserController;

use App\Http\Controllers\Ordens\OrdemDeServicoController;

//admin
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/termos-de-servico', [TermosController::class, 'termos_servico'])->name('terms.termos_servico');
Route::get('/politica-de-privacidade', [TermosController::class, 'politica_privacidade'])->name('terms.politica_privacidade');

Route::middleware('auth')->group(function () {
    //Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('profile.update.photo');

    //Rota para perfil publico
    Route::get('/clientes/{id}', [PublicUserController::class, 'show'])->name('clientes.show');

    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Contrato
    Route::get('/contracts', [ContractController::class, 'index'])->name('contracts.index');
    Route::post('/contracts/store', [ContractController::class, 'store'])->name('contracts.store');
    Route::put('/contracts/{contract}/status/{status}', [ContractController::class, 'updateStatus'])->name('contracts.updateStatus');
    Route::patch('/contracts/{id}/finalizar', [ContractController::class, 'finalizar'])->name('contracts.finalizar');
    Route::patch('/contracts/{id}', [ContractController::class, 'update'])->name('contracts.update');
    Route::post('/contracts', [ContractController::class, 'store'])->name('contracts.store');
    Route::get('/contracts/{contract}', [ContractController::class, 'show'])->name('contracts.show');
    Route::delete('/contracts/{contract}', [ContractController::class, 'destroy'])->name('contracts.destroy');

    Route::get('/meus-contratos', [ContractController::class, 'showAcceptedContracts'])->name('contracts.accepted');
    Route::get('/meus-contratos-solicitados', [ContractController::class, 'showRequestedContracts'])->name('contracts.requested');

    //Catalogo
    Route::get('/catalogo', [CatalogoController::class, 'index'])->name('catalogo.index');

    //Contato
    Route::get('/contato', function () {
        return view('contato');
    })->name('contato');
    Route::post('/contato/send', [ContactController::class, 'send'])->name('contact.send');

    Route::get('/manutencao', function () { return view('manutencao'); })->name('manutencao');
});

Route::middleware(['auth', 'verificar.funcionario.vendedor'])->group(function () {
    Route::get('/ordem-de-servico/create', [OrdemDeServicoController::class, 'create'])->name('ordem.create');
    Route::post('/ordem-de-servico', [OrdemDeServicoController::class, 'store'])->name('ordem.store');
    Route::get('/ordem-de-servico/listar', [OrdemDeServicoController::class, 'index'])->name('ordem.index');
    Route::get('/ordem-de-servico/{id}', [OrdemDeServicoController::class, 'show'])->name('ordem.show');

    Route::get('/usuarios/create', [UserController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios', [UserController::class, 'store'])->name('usuarios.store');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Rota para o dashboard do admin
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Rotas para gerenciar usuários
    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [AdminUserController::class, 'create'])->name('users.create');
    Route::post('/users', [AdminUserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [AdminUserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [AdminUserController::class, 'destroy'])->name('users.destroy');

    // Rotas para gerenciar reviews
    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

    // Rotas para gerenciar contratos
    Route::get('/contracts', [ContractController::class, 'adminIndex'])->name('contracts.index');
    Route::delete('/contracts/{id}', [ContractController::class, 'destroy'])->name('contracts.destroy');
});

// Telas de Erros
Route::get('/500', function () {
    return view('errors/500');
});
Route::get('/503', function () {
    return view('errors/503');
});
Route::get('/504', function () {
    return view('errors/504');
});

require __DIR__.'/auth.php';