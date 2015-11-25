<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 11/25/2015
 * Time: 16:28
 */
    foreach ($article as $value) {
           echo $value->titre.'<br>'.$value->resume.'<br>'.$value->dateParution->format('d-m-Y').'<br><br>';
    }