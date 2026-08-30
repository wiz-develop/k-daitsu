# Staging final report

> **Superseded on 2026-08-30:** the supplied FTP/DB source was later confirmed
> to be the pre-renewal `k-daitsu.3d-showcase.net` site, not the requested
> Basic-authenticated `k-daitsu2.3d-showcase.net` site. This report is retained
> only as a record of the completed compatibility work. The current staging
> build is not an approval or production-deployment candidate. See
> `SOURCE_CORRECTION.md`.

Completed: 2026-08-30 JST

## Scope and environment

- Copy source: `http://k-daitsu2.3d-showcase.net/`
- Staging: `https://k-daitsu.wiz-services.com/`
- Production: `https://www.k-daitsu.co.jp/`
- Production was not changed.
- `main` remains the production baseline; this report and the staging changes
  are on `test`.

Final staging runtime:

- PHP 7.4.33
- WordPress 7.1, database version 61833
- MySQL 8.4.8
- Home URL `https://k-daitsu.wiz-services.com/`
- Site URL `https://k-daitsu.wiz-services.com/cms/`
- Zerif Lite 1.8.5.48, preserving the customized source theme
- WordPress.org reports WordPress 7.1 as `latest`
- WordPress.org reports no pending plugin or theme updates

## Backups

Private backups are outside Git under `work/k-daitsu-migration/backups`.

- Source pre-migration: `20260829/source-pre-migration`
  - 9,360 CMS files; 1,079,808,451 bytes
  - file manifest SHA-256 `e4c7d8b5bb20d1c17e2b94d0410c71d4db8b08299fc028c21cacb8a3cad4806b`
  - database gzip SHA-256 `bffa21137b7980cbb167256feb1e786d1f6ad10b0cbbb7f6ea920316f92d702a`
- Production read-only baseline: `20260829/production-baseline`
  - 18,105 CMS files; 2,513,729,000 bytes
  - file manifest SHA-256 `7c64e8dcbcca039812e5855cdb2ff840371e5cfa2a9758d9ec25e1c76973c096`
  - database gzip SHA-256 `bb8aa0f7cb081ca1cb2a8614c6e4f06b280c50d13bc91061a496047956b2d5ae`
- Empty target pre-deploy database: `20260830/target-pre-deploy/database.sql`
  - 0 tables before import
  - SHA-256 `6c4463ab4ceedff95f6891520355e4be2bf31ae2c1516bba533a538b8ffe2776`

## Migration and changes

- Imported all 20 source tables and upgraded the WordPress schema.
- Replaced both source host aliases with the staging URL using serialized-safe
  replacement: 2,763 values changed and 0 old source URLs remain.
- Deployed 2,668 verified source upload files. Direct FTP transfer was used for
  all 139 non-ASCII filenames because server-side ZIP extraction changed those
  names. A compatible copy of the source logo was added for the pre-existing
  missing `2019/01/20180505-1-1.png` reference.
- Retained the customized Zerif Lite theme. Removed obsolete IE conditional
  enqueues that WordPress 7.1 deprecated; current-browser behavior is unchanged.
- Removed the staging Apache HTTPS redirect because CloudFront terminates HTTPS
  while the origin receives HTTP. Staging host handling in the untracked
  `wp-config.php` supplies the correct HTTPS request context.
- Hardened staging routing: noindex headers, protected configuration/log files,
  explicit 404 responses for deleted `wiz-*.php` helpers, and outbound email
  blocked by default.
- Updated form 879 from source-only mail domains to `k-daitsu.co.jp`; both the
  administrator notice and submitter autoresponder remain enabled.
- Normalized the copied administrator account login to the supplied staging
  login while preserving its user ID, profile, and authored content.

## Active plugins

| Plugin | Final version |
| --- | ---: |
| AddToAny Share Buttons | 1.8.18 |
| Advanced Custom Fields | 6.8.9 |
| All in One SEO | 5.0.1.1 |
| Breadcrumb NavXT | 7.5.1 |
| Classic Editor | 1.7.0 |
| Contact Form 7 | 6.1.7 |
| Custom Field Suite | 2.6.8-wiz.1 |
| Custom Post Type UI | 1.19.3 |
| Yoast Duplicate Post | 4.7 |
| MetaSlider | 3.111.2 |
| Smart Slider 3 | 3.5.1.39 |
| Orbit Fox Companion | 3.0.9 |
| What's New Generator | 2.0.3-wiz.1 |
| WPFront Scroll Top | 3.0.1 |
| WPtouch | 4.3.62 with WordPress 7.1 patch |

