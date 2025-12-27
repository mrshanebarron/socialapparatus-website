@extends('docs.layout')

@section('title', 'Installation')

@section('docs-content')
<h1>Installation</h1>

<p class="lead">This guide will walk you through installing SocialApparatus on your server. The process takes about 10-15 minutes for a complete setup.</p>

<h2>Requirements</h2>

<p>Before installing, ensure your server meets these requirements:</p>

<table>
    <thead>
        <tr>
            <th>Requirement</th>
            <th>Minimum Version</th>
            <th>Recommended</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>PHP</td>
            <td>8.2</td>
            <td>8.3+</td>
        </tr>
        <tr>
            <td>MySQL / MariaDB</td>
            <td>8.0 / 10.6</td>
            <td>Latest stable</td>
        </tr>
        <tr>
            <td>Node.js</td>
            <td>18.x</td>
            <td>20.x LTS</td>
        </tr>
        <tr>
            <td>Composer</td>
            <td>2.x</td>
            <td>Latest</td>
        </tr>
    </tbody>
</table>

<h3>Required PHP Extensions</h3>

<ul>
    <li>BCMath</li>
    <li>Ctype</li>
    <li>cURL</li>
    <li>DOM</li>
    <li>Fileinfo</li>
    <li>GD or Imagick</li>
    <li>JSON</li>
    <li>Mbstring</li>
    <li>OpenSSL</li>
    <li>PDO (MySQL)</li>
    <li>Tokenizer</li>
    <li>XML</li>
    <li>Zip</li>
</ul>

<div class="callout callout-info">
    <strong>Using Laravel Herd or Valet?</strong> All required extensions are already installed. You can skip the extension check.
</div>

<h2>Installation Steps</h2>

<div class="steps">
    <div class="step">
        <div class="step-number">1</div>
        <div class="step-content">
            <h4>Clone the Repository</h4>
            <p>Clone SocialApparatus from GitHub to your server:</p>
            <pre><code>git clone https://github.com/mrshanebarron/socialapparatus.git
cd socialapparatus</code></pre>
        </div>
    </div>

    <div class="step">
        <div class="step-number">2</div>
        <div class="step-content">
            <h4>Install PHP Dependencies</h4>
            <p>Use Composer to install all PHP packages:</p>
            <pre><code>composer install --optimize-autoloader --no-dev</code></pre>
            <p><small>Remove <code>--no-dev</code> if you're setting up a development environment.</small></p>
        </div>
    </div>

    <div class="step">
        <div class="step-number">3</div>
        <div class="step-content">
            <h4>Install Frontend Dependencies</h4>
            <p>Install Node.js packages and build assets:</p>
            <pre><code>npm install
npm run build</code></pre>
        </div>
    </div>

    <div class="step">
        <div class="step-number">4</div>
        <div class="step-content">
            <h4>Configure Environment</h4>
            <p>Copy the example environment file and generate an application key:</p>
            <pre><code>cp .env.example .env
php artisan key:generate</code></pre>
        </div>
    </div>

    <div class="step">
        <div class="step-number">5</div>
        <div class="step-content">
            <h4>Configure Database</h4>
            <p>Create a MySQL database and update your <code>.env</code> file:</p>
            <pre><code>DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=socialapparatus
DB_USERNAME=your_username
DB_PASSWORD=your_password</code></pre>
        </div>
    </div>

    <div class="step">
        <div class="step-number">6</div>
        <div class="step-content">
            <h4>Run Migrations</h4>
            <p>Create all database tables:</p>
            <pre><code>php artisan migrate</code></pre>
        </div>
    </div>

    <div class="step">
        <div class="step-number">7</div>
        <div class="step-content">
            <h4>Seed Initial Data (Optional)</h4>
            <p>Populate the database with sample data for testing:</p>
            <pre><code>php artisan db:seed</code></pre>
            <p>This creates a default admin user:<br>
            Email: <code>admin@example.com</code><br>
            Password: <code>password</code></p>
        </div>
    </div>

    <div class="step">
        <div class="step-number">8</div>
        <div class="step-content">
            <h4>Link Storage</h4>
            <p>Create a symbolic link for file uploads:</p>
            <pre><code>php artisan storage:link</code></pre>
        </div>
    </div>

    <div class="step">
        <div class="step-number">9</div>
        <div class="step-content">
            <h4>Set Permissions</h4>
            <p>Ensure proper file permissions:</p>
            <pre><code>chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache</code></pre>
            <p><small>Replace <code>www-data</code> with your web server's user if different.</small></p>
        </div>
    </div>
