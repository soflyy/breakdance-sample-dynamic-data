<?php

add_action('init', function() {
    // Check if Breakdance is installed and class/function exists
    if (!function_exists('\Breakdance\DynamicData\registerField') || !class_exists('\Breakdance\DynamicData\Field')) {
        return;
    }

    require_once 'fields/BreakdanceImage.php';
    require_once 'fields/BreakdanceString.php';

    \Breakdance\DynamicData\registerField(new BreakdanceString());
    \Breakdance\DynamicData\registerField(new BreakdanceImage());
});
