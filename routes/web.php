<?php

Auth::routes(['register'=>false]);

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'auth_customer']], function() {

    Route::get('/empresa/{id}/visao_geral','Dashboard\DemonstrativeController@showDashboardView')->name('view_enterprise');
    Route::get('/empresa/{id}/contas_a_pagar','Dashboard\DemonstrativeController@showContasPagarView')->name('view_enterprise_cpv');
    Route::get('/empresa/{id}/contas_a_receber','Dashboard\DemonstrativeController@showContasReceberView')->name('view_enterprise_arv');
    Route::get('/empresa/{id}/caixas_abertos','Dashboard\DemonstrativeController@showCaixasAbertosView')->name('view_enterprise_cxa');
    Route::get('/empresa/{id}/minhas_vendas','Dashboard\DemonstrativeController@showMinhasVendasView')->name('view_enterprise_vds');
    Route::get('/empresa/{id}/vendedores','Dashboard\DemonstrativeController@showVendedoresView')->name('view_enterprise_vdd');

    Route::get('/', 'Dashboard\HomeController@index')->name('env_ctm');
});

Route::group(['prefix' => 'administrativo', 'middleware' => ['auth', 'auth_admin' ]], function() {

    // Route::resource('clientes', Administrator\UserController::class);
    Route::get('/clientes', 'Administrator\AdminUserController@index')
        ->name('clientes.index');

    Route::get('/clientes/create', 'Administrator\AdminUserController@create')
        ->name('clientes.create');

    Route::post('/clientes', 'Administrator\AdminUserController@store')
        ->name('clientes.store');

    Route::get('/clientes/{id}', 'Administrator\AdminUserController@show')
        ->name('clientes.show');

    Route::get('/clientes/{id}/edit', 'Administrator\AdminUserController@edit')
        ->name('clientes.edit');

    Route::put('/clientes/{id}', 'Administrator\AdminUserController@update')
        ->name('clientes.update');

    Route::patch('/clientes/{id}', 'Administrator\AdminUserController@update');

    Route::delete('/clientes/{id}', 'Administrator\AdminUserController@destroy')
        ->name('clientes.destroy');

    Route::get('/clientes/{id}/lista_empresas','Administrator\AdminUserController@showEnterpriseByCustomer')->name('view_list_enterprise');

    // Route::resource('empresas', Administrator\EnterpriseController::class);
    Route::get('/empresas', 'Administrator\AdminEnterpriseController@index')
        ->name('empresas.index');

    Route::get('/empresas/create', 'Administrator\AdminEnterpriseController@create')
        ->name('empresas.create');

    Route::post('/empresas', 'Administrator\AdminEnterpriseController@store')
        ->name('empresas.store');

    Route::get('/empresas/{id}', 'Administrator\AdminEnterpriseController@show')
        ->name('empresas.show');

    Route::get('/empresas/{id}/edit', 'Administrator\AdminEnterpriseController@edit')
        ->name('empresas.edit');

    Route::put('/empresas/{id}', 'Administrator\AdminEnterpriseController@update')
        ->name('empresas.update');

    Route::patch('/empresas/{id}', 'Administrator\AdminEnterpriseController@update');

    Route::delete('/empresas/{id}', 'Administrator\AdminEnterpriseController@destroy')
        ->name('empresas.destroy');

    Route::get('/empresas/{id}/registrar','Administrator\AdminEnterpriseController@createNew')->name('adm_create_enterprise_view');

    Route::get('/empresas/{id}/visao_geral','Administrator\DemonstrativeController@showDashboardView')->name('adm_view_enterprise');
    Route::get('/empresas/{id}/contas_a_pagar','Administrator\DemonstrativeController@showContasPagarView')->name('adm_view_enterprise_cpv');
    Route::get('/empresas/{id}/contas_a_receber','Administrator\DemonstrativeController@showContasReceberView')->name('adm_view_enterprise_arv');
    Route::get('/empresas/{id}/caixas_abertos','Administrator\DemonstrativeController@showCaixasAbertosView')->name('adm_view_enterprise_cxa');
    Route::get('/empresas/{id}/minhas_vendas','Administrator\DemonstrativeController@showMinhasVendasView')->name('adm_view_enterprise_vds');
    Route::get('/empresas/{id}/vendedores','Administrator\DemonstrativeController@showVendedoresView')->name('adm_view_enterprise_vdd');

    Route::get('/empresas/{id}/store-edit','Dashboard\HomeController@edit')->name('view_enterprise_edt');

    Route::put('/empresas/{id}/store-put','Dashboard\HomeController@update')->name('put_enterprise_data');

    # Route::get('empresas/{id}/usuarios', 'Administrator\EnterpriseController@userList')->name('empresas.lista_usuarios');
    # Route::get('empresas/{id}/usuarios/adicionar', 'Administrator\EnterpriseController@createNewUser')->name('empresas.criar_usuario');
    # Route::post('empresas/{id}/usuarios/adicionar', 'Administrator\EnterpriseController@registerNewUser')->name('empresas.registrar_usuario');

    # Route::get('empresas/{id}/demonstrativos', 'Administrator\EnterpriseController@getDemonstrative')->name('empresas.demonstrativo');

    Route::get('/', 'Administrator\HomeController@index')->name('env_adm');
});

Route::get('/profile', 'ProfileController@profile')->name('profile_view')->middleware('auth');
Route::put('/profile', 'ProfileController@profileUpdate')->name('profile_change')->middleware('auth');
Route::get('/password', 'ProfileController@password')->name('password_view')->middleware('auth');
Route::put('/password', 'ProfileController@changePassword')->name('password_change')->middleware('auth');


Route::get('/', function() {
    if (auth()->check()) {

        $user = \Illuminate\Support\Facades\Auth::user();

        if ($user->isAdministratorUser())
        {
            return redirect()->route('env_adm');
        }

        if ($user->isCustomerUser())
        {
            return redirect()->route('env_ctm');
        }

        \Illuminate\Support\Facades\Auth::logout();

        return redirect()->to('login');
    } else {
        return redirect()->to('login');
    }
});

Route::get('/home', function() {
    if (\Illuminate\Support\Facades\Auth::check()) {

        $user = \Illuminate\Support\Facades\Auth::user();

        if ($user->isAdministratorUser())
        {
            return redirect()->route('env_adm');
        }

        if ($user->isCustomerUser())
        {
            return redirect()->route('env_ctm');
        }

        \Illuminate\Support\Facades\Auth::logout();

        return redirect()->to('login');
    } else {
        return redirect()->to('login');
    }
});

Route::get('/a/b/c/d', 'HomeController@test');
