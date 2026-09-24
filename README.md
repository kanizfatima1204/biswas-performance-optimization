# Biswas IT Firm — Website Performance Optimization Demo

A Laravel 12, Vue 3, Inertia.js and Vite demo for a technical performance audit. The homepage uses an editorial paper-and-cobalt art direction with a geometric poster illustration, asymmetrical capability tiles and a performance field note. The selected site is self-built, so the audit can be reproduced without claiming access to an unrelated client's production website.

## Project submission sections

1. **Selected website:** Biswas IT Firm demo website (`/`).
2. **Initial report and problems:** see [docs/SUBMISSION.md](docs/SUBMISSION.md).
3. **Optimization plan and technical explanation:** see [docs/SUBMISSION.md](docs/SUBMISSION.md).
4. **Optimized website:** Laravel/Vue app at `/`.
5. **Before/after results:** `/performance-report` compares Lighthouse and network metrics on mobile and desktop.
6. **Code changes:** see the implementation map in [docs/SUBMISSION.md](docs/SUBMISSION.md).
7. **GitHub and live demo:** not published yet. Add the real repository and deployment URLs after creating them; do not submit placeholder URLs as live links.

> The included database seed values are illustrative examples, not measured Lighthouse results. Replace them with real runs before using the comparison as evidence.

## Requirements

- PHP 8.2+
- Composer
- Node.js 20+
- SQLite (default) or MySQL 8/MariaDB

## Run locally

```bash
composer install --no-dev
copy .env.example .env
php artisan key:generate
```

The default config uses SQLite. Create its empty database file, then run:

```bash
New-Item database/database.sqlite -ItemType File
php artisan migrate --seed
npm install
npm run build
php artisan serve
```

To use MySQL instead, set `DB_CONNECTION=mysql` and the connection variables in `.env`, then create the configured database before migrating.

Open `http://127.0.0.1:8000` and `http://127.0.0.1:8000/performance-report`.

For local development with Vite hot reload, run `composer run dev`.

## Capture and record actual Lighthouse results

Use Chrome Lighthouse or PageSpeed Insights on the same deployed/local URL before and after your change. Keep browser, Lighthouse version, mobile/desktop mode and network settings consistent. Follow the detailed instructions in [docs/SUBMISSION.md](docs/SUBMISSION.md), then record each of four runs with `php artisan performance:record`.

```bash
php artisan performance:record "Before optimization" mobile 48 4200 2800 0.18 690 820 2840 92 --notes="Lighthouse URL/date/version and conditions"
```

Repeat for after/mobile and before/after desktop with the actual values. Re-running a label/device pair updates that row.
