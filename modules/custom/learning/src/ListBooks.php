<?php
/**
 * Created by PhpStorm.
 * User: arulraj.m
 * Date: 26-06-2018
 * Time: 06:00 PM
 */

namespace Drupal\learning;

class ListBooks
{
    public $books;

    public function __construct($books)
    {
        $this->books = $books;

    }

    public function getBooks()
    {
        //return t('All you book will be listed!');
        return $this->books;
    }
}