@extends('docs.layout')

@section('title', 'Configuration')

@section('docs-content')
<h1>Configuration</h1>

<p class="lead">SocialApparatus is highly configurable through environment variables and config files. This guide covers all the settings you'll need to customize for your community.</p>

<h2>Environment Configuration</h2>

<p>The <code>.env</code> file in your project root contains all sensitive configuration. Never commit this file to version control.</p>

<h3>Application Settings</h3>

<pre><code># Application name displayed throughout the site
APP_NAME="Your Community Name"

# Environment: local, staging, production
APP_ENV=production

# Generate with: php artisan key:generate
APP_KEY=base64:your-generated-key

# NEVER enable in production
APP_DEBUG=false

# Your community's URL (no trailing slash)
APP_URL=https://your-community.com

# Default timezone
APP_TIMEZONE=America/New_York

# Default locale
APP_LOCALE=en</code></pre>

<h3>Database Configuration</h3>

<pre><code>DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=socialapparatus
DB_USERNAME=your_username
DB_PASSWORD=your_secure_password

# Optional: Separate read/write connections for scaling
DB_READ_HOST=read-replica.your-server.com
DB_WRITE_HOST=primary.your-server.com</code></pre>

<h3>Cache Configuration</h3>

<pre><code># Options: file, redis, memcached, database
CACHE_DRIVER=redis

# Redis configuration
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

# Cache prefix to avoid collisions
CACHE_PREFIX=socialapparatus</code></pre>

<div class="callout callout-info">
    <strong>Performance Tip:</strong> Use Redis for both cache and sessions in production. It significantly improves performance over file-based storage.
</div>

<h3>Session Configuration</h3>

<pre><code># Options: file, cookie, database, redis
SESSION_DRIVER=redis

# Session lifetime in minutes
SESSION_LIFETIME=120

# Encrypt session data
SESSION_ENCRYPT=true

# Session cookie name
SESSION_COOKIE=socialapparatus_session</code></pre>

<h3>Queue Configuration</h3>

<pre><code># Options: sync, database, redis, sqs
QUEUE_CONNECTION=redis

# For database queue driver
# Run: php artisan queue:table && php artisan migrate</code></pre>

<h3>Mail Configuration</h3>

<pre><code># Options: smtp, mailgun, ses, postmark, log
MAIL_MAILER=smtp

MAIL_HOST=smtp.mailgun.org
MAIL_PORT=587
MAIL_USERNAME=your-smtp-user
MAIL_PASSWORD=your-smtp-password
MAIL_ENCRYPTION=tls

# From address for outgoing emails
MAIL_FROM_ADDRESS="noreply@your-community.com"
MAIL_FROM_NAME="${APP_NAME}"</code></pre>

<h3>File Storage</h3>

<pre><code># Options: local, s3, spaces (DigitalOcean)
FILESYSTEM_DISK=local

# For S3 or S3-compatible storage
AWS_ACCESS_KEY_ID=your-key
AWS_SECRET_ACCESS_KEY=your-secret
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=your-bucket
AWS_URL=https://your-bucket.s3.amazonaws.com</code></pre>

<h2>Community Settings</h2>

<p>These settings are found in <code>config/community.php</code>:</p>

<pre><code>&lt;?php

return [
    /*
    |--------------------------------------------------------------------------
    | Community Name & Branding
    |--------------------------------------------------------------------------
    */
    'name' => env('COMMUNITY_NAME', 'SocialApparatus'),
    'tagline' => env('COMMUNITY_TAGLINE', 'Build thriving communities'),
    'logo' => env('COMMUNITY_LOGO', '/images/logo.svg'),

    /*
    |--------------------------------------------------------------------------
    | Registration Settings
    |--------------------------------------------------------------------------
    */
    'registration' => [
        'enabled' => env('REGISTRATION_ENABLED', true),
        'require_email_verification' => env('REQUIRE_EMAIL_VERIFICATION', true),
        'require_approval' => env('REQUIRE_ADMIN_APPROVAL', false),
        'invite_only' => env('INVITE_ONLY', false),
    ],

    /*
    |--------------------------------------------------------------------------
    | Content Settings
    |--------------------------------------------------------------------------
    */
    'content' => [
        'max_post_length' => env('MAX_POST_LENGTH', 10000),
        'max_comment_length' => env('MAX_COMMENT_LENGTH', 2000),
        'allow_html' => env('ALLOW_HTML_CONTENT', false),
        'allow_media_embeds' => env('ALLOW_MEDIA_EMBEDS', true),
    ],

    /*
    |--------------------------------------------------------------------------
    | Upload Limits
    |--------------------------------------------------------------------------
    */
    'uploads' => [
        'max_file_size' => env('MAX_UPLOAD_SIZE', 10240), // KB
        'allowed_extensions' => ['jpg', 'jpeg', 'png', 'gif', 'webp', 'pdf'],
        'max_avatar_size' => env('MAX_AVATAR_SIZE', 2048), // KB
    ],

    /*
    |--------------------------------------------------------------------------
    | Moderation
    |--------------------------------------------------------------------------
    */
    'moderation' => [
        'auto_approve_posts' => env('AUTO_APPROVE_POSTS', true),
        'spam_filter_enabled' => env('SPAM_FILTER_ENABLED', true),
        'profanity_filter' => env('PROFANITY_FILTER', false),
        'require_post_approval_for_new_users' => env('NEW_USER_POST_APPROVAL', false),
        'new_user_threshold_days' => env('NEW_USER_THRESHOLD', 7),
    ],

    /*
    |--------------------------------------------------------------------------
    | Features Toggle
    |--------------------------------------------------------------------------
    */
    'features' => [
        'groups' => env('FEATURE_GROUPS', true),
        'messaging' => env('FEATURE_MESSAGING', true),
        'notifications' => env('FEATURE_NOTIFICATIONS', true),
        'reactions' => env('FEATURE_REACTIONS', true),
        'bookmarks' => env('FEATURE_BOOKMARKS', true),
        'following' => env('FEATURE_FOLLOWING', true),
        'badges' => env('FEATURE_BADGES', true),
        'leaderboard' => env('FEATURE_LEADERBOARD', false),
    ],
];</code></pre>

