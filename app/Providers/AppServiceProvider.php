<?php

namespace App\Providers;

use App\Models\MemberCategory;
use App\Models\Post;
use App\Models\RuleCategory;
use App\Policies\PostPolicy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
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
        Gate::policy(Post::class, PostPolicy::class);

        // Model::preventLazyLoading(!app()->isProduction());

        View::composer('*', function ($view) {
            $member_categories = MemberCategory::query()->orderBy('name', 'asc')->get();
            $view->with('member_categories', $member_categories);
        });

        View::composer('*', function ($view) {
            $rule_categories = RuleCategory::query()->orderBy('name', 'asc')->get();
            $view->with('rule_categories', $rule_categories);
        });
    }
}
