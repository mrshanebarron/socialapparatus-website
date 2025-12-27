@extends('docs.layout')

@section('title', 'Features')

@section('docs-content')
<h1>Features</h1>

<p class="lead">SocialApparatus comes packed with features to help you build and grow your community. This guide provides an in-depth look at each major feature.</p>

<h2>User Management</h2>

<h3>Authentication</h3>

<p>Complete authentication system built on Laravel's robust security:</p>

<ul>
    <li><strong>Registration</strong> - Customizable sign-up with optional email verification</li>
    <li><strong>Login</strong> - Secure login with remember me functionality</li>
    <li><strong>Password Reset</strong> - Email-based password recovery</li>
    <li><strong>Two-Factor Authentication</strong> - Optional 2FA via authenticator apps</li>
    <li><strong>Social Login</strong> - OAuth support for Google, GitHub, Twitter, and more</li>
</ul>

<pre><code>// Enable social login in config/services.php
'github' => [
    'client_id' => env('GITHUB_CLIENT_ID'),
    'client_secret' => env('GITHUB_CLIENT_SECRET'),
    'redirect' => '/auth/github/callback',
],</code></pre>

<h3>User Profiles</h3>

<p>Rich user profiles with customizable fields:</p>

<div class="feature-grid">
    <div class="feature-item">
        <div class="feature-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
            </svg>
        </div>
        <h4>Profile Photos</h4>
        <p>Avatar uploads with automatic resizing and Gravatar fallback</p>
    </div>
    <div class="feature-item">
        <div class="feature-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
            </svg>
        </div>
        <h4>Cover Images</h4>
        <p>Customizable profile banners for personalization</p>
    </div>
    <div class="feature-item">
        <div class="feature-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
            </svg>
        </div>
        <h4>Custom Fields</h4>
        <p>Add location, website, bio, and custom profile fields</p>
    </div>
    <div class="feature-item">
        <div class="feature-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
            </svg>
        </div>
        <h4>Activity Stats</h4>
        <p>Post counts, reputation, member since, and activity graphs</p>
    </div>
</div>

<h3>Roles & Permissions</h3>

<p>Flexible role-based access control:</p>

<table>
    <thead>
        <tr>
            <th>Role</th>
            <th>Capabilities</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><strong>Administrator</strong></td>
            <td>Full access to all features, settings, and user management</td>
        </tr>
        <tr>
            <td><strong>Moderator</strong></td>
            <td>Edit/delete content, manage reports, warn/mute users</td>
        </tr>
        <tr>
            <td><strong>Member</strong></td>
            <td>Create posts/comments, send messages, join groups</td>
        </tr>
        <tr>
            <td><strong>Guest</strong></td>
            <td>View public content only</td>
        </tr>
    </tbody>
</table>

<h2>Content & Discussions</h2>

<h3>Posts</h3>

<p>Full-featured posting system:</p>

<ul>
    <li><strong>Rich Text Editor</strong> - WYSIWYG editing with formatting toolbar</li>
    <li><strong>Media Embeds</strong> - YouTube, Vimeo, Twitter, and more</li>
    <li><strong>Image Uploads</strong> - Drag-and-drop image attachments</li>
    <li><strong>Categories & Tags</strong> - Organize content for easy discovery</li>
    <li><strong>Drafts</strong> - Auto-save and manual draft saving</li>
    <li><strong>Scheduling</strong> - Schedule posts for future publication</li>
</ul>

<h3>Comments & Replies</h3>

<ul>
    <li><strong>Threaded Replies</strong> - Nested conversations with unlimited depth</li>
    <li><strong>@Mentions</strong> - Tag users to notify them</li>
    <li><strong>Reactions</strong> - Like, love, laugh, and custom reactions</li>
    <li><strong>Edit History</strong> - Track changes to comments</li>
    <li><strong>Soft Deletes</strong> - "[Deleted]" placeholder preserves thread structure</li>
</ul>

<pre><code>// Livewire component for real-time comments
&lt;livewire:comments :post="$post" /&gt;

// Comments update in real-time without page refresh
// New comments appear instantly for all viewers</code></pre>

<h3>Content Moderation</h3>

<ul>
    <li><strong>Report System</strong> - Users can flag inappropriate content</li>
    <li><strong>Moderation Queue</strong> - Review reported content in one place</li>
    <li><strong>Auto-moderation</strong> - Spam detection and profanity filtering</li>
    <li><strong>Shadow Banning</strong> - Hide problematic users without notification</li>
    <li><strong>Content Approval</strong> - Optional pre-publication review</li>
</ul>

<h2>Groups & Communities</h2>

<p>Create sub-communities within your platform:</p>

<h3>Group Types</h3>

<table>
    <thead>
        <tr>
            <th>Type</th>
            <th>Visibility</th>
            <th>Membership</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><strong>Public</strong></td>
            <td>Visible to everyone</td>
            <td>Anyone can join</td>
        </tr>
        <tr>
            <td><strong>Private</strong></td>
            <td>Listed but content hidden</td>
            <td>Request to join / invite only</td>
        </tr>
        <tr>
            <td><strong>Secret</strong></td>
            <td>Hidden from search</td>
            <td>Invite only</td>
        </tr>
    </tbody>
</table>

<h3>Group Features</h3>

<ul>
    <li><strong>Group Posts</strong> - Discussions visible only to members</li>
    <li><strong>Member Roles</strong> - Owner, admin, moderator, member</li>
    <li><strong>Group Events</strong> - Create and manage group events</li>
    <li><strong>Announcements</strong> - Pin important posts for all members</li>
    <li><strong>Custom Rules</strong> - Set group-specific guidelines</li>
