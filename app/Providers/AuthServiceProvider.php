<?php

namespace App\Providers;

use App\model\Permission;
use Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


//        $permissions=Permission::with('roles')->get();
//
//        foreach ($permissions as $permission){
//            Gate::define($permission->name,function ($user)use($permission){
//                return $user->hasRole($permission->roles);
//            });
//        }

        Gate::define('create-product', function ($user) {
            return auth()->user()->hasRole(Permission::whereName('create-product')->first()->roles->pluck('name'));
        });

        Gate::define('update-product', function ($user, $product) {
            if (!$user->roles()->get()->contains('name', 'admin')) {
                if (auth()->user()->hasRole(Permission::whereName('update-product')->first()->roles->pluck('name'))) {
                    return $user->id == $product->user_id;
                }else{
                    return false;
                }
            }else{
                return true;
            }
        });
            /****************************************discount***********************************************/
            Gate::define('create-discount', function ($user) {
                return auth()->user()->hasRole(Permission::whereName('create-discount')->first()->roles->pluck('name'));
            });
            Gate::define('update-discount', function ($user) {
                return auth()->user()->hasRole(Permission::whereName('update-discount')->first()->roles->pluck('name'));
            });
            /****************************************banner***********************************************/

            Gate::define('create-banner', function ($user) {
                return auth()->user()->hasRole(Permission::whereName('create-banner')->first()->roles->pluck('name'));
            });
            Gate::define('update-banner', function ($user) {
                return auth()->user()->hasRole(Permission::whereName('update-banner')->first()->roles->pluck('name'));
            });
            /****************************************slider***********************************************/

            Gate::define('create-slider', function ($user) {
                return auth()->user()->hasRole(Permission::whereName('create-slider')->first()->roles->pluck('name'));
            });
            Gate::define('update-slider', function ($user) {
                return auth()->user()->hasRole(Permission::whereName('update-slider')->first()->roles->pluck('name'));
            });

        /****************************************color***********************************************/

        Gate::define('create-color', function ($user) {
            return auth()->user()->hasRole(Permission::whereName('create-color')->first()->roles->pluck('name'));
        });
        Gate::define('update-color', function ($user) {
            return auth()->user()->hasRole(Permission::whereName('update-color')->first()->roles->pluck('name'));
        });
        /****************************************brand***********************************************/

        Gate::define('create-brand', function ($user) {
            return auth()->user()->hasRole(Permission::whereName('create-brand')->first()->roles->pluck('name'));
        });
        Gate::define('update-brand', function ($user) {
            return auth()->user()->hasRole(Permission::whereName('update-brand')->first()->roles->pluck('name'));
        });

        /****************************************design***********************************************/

        Gate::define('create-design', function ($user) {
            return auth()->user()->hasRole(Permission::whereName('create-design')->first()->roles->pluck('name'));
        });
        Gate::define('update-design', function ($user) {
            return auth()->user()->hasRole(Permission::whereName('update-design')->first()->roles->pluck('name'));
        });

        /****************************************size***********************************************/

        Gate::define('create-size', function ($user) {
            return auth()->user()->hasRole(Permission::whereName('create-size')->first()->roles->pluck('name'));
        });
        Gate::define('update-size', function ($user) {
            return auth()->user()->hasRole(Permission::whereName('update-size')->first()->roles->pluck('name'));
        });
            /****************************************article***********************************************/

            Gate::define('create-article', function ($user) {
                return auth()->user()->hasRole(Permission::whereName('create-article')->first()->roles->pluck('name'));
            });
            Gate::define('update-article', function ($user) {
                return auth()->user()->hasRole(Permission::whereName('update-article')->first()->roles->pluck('name'));
            });
            /****************************************category***********************************************/

            Gate::define('create-category', function ($user) {
                return auth()->user()->hasRole(Permission::whereName('create-category')->first()->roles->pluck('name'));
            });
            Gate::define('update-category', function ($user) {
                return auth()->user()->hasRole(Permission::whereName('update-category')->first()->roles->pluck('name'));
            });
            /****************************************ticket***********************************************/

            Gate::define('create-ticket', function ($user) {
                return auth()->user()->hasRole(Permission::whereName('create-ticket')->first()->roles->pluck('name'));
            });
            Gate::define('update-ticket', function ($user) {
                return auth()->user()->hasRole(Permission::whereName('update-ticket')->first()->roles->pluck('name'));
            });
            /****************************************qas***********************************************/

            Gate::define('create-qas', function ($user) {
                return auth()->user()->hasRole(Permission::whereName('create-qas')->first()->roles->pluck('name'));
            });
            Gate::define('update-qas', function ($user) {
                return auth()->user()->hasRole(Permission::whereName('update-qas')->first()->roles->pluck('name'));
            });
            /****************************************province***********************************************/

            Gate::define('create-province', function ($user) {
                return auth()->user()->hasRole(Permission::whereName('create-province')->first()->roles->pluck('name'));
            });
            Gate::define('update-province', function ($user) {
                return auth()->user()->hasRole(Permission::whereName('update-province')->first()->roles->pluck('name'));
            });
            /****************************************user***********************************************/

            Gate::define('create-user', function ($user) {
                return auth()->user()->hasRole(Permission::whereName('create-user')->first()->roles->pluck('name'));
            });
            Gate::define('update-user', function ($user) {
                return auth()->user()->hasRole(Permission::whereName('update-user')->first()->roles->pluck('name'));
            });

            /****************************************order***********************************************/

            Gate::define('show-order', function ($user) {
                return auth()->user()->hasRole(Permission::whereName('show-order')->first()->roles->pluck('name'));
            });
            Gate::define('update-order', function ($user) {
                return auth()->user()->hasRole(Permission::whereName('update-order')->first()->roles->pluck('name'));
            });

            /****************************************setting***********************************************/

            Gate::define('create-setting', function ($user) {
                return auth()->user()->hasRole(Permission::whereName('create-setting')->first()->roles->pluck('name'));
            });
            Gate::define('update-setting', function ($user) {
                return auth()->user()->hasRole(Permission::whereName('update-setting')->first()->roles->pluck('name'));
            });
        /****************************************setting***********************************************/

        Gate::define('show-map', function ($user) {
            return auth()->user()->hasRole(Permission::whereName('show-map')->first()->roles->pluck('name'));
        });
        /****************************************read-order***********************************************/
        Gate::define('read-order', function ($user, $order) {
            // if user is not admin
            if (!$user->roles()->get()->contains('name', 'admin')) {

                // send role from permission for check exist in role's user
                if (auth()->user()->hasRole(Permission::whereName('read-order')->first()->roles->pluck('name'))) {

                    foreach ($order->order_item as $item) {
                        return auth()->user()->id == $item->product->user_id;
                    }

                } else {
                    return false;
                }

                // otherwise user is admin :)
            } else {
                return true;
            }
        });
        /****************************************read-product***********************************************/
        Gate::define('read-product', function ($user, $product) {
            // if user is not admin
            if (!$user->roles()->get()->contains('name', 'admin')) {

                // send role from permission for check exist in role's user
                if (auth()->user()->hasRole(Permission::whereName('read-product')->first()->roles->pluck('name'))) {

                    return auth()->user()->id == $product->user_id;

                } else {
                    return false;
                }

                // otherwise user is admin :)
            } else {
                return true;
            }
        });
        }
}
