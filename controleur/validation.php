<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class validation 
{
    public static function validateChaine($chaine, $type)
        {
        //$char_list="/[a-zA-Z0-9]{1,8}/";
        //$char_list2="/[a-zA-Z0-9&#-_+=]{1,10}/";

        switch ($type)
            {
                case 'login' : 
                    if(!empty($chaine))
                    {
                        $chaine=filter_var($chaine, FILTER_SANITIZE_STRING);
                        return filter_var($chaine, FILTER_VALIDATE_REGEXP, array('options'=>array('regexp'=>"/^[a-zA-Z0-9]{1,8}$/")))==false?false:true;
                    }
                    break;
                case 'password' :
                    if(isset($chaine))
                    {
                        $chaine=filter_var($chaine, FILTER_SANITIZE_STRING);
                        return filter_var($chaine, FILTER_VALIDATE_REGEXP, array('options'=>array('regexp'=>"/^[a-zA-Z0-9&#-_+=]{1,10}$/")))==false?false:true;
                    }
                    break;
                case 'id' :
                    if(isset($chaine)){
                        $chaine=filter_var($chaine, FILTER_SANITIZE_NUMBER_INT);
                        return filter_var($chaine, FILTER_VALIDATE_REGEXP, array('options'=>array('regexp'=>"/^[0-9]{1,10}$/")))==false?false:true;
                    }
                    break;
                case 'titre' :
                    if(isset($chaine)) {
                        $chaine=filter_var($chaine, FILTER_SANITIZE_STRING);
                        return filter_var($chaine, FILTER_VALIDATE_REGEXP, array('options'=>array('regexp'=>"/^[a-zA-Z0-9&#-_+=]{1,100}$/")))==false?false:true;
                    }
                    break;
                case 'resume' :
                    if(isset($chaine)) {
                        $chaine=filter_var($chaine, FILTER_SANITIZE_STRING);
                        return filter_var($chaine, FILTER_VALIDATE_REGEXP, array('options'=>array('regexp'=>"/^[a-zA-Z0-9&#-_+=]{1,500}$/")))==false?false:true;
                    }
                    break;
                case 'dateParution' :
                    if(isset($chaine)) {
                        $chaine=filter_var($chaine, FILTER_SANITIZE_NUMBER_INT);
                        return filter_var($chaine, FILTER_VALIDATE_REGEXP, array('options'=>array('regexp'=>"!^[0-9&/_-]{1,10}$!")))==false?false:true;
                    }
                    break;
            }
            return false;

        }

    public static function validateAll($tab, $type)
    {
        $tabBool = null;
        foreach($tab as $key =>$value) {
            $tabBool[] = validation::validateChaine($value, $type);
        }
        return $tabBool;
    }
}
