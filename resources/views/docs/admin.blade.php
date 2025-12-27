@extends('docs.layout')

@section('title', 'Admin Panel')

@section('docs-content')
<h1>Admin Panel</h1>

<p class="lead">The SocialApparatus admin panel provides comprehensive tools for managing your community. Access it at <code>/admin</code> with an administrator account.</p>

<h2>Dashboard Overview</h2>

<p>The admin dashboard gives you an at-a-glance view of your community:</p>

<div class="feature-grid">
    <div class="feature-item">
        <div class="feature-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
            </svg>
        </div>
        <h4>User Stats</h4>
        <p>Total users, new registrations, active users</p>
    </div>
    <div class="feature-item">
        <div class="feature-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
            </svg>
        </div>
        <h4>Content Stats</h4>
        <p>Posts, comments, engagement metrics</p>
    </div>
    <div class="feature-item">
        <div class="feature-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
            </svg>
        </div>
        <h4>Moderation Queue</h4>
        <p>Pending reports, flagged content count</p>
    </div>
    <div class="feature-item">
        <div class="feature-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
            </svg>
        </div>
        <h4>Activity Graphs</h4>
        <p>Trends over time, peak activity hours</p>
    </div>
</div>

<h2>User Management</h2>

<h3>User List</h3>

<p>View and manage all registered users:</p>

<ul>
    <li><strong>Search & Filter</strong> - Find users by name, email, or role</li>
    <li><strong>Sort</strong> - By registration date, last active, post count</li>
    <li><strong>Bulk Actions</strong> - Select multiple users for batch operations</li>
</ul>

<h3>User Actions</h3>

<table>
    <thead>
        <tr>
            <th>Action</th>
            <th>Description</th>
            <th>Reversible</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><strong>Edit Profile</strong></td>
            <td>Modify user details, email, password</td>
            <td>Yes</td>
        </tr>
        <tr>
            <td><strong>Change Role</strong></td>
            <td>Promote to admin/mod or demote</td>
            <td>Yes</td>
        </tr>
        <tr>
            <td><strong>Verify Email</strong></td>
            <td>Manually verify unverified accounts</td>
            <td>Yes</td>
        </tr>
        <tr>
            <td><strong>Mute</strong></td>
            <td>Prevent user from posting (temporary)</td>
            <td>Yes</td>
        </tr>
        <tr>
            <td><strong>Ban</strong></td>
            <td>Completely block account access</td>
            <td>Yes</td>
        </tr>
        <tr>
            <td><strong>Delete</strong></td>
            <td>Permanently remove account and content</td>
            <td>No</td>
        </tr>
    </tbody>
</table>

<h3>User Details View</h3>

<p>Click any user to see detailed information:</p>

<ul>
    <li>Account information and registration details</li>
    <li>Login history and IP addresses</li>
    <li>All posts and comments</li>
    <li>Moderation history (warnings, mutes, bans)</li>
    <li>Reports filed by or against user</li>
</ul>

<h2>Content Moderation</h2>

<h3>Moderation Queue</h3>

<p>The moderation queue shows all content requiring review:</p>

<div class="steps">
    <div class="step">
        <div class="step-number">1</div>
        <div class="step-content">
            <h4>Reported Content</h4>
            <p>User-submitted reports with reason and context. Review the content and take appropriate action.</p>
        </div>
    </div>
    <div class="step">
        <div class="step-number">2</div>
        <div class="step-content">
            <h4>Auto-Flagged Content</h4>
            <p>Posts caught by spam filter or profanity detection. Approve or reject with one click.</p>
        </div>
    </div>
    <div class="step">
        <div class="step-number">3</div>
        <div class="step-content">
            <h4>Pending Approval</h4>
            <p>Content awaiting manual approval (if enabled for new users).</p>
        </div>
    </div>
</div>

<h3>Moderation Actions</h3>

<pre><code>// Available moderation actions
- Approve: Publish the content
- Reject: Remove without penalty
- Delete: Remove and count against user
- Edit: Modify content directly
- Warn User: Send warning notification
- Mute User: Temporarily silence
- Ban User: Permanent removal</code></pre>

<h3>Moderation Logs</h3>

<p>All moderation actions are logged for accountability:</p>

<ul>
    <li>Which moderator took the action</li>
    <li>When the action occurred</li>
    <li>What content was affected</li>
    <li>The reason provided</li>
</ul>

<h2>Site Settings</h2>

<h3>General Settings</h3>

<table>
    <thead>
        <tr>
            <th>Setting</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Site Name</td>
            <td>Your community's name</td>
        </tr>
        <tr>
            <td>Site Description</td>
            <td>Meta description for SEO</td>
        </tr>
        <tr>
            <td>Logo</td>
            <td>Upload site logo</td>
        </tr>
        <tr>
            <td>Favicon</td>
            <td>Upload browser icon</td>
        </tr>
        <tr>
            <td>Default Timezone</td>
            <td>Server timezone for dates</td>
        </tr>
        <tr>
            <td>Date Format</td>
            <td>How dates are displayed</td>
        </tr>
    </tbody>
</table>

<h3>Registration Settings</h3>

<ul>
    <li><strong>Enable Registration</strong> - Toggle new user sign-ups</li>
    <li><strong>Email Verification</strong> - Require email confirmation</li>
    <li><strong>Admin Approval</strong> - Manually approve new accounts</li>
    <li><strong>Invite Only</strong> - Restrict to invited users</li>
    <li><strong>Allowed Email Domains</strong> - Whitelist specific domains</li>
    <li><strong>Blocked Email Domains</strong> - Block disposable emails</li>