</ul>

<h2>Social Features</h2>

<h3>Following System</h3>

<p>Build connections between users:</p>

<ul>
    <li><strong>Follow Users</strong> - See their posts in your feed</li>
    <li><strong>Followers Count</strong> - Display on profiles</li>
    <li><strong>Activity Feed</strong> - Personalized feed based on who you follow</li>
    <li><strong>Follow Suggestions</strong> - Discover new people based on interests</li>
</ul>

<h3>Reactions & Engagement</h3>

<pre><code>// Available reactions (customizable)
'reactions' => [
    'like' => '👍',
    'love' => '❤️',
    'laugh' => '😂',
    'wow' => '😮',
    'sad' => '😢',
    'angry' => '😠',
],</code></pre>

<h3>Bookmarks</h3>

<ul>
    <li>Save posts for later reading</li>
    <li>Organize bookmarks into collections</li>
    <li>Private by default - only you can see your bookmarks</li>
</ul>

<h2>Messaging</h2>

<h3>Private Messages</h3>

<ul>
    <li><strong>One-on-One</strong> - Direct messages between users</li>
    <li><strong>Group Chats</strong> - Multi-participant conversations</li>
    <li><strong>Read Receipts</strong> - See when messages are read</li>
    <li><strong>Media Sharing</strong> - Send images and files</li>
    <li><strong>Message Search</strong> - Find past conversations</li>
</ul>

<pre><code>// Real-time messaging with Laravel Echo
Echo.private(`chat.${conversationId}`)
    .listen('MessageSent', (e) => {
        this.messages.push(e.message);
    });</code></pre>

<h3>Privacy Controls</h3>

<ul>
    <li>Block users from sending messages</li>
    <li>Allow messages only from followers</li>
    <li>Disable messaging entirely per-user</li>
</ul>

<h2>Notifications</h2>

<h3>Notification Types</h3>

<ul>
    <li><strong>In-App</strong> - Bell icon with unread count</li>
    <li><strong>Email</strong> - Configurable email digests</li>
    <li><strong>Push</strong> - Browser push notifications (optional)</li>
    <li><strong>Real-time</strong> - Instant updates via WebSocket</li>
</ul>

<h3>Notification Events</h3>

<table>
    <thead>
        <tr>
            <th>Event</th>
            <th>Default Channels</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>New follower</td>
            <td>Database, Email</td>
        </tr>
        <tr>
            <td>Comment on your post</td>
            <td>Database, Email</td>
        </tr>
        <tr>
            <td>Reply to your comment</td>
            <td>Database, Email</td>
        </tr>
        <tr>
            <td>@Mention</td>
            <td>Database, Email</td>
        </tr>
        <tr>
            <td>Post liked</td>
            <td>Database</td>
        </tr>
        <tr>
            <td>New message</td>
            <td>Database, Email</td>
        </tr>
        <tr>
            <td>Group invite</td>
            <td>Database, Email</td>
        </tr>
    </tbody>
</table>

<h3>User Preferences</h3>

<p>Users can customize which notifications they receive:</p>

<pre><code>// In user settings
&lt;livewire:notification-preferences /&gt;

// Toggle individual notification types on/off
// Choose between instant, daily digest, or weekly digest</code></pre>

<h2>Search</h2>

<h3>Full-Text Search</h3>

<ul>
    <li><strong>Posts</strong> - Search post titles and content</li>
    <li><strong>Users</strong> - Find users by name or username</li>
    <li><strong>Groups</strong> - Discover groups by name or description</li>
    <li><strong>Comments</strong> - Search within discussions</li>
</ul>

<pre><code>// Powered by Laravel Scout
// Supports: Algolia, Meilisearch, MySQL fulltext

SCOUT_DRIVER=meilisearch
MEILISEARCH_HOST=http://127.0.0.1:7700</code></pre>

<h3>Search Filters</h3>

<ul>
    <li>Filter by content type</li>
    <li>Filter by date range</li>
    <li>Filter by category/tag</li>
    <li>Sort by relevance, date, or popularity</li>
</ul>

<h2>Gamification (Optional)</h2>

<div class="callout callout-info">
    <strong>Note:</strong> Gamification features are optional and can be disabled in configuration.
</div>

<h3>Reputation System</h3>

<ul>
    <li>Earn points for posts, comments, and likes</li>
    <li>Lose points for reported/deleted content</li>
    <li>Unlock privileges at reputation thresholds</li>
</ul>

<h3>Badges</h3>

<ul>
    <li><strong>Achievement Badges</strong> - First post, 100 posts, etc.</li>
    <li><strong>Role Badges</strong> - Staff, moderator, verified</li>
    <li><strong>Custom Badges</strong> - Admin-assigned special badges</li>
</ul>

<h3>Leaderboards</h3>

<ul>
    <li>Weekly/monthly/all-time rankings</li>
    <li>Category-specific leaderboards</li>
    <li>Opt-out option for privacy</li>
</ul>

<h2>Next Steps</h2>

<ul>
    <li><a href="{{ route('docs.admin') }}">Learn to manage these features in the admin panel</a></li>
    <li><a href="{{ route('docs.api') }}">Access features programmatically via the API</a></li>
    <li><a href="{{ route('docs.theming') }}">Customize the look and feel</a></li>
</ul>
@endsection
