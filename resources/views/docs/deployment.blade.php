@extends('docs.layout')

@section('title', 'Deployment')

@section('docs-content')
<h1>Deployment</h1>

<p class="lead">This guide covers deploying SocialApparatus to production, including server optimization, scaling strategies, and monitoring.</p>

<h2>Production Checklist</h2>

<p>Before going live, verify these items:</p>

<div class="steps">
    <div class="step">
        <div class="step-number">1</div>
        <div class="step-content">
            <h4>Environment Configuration</h4>
            <pre><code>APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com</code></pre>
        </div>
    </div>
    <div class="step">
        <div class="step-number">2</div>
        <div class="step-content">
            <h4>Cache Configuration</h4>
            <pre><code>php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache</code></pre>
        </div>
    </div>
    <div class="step">
        <div class="step-number">3</div>
        <div class="step-content">
            <h4>Optimize Autoloader</h4>
            <pre><code>composer install --optimize-autoloader --no-dev</code></pre>
        </div>
    </div>
    <div class="step">
        <div class="step-number">4</div>
        <div class="step-content">
            <h4>SSL Certificate</h4>
            <p>Ensure HTTPS is configured with a valid SSL certificate.</p>
        </div>
    </div>
</div>

<h2>Server Requirements</h2>

<h3>Recommended Specifications</h3>

<table>
    <thead>
        <tr>
            <th>Community Size</th>
            <th>RAM</th>
            <th>CPU</th>
            <th>Storage</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Small (&lt;1k users)</td>
            <td>2 GB</td>
            <td>1 vCPU</td>
            <td>25 GB SSD</td>
        </tr>
        <tr>
            <td>Medium (1k-10k users)</td>
            <td>4 GB</td>
            <td>2 vCPU</td>
            <td>50 GB SSD</td>
        </tr>
        <tr>
            <td>Large (10k-100k users)</td>
            <td>8 GB</td>
            <td>4 vCPU</td>
            <td>100 GB SSD</td>
        </tr>
        <tr>
            <td>Enterprise (100k+ users)</td>
            <td>16+ GB</td>
            <td>8+ vCPU</td>
            <td>200+ GB SSD</td>
        </tr>
    </tbody>
</table>

<h3>Software Stack</h3>

<ul>
    <li><strong>OS:</strong> Ubuntu 22.04 LTS (recommended)</li>
    <li><strong>Web Server:</strong> Nginx (recommended) or Apache</li>
    <li><strong>PHP:</strong> 8.2+ with FPM</li>
    <li><strong>Database:</strong> MySQL 8.0+ or MariaDB 10.6+</li>
    <li><strong>Cache:</strong> Redis 6+ (recommended)</li>
    <li><strong>Process Manager:</strong> Supervisor</li>
</ul>

<h2>Nginx Configuration</h2>

<p>Optimized Nginx configuration for production:</p>

<pre><code>server {
    listen 80;
    listen [::]:80;
    server_name your-community.com;
    return 301 https://$server_name$request_uri;
}

server {
    listen 443 ssl http2;
    listen [::]:443 ssl http2;
    server_name your-community.com;
    root /var/www/socialapparatus/public;

    # SSL Configuration
    ssl_certificate /etc/letsencrypt/live/your-community.com/fullchain.pem;
    ssl_certificate_key /etc/letsencrypt/live/your-community.com/privkey.pem;
    ssl_session_timeout 1d;
    ssl_session_cache shared:SSL:50m;
    ssl_session_tickets off;
    ssl_protocols TLSv1.2 TLSv1.3;
    ssl_ciphers ECDHE-ECDSA-AES128-GCM-SHA256:ECDHE-RSA-AES128-GCM-SHA256;
    ssl_prefer_server_ciphers off;

    # Security Headers
    add_header X-Frame-Options "SAMEORIGIN" always;
    add_header X-Content-Type-Options "nosniff" always;
    add_header X-XSS-Protection "1; mode=block" always;
    add_header Referrer-Policy "strict-origin-when-cross-origin" always;

    # Gzip Compression
    gzip on;
    gzip_vary on;
    gzip_proxied any;
    gzip_comp_level 6;
    gzip_types text/plain text/css text/xml application/json application/javascript
               application/xml application/xml+rss text/javascript;

    index index.php;
    charset utf-8;

    # Static file caching
    location ~* \.(jpg|jpeg|png|gif|ico|css|js|woff2)$ {
        expires 1y;
        add_header Cache-Control "public, immutable";
    }

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
        fastcgi_buffer_size 128k;
        fastcgi_buffers 4 256k;
        fastcgi_busy_buffers_size 256k;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}</code></pre>

<h2>PHP-FPM Optimization</h2>

<p>Edit <code>/etc/php/8.3/fpm/pool.d/www.conf</code>:</p>

