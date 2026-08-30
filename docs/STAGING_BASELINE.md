# Corrected staging baseline

Captured on 2026-08-30 JST from the active production site
`https://www.k-daitsu.co.jp/`. Production was read-only except for a
token-protected database export helper that deleted itself.

## Copied runtime

- PHP on staging: 7.4.33
- WordPress before update: 5.9.16
- MySQL source: 5.7.40
- Theme: customized Rocked 1.13
- Database prefix: `wp_`
- Production home/site: `https://www.k-daitsu.co.jp/` and `/cms`
- Staging home/site: `https://k-daitsu.wiz-services.com/` and `/cms`
- Staging active plugins before update: 23

The 2026-08-30 deploy-relevant production snapshot had 18,099 files and was
byte-identical to the complete 2026-08-29 production backup. Historical
All-in-One WP Migration archives were retained only in the private backup.

## Pre-work backups

- Production-copy DB gzip SHA-256:
  `dd5d42a42a42dc35a30a1e0012eb68e3bf737745babbdea30d9ef9d11a754239`
- Superseded staging DB gzip SHA-256:
  `fc390339a382490a446fafa5cd291dd21d7818f98e2ba6c718341f1f81830147`
- Superseded staging files ZIP SHA-256:
  `fd75dda1b47ccade63a7c571f38be648e41e54c32c2f0c45a2949415b235ec79`
- Superseded remote tree: `/k-daitsu-rollback-20260830`

The corrected build preserves production uploads, content, first-view assets,
menus, forms, CFS groups/values, and the Rocked theme. URLs were replaced with
serialized-data awareness. No production file or database row was changed.
