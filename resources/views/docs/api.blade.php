@extends('docs.layout')

@section('title', 'API Reference')

@section('docs-content')
<h1>API Reference</h1>

<p class="lead">SocialApparatus provides a comprehensive REST API for integrating with external applications, building mobile apps, or automating community management.</p>

<h2>Authentication</h2>

<p>The API uses Laravel Sanctum for token-based authentication.</p>

<h3>Getting an API Token</h3>

<pre><code>POST /api/auth/token

{
    "email": "user@example.com",
    "password": "your-password",
    "device_name": "My App"
}

Response:
{
    "token": "1|abc123...",
    "user": {
        "id": 1,
        "name": "John Doe",
        "email": "user@example.com"
    }
}</code></pre>

<h3>Using the Token</h3>

<p>Include the token in the Authorization header for all authenticated requests:</p>

<pre><code>Authorization: Bearer 1|abc123...
Accept: application/json
Content-Type: application/json</code></pre>

<h3>Revoking Tokens</h3>

<pre><code>POST /api/auth/logout
Authorization: Bearer {token}

Response:
{
    "message": "Token revoked successfully"
}</code></pre>

<h2>Rate Limiting</h2>

<p>API requests are rate-limited to prevent abuse:</p>

<table>
    <thead>
        <tr>
            <th>Endpoint Type</th>
            <th>Limit</th>
            <th>Window</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>General API</td>
            <td>60 requests</td>
            <td>Per minute</td>
        </tr>
        <tr>
            <td>Authentication</td>
            <td>5 requests</td>
            <td>Per minute</td>
        </tr>
        <tr>
            <td>Upload</td>
            <td>10 requests</td>
            <td>Per minute</td>
        </tr>
    </tbody>
</table>

<p>Rate limit headers are included in every response:</p>

<pre><code>X-RateLimit-Limit: 60
X-RateLimit-Remaining: 58
X-RateLimit-Reset: 1699999999</code></pre>

<h2>Users</h2>

<h3>Get Current User</h3>

<pre><code>GET /api/user

Response:
{
    "id": 1,
    "name": "John Doe",
    "username": "johndoe",
    "email": "john@example.com",
    "avatar_url": "https://...",
    "bio": "Software developer",
    "location": "New York",
    "website": "https://johndoe.com",
    "created_at": "2024-01-15T10:30:00Z",
    "stats": {
        "posts_count": 42,
        "followers_count": 128,
        "following_count": 85
    }
}</code></pre>

<h3>Get User by ID</h3>

<pre><code>GET /api/users/{id}

Response:
{
    "id": 2,
    "name": "Jane Smith",
    "username": "janesmith",
    "avatar_url": "https://...",
    "bio": "Designer & creator",
    "created_at": "2024-02-20T14:00:00Z",
    "stats": {
        "posts_count": 67,
        "followers_count": 256,
        "following_count": 142
    }
}</code></pre>

<h3>Update Current User</h3>

<pre><code>PATCH /api/user

{
    "name": "John Updated",
    "bio": "Updated bio",
    "location": "Los Angeles",
    "website": "https://newsite.com"
}

Response:
{
    "id": 1,
    "name": "John Updated",
    "bio": "Updated bio",
    ...
}</code></pre>

<h3>List Users (Paginated)</h3>

<pre><code>GET /api/users?page=1&per_page=20

Response:
{
    "data": [...],
    "meta": {
        "current_page": 1,
        "last_page": 10,
        "per_page": 20,
        "total": 195
    },
    "links": {
        "first": "/api/users?page=1",
        "last": "/api/users?page=10",
        "next": "/api/users?page=2",
        "prev": null
    }
}</code></pre>

<h2>Posts</h2>

<h3>List Posts</h3>

<pre><code>GET /api/posts?page=1&per_page=20

Query Parameters:
- category_id: Filter by category
- user_id: Filter by author
- tag: Filter by tag
- sort: latest, popular, trending
- search: Search term

