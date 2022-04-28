<?php
    use App\Route;

    Route::get("/", "ViewController@main");
    Route::get("/sub1", "ViewController@sub1");
    Route::get("/sub2", "ViewController@sub2");
    Route::get("/sub3", "ViewController@sub3");
    Route::get("/admin", "ViewController@admin");
    Route::get("/event", "ViewController@adminEvent");
    Route::get("/special", "ViewController@adminSpecial");

    Route::post('/api/reviews', 'ActionController@review');
    Route::get('/api/reviews', 'ActionController@getReviews');
    Route::get('/api/reviews/{id}', 'ActionController@getReview');
    Route::post('/api/review/image', 'ActionController@reviewImage');
    
    Route::post('/api/event/applicants', 'ActionController@enrollEvent');
    Route::get('/api/event/{phone}/stamps', 'ActionController@getStamps');

    Route::post('/adminLogin', "ActionController@adminLoginchk");
    Route::post('/getEvent', "ActionController@getEvent");
    Route::post('/edit', "ActionController@edit");
    
    Route::start();