</ul>

<h3>Content Settings</h3>

<ul>
    <li><strong>Max Post Length</strong> - Character limit for posts</li>
    <li><strong>Max Comment Length</strong> - Character limit for comments</li>
    <li><strong>Allow Media Embeds</strong> - YouTube, Twitter embeds</li>
    <li><strong>Max Upload Size</strong> - File size limits</li>
    <li><strong>Allowed File Types</strong> - Permitted extensions</li>
</ul>

<h3>Feature Toggles</h3>

<p>Enable or disable major features:</p>

<pre><code>// Toggle these on/off instantly
- Groups
- Private Messaging
- Notifications
- Reactions
- Bookmarks
- Following
- Badges
- Leaderboard</code></pre>

<h2>Categories & Tags</h2>

<h3>Managing Categories</h3>

<ul>
    <li><strong>Create</strong> - Add new categories with name, description, icon</li>
    <li><strong>Edit</strong> - Modify existing categories</li>
    <li><strong>Reorder</strong> - Drag-and-drop to change display order</li>
    <li><strong>Delete</strong> - Remove categories (posts moved to default)</li>
</ul>

<h3>Tag Management</h3>

<ul>
    <li>View all tags with usage counts</li>
    <li>Merge duplicate tags</li>
    <li>Delete unused tags</li>
    <li>Set featured tags for visibility</li>
</ul>

<h2>Groups Administration</h2>

<h3>Group Management</h3>

<ul>
    <li>View all groups with member counts</li>
    <li>Edit group details and settings</li>
    <li>Change group ownership</li>
    <li>Delete problematic groups</li>
</ul>

<h3>Group Settings</h3>

<ul>
    <li><strong>Max Groups Per User</strong> - Limit group creation</li>
    <li><strong>Require Approval</strong> - New groups need admin approval</li>
    <li><strong>Min Members to Create</strong> - Account age/activity requirements</li>
</ul>

<h2>Reports & Analytics</h2>

<h3>Available Reports</h3>

<div class="feature-grid">
    <div class="feature-item">
        <div class="feature-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
            </svg>
        </div>
        <h4>User Growth</h4>
        <p>Registration trends, churn rate, active user ratios</p>
    </div>
    <div class="feature-item">
        <div class="feature-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
            </svg>
        </div>
        <h4>Content Activity</h4>
        <p>Posts per day, comments, engagement metrics</p>
    </div>
    <div class="feature-item">
        <div class="feature-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <h4>Peak Times</h4>
        <p>Most active hours, days, seasonal patterns</p>
    </div>
    <div class="feature-item">
        <div class="feature-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
            </svg>
        </div>
        <h4>Moderation Stats</h4>
        <p>Reports, actions taken, moderator activity</p>
    </div>
</div>

<h3>Export Data</h3>

<p>Export data for external analysis:</p>

<ul>
    <li>CSV export for spreadsheet analysis</li>
    <li>JSON export for programmatic access</li>
    <li>Scheduled automated exports</li>
</ul>

<h2>System Health</h2>

<h3>Status Indicators</h3>

<ul>
    <li><strong>Database</strong> - Connection status, query performance</li>
    <li><strong>Cache</strong> - Redis/Memcached connection</li>
    <li><strong>Queue</strong> - Pending jobs, failed jobs count</li>
    <li><strong>Storage</strong> - Disk usage, upload folder size</li>
    <li><strong>Email</strong> - Mail server connection test</li>
</ul>

<h3>Maintenance Mode</h3>

<pre><code># Enable maintenance mode
php artisan down --secret="your-bypass-token"

# Disable maintenance mode
php artisan up</code></pre>

<p>Admins can toggle maintenance mode from the dashboard with a custom message for users.</p>

<h2>Audit Log</h2>

<p>Track all administrative actions:</p>

<ul>
    <li>User management changes</li>
    <li>Settings modifications</li>
    <li>Content moderation actions</li>
    <li>Login attempts (success/failure)</li>
</ul>

<div class="callout callout-warning">
    <strong>Security Note:</strong> Audit logs are immutable and retained for 90 days by default. Configure retention in <code>config/audit.php</code>.
</div>

<h2>Keyboard Shortcuts</h2>

<table>
    <thead>
        <tr>
            <th>Shortcut</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>g</code> + <code>d</code></td>
            <td>Go to Dashboard</td>
        </tr>
        <tr>
            <td><code>g</code> + <code>u</code></td>
            <td>Go to Users</td>
        </tr>
        <tr>
            <td><code>g</code> + <code>m</code></td>
            <td>Go to Moderation Queue</td>
        </tr>
        <tr>
            <td><code>g</code> + <code>s</code></td>
            <td>Go to Settings</td>
        </tr>
        <tr>
            <td><code>/</code></td>
            <td>Focus Search</td>
        </tr>
        <tr>
            <td><code>?</code></td>
            <td>Show Shortcuts Help</td>
        </tr>
    </tbody>
</table>

<h2>Next Steps</h2>

<ul>
    <li><a href="{{ route('docs.api') }}">Access admin functions via API</a></li>
    <li><a href="{{ route('docs.deployment') }}">Deploy and scale your community</a></li>
    <li><a href="{{ route('docs.theming') }}">Customize the admin panel appearance</a></li>
</ul>
@endsection
