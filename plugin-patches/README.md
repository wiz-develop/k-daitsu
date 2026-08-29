# Plugin patch policy

Keep only reviewable compatibility patches and their application notes here.
Do not commit complete third-party plugin packages.

Custom Field Suite must remain Custom Field Suite. When a WordPress or PHP
upgrade requires a change, create a minimal patch against the exact installed
version, record original and patched hashes, and retest field groups, post
editing, saved values, and all public templates that call `CFS()`.
