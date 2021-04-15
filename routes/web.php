<?php
use Illuminate\Http\Request;
use App\veg;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'VoteController@showAll');
Route::get('/vote/positive_inc/{id}', 'VoteController@increasePositive');
Route::get('/vote/negative_inc/{id}', 'VoteController@increaseNegative');
Route::post('/vote/create', 'VoteController@create');
Route::get('/vote/show/{id}', 'VoteController@view_vote');
Route::get('/vote/delete/{id}', 'VoteController@delete');

Route::get('/vote/create', function() {
    return view('create_vote');
});

Route::get('/user', function() {
    $user = [
        'id'=>1,
        'firstName'=>'Иван',
        'lastName'=>'Мещеряков',
        'country'=>'Россия',
        'city'=>'Нижневартовск'
    ];
    return view('user', [
        'user' => $user,
    ]);
});

Route::get('/todo', function() {
    $tasks = [
        ['id'=>1, 'name'=>'Изучить Laravel'], 
        ['id'=>2, 'name'=>'Повторить PHP'], 
        ['id'=>3, 'name'=>'Вспомнить Vue.js']
    ];
    return view('todos', [
        'todos' => $tasks,
    ]);
});

Route::post('/goods', function(Request $req) {
    return view('todos', [
        'todos' => $tasks,
    ]);
});


Route::get('/goods', function() {
    $goods = [
        ['id'=>1, 'name'=>'Свекла', 'price'=>47, 'info'=>'Свекла занимает лидирующее место среди овощей по содержанию многих ценных минералов.', 'img'=>'https://my.informatics.ru/media/ck_uploads/abkadirov_rr/2019/02/26/beets.jpg'], 
        ['id'=>2, 'name'=>'Морковь', 'price'=>26, 'info'=>'Высокое содержание каротина. Великолепная морковь для сока, с высоким содержанием каротина.','img'=>'https://my.informatics.ru/media/ck_uploads/abkadirov_rr/2019/02/26/carrot.jpg'], 
        ['id'=>3, 'name'=>'Киви', 'price'=>137, 'info'=>'Плоды покрыты коричневой кожицей с мелкими волосками, за которой скрывается ароматная, сочная мякоть.', 'img'=>'https://my.informatics.ru/media/ck_uploads/abkadirov_rr/2019/02/26/kiwi.jpg'], 
        ['id'=>4, 'name'=>'Картофель','price'=>35, 'info'=>'Картофель российского производства. Выращено в Мытищах. Экологически чистый продукт!', 'img'=>'https://my.informatics.ru/media/ck_uploads/abkadirov_rr/2019/02/26/potato.jpg'], 
        ['id'=>5, 'name'=>'Клубника', 'price'=>1315, 'info'=>'Крупная отборная египетская клубника - сердце. Сладкая и сочная, с сильным ароматом.', 'img'=>'https://my.informatics.ru/media/ck_uploads/abkadirov_rr/2019/02/26/strawberries.jpg'], 
        ['id'=>6, 'name'=>'Томаты', 'price'=>213, 'info'=>'Розовые томаты – самые сладкие и вкусные. Отличаются мясистой, сочной , сладкой мякотью.', 'img'=>'https://my.informatics.ru/media/ck_uploads/abkadirov_rr/2019/02/26/tomato.jpg']
      ];
      return view('goods', [
        'goods' => $goods
      ]);
});
