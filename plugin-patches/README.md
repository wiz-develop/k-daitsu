# Plugin patch policy

Keep only reviewable compatibility patches and their application notes here.
Do not commit complete third-party plugin packages.

Custom Field Suite must remain Custom Field Suite. For each WordPress or PHP
upgrade, reapply the patch to a clean upstream package, then retest field-group
editing, saved values, public `CFS()` calls, and PHP logs.

## Custom Field Suite 2.6.8-wiz.2

- Upstream baseline: Custom Field Suite 2.6.7
- Patch: `custom-field-suite-2.6.7-to-2.6.8-wiz.2.patch`
- Baseline tree SHA-256: `27b5e238975b86eb710d8ac7b798c2034685270113123ee9ed49485c33098833`
- Patched tree SHA-256: `88eb783f0e6363fb90b080396587c527ff651a88d497ab7a0125cde6d743c324`
- Patch SHA-256: `60acd2a3d339eb4a5cb9a42403675a45dee0faadac258aed83a4ff726925a856`

The patch declares current PHP properties, hardens SQL/AJAX/session handling,
uses supported WordPress APIs, and prevents missing field-name lookups from
raising notices during API saves. A dry-run against clean 2.6.7 succeeds.
