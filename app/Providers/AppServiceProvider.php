<?php

namespace App\Providers;

use App\Models\Note;
use App\Models\User;
use App\Policies\NotePolicy;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;
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
        Gate::policy(Note::class, NotePolicy::class);

        Gate::define('update-note', function (User $user, Note $note) {
            return $user->id === $note->user_id;
        });

        Gate::define('delete-note', function (User $user, Note $note) {
            return $user->id === $note->user_id
                ? Response::allow('Delete with success')
                : Response::deny('You must be the author to delete a note.');
        });
    }
}
