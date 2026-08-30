# Source correction

The initially supplied `k-daitsu.3d-showcase.net` FTP and database contained a
pre-renewal Zerif Lite site. It did not match the requested Basic-authenticated
`k-daitsu2.3d-showcase.net` first view.

After the user approved rebuilding from production data, staging was replaced
with a read-only copy of `https://www.k-daitsu.co.jp/`. Production remained
unchanged. The corrected staging build uses the same `rocked` theme, content,
uploads, and database as production before its isolated updates.

The superseded staging tree was renamed to `/k-daitsu-rollback-20260830` on the
Lolipop account and a local file/database backup was retained. The current
`test` branch removes the superseded Zerif Lite source and records only the
corrected production-copy build.
