<?php
function e($s) { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }

function format_money($n) {
    return number_format((float)$n, 0, ',', '.') . ' ₫';
}

function format_date($d) {
    if (!$d || $d === '0000-00-00') return '';
    return date('d/m/Y', strtotime($d));
}

function gen_id($prefix) {
    // Match existing pattern: KH190, R804, B7048, RC3295
    return $prefix . random_int(100, 9999);
}
