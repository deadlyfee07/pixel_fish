# AGENTS.md — Pixel Fish Laravel

## Stack
- Laravel 12, PHP ^8.2, SQLite, Blade, Tailwind CSS 3 (class-based dark mode), Alpine.js, Vite
- Auth: Laravel Breeze (Blade stack), `username` is the unique login identifier
- PHPUnit 11 (via `artisan test`, not direct `phpunit`)

## Commands
```bash
composer run setup          # full project bootstrap (composer install → .env → key → migrate → npm → build)
composer run dev            # concurrent: artisan serve + queue:listen + pail (logs) + vite
composer run test           # artisan config:clear && artisan test
npm run build               # vite build
npm run dev                 # vite dev server
```

## Architecture
- **Routes**: `routes/web.php` (all app routes), `routes/auth.php` (Breeze auth), `routes/console.php`
- **Middleware**: `admin` alias registered in `bootstrap/app.php` → `AdminMiddleware` checks `role !== 'admin'`
- **Users**: `role` column defaults to `'member'`; `username` is unique and used for login
- **App entry point**: logged-in users redirect to `wiki.index` (member) or `admin.index` (admin); guests → login

## Domain (fishing game wiki/community)
| Area | Controllers | Models | Notes |
|------|------------|--------|-------|
| Wiki | `WikiController` | `WikiBait`, `WikiIngredient`, `WikiRod` | Read-only for members |
| Forum | `ForumController` | `ForumLog` (belongs to User) | Fishing catch logs; destroy checks ownership or admin |
| Calculator | `CalculatorController` | — | Static view |
| Admin | `AdminController`, `AdminWiki*Controller` | — | Full CRUD for wiki content; admin role required |

## Database
- **Default driver**: SQLite (file: `database/database.sqlite`)
- Session, cache, queue all use `database` driver
- **Testing**: SQLite `:memory:` — config + migrate happens implicitly via `artisan test`
- Migrations: 7 files (users, cache, jobs + 4 custom wiki/forum tables)

## Testing
```bash
composer run test           # runs all tests via artisan
```
- Tests at `tests/Feature/` (Breeze tests + ExampleTest) and `tests/Unit/`
- No test for custom features yet; no Pest, no snapshot tests

## Style & conventions
- Code style: Laravel Pint (`vendor/bin/pint`)
- Indent: 4 spaces (`.editorconfig`)
- Dark mode: `class` strategy (not media-query); toggle via JS
- Views: Blade layouts (`layouts/app.blade.php`, `layouts/guest.blade.php`)
- Auth routes NOT included by default — `routes/auth.php` is explicit-required in `routes/web.php`
