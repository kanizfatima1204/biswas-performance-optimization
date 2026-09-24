# Biswas IT Firm performance project submission

## 1. Selected website

**Biswas Performance Lab**, a self-built corporate demo in this repository. Test `/` for the optimized homepage and `/performance-report` for the audit dashboard. The project does not claim to have audited a third-party production client website.

## 2. Initial performance report

The database seeder supplies clearly labeled **illustrative demo values** so the dashboard renders after setup. They are not a genuine initial Lighthouse report. Run Lighthouse on the unoptimized version and replace those entries before making a measured-result claim. Keep the same URL and test conditions for the optimized run.

Record these fields for both mobile and desktop: Lighthouse performance score, LCP, FCP, CLS, TBT, TTFB, transferred kilobytes and request count. Keep Lighthouse JSON/HTML exports or screenshots with the submission, including the tested URL, date, Lighthouse version and device/network mode.

## 3. Initial audit: risks to investigate

These are audit hypotheses for this demo, not claimed findings from an unrun Lighthouse test:

- Large or incorrectly sized hero images can delay LCP and consume mobile bandwidth.
- Loading below-the-fold media eagerly competes with above-the-fold content.
- Unsplit development JavaScript can increase parse and execution work.
- Missing intrinsic image dimensions can cause layout shift.
- Repeated application queries and uncached fingerprinted assets can increase repeat-visit latency.
- Desktop-oriented layouts and heavy assets can overrun mobile CPU and network budgets.

## 4. Optimization plan

1. Capture a baseline with Lighthouse and the browser network panel.
2. Keep the LCP hero image dimensioned and high priority; preload only that critical image.
3. Lazy-load below-the-fold images and support responsive source sets when multiple sizes are available.
4. Use a production Vite build with minification, CSS splitting and dependency chunks.
5. Cache repeatable feature data and serve immutable caching for fingerprinted build assets.
6. Use a responsive, mobile-first layout and intrinsic image sizes to reduce layout shift.
7. Re-run the same checks, compare results and preserve the reports as evidence.

## 5. Optimized website

Run the Laravel application and visit `/`. The audit dashboard is at `/performance-report`. Setup instructions are in the repository README.

## 6. Before/after results

The report compares mobile and desktop runs across performance score, LCP, FCP, CLS, TBT, TTFB, transfer size and request count. The current seeded values are illustrative. Populate actual values with:

```bash
php artisan performance:record "Before optimization" mobile SCORE LCP_MS FCP_MS CLS TBT_MS TTFB_MS TRANSFER_KB REQUESTS --notes="URL, date, Lighthouse version, conditions"
php artisan performance:record "After optimization" mobile SCORE LCP_MS FCP_MS CLS TBT_MS TTFB_MS TRANSFER_KB REQUESTS --notes="URL, date, Lighthouse version, conditions"
```

Repeat both commands with `desktop`. Re-running the same label/device updates its row. Improvement is calculated directionally: higher is better for score; lower is better for timing, CLS, transfer and request count. The delta is percentage change, not percentage points.

### Test matrix

| Run | Device | Conditions |
|---|---|---|
| Before | Mobile | Lighthouse mobile emulation; same URL and throttling each run |
| After | Mobile | Match the baseline settings |
| Before | Desktop | Lighthouse desktop mode; same URL and settings each run |
| After | Desktop | Match the baseline settings |

Capture more than one run when results vary and report the median. Save screenshots or Lighthouse exports for all four runs. Never describe the seeded examples as measured evidence.

## 7. Mobile performance analysis

The page adapts its editorial hero, capability tiles, field-note panel, navigation, and report tables to narrow screens. The hero SVG has intrinsic dimensions; system fonts avoid external font requests. Verify mobile performance with Lighthouse mobile emulation or a real device—responsive CSS alone does not prove a faster score.

## 8. Code changes

- `resources/js/Pages/Home.vue`: responsive Biswas IT Firm landing page, semantic service/process sections, a preloaded and dimensioned vector hero, and performance report navigation. No unmeasured score or fabricated client testimonial is presented.
- `resources/js/Pages/Performance/Index.vue`: mobile/desktop comparisons, empty-state handling, directional deltas, and an explicit illustrative-data label.
- `app/Http/Controllers/HomeController.php`: caches repeatable feature data.
- `app/Http/Controllers/PerformanceController.php`: supplies recorded metric rows to the report.
- `app/Console/Commands/RecordPerformanceMetric.php`: validates and upserts a Lighthouse result by label and device.
- `database/migrations/*performance_metrics*`: persists audit metrics and enforces one row per label/device.
- `database/seeders/DatabaseSeeder.php`: seeds illustrative values only to make the report usable before measurements.
- `app/Http/Middleware/PerformanceHeaders.php`: sends security headers and caching policies.
- `resources/js/Components/LazyImage.vue`: reusable lazy, async-decoded responsive image component with intrinsic dimensions.
- `vite.config.js`: production manifest, minification defaults, CSS splitting, dependency chunks and no source maps.
- `resources/css/app.css`: midnight slate and periwinkle design system, responsive layouts, focus states and reduced-motion behavior.
- `public/images/hero.svg`: self-hosted abstract ribbon poster artwork. The contact CTA currently uses a demo email; update it to the firm's real address before publishing.

## 9. GitHub repository

Not published yet. After creating a remote repository, add the actual URL here and push the project. Do not invent a repository link. The current working folder must be initialized as a Git repository before using `git push`.

## 10. Live demo

Not deployed yet. Deploy the Laravel app to a PHP-capable host with a configured database, then add the working URL here. A static-only host cannot run the Laravel routes or database-backed audit page.

## 11. Technical explanation

The homepage's hero illustration is the likely LCP candidate, so its markup includes dimensions and high fetch priority and the page preloads it. Other images can use the `LazyImage` component to wait until they approach the viewport, decode asynchronously and reserve layout space. Vite's production output minifies assets, splits CSS and places Vue/Inertia and the icon package in named chunks. The controller caches repeatable feature data; versioned Vite assets receive long-lived immutable browser caching. The responsive grid and reduced-motion styles improve the experience across device sizes and preferences. Lighthouse before/after runs provide evidence for whether these implementation choices improved the tested page.

## Current publishing checklist

- [ ] Capture initial Lighthouse mobile and desktop reports.
- [ ] Capture optimized Lighthouse mobile and desktop reports with matching conditions.
- [ ] Replace illustrative database rows with the measured values and save evidence.
- [ ] Verify mobile behavior and network transfer on a real deployment/device.
- [ ] Publish to GitHub and insert the real repository URL.
- [ ] Deploy to a PHP-capable host and insert the working live URL.
