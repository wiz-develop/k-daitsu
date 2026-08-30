# Staging update procedure

1. Record production/staging state and verify file/database backups.
2. Copy production data to staging with serialized-safe URL replacement.
3. Keep outbound mail blocked and send no customer-facing QA messages.
4. Activate copied plugins individually and inspect the public page and log.
5. Upgrade WordPress core only; preserve `wp-content`, configuration, and theme.
6. Upgrade each plugin individually with an isolated rollback copy.
7. Retain Custom Field Suite and apply the reviewed compatibility patch.
8. Test public pages, assets, admin screens, REST, WordPress.org, loopback,
   Cron, Contact Form 7, CFS read/write, and PHP logs.
9. Disable debug logging, remove temporary helpers and vulnerable rollback
   plugin copies, and take a final database backup.
10. Commit the corrected staging source and evidence to `test`; leave
    production and `main` unchanged.

Steps 1-10 completed on 2026-08-30. Chrome visual interaction QA remains
pending because the required ChatGPT browser extension is not installed.
