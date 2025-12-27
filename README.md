<p align="center">
  <img src="https://socialapparatus.com/images/logo.svg" width="120" alt="SocialApparatus Logo">
</p>

<h1 align="center">SocialApparatus</h1>

<p align="center">
  <strong>A powerful, self-hosted social network platform built on Laravel</strong>
</p>

<p align="center">
  <a href="https://github.com/mrshanebarron/socialapparatus/blob/main/LICENSE"><img src="https://img.shields.io/badge/license-MIT-blue.svg" alt="License"></a>
  <a href="https://github.com/mrshanebarron/socialapparatus/releases"><img src="https://img.shields.io/github/v/release/mrshanebarron/socialapparatus" alt="Latest Release"></a>
  <img src="https://img.shields.io/badge/Laravel-12.x-FF2D20?logo=laravel" alt="Laravel 12">
  <img src="https://img.shields.io/badge/Livewire-3.x-FB70A9?logo=livewire" alt="Livewire 3">
  <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?logo=php" alt="PHP 8.2+">
</p>

<p align="center">
  <a href="https://socialapparatus.com">Website</a> |
  <a href="https://socialapparatus.com/docs">Documentation</a> |
  <a href="https://community.socialapparatus.com">Community</a> |
  <a href="https://github.com/mrshanebarron/socialapparatus/issues">Issues</a>
</p>

---

## About

SocialApparatus is a complete, self-hosted social networking platform that gives you all the features of major social networks while keeping you in full control of your data. Built on the **TALL stack** (Tailwind CSS, Alpine.js, Laravel, Livewire), it's designed for developers who want a solid foundation for building community-driven applications.

Whether you're building an internal company network, a niche community platform, or the next big social app - SocialApparatus provides the tools to make it happen.

### Why SocialApparatus?

- **Own Your Data** - Self-hosted means your data stays on your servers
- **Full Customization** - Open source and built for developers to extend
- **Production Ready** - 140+ features out of the box
- **Modern Stack** - Laravel 12, Livewire 3, Tailwind CSS, Alpine.js
- **Active Development** - Regular updates and community support

## Features

### Core Social Features
- **User Profiles** - Rich profiles with avatars, cover photos, bios, and custom fields
- **News Feed** - Algorithmic and chronological feed options
- **Posts** - Text, images, videos, links, and polls
- **Comments** - Threaded comments with reactions
- **Reactions** - Like, love, laugh, and custom reactions
- **Sharing** - Share posts to your feed or externally

### Communication
- **Real-time Messaging** - Private and group messaging with read receipts
- **Notifications** - In-app, email, and push notifications
- **Mentions** - @mention users in posts and comments
- **Activity Feed** - Track interactions and engagement

### Community
- **Groups** - Public, private, and secret groups
- **Events** - Create, manage, and RSVP to events
- **Pages** - Business and organization pages
- **Forums** - Discussion boards with categories

### Content
- **Stories** - Ephemeral 24-hour content
- **Albums** - Photo and video albums
- **Bookmarks** - Save posts for later
- **Hashtags** - Discover content by topic

### Administration
- **Admin Dashboard** - Comprehensive admin panel
- **User Management** - Roles, permissions, bans
- **Content Moderation** - Report system and moderation queue
- **Analytics** - User engagement and growth metrics
- **Settings** - Site configuration and customization

### Security & Privacy
- **Two-Factor Authentication** - TOTP-based 2FA
- **Privacy Controls** - Granular privacy settings
- **Blocked Users** - User blocking functionality
- **Report System** - Content and user reporting

### Developer Features
- **REST API** - Full API for mobile apps and integrations
- **Webhooks** - Event-driven integrations
- **Theming** - CSS variable-based theming system
- **Extensible** - Plugin-ready architecture

## Requirements

- PHP 8.2 or higher
- MySQL 8.0+ / PostgreSQL 13+ / SQLite 3.35+
- Composer 2.x
- Node.js 18+ and npm
- Redis (optional, for caching and queues)

## Installation

### Quick Start

```bash
# Clone the repository
git clone https://github.com/mrshanebarron/socialapparatus.git
cd socialapparatus

# Install PHP dependencies
composer install

# Install Node dependencies
npm install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Configure your database in .env, then run migrations
php artisan migrate --seed

# Build frontend assets
npm run build

# Start the development server
php artisan serve
```

Visit `http://localhost:8000` to complete the web-based installer.

