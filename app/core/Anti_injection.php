<?php

class AntiInjection {
    public static function filter($data) {
        $filter = stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)));
        return $filter;
    }
}