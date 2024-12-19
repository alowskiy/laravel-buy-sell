<?php

namespace App\Providers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
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
        //
        Gate::define('delete-post', function (User $user, Post $post) {
            return $user->id === $post->user_id;
    }
);
Gate::define('admin-get-posts', function (User $user) {
            return $user->status === 2;
});
Gate::define('admin-del-post', function (User $user){
    return $user->status === 2;
});

Gate::define('admin-allow-post', function (User $user){
    return $user->status === 2;
});

Gate::define('admin-get-users', function(User $user){
    return $user->status === 2;
});

Gate::define('admin-ban-user', function(User $user){
    return $user->status === 2;
});

Gate::define('admin-unban-user', function(User $user){
    return $user->status === 2;
});
Gate::define('admin-get-user-info', function(User $user){
    return $user->status === 2;
});
Gate::define('admin-change-user', function(User $user){
    return $user->status === 2;
});

Gate::define('update-post-owner', function(User $user, Post $post){

return $user->id === $post->user_id;
    });

Gate::define('update-post-admin', function(User $user){
    return $user->status === 2;
});
}
}
