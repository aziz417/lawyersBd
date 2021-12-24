<?php

function cus_date($date, $format = 'd-m-Y')
{
    return date_format($date, $format);
}

function getCurrentRoute(): ?string
{
    return Route::currentRouteName();
}

function getCurrentController(): string
{
    return class_basename(Route::current()->controller);
}

function getActiveClassByController($controller): string
{
    return $controller == getCurrentController() ? 'active' : '';
}

function getActiveClassByRoute($route): string
{
    return $route == getCurrentRoute() ? 'active' : '';
}

function getActiveClassByUrl($url): string
{
    return Request::is($url) ? 'active' : '';
}

function slug($text) {
    return preg_replace('/\s+/u', '-', strtolower(trim($text)));
}

function numberToWords($number) {
    $inWords = new NumberFormatter('en', NumberFormatter::SPELLOUT);
    return $inWords->format($number);
}

function discountRate($price, $discount_price) {
    return number_format(($price - $discount_price) / $price * 100,2);
}

function getCurrencyIcon($currency = 'usd'): string
{
    return $currency == 'usd' ? '$' : 'TK ';
}
