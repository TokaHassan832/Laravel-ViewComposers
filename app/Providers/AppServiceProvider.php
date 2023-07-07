<?php

namespace App\Providers;

use App\Http\View\Composers\ChannelsComposer;
use App\Models\Channel;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // option 1 - Every Single View
//         View::share('channels',Channel::orderBy('name')->get());

        // option 2 - Granular Views With Wildcards
//        View::composer(['post.*','channel.index'],function ($view){
//            $view->with('channels',Channel::orderBy('name')->get());
//        });


        // option 3 - Dedicated Class
        View::composer('partials.channels.*',ChannelsComposer::class);

    }
}