### Using Composer Create-Project

```bash
composer create-project socialapparatus/socialapparatus my-social-network
cd my-social-network
php artisan key:generate
# Configure .env and run migrations
php artisan migrate --seed
npm install && npm run build
php artisan serve
```

## Configuration

### Environment Variables

Key environment variables to configure:

```env
APP_NAME="My Social Network"
APP_URL=https://your-domain.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=socialapparatus
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailgun.org
MAIL_PORT=587
MAIL_USERNAME=
MAIL_PASSWORD=

# Optional: Redis for caching and queues
CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
REDIS_HOST=127.0.0.1
```

### File Storage

Configure file storage for user uploads:

```env
FILESYSTEM_DISK=public

# For S3-compatible storage
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
```

See the [Configuration Documentation](https://socialapparatus.com/docs/configuration) for all options.

## Deployment

### Production Checklist

1. Set `APP_ENV=production` and `APP_DEBUG=false`
2. Configure a proper database (MySQL/PostgreSQL)
3. Set up Redis for caching and queues
4. Configure email sending
5. Set up SSL/HTTPS
6. Configure a queue worker
7. Set up scheduled tasks (cron)

### Server Requirements

- Nginx or Apache with mod_rewrite
- PHP-FPM with required extensions
- SSL certificate (Let's Encrypt recommended)
- Supervisor for queue workers

### Example Nginx Configuration

```nginx
server {
    listen 80;
    server_name your-domain.com;
    return 301 https://$server_name$request_uri;
}

server {
    listen 443 ssl http2;
    server_name your-domain.com;
    root /var/www/socialapparatus/public;

    ssl_certificate /etc/letsencrypt/live/your-domain.com/fullchain.pem;
    ssl_certificate_key /etc/letsencrypt/live/your-domain.com/privkey.pem;

    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

See the [Deployment Guide](https://socialapparatus.com/docs/deployment) for detailed instructions.

## Theming

SocialApparatus uses CSS custom properties for easy theming:

```css
:root {
    --primary-color: #8b5cf6;
    --secondary-color: #38bdf8;
    --background-color: #0a0a0f;
    --text-color: #ffffff;
    --border-color: rgba(255, 255, 255, 0.1);
}
```

Create custom themes in `resources/css/themes/` and select them in the admin panel.

See the [Theming Guide](https://socialapparatus.com/docs/theming) for customization options.

## API

SocialApparatus includes a comprehensive REST API for building mobile apps and integrations.

### Authentication

```bash
# Get an API token
curl -X POST https://your-domain.com/api/auth/login \
  -H "Content-Type: application/json" \
  -d '{"email": "user@example.com", "password": "password"}'
```

### Example Endpoints

```bash
# Get current user
GET /api/user

# Get feed
GET /api/feed

# Create a post
POST /api/posts

# Get user profile
GET /api/users/{username}
```

See the [API Documentation](https://socialapparatus.com/docs/api) for all endpoints.

## Contributing

We welcome contributions! Please see our [Contributing Guide](CONTRIBUTING.md) for details.

### Development Setup

```bash
# Fork and clone the repo
git clone https://github.com/YOUR-USERNAME/socialapparatus.git

# Install dependencies
composer install
npm install

# Run tests
php artisan test

# Run code formatting
./vendor/bin/pint
npm run lint
```

### Pull Request Process

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## Community

- **Community Forum**: [community.socialapparatus.com](https://community.socialapparatus.com)
- **GitHub Discussions**: [Discussions](https://github.com/mrshanebarron/socialapparatus/discussions)
- **Twitter**: [@socialapparatus](https://twitter.com/socialapparatus)

## Security

If you discover a security vulnerability, please email security@socialapparatus.com instead of using the issue tracker. All security vulnerabilities will be promptly addressed.

## License

SocialApparatus is open-sourced software licensed under the [MIT license](LICENSE).

## Credits

Built with love by [Shane Barron](https://sbarron.com).

### Built With

- [Laravel](https://laravel.com) - The PHP framework
- [Livewire](https://livewire.laravel.com) - Full-stack framework for Laravel
- [Tailwind CSS](https://tailwindcss.com) - Utility-first CSS framework
- [Alpine.js](https://alpinejs.dev) - Lightweight JavaScript framework

---

<p align="center">
  <sub>Built with love by <a href="https://sbarron.com">Shane Barron</a></sub>
</p>
