<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class sanitize
{
    public static function sanitizeChaine($chaine, $type)
    {
        //$char_list="/[a-zA-Z0-9]{1,8}/";
        //$char_list2="/[a-zA-Z0-9&#-_+=]{1,10}/";


        switch ($type)
        {
            case 'login' :
                if(!empty($chaine))
                {
                    return filter_var($chaine, FILTER_SANITIZE_STRING);
                }
                break;
            case 'password' :
                if(!empty($chaine))
                {
                    return filter_var($chaine, FILTER_SANITIZE_STRING);

                }
                break;
        }
        return false;
    }

    public static function sanitizeAll($tab, $type)
    {
        $tabBool = null;
        foreach($tab as $key =>$value) {
            $tabBool[] = sanitize::sanitizeChaine($value, $type);
        }
        return $tabBool;
    }
}
