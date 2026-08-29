# Production baseline

Captured from `https://www.k-daitsu.co.jp/` on 2026-08-29 JST. Production was
read-only except for a token-protected database export helper that deleted
itself immediately after streaming the backup.

## Runtime and application

- PHP: 7.4.33
- MySQL: 5.7.40
- WordPress: 5.9.16
- Database prefix: `wp_`
- Site URL: `https://www.k-daitsu.co.jp/cms`
- Home URL: `https://www.k-daitsu.co.jp`
- Active theme: `rocked` 1.13
- Active plugins: 25, listed in `PLUGIN_INVENTORY_MAIN.tsv`

Custom Field Suite 2.6 is installed and active. Its field groups, values,
`CFS()` calls, and editing workflow must be preserved. It must not be migrated
to another custom-field plugin.

## Verified backups

Backups are outside Git under
`work/k-daitsu-migration/backups/20260829/production-baseline`.

- CMS files: 18,105 files; 2,513,729,000 bytes
- File-entry manifest SHA-256:
  `7c64e8dcbcca039812e5855cdb2ff840371e5cfa2a9758d9ec25e1c76973c096`
- Database: 34 tables; SQL 54,230,589 bytes
- Database gzip SHA-256:
  `bb8aa0f7cb081ca1cb2a8614c6e4f06b280c50d13bc91061a496047956b2d5ae`
- Root `.htaccess` SHA-256:
  `8e6da712ce7db10c427b7a7878ff1821a9cf56099c91014360dc2ab61cfb569f`
- CMS `.htaccess` SHA-256:
  `d0b0fbe713dceb63ea6589ae9b4b34d08cea3653b34ede0b2d62d8c1a6cd5a27`

The CMS file backup includes two historical All-in-One WP Migration archives.
They remain in the private backup and are not tracked or copied to staging.

## Git scope

The complete custom `rocked` theme is tracked except
`images/movie.mp4` (268,697,774 bytes), which exceeds GitHub's single-file
limit. Its SHA-256 is
`6427dfb27db0e84ebb51c28d0213f42a0c21eaee80d6592f7db6969de15f2dc2`.
The remaining 148 theme files have deterministic combined SHA-256
`42d967d76d4a03571c9a0f338d8e22ec89ce459154ecca6393c78251908dbfdc`.

Root and CMS routing files are stored under non-active filenames so checking
out the repository cannot apply production redirects by accident.

## Baseline observations

- Production and the designated copy source are not the same site build.
  Production uses `rocked`; the copy source uses `zerif-lite`.
- Production has newer and additional plugins compared with the copy source.
- Production must not be overwritten with the staging first-view assets or
  database unless separately approved after staging QA.
