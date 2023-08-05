<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <h2></h2>
    <div class="row">
    <div class="column">
      <img src="resources/image/rest%20Image.png" style="width:100%; border-radius: 10px">
    </div>
    </div>
</body>
</html>

## :fire::fire:What Is this!!:fire::fire:

Rest Api <br>
this a way to create your web application send request and get the response as json file.<br>
this way is usually use for the single page application , but it's up to you how you want to handle it<br>
you are able to use GET/POST/PUT/PATCH/DELETE<br>

## :technologist:how to use:technologist:

<h4>1: clone the repository </h4>
<h4>2: run the migration commend and seed the tables</h4>

````php
    php artisan migrate --seed
````

<h4>3: run the application in the localhost</h4>

````php
    php artisan serve
````

<h4>4: open the (localhost:8000/getToken) and take toke and put use them in your Api test tool (postMan)  </h4>
<h4>5: there is three type of token for with special capability. use the token and send request and take your
response  </h4>

## :children_crossing:routes:children_crossing:

````php
Route::group(['prefix' => 'v1','middleware' => 'auth:sanctum'], function () {
    Route::apiResource('customer', CustomerController::class);
    Route::apiResource('invoice', InvoiceController::class);
    Route::post('invoice/bulk',[InvoiceController::class,'bulkStore']);
    //Eg:localhost:8000/api/v1/customer
});
````

## :memo:About:memo:

the first Realise of the api is: 2023-05-۰5<br>
the last update of the game is: 2023-08-05<br>
the current api version is :1.0.0
