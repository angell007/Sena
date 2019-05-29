<?php

Route::redirect('/', 'login');

// admin ambientes
Route::get('admin/ambientes', 'Admin\AmbienteController@index')->name('admin.ambientes');
Route::get('admin/ambientes/datatables', 'Admin\AmbienteController@datatables')->name('admin.ambientes.datatables');
Route::get('admin/ambientes/create', 'Admin\AmbienteController@createModal')->name('admin.ambientes.create');
Route::post('admin/ambientes/create', 'Admin\AmbienteController@create');
Route::get('admin/ambientes/update/{ambiente}', 'Admin\AmbienteController@updateModal')->name('admin.ambientes.update');
Route::patch('admin/ambientes/update/{ambiente}', 'Admin\AmbienteController@update');
Route::delete('admin/ambientes/delete/{ambiente}', 'Admin\AmbienteController@delete')->name('admin.ambientes.delete');

// admin competencias
Route::get('admin/competencias', 'Admin\CompetenciaController@index')->name('admin.competencias');
Route::get('admin/competencias/datatables', 'Admin\CompetenciaController@datatables')->name('admin.competencias.datatables');
Route::get('admin/competencias/create', 'Admin\CompetenciaController@createModal')->name('admin.competencias.create');
Route::post('admin/competencias/create', 'Admin\CompetenciaController@create');
Route::get('admin/competencias/update/{competencia}', 'Admin\CompetenciaController@updateModal')->name('admin.competencias.update');
Route::patch('admin/competencias/update/{competencia}', 'Admin\CompetenciaController@update');
Route::delete('admin/competencias/delete/{competencia}', 'Admin\CompetenciaController@delete')->name('admin.competencias.delete');

// admin fichas
Route::get('admin/fichas', 'Admin\FichaController@index')->name('admin.fichas');
Route::get('admin/fichas/datatables', 'Admin\FichaController@datatables')->name('admin.fichas.datatables');
Route::get('admin/fichas/create', 'Admin\FichaController@createModal')->name('admin.fichas.create');
Route::post('admin/fichas/create', 'Admin\FichaController@create');
Route::get('admin/fichas/update/{ficha}', 'Admin\FichaController@updateModal')->name('admin.fichas.update');
Route::patch('admin/fichas/update/{ficha}', 'Admin\FichaController@update');
Route::delete('admin/fichas/delete/{ficha}', 'Admin\FichaController@delete')->name('admin.fichas.delete');
Route::get('admin/fichas/show/{ficha?}', 'Admin\FichaController@show')->name('admin.fichas.show');

// admin docentes
Route::get('admin/docentes', 'Admin\DocenteController@index')->name('admin.docentes');
Route::get('admin/docentes/datatables', 'Admin\DocenteController@datatables')->name('admin.docentes.datatables');
Route::get('admin/docentes/create', 'Admin\DocenteController@createModal')->name('admin.docentes.create');
Route::post('admin/docentes/create', 'Admin\DocenteController@create');
Route::get('admin/docentes/update/{docente}', 'Admin\DocenteController@updateModal')->name('admin.docentes.update');
Route::patch('admin/docentes/update/{docente}', 'Admin\DocenteController@update');
Route::delete('admin/docentes/delete/{docente}', 'Admin\DocenteController@delete')->name('admin.docentes.delete');

// admin contenidos
Route::get('admin/contenidos/{id?}', 'Admin\FichaController@contenidos')->name('admin.fichas.contenidos');
Route::get('admin/contenidos/datatables', 'Admin\ContenidoController@datatables')->name('admin.contenidos.datatables');
Route::get('admin/contenidos/create/{id?}', 'Admin\ContenidoController@createModal')->name('admin.contenidos.create');
Route::post('admin/contenidos/create/{id?}', 'Admin\ContenidoController@create');
Route::get('admin/contenidos/update/{contenido}', 'Admin\ContenidoController@updateModal')->name('admin.contenidos.update');
Route::patch('admin/contenidos/update/{contenido}', 'Admin\ContenidoController@update');
Route::delete('admin/contenidos/delete/{contenido}', 'Admin\ContenidoController@delete')->name('admin.contenidos.delete');

// admin horarios
Route::get('admin/horarios', 'Admin\HorarioController@index')->name('admin.horarios');
Route::get('admin/horarios/datatables', 'Admin\HorarioController@datatables')->name('admin.horarios.datatables');
Route::get('admin/horarios/create', 'Admin\HorarioController@createModal')->name('admin.horarios.create');
Route::post('admin/horarios/create', 'Admin\HorarioController@create');
Route::get('admin/horarios/update/{horario}', 'Admin\HorarioController@updateModal')->name('admin.horarios.update');
Route::patch('admin/horarios/update/{horario}', 'Admin\HorarioController@update');
Route::delete('admin/horarios/delete/{horario}', 'Admin\HorarioController@delete')->name('admin.horarios.delete');
