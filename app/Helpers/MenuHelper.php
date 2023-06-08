<?php

namespace App\Helpers;

use PhpParser\Node\Stmt\Static_;

class MenuHelper
{
    public static function menu($menus, $parent_id = 0, $char = '')
    {
        $html = '';

        foreach ($menus as $key => $menu) {

            if ($menu->parent_id == $parent_id) {
                if ($parent_id == 0) $char = '';
                $html .=
                    '<tr>
                            <td>' . $menu->id . '</td> 
                            <td>' . $char . $menu->name . '</td> 
                            <td>' . $menu->desc . '</td> 
                            <td>
                                <a href="/menu/edit/' . $menu->id . '" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>        
                                </a>
                                <a href="#" class="btn btn-danger btn-sm" onclick="removeRow(' . $menu->id . ')">
                                    <i class="fas fa-trash"></i>        
                                </a>
                            </td> 
                        </tr>
                ';

                unset($menus[$key]); //delete

                $html .= self::menu($menus, $menu->id, $char .= '--');
            }
        }

        return $html;
    }
}