Response:
{
    "data": [
        {
            "id": 1,
            "title": "Getting Started with SocialApparatus",
            "slug": "getting-started-with-socialapparatus",
            "excerpt": "A quick introduction...",
            "content": "Full post content...",
            "author": {
                "id": 1,
                "name": "John Doe",
                "username": "johndoe"
            },
            "category": {
                "id": 1,
                "name": "Tutorials",
                "slug": "tutorials"
            },
            "tags": ["getting-started", "tutorial"],
            "stats": {
                "views": 1234,
                "likes": 56,
                "comments": 12
            },
            "created_at": "2024-03-15T09:00:00Z",
            "updated_at": "2024-03-15T09:00:00Z"
        }
    ],
    "meta": {...},
    "links": {...}
}</code></pre>

<h3>Get Single Post</h3>

<pre><code>GET /api/posts/{id}

Response:
{
    "id": 1,
    "title": "Getting Started with SocialApparatus",
    "content": "Full post content with HTML...",
    "author": {...},
    "category": {...},
    "tags": [...],
    "stats": {...},
    "comments_count": 12,
    "is_liked": true,
    "is_bookmarked": false,
    "created_at": "2024-03-15T09:00:00Z"
}</code></pre>

<h3>Create Post</h3>

<pre><code>POST /api/posts

{
    "title": "My New Post",
    "content": "Post content here...",
    "category_id": 1,
    "tags": ["tag1", "tag2"]
}

Response:
{
    "id": 42,
    "title": "My New Post",
    "slug": "my-new-post",
    ...
}</code></pre>

<h3>Update Post</h3>

<pre><code>PATCH /api/posts/{id}

{
    "title": "Updated Title",
    "content": "Updated content..."
}

Response:
{
    "id": 42,
    "title": "Updated Title",
    ...
}</code></pre>

<h3>Delete Post</h3>

<pre><code>DELETE /api/posts/{id}

Response:
{
    "message": "Post deleted successfully"
}</code></pre>

<h2>Comments</h2>

<h3>List Comments for Post</h3>

<pre><code>GET /api/posts/{post_id}/comments

Response:
{
    "data": [
        {
            "id": 1,
            "content": "Great post!",
            "author": {
                "id": 2,
                "name": "Jane Smith",
                "avatar_url": "..."
            },
            "likes_count": 5,
            "is_liked": false,
            "replies_count": 2,
            "created_at": "2024-03-15T10:00:00Z"
        }
    ],
    "meta": {...}
}</code></pre>

<h3>Create Comment</h3>

<pre><code>POST /api/posts/{post_id}/comments

{
    "content": "This is my comment",
    "parent_id": null  // Optional: for replies
}

Response:
{
    "id": 15,
    "content": "This is my comment",
    "author": {...},
    "created_at": "2024-03-15T11:00:00Z"
}</code></pre>

<h3>Update Comment</h3>

<pre><code>PATCH /api/comments/{id}

{
    "content": "Updated comment text"
}

Response:
{
    "id": 15,
    "content": "Updated comment text",
    ...
}</code></pre>

<h3>Delete Comment</h3>

<pre><code>DELETE /api/comments/{id}

Response:
{
    "message": "Comment deleted successfully"
}</code></pre>

<h2>Reactions</h2>

<h3>Like a Post</h3>

<pre><code>POST /api/posts/{id}/like

Response:
{
    "liked": true,
    "likes_count": 57
}</code></pre>

<h3>Unlike a Post</h3>

<pre><code>DELETE /api/posts/{id}/like

Response:
{
    "liked": false,
    "likes_count": 56
}</code></pre>

<h3>React to Content</h3>

<pre><code>POST /api/posts/{id}/reactions

{
    "type": "love"  // like, love, laugh, wow, sad, angry
}

Response:
{
    "reaction": "love",
    "reactions_summary": {
        "like": 45,
        "love": 12,
        "laugh": 8
    }
}</code></pre>

<h2>Following</h2>

<h3>Follow User</h3>

