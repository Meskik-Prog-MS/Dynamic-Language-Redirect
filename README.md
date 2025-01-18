Dynamic Language Redirect 🌐
============================

**Dynamic Language Redirect** is a WordPress plugin that automatically redirects users to the appropriate language version of your website based on their browser's language preferences. It’s SEO-friendly, prevents infinite redirects, and excludes administrators to ensure seamless management.

Features 🚀
-----------

*   **Dynamic Language Detection**: Automatically redirects users based on their browser's language settings.
    
*   **SEO-Friendly**:
    
    *   Uses 301 redirects for search engine optimization.
        
    *   Adds hreflang tags to improve search engine indexing for multilingual sites.
        
*   **Supports Multiple Languages**: Easily configurable to include any language and its corresponding URL path.
    
*   **Administrator Exemption**: Prevents redirects for logged-in administrators, allowing site management without interruptions.
    
*   **Infinite Redirect Prevention**: Checks existing language codes in URLs and avoids unnecessary loops.
    
*   **Default Fallback Language**: Redirects to a default language if the browser's language is unsupported.
    

Installation 📥
---------------

1.  bashCopyEditgit clone https://github.com/yourusername/dynamic-language-redirect.git
    
2.  bashCopyEditwp-content/plugins/
    
3.  Activate the plugin from the WordPress admin dashboard:
    
    *   Go to **Plugins** > **Installed Plugins**.
        
    *   Locate **Dynamic Language Redirect** and click **Activate**.
        
4.  Configure your supported languages (optional):
    
    *   Open the plugin file dynamic-language-redirect.php.
        
    *   Modify the dynamic\_lang\_redirect\_supported\_languages function to include your desired languages and their URL slugs.
        

Usage Instructions 🛠️
----------------------

1.  **Add Supported Languages**:
    
    *   By default, the plugin supports:
        
        *   English: /en-us/
            
        *   French: /fr-fr/
            
        *   Arabic: /ar-ar/
            
    *   You can add more languages by modifying the dynamic\_lang\_redirect\_supported\_languages function.
        
2.  **Redirection Logic**:
    
    *   The plugin detects the user's browser language and redirects them to the appropriate language version of the page.
        
    *   If the URL already contains a language code:
        
        *   **No redirection occurs** if the code matches the browser's language.
            
        *   If the code **doesn't match**, the plugin updates the URL to match the browser's language.
            
3.  **Administrator Role Handling**:
    
    *   Logged-in administrators are excluded from redirection to allow seamless testing and management.
        

SEO Benefits 📈
---------------

1.  **Hreflang Tags**:
    
    *   The plugin automatically adds  tags to the section of your site to indicate alternate language versions to search engines.
        
2.  **301 Permanent Redirects**:
    
    *   Ensures search engines update their indexes to the correct language-specific URLs.
        
3.  **Improved User Experience**:
    
    *   Directs users to their preferred language, reducing bounce rates and improving engagement.
        

Example Scenarios 💡
--------------------

### Scenario 1: No Language Code in URL

*   **Browser Language**: French
    
*   **URL Accessed**: https://example.com/about/
    
*   **Result**: Redirects to https://example.com/fr-fr/about/.
    

### Scenario 2: Matching Language Code in URL

*   **Browser Language**: English
    
*   **URL Accessed**: https://example.com/en-us/blog/
    
*   **Result**: No redirection occurs.
    

### Scenario 3: Mismatched Language Code in URL

*   **Browser Language**: Arabic
    
*   **URL Accessed**: https://example.com/en-us/contact/
    
*   **Result**: Redirects to https://example.com/ar-ar/contact/.
    

Customization ⚙️
----------------

### Add More Languages

1.  Open the plugin file dynamic-language-redirect.php.
    
2.  phpCopyEditfunction dynamic\_lang\_redirect\_supported\_languages() { return \[ 'en' => 'en-us', 'fr' => 'fr-fr', 'ar' => 'ar-ar', // Add more languages here \];}
    
3.  Add your desired languages and their slugs.
    

### Default Fallback Language

*   By default, the plugin falls back to English (en-us) if the browser's language is unsupported.
    
*   To change this, update the browser\_lang fallback logic in the plugin file.
    

Contributing 🤝
---------------

Contributions are welcome! Follow these steps:

1.  Fork the repository.
    
2.  bashCopyEditgit checkout -b feature/new-feature
    
3.  bashCopyEditgit commit -m "Add new feature"
    
4.  bashCopyEditgit push origin feature/new-feature
    
5.  Submit a pull request.
    

License 📜
----------

This plugin is licensed under the GPLv2 or later.

You are free to use, modify, and distribute it under the terms of the license.

Support 💬
----------

If you encounter any issues or have questions, feel free to open an issue in this repository or contact the author:

*   **Author**: [MeskikCode](https://meskikcode.com/)
    
*   **Email**: support@meskikcode.com
    

Screenshots 📸
--------------

1.  **Redirection Example**:Shows automatic redirection to the browser’s preferred language.
    
2.  **Hreflang Tags Example**:Displays generated  tags in the HTML .
    

Acknowledgments 🌟
------------------

Special thanks to the open-source community for making multilingual website development a seamless experience.