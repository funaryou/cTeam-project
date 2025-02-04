<?php

if (!function_exists('formatTime')) {
    /**
     * 時間（分）を "時間:分" の形式でフォーマット
     *
     * @param int $minutes 時間（分）
     * @return string フォーマットされた時間
     */
    function formatTime($minutes)
    {
        $hours = floor($minutes / 60);
        $remainingMinutes = $minutes % 60;

        if ($hours === 0) {
            return "<span class='highlight'>{$remainingMinutes}</span><span>分</span>";
        } else {
            return "<span class='highlight'>{$hours}</span><span>時間</span><span class='highlight'>{$remainingMinutes}</span><span>分</span>";
        }
    }
}