<pre><code>POST /api/users/{id}/follow

Response:
{
    "following": true,
    "followers_count": 129
}</code></pre>

<h3>Unfollow User</h3>

<pre><code>DELETE /api/users/{id}/follow

Response:
{
    "following": false,
    "followers_count": 128
}</code></pre>

<h3>Get Followers</h3>

<pre><code>GET /api/users/{id}/followers

Response:
{
    "data": [
        {
            "id": 3,
            "name": "Bob Wilson",
            "username": "bobwilson",
            "avatar_url": "..."
        }
    ],
    "meta": {...}
}</code></pre>

<h3>Get Following</h3>

<pre><code>GET /api/users/{id}/following

Response:
{
    "data": [...],
    "meta": {...}
}</code></pre>

<h2>Groups</h2>

<h3>List Groups</h3>

<pre><code>GET /api/groups

Query Parameters:
- type: public, private
- membership: joined, created
- search: Search term

Response:
{
    "data": [
        {
            "id": 1,
            "name": "Laravel Developers",
            "slug": "laravel-developers",
            "description": "A community for Laravel enthusiasts",
            "type": "public",
            "members_count": 456,
            "is_member": true,
            "cover_image": "https://...",
            "created_at": "2024-01-01T00:00:00Z"
        }
    ],
    "meta": {...}
}</code></pre>

<h3>Get Group</h3>

<pre><code>GET /api/groups/{id}

Response:
{
    "id": 1,
    "name": "Laravel Developers",
    "description": "Full description...",
    "rules": "Group rules...",
    "type": "public",
    "owner": {...},
    "admins": [...],
    "members_count": 456,
    "posts_count": 892,
    "is_member": true,
    "is_admin": false,
    "created_at": "2024-01-01T00:00:00Z"
}</code></pre>

<h3>Create Group</h3>

<pre><code>POST /api/groups

{
    "name": "My New Group",
    "description": "Group description",
    "type": "public",  // public, private, secret
    "rules": "Optional group rules"
}

Response:
{
    "id": 15,
    "name": "My New Group",
    ...
}</code></pre>

<h3>Join Group</h3>

<pre><code>POST /api/groups/{id}/join

Response:
{
    "member": true,
    "status": "joined"  // or "pending" for private groups
}</code></pre>

<h3>Leave Group</h3>

<pre><code>DELETE /api/groups/{id}/join

Response:
{
    "member": false
}</code></pre>

<h2>Messages</h2>

<h3>List Conversations</h3>

<pre><code>GET /api/conversations

Response:
{
    "data": [
        {
            "id": 1,
            "participants": [
                {"id": 2, "name": "Jane Smith", "avatar_url": "..."}
            ],
            "last_message": {
                "content": "Sounds good!",
                "sender_id": 2,
                "created_at": "2024-03-15T15:30:00Z"
            },
            "unread_count": 2,
            "updated_at": "2024-03-15T15:30:00Z"
        }
    ],
    "meta": {...}
}</code></pre>

<h3>Get Conversation Messages</h3>

<pre><code>GET /api/conversations/{id}/messages

Response:
{
    "data": [
        {
            "id": 1,
            "content": "Hey, how are you?",
            "sender": {"id": 1, "name": "John Doe"},
            "read_at": "2024-03-15T15:31:00Z",
            "created_at": "2024-03-15T15:30:00Z"
        }
    ],
    "meta": {...}
}</code></pre>

<h3>Send Message</h3>

<pre><code>POST /api/conversations/{id}/messages

{
    "content": "Hello there!"
}

Response:
{
    "id": 42,
    "content": "Hello there!",
    "sender": {...},
    "created_at": "2024-03-15T16:00:00Z"
}</code></pre>

<h3>Start New Conversation</h3>

<pre><code>POST /api/conversations

{
    "recipient_id": 2,
    "content": "Hi, I wanted to reach out..."
}

Response:
{
    "conversation_id": 15,
    "message": {...}
}</code></pre>

<h2>Notifications</h2>

