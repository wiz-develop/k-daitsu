# K-Daitsu WordPress maintenance

This repository records the custom source and deployment notes for the
K-Daitsu WordPress site.

- `main`: read-only production baseline from `https://www.k-daitsu.co.jp/`
- `test`: production-data copy deployed to `https://k-daitsu.wiz-services.com/`
- `theme/rocked`: site-owned customized theme for the branch environment
- `root-files` and `cms-files`: routing files stored under non-active names
- `mu-plugins`: staging-only safeguards
- `plugin-patches`: reviewable patches for retained third-party plugins
- `docs`: inventories, QA evidence, release notes, and rollback procedures

WordPress core, official plugin packages, uploads, databases, credentials,
`wp-config.php`, logs, caches, and backups are intentionally excluded. The
production theme video exceeds GitHub's per-file limit and remains in the
verified external backup documented in `docs/PRODUCTION_BASELINE.md`.

`test` preserves the production content, first view, and customized Rocked
theme. It upgrades WordPress and plugins for PHP 7.4 and adds only the recorded
compatibility changes. It is not a production deployment commit.
