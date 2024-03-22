<?php

namespace App\Filament\Resources\CompanyResource\Widgets;

use App\Models\Company;
use Filament\Notifications\Notification;
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CurrentCompany extends Widget
{
    public $companies = [];
    public $current = 0;

    public function mount()
    {
        $this->companies = Company::where('user_id', Auth::id())->pluck('name','id');
        $this->current = Session::get('current_company_id');
    }

    public function updated()
    {
        Session::put('current_company_id', $this->current);
        Notification::make()
            ->title('Updated successfully')
            ->success()
            ->send();
    }

    protected static string $view = 'filament.resources.company-resource.widgets.current-company';
}
