<?php
/**
 * Created by Pigeon Soft.
 * User: Ariful Islam
 * Date: 28-Jun-18
 * Time: 9:47 AM
 */
namespace App\Http\ViewComposers;

use App\Settings;
use Illuminate\View\View;
class SettingsComposer
{
    public $data=[];
    public function __construct()
    {
         $this->data=Settings::pluck('value','key');

    }

    public function compose(View $view)
    {

        $view->with('settings', $this->data);
    }

}