<?php

namespace App\Providers;

use App\Nova\Blog;
use App\Nova\Mode;
use App\Nova\User;
use App\Nova\Media;
use App\Nova\Slide;
use App\Nova\Center;
use App\Nova\Course;
use App\Nova\Degree;
use App\Nova\Design;
use App\Nova\Impact;
use App\Nova\Search;
use App\Nova\Contact;
use App\Nova\Program;
use App\Nova\Business;
use App\Nova\Download;
use App\Nova\Language;
use App\Nova\Location;
use App\Nova\Modality;
use Laravel\Nova\Nova;
use App\Nova\Evenement;
use App\Nova\Curriculum;
use App\Nova\Experience;
use App\Nova\Interested;
use App\Nova\Newsletter;
use App\Nova\Responsable;
use App\Nova\CategoryBlog;
use App\Nova\TrainingType;
use App\Nova\CategoryMedia;
use App\Nova\MessageNewsletter;
use Laravel\Nova\Menu\MenuItem;
use App\Nova\EvenementInterested;
use Laravel\Nova\Dashboards\Main;
use Laravel\Nova\Menu\MenuSection;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        Nova::footer( function($request)
        {
          return Blade::render('
          @env(\'prod\')
             Complexe Horticole d\'Agadir 
          @endenv
          @env(\'local\')
              Complexe Horticole d\'Agadir 
          @endenv
         ');
        });
        
        Nova::mainMenu(function () {
            return [
              
                    MenuItem::resource(Course::class),
                    MenuItem::resource(Program::class),
                    MenuItem::resource(Responsable::class),
                    MenuItem::resource(Download::class),
                    MenuItem::resource(Curriculum::class),
                    MenuItem::resource(TrainingType::class),
                    MenuItem::resource(Degree::class),
                    MenuItem::resource(Language::class),
                    MenuItem::resource(Location::class),
                    MenuItem::resource(Modality::class),
                    MenuItem::resource(Mode::class),
                    MenuItem::resource(Slide::class),
                    MenuItem::resource(Design::class),

                    MenuSection::make('Visiteurs', [
                        MenuItem::resource(Interested::class),
                        MenuItem::resource(Contact::class),

                    ])->icon('user')->collapsable(),
                    MenuSection::make('Interation', [
                        MenuItem::resource(Evenement::class),
                        MenuItem::resource(EvenementInterested::class),
                    ])->collapsable(),
                    MenuSection::make('Blog', [
                        MenuItem::resource(CategoryBlog::class),
                        MenuItem::resource(Blog::class),
                    ])->collapsable(),
                    MenuSection::make('Mediathèques', [
                        MenuItem::resource(CategoryMedia::class),
                        MenuItem::resource(Media::class),
                    ])->collapsable(),
                    MenuSection::make('Les pages statiques', [
                        MenuItem::resource(Search::class),
                        MenuItem::resource(Center::class),
                        MenuItem::resource(Experience::class),
                        MenuItem::resource(Impact::class),
                        MenuItem::resource(Business::class),
                        
                    ])->collapsable(),
                    MenuSection::make('newsletter', [
                        MenuItem::resource(Newsletter::class),
                        MenuItem::resource(MessageNewsletter::class),
                    ])->icon('mail')->collapsable(),
                    MenuItem::resource(User::class),

                  
                
            ];
        });


    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                'teste@gmail.com',
                'admin@gmail.com',
                'samir.belghol@gmail.com',
            ]);
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}