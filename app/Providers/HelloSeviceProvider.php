<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;
use App\Http\Validators\HelloValidator;

class HelloSeviceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // $validator = $this->app['validator'];
        // $validator->resolver(function($translator, $data, $rules, $messages) {
        //     return new HelloValidator($translator, $data, $rules, $messages);
        // });
    }
}
