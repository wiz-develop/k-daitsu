# K-Daitsu WordPress maintenance

This repository records the custom source and deployment notes for the
K-Daitsu WordPress site.

- `main`: production baseline and approved production releases
- `test`: staging updates and compatibility work
- `theme/rocked`: site-owned customized theme for the branch environment
- `root-files`: public-root routing files stored under non-active filenames
- `cms-files`: CMS routing files stored under non-active filenames
- `plugin-patches`: reviewable patches for retained third-party plugins
- `docs`: version inventories, QA, release, and rollback records

WordPress core, official plugin packages, uploads, databases, credentials,
`wp-config.php`, logs, caches, and backups are intentionally excluded. The
production theme video exceeds GitHub's per-file limit and is retained in the
verified external backup described in `docs/PRODUCTION_BASELINE.md`.

The 2026-08-30 production release upgrades WordPress and active plugins while
preserving the production database, first view, mail settings, routing, and PHP
7.4 runtime. See `docs/PRODUCTION_RELEASE_20260830.md`.