</div>

<h2>Quick Install Script</h2>

<p>For convenience, you can run this all-in-one installation script:</p>

<pre><code>#!/bin/bash
# SocialApparatus Quick Install

git clone https://github.com/mrshanebarron/socialapparatus.git
cd socialapparatus

composer install --optimize-autoloader --no-dev
npm install && npm run build

cp .env.example .env
php artisan key:generate

# Configure your .env file with database credentials here
# Then run:
php artisan migrate --seed
php artisan storage:link

chmod -R 775 storage bootstrap/cache

echo "Installation complete!"</code></pre>

<h2>Web Server Configuration</h2>

<h3>Nginx (Recommended)</h3>

<pre><code>server {
    listen 80;
    server_name your-community.com;
    root /var/www/socialapparatus/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
        fastcgi_hide_header X-Powered-By;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}</code></pre>

<h3>Apache</h3>

<p>Ensure <code>mod_rewrite</code> is enabled. The included <code>.htaccess</code> file handles URL rewriting:</p>

<pre><code>&lt;VirtualHost *:80&gt;
    ServerName your-community.com
    DocumentRoot /var/www/socialapparatus/public

    &lt;Directory /var/www/socialapparatus/public&gt;
        AllowOverride All
        Require all granted
    &lt;/Directory&gt;

    ErrorLog ${APACHE_LOG_DIR}/socialapparatus_error.log
    CustomLog ${APACHE_LOG_DIR}/socialapparatus_access.log combined
&lt;/VirtualHost&gt;</code></pre>

<h2>SSL Certificate</h2>

<p>We strongly recommend using HTTPS. Use Let's Encrypt for free SSL certificates:</p>

<pre><code># Install Certbot
sudo apt install certbot python3-certbot-nginx

# Obtain certificate
sudo certbot --nginx -d your-community.com</code></pre>

<h2>Verify Installation</h2>

<p>After completing the installation:</p>

<ol>
    <li>Visit your domain in a browser</li>
    <li>You should see the SocialApparatus homepage</li>
    <li>Log in with the admin credentials (if you ran the seeder)</li>
    <li>Access the admin panel at <code>/admin</code></li>
</ol>

<div class="callout callout-warning">
    <strong>Production Checklist:</strong>
    <ul style="margin-bottom: 0;">
        <li>Set <code>APP_ENV=production</code></li>
        <li>Set <code>APP_DEBUG=false</code></li>
        <li>Configure proper mail settings</li>
        <li>Set up queue workers (see <a href="{{ route('docs.deployment') }}">Deployment Guide</a>)</li>
        <li>Configure caching for performance</li>
    </ul>
</div>

<h2>Troubleshooting</h2>

<h3>Common Issues</h3>

<table>
    <thead>
        <tr>
            <th>Problem</th>
            <th>Solution</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>500 Internal Server Error</td>
            <td>Check <code>storage/logs/laravel.log</code> for details. Usually a permissions issue.</td>
        </tr>
        <tr>
            <td>Blank page</td>
            <td>Run <code>php artisan config:clear</code> and check file permissions.</td>
        </tr>
        <tr>
            <td>Database connection error</td>
            <td>Verify credentials in <code>.env</code>. Test with <code>php artisan db:show</code>.</td>
        </tr>
        <tr>
            <td>Assets not loading</td>
            <td>Run <code>npm run build</code> and verify <code>storage:link</code> was created.</td>
        </tr>
        <tr>
            <td>Queue jobs not processing</td>
            <td>Start a queue worker: <code>php artisan queue:work</code></td>
        </tr>
    </tbody>
</table>

<h2>Next Steps</h2>

<p>Now that SocialApparatus is installed:</p>

<ul>
    <li><a href="{{ route('docs.configuration') }}">Configure your community settings</a></li>
    <li><a href="{{ route('docs.admin') }}">Learn to use the admin panel</a></li>
    <li><a href="{{ route('docs.deployment') }}">Set up for production deployment</a></li>
</ul>
@endsection
