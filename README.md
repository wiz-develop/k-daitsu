# K-Daitsu WordPress maintenance

This repository records the custom source and deployment notes for the
K-Daitsu WordPress site.

- `main`: production baseline and approved production releases
- `test`: staging updates and compatibility work
- `theme`: site-owned theme source for the branch environment
- `root-files`: public-root routing files stored under non-active filenames
- `cms-files`: CMS routing files stored under non-active filenames
- `mu-plugins`: staging-only operational guards where present
- `plugin-patches`: reviewable patches for retained third-party plugins
- `docs`: version inventories, QA, release, and rollback records

WordPress core, official plugin packages, uploads, databases, credentials,
`wp-config.php`, logs, caches, and backups are intentionally excluded. The
production theme video exceeds GitHub's per-file limit and is retained in the
verified external backup described in `docs/PRODUCTION_BASELINE.md`.

The branches intentionally contain different customized themes: production
`main` records Rocked, while staging `test` records the copied Zerif Lite site.
