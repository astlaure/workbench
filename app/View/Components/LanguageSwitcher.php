<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LanguageSwitcher extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        // TODO make it dynamic
        $locales = config('i18n.supportedLocales');

        if (app()->getLocale() == 'fr') {
            $locale = 'en';
            $url = url('/en');
        } else {
            $locale = 'fr';
            $url = url('/');
        }

        return view('components.language-switcher', [
            'url' => $url,
            'label' => __('app.languages.' . $locale),
        ]);
    }
}
