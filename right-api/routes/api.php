<?php

Route::group(['middleware' => 'cors'], function () {
    Route::get('/v1/company', 'YourRightsController@getCompanies');
    Route::get('/v1/lawyer', 'YourRightsController@getLawyers');
    Route::post('/v1/order', 'YourRightsController@createOrder');
    Route::post('/v1/offer', 'YourRightsController@createOffer');
    Route::get('/v1/offer/{orderId}', 'YourRightsController@getOffersByOrder');
    Route::get('/v1/order/{companyId}', 'YourRightsController@getOrder');
});
