<?php
/*
Plugin Name: Dynamic Language Redirect
Description: Redirects users to the appropriate language version of the site based on their browser's language settings. Excludes WordPress administrators, prevents infinite redirects, and handles existing language codes in URLs. SEO-friendly design included.
Version: 2.0
Author: MeskikCode
Author URI: https://meskikcode.com/
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: dynamic-language-redirect
Domain Path: /languages
*/

// Define supported languages and their URL slugs
function dynamic_lang_redirect_supported_languages() {
    return [
        'en' => 'en-us',
        'fr' => 'fr-fr',
        'ar' => 'ar-ar',
        // Add more languages as needed
    ];
}

// Main redirection logic
function dynamic_lang_redirect() {
    $path = $_SERVER['REQUEST_URI'];
    $supported_languages = dynamic_lang_redirect_supported_languages();

    // Skip redirection for logged-in administrators
    if (is_user_logged_in() && current_user_can('administrator')) {
        return;
    }

    // Detect browser language
    $browser_lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

    // Default to English if the browser language is unsupported
    if (!array_key_exists($browser_lang, $supported_languages)) {
        $browser_lang = 'en';
    }

    // Get the corresponding language path
    $browser_lang_path = $supported_languages[$browser_lang];

    // Check if the URL already contains a language code
    if (preg_match('/\/(en-us|fr-fr|ar-ar)\//', $path, $matches)) {
        $current_lang_path = $matches[1];

        // If the current language code matches the browser language, do nothing
        if ($current_lang_path === $browser_lang_path) {
            return;
        }

        // If the current language code doesn't match, redirect to the correct language version
        $redirect_url = str_replace("/$current_lang_path/", "/$browser_lang_path/", $path);
        wp_redirect(home_url($redirect_url), 301); // SEO-friendly 301 redirect
        exit();
    }

    // If no language code is present, redirect to the browser's language version
    $redirect_url = home_url("/$browser_lang_path$path");
    wp_redirect($redirect_url, 301); // SEO-friendly 301 redirect
    exit();
}
add_action('template_redirect', 'dynamic_lang_redirect');

// Set a custom cookie for administrators to prevent redirection
function dynamic_lang_admin_check() {
    if (is_user_logged_in() && current_user_can('administrator')) {
        // Set a cookie to avoid redirection for admins
        setcookie('dynamic_lang_admin_logged_in', 'true', time() + 3600, COOKIEPATH, COOKIE_DOMAIN);
    }
}
add_action('init', 'dynamic_lang_admin_check');

// Prevent redirection if the cookie is set for administrators
function dynamic_lang_verify_cookie() {
    if (isset($_COOKIE['dynamic_lang_admin_logged_in']) && $_COOKIE['dynamic_lang_admin_logged_in'] === 'true') {
        return;
    }
}
add_action('wp_loaded', 'dynamic_lang_verify_cookie');

// Add SEO metadata for language redirection
function dynamic_lang_seo_meta_tags() {
    $supported_languages = dynamic_lang_redirect_supported_languages();
    $site_url = home_url();

    foreach ($supported_languages as $lang_code => $lang_path) {
        echo '<link rel="alternate" hreflang="' . esc_attr($lang_code) . '" href="' . esc_url($site_url . '/' . $lang_path . '/') . '" />' . "\n";
    }
}
add_action('wp_head', 'dynamic_lang_seo_meta_tags');
