<?php


namespace KassioSchaider\PriceStalker\Controller;


interface InterfaceSeeker
{
    public function seek(string $barCode) : array;
}