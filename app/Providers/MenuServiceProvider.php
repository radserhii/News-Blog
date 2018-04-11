<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Menu;
use Menu as LavMenu;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Share main menu
     */
    public function boot()
    {
        //get menu
        $arrMenu = Menu::all();
        $menu = $this->buildMenu($arrMenu);
//        dd($menu);
        view()->share('menu', $menu);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


    /**
     * Build main menu
     * @param $arrMenu
     * @return mixed
     */
    public function buildMenu ($arrMenu){
        $mBuilder = LavMenu::make('MyNav', function($m) use ($arrMenu){
            foreach($arrMenu as $item){
                /*
                 * Для родительского пункта меню формируем элемент меню в корне
                 * и с помощью метода id присваиваем каждому пункту идентификатор
                 */
                if($item->parent_id == 0){
                    $m->add($item->title, $item->path)->id($item->id);
                }
                //иначе формируем дочерний пункт меню
                else {
                    //ищем для текущего дочернего пункта меню в объекте меню ($m)
                    //id родительского пункта (из БД)
                    if($m->find($item->parent_id)){
                        $m->find($item->parent_id)->add($item->title, $item->path)->id($item->id);
                    }
                }
            }
        });
        return $mBuilder;
    }
}