The clean staging build omits inactive migration, backup, reset, cache, SSL,
security, obsolete form, and unused WPForms copies. Exact update decisions are
recorded in `PLUGIN_UPDATE_CANDIDATES.md`.

## Compatibility patches

- Custom Field Suite remains Custom Field Suite. Version 2.6.8-wiz.1 is based
  on official 2.6.7 and keeps the existing `CFS()` API, field groups, values,
  and edit screens.
- What's New Generator 2.0.3-wiz.1 keeps `[showwhatsnew]` while adding current
  authorization, validation, query, and output hardening.
- WPtouch 4.3.62 initialization now starts on `init` to avoid WordPress 7.1's
  early translation Notice.
- Exact patches and before/after hashes are under `plugin-patches/`.

## QA evidence

- Public QA: 78 published URLs with desktop and iPhone user agents.
- Asset QA: 258 internal images, scripts, and styles; 0 broken.
- Admin QA: 14 authenticated screens, including Dashboard, Updates, Plugins,
  Site Health, pages, posts, `p_navi`, Contact Form 7, CFS, ACF, MetaSlider,
  and Smart Slider; all returned 200 without login redirects.
- REST API, WordPress.org API, loopback, and the WP-Cron HTTP endpoint returned
  200. A real one-time Cron event executed and was removed; LiteSpeed completed
  it asynchronously after 250 ms.
- Contact Form 7 form 879 returned `mail_sent`. The administrator notice and
  autoresponder made two `wp_mail` calls and both were accepted by Lolipop's
  local mailer. For safety, both were rerouted to `bs-dept@wiznet.co.jp` and
  prefixed `[k-daitsu staging QA]`; no customer address was used.
- CFS read QA found 2 field groups, 625 value rows, and valid `product_block`
  and `question_block` data. Save QA copied `product_block` to a temporary draft,
  saved and read back 422 rows with an identical value SHA-256, then removed the
  draft, postmeta, and CFS rows. The total remained exactly 625.
- After the final public/admin crawl, `wp-content/debug.log` was not regenerated.
  No public or admin page contained Fatal, Warning, Deprecated, or Notice output.
- Deployment debugging was closed after QA: `WP_DEBUG`, `WP_DEBUG_LOG`, and
  `WP_DEBUG_DISPLAY` are all disabled in the untracked staging configuration.
- `wp-config.php` returns 403; deleted helper URLs return 404; the only MU plugin
  left on the server is `wiz-staging-guard.php`.
- The root response is 200 with
  `X-Robots-Tag: noindex, nofollow, noarchive`; `blog_public` is 0.

Private machine-readable evidence:

- `analysis/staging-public-qa-final.json`
- `analysis/staging-admin-qa-final.json`

## Remaining QA

- Google Chrome visual/interaction QA is pending. Chrome is running, but the
  ChatGPT browser extension is not installed in any Chrome profile, so the
  required browser could not be controlled. Automated desktop/mobile HTML QA
  passed, but sliders, responsive layout, and visible interaction still need
  the requested Chrome check after the extension is connected.
- Confirm actual receipt of the two `[k-daitsu staging QA]` messages in the
  `bs-dept@wiznet.co.jp` mailbox. Application submission and local-mailer
  acceptance are already verified.

## Staging rollback

1. Keep the staging site unavailable while restoring.
2. Remove the current staging document-root contents.
3. Restore the source files from
   `backups/20260829/source-pre-migration`.
4. Drop the 20 imported staging tables and import the source SQL from the same
   backup, or restore the empty target SQL to return to the pre-deploy state.
5. Apply the staging URL replacement and staging-only safeguards again only if
   the restored source is intended to remain publicly reachable.
6. Verify the homepage, admin login, form suppression, noindex, and logs.

## Production release rule

Do not deploy the staging database, Zerif Lite theme, or first-view assets to
production. Production uses the different `rocked` theme and different content.
For a later approved production release:

1. Take a fresh full production database/files backup and record hashes.
2. Update `main` from that fresh production state.
3. Keep production `rocked` and its first-view assets unchanged.
4. Upgrade WordPress and each production plugin individually, re-evaluating
   every saved compatibility patch against the exact production version.
5. Test production forms without sending customer-facing QA mail unless the
   user explicitly approves it.
6. Run public, admin, REST, loopback, Cron, CFS, log, desktop, and mobile QA.
7. Roll back from the fresh production backup if any required flow fails.
