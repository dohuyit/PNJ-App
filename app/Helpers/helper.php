<?php

if (!function_exists('formatPrice')) {
    function formatPrice($amount)
    {
        return number_format($amount, 0, ',', '.') . '₫';
    }
}
