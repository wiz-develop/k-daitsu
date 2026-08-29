# Plugin patch policy

Keep only reviewable compatibility patches and their application notes here.
Do not commit complete third-party plugin packages.

Custom Field Suite must remain Custom Field Suite. When a WordPress or PHP
upgrade requires a change, create a minimal patch against the exact installed
version, record original and patched hashes, and retest field groups, post
editing, saved values, and all public templates that call `CFS()`.

## Custom Field Suite 2.6.8-wiz.1

- Upstream baseline: Custom Field Suite 2.6.7
- Patch: `custom-field-suite-2.6.7-to-2.6.8-wiz.1.patch`
- Baseline tree SHA-256: `27b5e238975b86eb710d8ac7b798c2034685270113123ee9ed49485c33098833`
- Patched tree SHA-256: `8dc451ea97f269eba3208c3be2102363a44ad12b25dca85cbcbca8a6aff47310`

The patch declares PHP 8-compatible properties, hardens database queries and
AJAX responses, and fixes current WordPress callback and input handling. Apply
it to a clean 2.6.7 package; do not apply it cumulatively to the source 2.5.12
directory.

## What's New Generator 2.0.3-wiz.1

- Source baseline: What's New Generator 2.0.2
- Patch: `whats-new-generator-2.0.2-to-2.0.3-wiz.1.patch`
- Baseline tree SHA-256: `80a0612b63cfc934b9cb80c0dc6645bde0a27ac02c81344dc1df8d23fbea07a1`
- Patched tree SHA-256: `6b3b7a32efaf9dc2142bf8ed0b401044b5baae426348f509aee950f0bc377334`

The site uses `[showwhatsnew]`, so this abandoned plugin cannot simply be
removed. The patch preserves its markup and options while adding current PHP
compatibility, `manage_options` authorization, strict settings validation,
published-post filtering, and escaped output.