<h3>List Notifications</h3>

<pre><code>GET /api/notifications

Query Parameters:
- unread: true/false
- type: mention, comment, like, follow, message

Response:
{
    "data": [
        {
            "id": "abc123",
            "type": "mention",
            "data": {
                "user": {"id": 2, "name": "Jane Smith"},
                "post": {"id": 5, "title": "..."}
            },
            "read_at": null,
            "created_at": "2024-03-15T12:00:00Z"
        }
    ],
    "meta": {...},
    "unread_count": 5
}</code></pre>

<h3>Mark as Read</h3>

<pre><code>POST /api/notifications/{id}/read

Response:
{
    "read_at": "2024-03-15T12:05:00Z"
}</code></pre>

<h3>Mark All as Read</h3>

<pre><code>POST /api/notifications/read-all

Response:
{
    "message": "All notifications marked as read",
    "count": 5
}</code></pre>

<h2>Search</h2>

<pre><code>GET /api/search?q=query&type=all

Query Parameters:
- q: Search query (required)
- type: all, posts, users, groups
- page: Page number
- per_page: Results per page

Response:
{
    "posts": {
        "data": [...],
        "total": 25
    },
    "users": {
        "data": [...],
        "total": 10
    },
    "groups": {
        "data": [...],
        "total": 5
    }
}</code></pre>

<h2>Error Responses</h2>

<p>The API uses standard HTTP status codes:</p>

<table>
    <thead>
        <tr>
            <th>Code</th>
            <th>Meaning</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>200</td>
            <td>Success</td>
        </tr>
        <tr>
            <td>201</td>
            <td>Created</td>
        </tr>
        <tr>
            <td>400</td>
            <td>Bad Request</td>
        </tr>
        <tr>
            <td>401</td>
            <td>Unauthorized</td>
        </tr>
        <tr>
            <td>403</td>
            <td>Forbidden</td>
        </tr>
        <tr>
            <td>404</td>
            <td>Not Found</td>
        </tr>
        <tr>
            <td>422</td>
            <td>Validation Error</td>
        </tr>
        <tr>
            <td>429</td>
            <td>Rate Limited</td>
        </tr>
        <tr>
            <td>500</td>
            <td>Server Error</td>
        </tr>
    </tbody>
</table>

<p>Error response format:</p>

<pre><code>{
    "message": "The given data was invalid.",
    "errors": {
        "title": ["The title field is required."],
        "content": ["The content must be at least 10 characters."]
    }
}</code></pre>

<h2>Webhooks</h2>

<p>Configure webhooks to receive real-time notifications:</p>

<pre><code>POST /api/webhooks

{
    "url": "https://your-app.com/webhook",
    "events": ["post.created", "comment.created", "user.registered"],
    "secret": "your-webhook-secret"
}

Response:
{
    "id": 1,
    "url": "https://your-app.com/webhook",
    "events": [...],
    "created_at": "..."
}</code></pre>

<h3>Webhook Payload</h3>

<pre><code>{
    "event": "post.created",
    "timestamp": "2024-03-15T12:00:00Z",
    "data": {
        "post": {...}
    },
    "signature": "sha256=..."
}</code></pre>

<h2>SDKs & Libraries</h2>

<div class="callout callout-info">
    <strong>Coming Soon:</strong> Official SDKs for JavaScript, PHP, and Python are in development.
</div>

<pre><code>// JavaScript example (fetch)
const response = await fetch('https://your-community.com/api/posts', {
    headers: {
        'Authorization': 'Bearer ' + token,
        'Accept': 'application/json'
    }
});
const posts = await response.json();</code></pre>

<h2>Next Steps</h2>

<ul>
    <li><a href="{{ route('docs.deployment') }}">Deploy your API-powered app</a></li>
    <li><a href="{{ route('docs.configuration') }}">Configure API rate limits</a></li>
    <li><a href="https://github.com/mrshanebarron/socialapparatus" target="_blank">View source on GitHub</a></li>
</ul>
@endsection
