# Staging final report

Completed: 2026-08-30 JST

## Scope

- Read-only copy source: `https://www.k-daitsu.co.jp/`
- Corrected staging: `https://k-daitsu.wiz-services.com/`
- Production was not changed.
- `main` remains the production baseline.
- This corrected staging build and compatibility work are recorded on `test`.

## Final runtime

- PHP 7.4.33
- WordPress 7.1, database version 61833
- Home URL: `https://k-daitsu.wiz-services.com/`
- Site URL: `https://k-daitsu.wiz-services.com/cms`
- Customized Rocked 1.13 theme
- 23 active runtime plugins
- Noindex/nofollow/noarchive response header and robots policy
- Outbound WordPress mail blocked by `wiz-staging-guard.php`
- `WP_DEBUG`, `WP_DEBUG_LOG`, and display errors disabled after QA

## Changes

- Replaced the superseded pre-renewal staging tree with a serialized-safe copy
  of production content and settings.
- Updated WordPress 5.9.16 to 7.1 without replacing the theme, uploads, or
  configuration.
- Updated 21 WordPress.org plugins to their PHP 7.4-compatible releases.
- Retained TablePress Responsive Tables 1.1 after confirming both required
  TablePress 3.3.4 hooks and the `tablepress-default` style handle remain.
- Retained Custom Field Suite and updated it from 2.6 to 2.6.8-wiz.2.
- Hardened the Rocked `[myphp]` shortcode to four used templates, decoded
  legacy entity-encoded attributes, and removed arbitrary PHP-file inclusion.
- Replaced the Rocked contact widget's PHP 4-style constructor with
  `__construct()`.
- Removed the redundant `Content-Type:text/plain;` line from Contact Form 7
  form 5's additional mail headers. The hosting WAF treated that legacy value
  as an invalid POST parameter and blocked every admin save with HTTP 403;
  plain text is already Contact Form 7's default.
- Removed web-accessible old plugin rollback copies after successful QA. The
  verified local pre-update backups remain available.

## Final plugin versions

See `PLUGIN_UPDATE_CANDIDATES.md` for the complete before/after table. Notable
exceptions to unqualified latest are:

- WP-PageNavi 2.94.6 because 3.0.1 requires PHP 8.2.
- Custom Field Suite 2.6.8-wiz.2 because the plugin must remain CFS.
- TablePress Responsive Tables 1.1 because it is a retained site extension.

## QA

- Public QA: 124 published URLs, desktop and iPhone user agents, all HTTP 200.
- Asset QA: 323 internal images/scripts/styles, 0 broken.
- Admin QA: 14 authenticated screens, all HTTP 200 without login redirects:
  Dashboard, Updates, Plugins, Site Health status/info, pages, posts, slides,
  `p_navi`, Contact Form 7, CFS, ACF, TablePress, and AIOSEO.
- REST API: authenticated Site Health result `good`.
- WordPress.org communication: `good`.
- Loopback requests: `good`.
- HTTP requests: `good`.
- WP-Cron endpoint: HTTP 200. Action Scheduler records 16 completed actions,
  6 future pending actions, and 0 overdue pending actions. The minute queue can
  transiently appear as a few seconds late on a low-traffic staging site.
- Contact Form 7: form 5 renders on `/contact/`; empty input returned seven
  expected validation errors. Valid QA input reached the mail stage, where the
  staging guard blocked the single outbound mail call. No customer mail was
  sent and no PHP error was logged.
- Contact Form 7 admin save: an unchanged authenticated save returned the
  expected HTTP 302 redirect with `message=saved`. The WAF remains enabled and
  still blocks a diagnostic request containing the removed legacy header.
  The recipient remained `info@k-daitsu.co.jp` for the administrator to edit.
- CFS: 7 groups, 104 fields, and saved values for 76 fields were read. A real
  text field was saved and read back through `CFS()` inside a database
  transaction, then rolled back to the original value. Final run succeeded
  without Notice, Warning, Deprecated, or Fatal output.
- Final homepage: HTTP 200; no visible PHP errors.
- Final debug check: no PHP errors; `debug.log` was deleted and was not
  regenerated after debug mode was disabled.
- Temporary migration/update/QA helpers self-deleted. The final document root
  contains only `.htaccess`, `index.php`, and `cms/`.

## Backups

Private backups are outside Git under
`work/k-daitsu-migration/backups/20260830`.

- Production-copy source DB: 34 tables, gzip SHA-256
  `dd5d42a42a42dc35a30a1e0012eb68e3bf737745babbdea30d9ef9d11a754239`
- Superseded staging DB: gzip SHA-256
  `fc390339a382490a446fafa5cd291dd21d7818f98e2ba6c718341f1f81830147`
- Superseded staging files ZIP: SHA-256
  `fd75dda1b47ccade63a7c571f38be648e41e54c32c2f0c45a2949415b235ec79`
- Final staging DB: 41 tables, 44,874,667 bytes, gzip SHA-256
  `f78d797ffa78921f919361c02f6c6b6ee408c2b52880df7afc85122df601e6d2`
- Pre-CF7-WAF-fix staging DB: 45,212,649 bytes, gzip SHA-256
  `a5271125d414bd227aee387a6ba909c45bba70af8af59e7e099f144c2e5b93c6`
- Superseded remote staging tree: `/k-daitsu-rollback-20260830`

## Remaining risk

Chrome visual and interaction QA is pending. Chrome was explicitly requested,
but the ChatGPT browser extension is not installed, so automated control could
not be attached. The HTML/mobile crawl, assets, forms, and admin screens passed,
but sliders and final responsive appearance still need a manual Chrome check.

Actual external email delivery was intentionally not tested. Staging prevents
mail to production recipients by design.

## Rollback

1. Put staging in maintenance mode.
2. Rename the current `/k-daitsu` tree aside.
3. Rename `/k-daitsu-rollback-20260830` back to `/k-daitsu`, or restore the
   verified local staging-pre-copy files ZIP.
4. Drop the current 41 staging tables and import the superseded staging DB.
5. Verify the target URL, noindex/mail guard, homepage, login, and logs.

For a rollback to the copied production baseline instead of the superseded
pre-renewal site, restore the production-copy files/DB backup and reapply only
the staging URL replacement and safeguards.

## Production rule

Do not deploy this staging database or files to production without a separate
approval. Before any production release, take fresh production backups, update
`main`, re-evaluate the CFS patch against the installed version, disable test
mail, and repeat public/admin/REST/Cron/form/CFS/log/visual QA.
