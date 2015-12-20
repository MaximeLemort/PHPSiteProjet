<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 11/25/2015
 * Time: 16:28
 */
    foreach ($tabArticles as $value) {
           echo $value->id.' : '.$value->titre.'<br>'.$value->resume.'<br>'.$value->dateParution.'<br><br>';
    }