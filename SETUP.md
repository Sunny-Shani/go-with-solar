# Go with Solar setup

## Local and InfinityFree configuration

1. Copy `app/config/example.php` to `app/config/local.php`.
2. Fill in your local or InfinityFree values:
   - `app_url`
   - database host, database name, username, and password
   - Google OAuth client ID and secret
   - GitHub OAuth client ID and secret
   - RapidAPI key for quotes
3. Keep `app/config/local.php` private. It is ignored by `.gitignore` and should not be uploaded to GitHub.

## OAuth callback URLs

Set these callback URLs in the provider dashboards:

- Google: `{APP_URL}/auth/google/callback.php`
- GitHub: `{APP_URL}/auth/github/callback.php`

For local development with the default app URL, those are:

- `http://localhost/gowithsolarV2/auth/google/callback.php`
- `http://localhost/gowithsolarV2/auth/github/callback.php`

## Before publishing this project

The old project had credentials committed directly in PHP files. Regenerate or revoke these values before making the repository public:

- Google OAuth client secret
- GitHub OAuth client secret
- RapidAPI key
- Database password

After rotating secrets, update only `app/config/local.php` on each environment.
