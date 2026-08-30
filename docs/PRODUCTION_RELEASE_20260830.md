# Production release 2026-08-30

Completed: 2026-08-30 JST

## Scope

- Target: `https://www.k-daitsu.co.jp/`
- PHP remained 7.4.33.
- The production database, URLs, first-view assets, mail recipients, routing,
  and indexability were preserved.
- No staging files, database, noindex rule, or mail guard were deployed.
- No live contact email was sent during production QA.

## Changes

- WordPress 5.9.16 to 7.1; database schema upgraded to version 61833.
- Updated 22 active plugins one at a time with public-page and log checks after
  each update. The final 25 active versions are in
  `PLUGIN_INVENTORY_MAIN.tsv`.
- Retained WP-PageNavi 2.94.6 because 3.0.1 requires PHP 8.2.
- Retained TablePress Responsive Tables 1.1 and the All-in-One WP Migration
  Multisite Extension 3.95.
- Retained Custom Field Suite and installed 2.6.8-wiz.2. The reviewable patch
  is recorded under `plugin-patches`.
- Restricted the Rocked `[myphp]` shortcode to the four templates used by the
  site and handled legacy entity-encoded values without arbitrary file paths.
- Replaced the Rocked contact widget's PHP 4-style constructor with
  `__construct()`.

## QA

- Public crawl: 124 published URLs with desktop and iPhone user agents; all
  HTTP 200.
- Assets: 325 internal images, scripts, and styles; 0 broken.
- Admin: 14 authenticated screens, including Dashboard, Updates, Plugins, Site
  Health, content types, Contact Form 7, CFS, ACF, TablePress, and AIOSEO; all
  HTTP 200.
- Authenticated Site Health: REST API, WordPress.org communication, loopback,
  and general HTTP requests were good.
- WP-Cron endpoint: HTTP 200. Final Action Scheduler state was 15 complete, 6
  future pending, and 0 overdue pending; the next minute queue was scheduled in
  the future.
- Contact Form 7: form 5 rendered and an empty API submission returned the
  expected seven validation errors. Recipient, sender, and body are configured;
  actual delivery was intentionally not tested.
- CFS: 7 groups, 104 fields, and saved values for 76 fields. A real field was
  saved and read through `CFS()` inside a transaction and rolled back.
- Final homepage: HTTP 200, no noindex response or meta directive, and no
  visible PHP errors.
- Debug-enabled regression QA produced no Fatal, Warning, Deprecated, or Notice
  entries. The original `WP_DEBUG=false` configuration was restored exactly.
- Temporary deployment, rollback, and QA files were removed from the server.

## Backups

Private backups are outside Git under
`work/k-daitsu-migration/backups/20260830`.

- Deploy-relevant production files: 18,099 files; manifest SHA-256
  `7fcc1b25583150239056d18f907f33da94b7136d8e2305f6b57b45d675cf503e`.
- Pre-release database: 54,177,441 bytes; gzip SHA-256
  `c308cbdfd0c4c721582734215afff3e2d7a79d122890346d4f3b6cd4543662dd`.
- Root `.htaccess`: SHA-256
  `8e6da712ce7db10c427b7a7878ff840371e5cfa2a9758d9ec25e1c76973c096`.
- CMS `.htaccess`: SHA-256
  `d0b0fbe713dceb63ea6589ae9b4b34d08cea3653b34ede0b2d62d8c1a6cd5a27`.
- `wp-config.php`: SHA-256
  `d418844d3e01968e86514c58f9304d3170e908575ff17f5fd3b9d2c058e3144f`.

## Rollback

1. Put production into maintenance mode and take a new failure-state snapshot.
2. Restore the pre-release database dump.
3. Restore the verified pre-release CMS files, root routing files, and
   `wp-config.php`.
4. Clear host and browser caches.
5. Verify the homepage, admin login, forms without external delivery, REST,
   WP-Cron, CFS values, and PHP logs.

## Remaining risk

- Actual recipient and auto-reply delivery was not tested to avoid sending mail
  to production addresses.
- WP-PageNavi remains on the newest PHP 7.4-compatible release rather than its
  PHP 8.2-only current major release.
- Custom Field Suite is locally maintained and must be re-evaluated against the
  exact installed version at every future WordPress or PHP upgrade.
