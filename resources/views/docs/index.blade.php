@extends('docs.layout')

@section('title', 'Introduction')

@section('docs-content')
<h1>Introduction to SocialApparatus</h1>

<p class="lead">SocialApparatus is a powerful, open-source community platform built on the TALL stack (Tailwind CSS, Alpine.js, Laravel, and Livewire). It provides everything you need to build thriving online communities with modern features and extensible architecture.</p>

<div class="callout callout-info">
    <strong>Quick Start:</strong> Want to get up and running fast? Check out the <a href="{{ route('docs.installation') }}">Installation Guide</a> to deploy your community in minutes.
</div>

<h2>Why SocialApparatus?</h2>

<p>Building a community platform from scratch is time-consuming and complex. SocialApparatus gives you a production-ready foundation with all the essential features, so you can focus on growing your community instead of reinventing the wheel.</p>

<div class="feature-grid">
    <div class="feature-item">
        <div class="feature-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
            </svg>
        </div>
        <h3>User Management</h3>
        <p>Complete authentication, profiles, roles & permissions out of the box.</p>
    </div>
    <div class="feature-item">
        <div class="feature-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
            </svg>
        </div>
        <h3>Discussion Forums</h3>
        <p>Threaded discussions, categories, and rich text editing.</p>
    </div>
    <div class="feature-item">
        <div class="feature-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
            </svg>
        </div>
        <h3>Real-time Notifications</h3>
        <p>Instant notifications for mentions, replies, and activity.</p>
    </div>
    <div class="feature-item">
        <div class="feature-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
        </div>
        <h3>Admin Panel</h3>
        <p>Comprehensive dashboard for managing your entire community.</p>
    </div>
</div>

<h2>Architecture Overview</h2>

<p>SocialApparatus is built on the TALL stack, a modern Laravel architecture that provides reactivity without the complexity of a full JavaScript framework:</p>

<table>
    <thead>
        <tr>
            <th>Technology</th>
            <th>Purpose</th>
            <th>Version</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><strong>Tailwind CSS</strong></td>
            <td>Utility-first CSS framework for rapid UI development</td>
            <td>3.x</td>
        </tr>
        <tr>
            <td><strong>Alpine.js</strong></td>
            <td>Lightweight JavaScript for interactivity</td>
            <td>3.x</td>
        </tr>
        <tr>
            <td><strong>Laravel</strong></td>
            <td>PHP framework providing the backend foundation</td>
            <td>11.x / 12.x</td>
        </tr>
        <tr>
            <td><strong>Livewire</strong></td>
            <td>Full-stack framework for dynamic interfaces</td>
            <td>3.x</td>
        </tr>
    </tbody>
</table>

<h2>Core Modules</h2>

<p>SocialApparatus is organized into modular components that can be enabled or disabled based on your needs:</p>

<div class="steps">
    <div class="step">
        <div class="step-number">1</div>
        <div class="step-content">
            <h4>Authentication & Users</h4>
            <p>User registration, login, password reset, email verification, and profile management with customizable fields.</p>
        </div>
    </div>
    <div class="step">
        <div class="step-number">2</div>
        <div class="step-content">
            <h4>Groups & Communities</h4>
            <p>Create and manage groups with membership controls, group-specific discussions, and privacy settings.</p>
        </div>
    </div>
    <div class="step">
        <div class="step-number">3</div>
        <div class="step-content">
            <h4>Content & Discussions</h4>
            <p>Posts, comments, threaded replies, rich text editing with media embeds, and content moderation.</p>
        </div>
    </div>
    <div class="step">
        <div class="step-number">4</div>
        <div class="step-content">
            <h4>Social Features</h4>
            <p>Friend connections, following, likes, bookmarks, and activity feeds.</p>
        </div>
    </div>
    <div class="step">
        <div class="step-number">5</div>
        <div class="step-content">
            <h4>Messaging</h4>
            <p>Private messaging between users with real-time updates and conversation threads.</p>
        </div>
    </div>
    <div class="step">
        <div class="step-number">6</div>
        <div class="step-content">
            <h4>Admin Dashboard</h4>
            <p>User management, content moderation, site settings, and analytics.</p>
        </div>
    </div>
</div>

<h2>Live Demo</h2>

<p>See SocialApparatus in action at our demo site:</p>

<div class="callout callout-success">
    <strong>Demo Site:</strong> <a href="https://community.socialapparatus.com" target="_blank">community.socialapparatus.com</a><br>
    <small>Username: demo@example.com | Password: password</small>
</div>

<h2>Getting Help</h2>

<p>If you run into issues or have questions:</p>

<ul>
    <li><strong>GitHub Issues:</strong> <a href="https://github.com/mrshanebarron/socialapparatus/issues" target="_blank">Report bugs and request features</a></li>
    <li><strong>Discussions:</strong> <a href="https://github.com/mrshanebarron/socialapparatus/discussions" target="_blank">Ask questions and share ideas</a></li>
    <li><strong>Documentation:</strong> You're here! Browse the sidebar for detailed guides.</li>
</ul>

<h2>Next Steps</h2>

<p>Ready to get started? Follow these guides in order:</p>

<ol>
    <li><a href="{{ route('docs.installation') }}">Installation</a> - Set up SocialApparatus on your server</li>
    <li><a href="{{ route('docs.configuration') }}">Configuration</a> - Customize settings for your community</li>
    <li><a href="{{ route('docs.features') }}">Features</a> - Explore all available features</li>
    <li><a href="{{ route('docs.theming') }}">Theming</a> - Customize the look and feel</li>
</ol>
@endsection
