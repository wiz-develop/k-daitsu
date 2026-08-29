# Staging baseline

Recorded: 2026-08-29

## Environment roles

- Source copy: `http://k-daitsu2.3d-showcase.net/`
- Source database URLs: `http://k-daitsu.3d-showcase.net/` and `/cms`
- Staging: `https://k-daitsu.wiz-services.com/`
- Production: `https://www.k-daitsu.co.jp/`
- `main` remains the production baseline.
- `test` contains only staging work until production approval.

## Source snapshot

- WordPress: 5.2.21
- Database version: 44719
- Active theme: Zerif Lite 1.8.5.48, locally customized
- Official theme package SHA-256: `a2d1e360ca3a643a737e404ee769e31c8e384fff792797875ac24323e5ba4cdc`
- Customized theme tree SHA-256 before compatibility fix: `2706bbaff5b9a3cc8a559b379770a883e7f6db4f096cbdac4bc3155ee1d2d828`
- Database tables: 20
- CMS files: 9,360 files, 1,079,808,451 bytes
- Files manifest SHA-256: `e4c7d8b5bb20d1c17e2b94d0410c71d4db8b08299fc028c21cacb8a3cad4806b`
- Database gzip SHA-256: `bffa21137b7980cbb167256feb1e786d1f6ad10b0cbbb7f6ea920316f92d702a`
- Root `.htaccess` SHA-256: `25d1a6bcc41ad6781f663d9b898e75dc161ce7ef047b86d0cbb68b902ce3fb45`
- Private backup: `work/k-daitsu-migration/backups/20260829/source-pre-migration`

The 514 MB historical All-in-One WP Migration archive, cache data, logs, backup-suffixed
plugin directories, and macOS resource-fork files are retained in the private backup but
must not be deployed to staging.

Comparison with the official 1.8.5.48 package found customized templates,
header/footer behavior, styles, images, and `p_navi` templates. The theme is
therefore retained. One unparenthesized nested ternary in
`sections/about_us.php` was converted to the equivalent boolean condition to
prevent PHP 7.4 deprecation output and PHP 8 fatal errors.

## Runtime gate

Production reports PHP 7.4.33. Staging still reported PHP 8.5.10 on 2026-08-29.
No WordPress or database deployment may begin until staging reports PHP 7.4.x.

The current official Japanese WordPress candidate is 7.1, whose minimum PHP version is
7.4. The verified Japanese package SHA-256 is
`1cc95563b5005543c045e9a33d033dafb05cf4112795b378d815da83876daede`;
all 4,009 files matched the official WordPress.org MD5 manifest. Core and plugin updates
must be performed one at a time after the runtime gate passes.

## Forms and email

The copied content contains four uses of Contact Form 7 form ID 879, titled
`お問い合わせ`. No MW WP Form or WPForms shortcode was found. Staging mail must be
captured or redirected during setup, then tested with approved QA addresses before release.

## Custom Field Suite

Custom Field Suite remains Custom Field Suite. It must not be replaced by another field
plugin. The source uses 2.5.12. Staging will use the reviewed 2.6.8-wiz.1 compatibility
build based on official 2.6.7, followed by field-group, edit/save, and public-template QA.
