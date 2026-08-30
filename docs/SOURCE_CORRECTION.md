# Source correction

Recorded: 2026-08-30 JST

## Finding

The staging build copied the server and database originally supplied for the
migration. A later visual check established that this data is the pre-renewal
site, while the intended source is the Basic-authenticated site at
`http://k-daitsu2.3d-showcase.net/`.

Read-only verification found that the two sources are on different servers:

- Intended `k-daitsu2.3d-showcase.net`: `150.60.232.182`
- Supplied FTP host: `150.60.159.208`
- The supplied database has `k-daitsu.3d-showcase.net` as its home/site URL and
  uses Zerif Lite.
- The supplied FTP credentials do not authenticate against the intended source
  server.

Basic authentication is configured outside the supplied document root. Its
password cannot be recovered from the copied `.htaccess` or WordPress data.

## Current state

- Production has not been changed.
- `main` remains the production baseline.
- The current staging files/database are preserved for rollback and audit, but
  they are not the requested renewal source.
- The WordPress/PHP/plugin compatibility changes in `test` remain useful as
  reference patches and must be re-evaluated against the correct source.

## Required before rebuilding

Obtain read access for the server that actually hosts
`k-daitsu2.3d-showcase.net`:

1. FTP/SFTP credentials and the document-root path.
2. Database host, name, user, and password, or a complete database dump.
3. A reset or temporary Basic-authentication account for visual QA.

After those are available, take a fresh source backup and a current staging
rollback backup before replacing the staging site. Do not deploy any of the
incorrect source data to production.
