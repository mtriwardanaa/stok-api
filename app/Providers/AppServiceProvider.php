<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Passport::ignoreRoutes();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('iunique', function ($attributes, $value, $parameters) {
            $query = DB::table($parameters[0]);
            $column = $query->getGrammar()->wrap($parameters[1]);
            if (!empty($parameters[2])) {
                $query->whereNot('id', $parameters[2]);
            }
            return !$query->whereRaw("lower({$column}) = lower(?)", [$value])->whereNull('deleted_at')->count();
        }, __('The (%:attribute%) has already been taken.'));

        Validator::extend('greater_than_field', function ($attribute, $value, $parameters, $validator) {
            $min_field = $parameters[0];
            $data = $validator->getData();
            $min_value = $data[$min_field];
            return $value >= $min_value;
        }, __('The (%:attribute%) field must be greater.'));
    }
}
