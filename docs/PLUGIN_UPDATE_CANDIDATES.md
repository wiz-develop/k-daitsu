# Plugin update decisions

Checked against WordPress.org metadata on 2026-08-30. The staging runtime is
PHP 7.4.33 and WordPress 7.1.

| Plugin | Copied version | Staging version | Decision |
| --- | ---: | ---: | --- |
| Advanced Custom Fields | 5.9.6 | 6.8.9 | Latest PHP 7.4-compatible release |
| Akismet | 4.1.9 | 5.7.2 | Latest |
| All in One SEO | 4.1.1.2 | 5.0.1.1 | Latest |
| Black Studio TinyMCE Widget | 2.6.9 | 2.7.4 | Latest |
| Classic Editor | 1.6 | 1.7.0 | Latest |
| Contact Form 7 | 5.5.5 | 6.1.7 | Latest PHP 7.4-compatible release |
| Custom Field Suite | 2.6 | 2.6.8-wiz.2 | Retain CFS and apply recorded compatibility patch |
| Custom Post Type UI | 1.9.1 | 1.19.3 | Latest PHP 7.4-compatible release |
| Duplicate Post | 3.2.2 | 4.7 | Latest PHP 7.4-compatible release |
| Image Widget | 4.4.7 | 4.4.12 | Latest |
| Smash Balloon Instagram Feed | 6.7.1 | 6.12.0 | Latest PHP 7.4-compatible release |
| jQuery Smooth Scroll | 1.4.5 | 1.5.1 | Latest |
| PDF Embedder | 4.6.2 | 5.0.2 | Latest PHP 7.4-compatible release |
| Shortcodes Ultimate | 5.10.0 | 7.8.4 | Latest |
| Page Builder by SiteOrigin | 2.12.2 | 2.36.0 | Latest |
| SiteOrigin Widgets Bundle | 1.19.0 | 1.74.2 | Latest |
| TablePress Responsive Tables | 1.1 | 1.1 | Retained; its hooks remain supported by TablePress 3.3.4 |
| TablePress | 1.13 | 3.3.4 | Latest PHP 7.4-compatible release |
| Advanced Editor Tools | 5.6.0 | 5.10.1 | Latest |
| WP Multibyte Patch | 2.9 | 2.9.3 | Latest |
| WP-PageNavi | 2.93.4 | 2.94.6 | Latest PHP 7.4-compatible tag; 3.0.1 requires PHP 8.2 |
| WP Posts Carousel | 1.3.7 | 1.3.13 | Latest package |
| Widget Content Blocks | 2.3.9 | 2.3.13 | Latest PHP 7.4-compatible release |

The production-only SiteGuard and All-in-One WP Migration Multisite Extension
were not copied to staging. SiteGuard would alter the staging login flow, and
the migration extension is not a public runtime dependency. Staging instead
uses the recorded noindex/mail guard; production was not modified.
