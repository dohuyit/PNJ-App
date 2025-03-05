<?php

use Carbon\Carbon;

if (!function_exists('formatPrice')) {
    function formatPrice($amount)
    {
        return number_format($amount, 0, ',', '.') . '₫';
    }
}

if (!function_exists('formatTime')) {
    function formatTime($dateTime)
    {
        $orderDate = Carbon::parse($dateTime);
        $diffDays = $orderDate->diffInDays(Carbon::now());
        $diffWeeks = floor($diffDays / 7);
        $diffMonths = floor($diffDays / 30);
        $diffYears = floor($diffDays / 365);

        if ($orderDate->isToday()) {
            return 'Hôm nay';
        } elseif ($orderDate->isYesterday()) {
            return 'Hôm qua';
        } elseif ($diffDays < 7) {
            return "$diffDays ngày trước";
        } elseif ($diffWeeks == 1) {
            return "1 tuần trước";
        } elseif ($diffWeeks < 4) {
            return "$diffWeeks tuần trước";
        } elseif ($diffMonths == 1) {
            return "1 tháng trước";
        } elseif ($diffMonths < 12) {
            return "$diffMonths tháng trước";
        } elseif ($diffYears == 1) {
            return "1 năm trước";
        } else {
            return $orderDate->format('d/m/Y');
        }
    }
}
