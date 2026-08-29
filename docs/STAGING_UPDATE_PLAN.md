# Staging update plan

1. Confirm staging PHP 7.4.x and take a pre-deploy target snapshot.
2. Copy the source database, uploads, customized Zerif Lite theme, and required plugins.
3. Replace both source host aliases with `https://k-daitsu.wiz-services.com` using a serialized-data-safe operation.
4. Apply staging noindex and mail-capture controls before the first public request.
5. Update WordPress from 5.2.21 to 7.1 and run the database upgrade.
6. Update active plugins individually, checking public pages, admin, REST, cron, logs, and the form after each high-risk change.
7. Apply the recorded Custom Field Suite compatibility patch instead of replacing CFS.
8. Remove unused, inactive, backup, and abandoned plugin copies only after usage checks.
9. Run desktop/mobile visual QA in Chrome, real Contact Form 7 QA to approved recipients, and error-log inspection.
10. Record final versions, changed files, remaining risk, production steps, and rollback steps on `test`.

Production is read-only until staging approval is explicitly given.

## Completion status

Steps 1 through 8 are complete. Automated public, mobile-user-agent, admin,
REST, WordPress.org, loopback, Cron, CFS read/save, form-submission, mailer,
asset, and error-log QA are complete. Chrome visual and interaction QA remains
pending because the ChatGPT browser extension is not installed in Google
Chrome. Real mailbox receipt of the two rerouted QA messages also requires a
recipient-side check. See `STAGING_FINAL_REPORT.md`.
