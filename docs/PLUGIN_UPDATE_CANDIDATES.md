# Plugin update candidates

Official WordPress.org metadata checked: 2026-08-29

| Plugin | Source | Candidate | PHP minimum | Treatment |
| --- | ---: | ---: | ---: | --- |
| AddToAny | 1.7.36 | 1.8.18 | 5.6 | Update and QA sharing buttons |
| Advanced Custom Fields | 5.8.7 | 6.8.9 | 7.4 | Update and QA `p_navi` fields/templates |
| All in One SEO | 2.12.1 | 5.0.1.1 | 7.2 | High-risk major update; verify metadata and sitemap |
| Breadcrumb NavXT | 6.2.1 | 7.5.1 | 7.0 | Update and QA breadcrumb output |
| Classic Editor | 1.5 | 1.7.0 | 5.2.4 | Update and QA post/page editing |
| Contact Form 7 | 5.1.1 | 6.1.7 | 7.4 | Update and QA form ID 879 and mail |
| Custom Field Suite | 2.5.12 | 2.6.8-wiz.1 | 7.4 | Retain CFS and apply recorded compatibility patch |
| Custom Post Type UI | 1.7.2 | 1.19.3 | 7.4 | Update and QA `p_navi` registration |
| Duplicate Post | 3.2.2 | 4.7 | 7.4 | Update and QA editor action |
| MetaSlider | 3.10.3 | 3.111.2 | 7.0 | Update and QA all slideshows |
| Smart Slider 3 | 3.3.11 | 3.5.1.39 | 7.0 | Update and QA slider data/rendering |
| Orbit Fox | 2.7.3 | 3.0.9 | 7.4 | Update and QA Zerif widgets |
| What's New Generator | 2.0.2 | 2.0.3-wiz.1 | 7.4 | Apply recorded local hardening patch |
| WPFront Scroll Top | 2.0.1 | 3.0.1 | 7.2 | Update and QA desktop/mobile control |
| WPtouch | 4.3.34 | 4.3.62 | not declared | Update and perform focused mobile QA |

## Remove after usage verification

All-in-One WP Migration and its commercial multisite extension are migration
tools, not public-site dependencies. WPForms has no forms or active widget and
the public contact page uses Contact Form 7. The remaining inactive reset,
cache, SSL, security, obsolete mail-form, Sakura-only, backup-copy, and utility
plugins are omitted from the clean staging build to reduce attack surface.