<h2>User Roles & Permissions</h2>

<p>Configure roles in <code>config/permissions.php</code>:</p>

<pre><code>&lt;?php

return [
    'roles' => [
        'admin' => [
            'label' => 'Administrator',
            'permissions' => ['*'], // All permissions
        ],
        'moderator' => [
            'label' => 'Moderator',
            'permissions' => [
                'posts.edit',
                'posts.delete',
                'comments.edit',
                'comments.delete',
                'users.warn',
                'users.mute',
                'reports.view',
                'reports.resolve',
            ],
        ],
        'member' => [
            'label' => 'Member',
            'permissions' => [
                'posts.create',
                'posts.edit.own',
                'posts.delete.own',
                'comments.create',
                'comments.edit.own',
                'comments.delete.own',
                'messages.send',
                'profile.edit',
            ],
        ],
        'guest' => [
            'label' => 'Guest',
            'permissions' => [
                'posts.view',
                'comments.view',
                'profiles.view',
            ],
        ],
    ],
];</code></pre>

<h2>Rate Limiting</h2>

<p>Configure rate limits in <code>config/rate-limits.php</code>:</p>

<pre><code>&lt;?php

return [
    'api' => [
        'requests_per_minute' => env('API_RATE_LIMIT', 60),
    ],

    'posts' => [
        'per_hour' => env('POSTS_PER_HOUR', 10),
        'per_day' => env('POSTS_PER_DAY', 50),
    ],

    'comments' => [
        'per_minute' => env('COMMENTS_PER_MINUTE', 5),
        'per_hour' => env('COMMENTS_PER_HOUR', 60),
    ],

    'messages' => [
        'per_minute' => env('MESSAGES_PER_MINUTE', 10),
        'per_hour' => env('MESSAGES_PER_HOUR', 100),
    ],

    'login_attempts' => [
        'max_attempts' => env('LOGIN_MAX_ATTEMPTS', 5),
        'lockout_minutes' => env('LOGIN_LOCKOUT_MINUTES', 15),
    ],
];</code></pre>

<h2>Notifications</h2>

<p>Configure notification channels in <code>config/notifications.php</code>:</p>

<pre><code>&lt;?php

return [
    'channels' => [
        'database' => true,
        'mail' => true,
        'broadcast' => env('BROADCAST_NOTIFICATIONS', false),
        'slack' => env('SLACK_WEBHOOK_URL', null),
    ],

    'events' => [
        'new_follower' => ['database', 'mail'],
        'new_comment' => ['database', 'mail'],
        'mention' => ['database', 'mail'],
        'post_liked' => ['database'],
        'message_received' => ['database', 'mail'],
        'group_invite' => ['database', 'mail'],
    ],

    // Allow users to customize their preferences
    'user_configurable' => true,
];</code></pre>

<h2>Caching Configuration</h2>

<p>Optimize performance with proper caching in production:</p>

<pre><code># Cache configuration
php artisan config:cache

# Cache routes
php artisan route:cache

# Cache views
php artisan view:cache

# Cache events
php artisan event:cache</code></pre>

<div class="callout callout-warning">
    <strong>Remember:</strong> After changing <code>.env</code> or config files in production, run <code>php artisan config:cache</code> to apply changes.
</div>

<h2>Environment-Specific Files</h2>

<p>You can create environment-specific configuration:</p>

<ul>
    <li><code>.env.local</code> - Local development</li>
    <li><code>.env.staging</code> - Staging environment</li>
    <li><code>.env.production</code> - Production (copy to <code>.env</code>)</li>
</ul>

<h2>Configuration Validation</h2>

<p>Verify your configuration is correct:</p>

<pre><code># Check database connection
php artisan db:show

# Check mail configuration
php artisan tinker
>>> Mail::raw('Test', fn($m) => $m->to('test@example.com'));

# Check queue configuration
php artisan queue:work --once

# Check all configurations
php artisan about</code></pre>

<h2>Next Steps</h2>

<ul>
    <li><a href="{{ route('docs.features') }}">Explore all available features</a></li>
    <li><a href="{{ route('docs.admin') }}">Set up the admin panel</a></li>
    <li><a href="{{ route('docs.theming') }}">Customize the theme</a></li>
</ul>
@endsection
