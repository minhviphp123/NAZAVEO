<?php

namespace App\Helpers;

use PhpParser\Node\Stmt\Static_;
use App\Models\Menu;
use Mockery\Undefined;

class HeaderHelper
{

    public static function headerMenu($menus)
    {

        $processedMenu = [];
        $indez = -1;

        foreach ($menus as $menu) {
            if ($menu->parent_id == 0) {

                $indez++;

                $processedMenu[$indez]['parent'] = [$menu->id, $menu->name];
            } else {
                for ($i = 0; $i < count($processedMenu); $i++) {

                    // dd($processedMenu[$i]['parent'][0], $menu->parent_id);
                    if ($processedMenu[$i]['parent'][0] === $menu->parent_id) {
                        if (!array_key_exists('child', $processedMenu[$i])) {
                            $processedMenu[$i]['child'] = [[$menu->id, $menu->name]];
                            // dd($processedMenu);
                            // break;
                        } else {
                            array_push($processedMenu[$i]['child'], [$menu->id => $menu->name]);
                        }
                    }
                }
            }
        }



        return $processedMenu;
    }
}
