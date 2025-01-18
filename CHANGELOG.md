# Changelog

All notable changes to this project will be documented in this file.  
This project adheres to [Semantic Versioning](https://semver.org/).

---

## [2.0.0] - 2025-01-18

### Added
- Support for dynamic detection and redirection based on browser language preferences.
- Administrator role exclusion from redirection for seamless testing and management.
- Infinite redirection prevention by validating existing language codes in URLs.
- SEO enhancements:
  - Added `hreflang` tags for alternate language indexing.
  - Implemented 301 redirects for better search engine optimization.
- Customizable language support via the `dynamic_lang_redirect_supported_languages` function.
- Default fallback language configuration for unsupported browser languages.
- Plugin modularity to make it applicable to any domain.

### Changed
- Refactored plugin code to improve performance and readability.
- Enhanced logic to validate and update existing language codes in URLs dynamically.

---

## [1.0.0] - 2025-01-18

### Added
- Initial release of the plugin.
- Basic browser language detection and redirection.
- Administrator exclusion from redirection.
- Prevention of infinite redirect loops.