<pre><code>; Process management
pm = dynamic
pm.max_children = 50
pm.start_servers = 10
pm.min_spare_servers = 5
pm.max_spare_servers = 20
pm.max_requests = 500

; Memory limit
php_admin_value[memory_limit] = 256M

; Upload limits
php_admin_value[upload_max_filesize] = 64M
php_admin_value[post_max_size] = 64M

; Timeouts
request_terminate_timeout = 60</code></pre>

<h2>Queue Workers</h2>

<p>SocialApparatus uses queues for background jobs. Configure Supervisor to keep workers running:</p>

<h3>Supervisor Configuration</h3>

<p>Create <code>/etc/supervisor/conf.d/socialapparatus-worker.conf</code>:</p>

<pre><code>[program:socialapparatus-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /var/www/socialapparatus/artisan queue:work redis --sleep=3 --tries=3 --max-time=3600
autostart=true
autorestart=true
stopasgroup=true
killasgroup=true
user=www-data
numprocs=4
redirect_stderr=true
stdout_logfile=/var/www/socialapparatus/storage/logs/worker.log
stopwaitsecs=3600</code></pre>

<p>Apply the configuration:</p>

<pre><code>sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start socialapparatus-worker:*</code></pre>

<h2>Scheduled Tasks</h2>

<p>Add the Laravel scheduler to cron:</p>

<pre><code># Edit crontab
sudo crontab -e -u www-data

# Add this line
* * * * * cd /var/www/socialapparatus && php artisan schedule:run >> /dev/null 2>&1</code></pre>

<h2>Database Optimization</h2>

<h3>MySQL Configuration</h3>

<p>Edit <code>/etc/mysql/mysql.conf.d/mysqld.cnf</code>:</p>

<pre><code>[mysqld]
# InnoDB Settings
innodb_buffer_pool_size = 1G
innodb_log_file_size = 256M
innodb_flush_log_at_trx_commit = 2
innodb_flush_method = O_DIRECT

# Query Cache (MariaDB)
query_cache_type = 1
query_cache_size = 64M

# Connections
max_connections = 200
wait_timeout = 600

# Slow Query Log
slow_query_log = 1
slow_query_log_file = /var/log/mysql/slow.log
long_query_time = 2</code></pre>

<h3>Database Indexes</h3>

<p>Ensure all indexes are created:</p>

<pre><code>php artisan migrate:status

# If missing, run
php artisan migrate --force</code></pre>

<h2>Redis Configuration</h2>

<p>Configure Redis for caching and sessions:</p>

<pre><code># .env
CACHE_DRIVER=redis
SESSION_DRIVER=redis
QUEUE_CONNECTION=redis

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379</code></pre>

<p>Optimize Redis in <code>/etc/redis/redis.conf</code>:</p>

<pre><code>maxmemory 512mb
maxmemory-policy allkeys-lru
save ""  # Disable persistence for cache</code></pre>

<h2>File Storage</h2>

<h3>Local Storage</h3>

<pre><code>FILESYSTEM_DISK=local

# Ensure proper permissions
chmod -R 775 storage/app/public
chown -R www-data:www-data storage</code></pre>

<h3>S3 / Object Storage</h3>

<pre><code>FILESYSTEM_DISK=s3

AWS_ACCESS_KEY_ID=your-key
AWS_SECRET_ACCESS_KEY=your-secret
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=your-bucket
AWS_URL=https://your-bucket.s3.amazonaws.com</code></pre>

<h2>Deployment Automation</h2>

<h3>Basic Deploy Script</h3>

<pre><code>#!/bin/bash
# deploy.sh

set -e

echo "Deploying SocialApparatus..."

# Pull latest code
git pull origin main

# Install dependencies
composer install --optimize-autoloader --no-dev

# Build assets
npm ci
npm run build

# Run migrations
php artisan migrate --force

# Clear and rebuild caches
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

# Restart queue workers
php artisan queue:restart

# Reload PHP-FPM
sudo systemctl reload php8.3-fpm

echo "Deployment complete!"</code></pre>

<h3>Zero-Downtime Deployment</h3>

<p>For zero-downtime deployments, consider:</p>

<ul>
    <li><strong>Laravel Forge</strong> - Managed deployment with atomic releases</li>
    <li><strong>Envoyer</strong> - Zero-downtime deployment service</li>
    <li><strong>GitHub Actions</strong> - CI/CD pipeline with staging</li>
</ul>

<h3>GitHub Actions Example</h3>

<pre><code>name: Deploy

on:
  push:
    branches: [main]

jobs:
  deploy:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v4

      - name: Deploy to server
        uses: appleboy/ssh-action@master
        with:
          host: ${{ secrets.HOST }}
          username: ${{ secrets.USERNAME }}
          key: ${{ secrets.SSH_KEY }}
          script: |
            cd /var/www/socialapparatus
            ./deploy.sh</code></pre>

<h2>Monitoring</h2>

<h3>Application Monitoring</h3>

<ul>
    <li><strong>Laravel Telescope</strong> - Debug and monitor locally</li>
    <li><strong>Flare</strong> - Error tracking and monitoring</li>
    <li><strong>New Relic / Datadog</strong> - APM solutions</li>
</ul>

<h3>Server Monitoring</h3>

<ul>
    <li><strong>Uptime Kuma</strong> - Open-source uptime monitoring</li>
    <li><strong>Netdata</strong> - Real-time server metrics</li>
    <li><strong>Prometheus + Grafana</strong> - Advanced metrics</li>
</ul>

<h3>Health Check Endpoint</h3>

<pre><code>// routes/web.php
Route::get('/health', function () {
    return response()->json([
        'status' => 'ok',
        'database' => DB::connection()->getPdo() ? 'connected' : 'error',
        'cache' => Cache::set('health', true, 10) ? 'ok' : 'error',
        'queue' => Queue::size() >= 0 ? 'ok' : 'error',
    ]);
});</code></pre>

<h2>Backup Strategy</h2>

<h3>Database Backups</h3>

<pre><code># Daily backup script
#!/bin/bash
DATE=$(date +%Y-%m-%d)
mysqldump -u root socialapparatus | gzip > /backups/db/socialapparatus-$DATE.sql.gz

# Retain 30 days
find /backups/db -name "*.sql.gz" -mtime +30 -delete</code></pre>

<h3>File Backups</h3>

<pre><code># Backup uploads
rsync -avz /var/www/socialapparatus/storage/app/public/ /backups/files/</code></pre>

<h3>Laravel Backup Package</h3>

<pre><code># Install spatie/laravel-backup
composer require spatie/laravel-backup

# Configure in config/backup.php
# Run backup
php artisan backup:run

# Schedule daily backups
// app/Console/Kernel.php
$schedule->command('backup:run')->daily()->at('02:00');</code></pre>

<h2>Scaling</h2>

<h3>Horizontal Scaling</h3>

<p>For high-traffic communities:</p>

<ul>
    <li><strong>Load Balancer</strong> - Distribute traffic across multiple app servers</li>
    <li><strong>Shared Sessions</strong> - Use Redis for session storage</li>
    <li><strong>Shared Cache</strong> - Centralized Redis instance</li>
    <li><strong>Database Replication</strong> - Read replicas for queries</li>
    <li><strong>CDN</strong> - Serve static assets via CDN</li>
</ul>

<h3>Caching Strategy</h3>

<pre><code>// Cache frequently accessed data
$posts = Cache::remember('popular_posts', 3600, function () {
    return Post::popular()->take(10)->get();
});

// Cache user data
$user = Cache::remember("user.{$id}", 1800, function () use ($id) {
    return User::with('profile')->find($id);
});</code></pre>

<h2>Security Hardening</h2>

<h3>Firewall Rules</h3>

<pre><code># UFW example
sudo ufw default deny incoming
sudo ufw default allow outgoing
sudo ufw allow ssh
sudo ufw allow 'Nginx Full'
sudo ufw enable</code></pre>

<h3>Fail2Ban</h3>

<pre><code># Install and configure fail2ban
sudo apt install fail2ban

# Configure for nginx
# /etc/fail2ban/jail.local
[nginx-http-auth]
enabled = true
port = http,https
logpath = /var/log/nginx/error.log</code></pre>

<h3>Security Headers</h3>

<p>Already included in the Nginx config above. Verify with:</p>

<pre><code>curl -I https://your-community.com</code></pre>

<h2>Troubleshooting</h2>

<table>
    <thead>
        <tr>
            <th>Issue</th>
            <th>Solution</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>500 errors</td>
            <td>Check <code>storage/logs/laravel.log</code></td>
        </tr>
        <tr>
            <td>Slow performance</td>
            <td>Enable OPcache, add Redis caching</td>
        </tr>
        <tr>
            <td>Queue jobs failing</td>
            <td>Check <code>failed_jobs</code> table, supervisor logs</td>
        </tr>
        <tr>
            <td>Out of memory</td>
            <td>Increase PHP memory_limit, add swap</td>
        </tr>
        <tr>
            <td>Database timeouts</td>
            <td>Optimize queries, add indexes</td>
        </tr>
    </tbody>
</table>

<h2>Next Steps</h2>

<ul>
    <li><a href="{{ route('docs.configuration') }}">Review all configuration options</a></li>
    <li><a href="{{ route('docs.api') }}">Integrate with the API</a></li>
    <li><a href="{{ route('docs.contributing') }}">Contribute to the project</a></li>
</ul>
@endsection
