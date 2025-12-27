<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - SocialApparatus Documentation</title>
    <meta name="description" content="@yield('description', 'Comprehensive documentation for SocialApparatus - the self-hosted social networking platform.')">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-deep: #0a0a0f;
            --bg-primary: #0f0f17;
            --bg-elevated: #16161f;
            --bg-surface: #1c1c28;
            --border-subtle: rgba(255,255,255,0.06);
            --border-default: rgba(255,255,255,0.1);
            --text-primary: #ffffff;
            --text-secondary: rgba(255,255,255,0.7);
            --text-muted: rgba(255,255,255,0.5);
            --accent: #a78bfa;
            --accent-light: #c4b5fd;
            --sky: #38bdf8;
            --emerald: #34d399;
            --amber: #fbbf24;
            --rose: #fb7185;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--bg-deep);
            color: var(--text-primary);
            line-height: 1.7;
            min-height: 100vh;
        }

        .docs-layout {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .docs-sidebar {
            width: 280px;
            background: var(--bg-primary);
            border-right: 1px solid var(--border-subtle);
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            overflow-y: auto;
            padding: 24px 0;
        }

        .sidebar-logo {
            padding: 0 24px 24px;
            border-bottom: 1px solid var(--border-subtle);
            margin-bottom: 24px;
        }

        .sidebar-logo a {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: var(--text-primary);
        }

        .sidebar-logo svg {
            width: 32px;
            height: 32px;
        }

        .sidebar-logo span {
            font-weight: 600;
            font-size: 1.1rem;
        }

        .sidebar-nav {
            padding: 0 12px;
        }

        .nav-section {
            margin-bottom: 24px;
        }

        .nav-section-title {
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-muted);
            padding: 0 12px;
            margin-bottom: 8px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            color: var(--text-secondary);
            text-decoration: none;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.2s;
        }

        .nav-link:hover {
            background: var(--bg-elevated);
            color: var(--text-primary);
        }

        .nav-link.active {
            background: var(--accent);
            color: var(--bg-deep);
            font-weight: 500;
        }

        .nav-link svg {
            width: 18px;
            height: 18px;
            opacity: 0.7;
        }

        .nav-link.active svg {
            opacity: 1;
        }

        /* Main Content */
        .docs-main {
            flex: 1;
            margin-left: 280px;
            min-height: 100vh;
        }

        .docs-header {
            position: sticky;
            top: 0;
            background: rgba(10, 10, 15, 0.9);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border-subtle);
            padding: 16px 48px;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .docs-header-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .version-badge {
            background: var(--bg-elevated);
            border: 1px solid var(--border-default);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        .docs-header-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .github-link {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.2s;
        }

        .github-link:hover {
            color: var(--text-primary);
        }

        .github-link svg {
            width: 20px;
            height: 20px;
        }

        .docs-content {
            max-width: 900px;
            padding: 48px;
        }

        /* Typography */
        .docs-content h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 16px;
            letter-spacing: -0.02em;
        }

        .docs-content h2 {
            font-size: 1.75rem;
            font-weight: 600;
            margin: 48px 0 24px;
            padding-top: 24px;
            border-top: 1px solid var(--border-subtle);
            letter-spacing: -0.01em;
        }

        .docs-content h2:first-of-type {
            margin-top: 32px;
            border-top: none;
            padding-top: 0;
        }

        .docs-content h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin: 32px 0 16px;
            color: var(--text-primary);
        }

        .docs-content h4 {
            font-size: 1rem;
            font-weight: 600;
            margin: 24px 0 12px;
            color: var(--text-secondary);
        }

        .docs-content p {
            color: var(--text-secondary);
            margin-bottom: 16px;
        }

        .docs-content .lead {
            font-size: 1.2rem;
            color: var(--text-secondary);
            margin-bottom: 32px;
        }

        .docs-content a {
            color: var(--accent-light);
            text-decoration: none;
        }

        .docs-content a:hover {
            text-decoration: underline;
        }

        .docs-content ul, .docs-content ol {
            margin: 0 0 24px 24px;
            color: var(--text-secondary);
        }

        .docs-content li {
            margin-bottom: 8px;
        }

        .docs-content li strong {
            color: var(--text-primary);
        }

        /* Code blocks */
        .docs-content code {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.9em;
            background: var(--bg-elevated);
            padding: 2px 6px;
            border-radius: 4px;
            color: var(--accent-light);
        }

        .docs-content pre {
            background: var(--bg-surface);
            border: 1px solid var(--border-subtle);
            border-radius: 12px;
            padding: 20px 24px;
            overflow-x: auto;
            margin: 24px 0;
        }

        .docs-content pre code {
            background: transparent;
            padding: 0;
            font-size: 0.9rem;
            line-height: 1.6;
            color: var(--text-secondary);
        }

        .code-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: var(--bg-elevated);
            border: 1px solid var(--border-subtle);
            border-bottom: none;
            border-radius: 12px 12px 0 0;
            padding: 12px 20px;
            margin-top: 24px;
        }

        .code-header + pre {
            margin-top: 0;
            border-radius: 0 0 12px 12px;
        }

        .code-lang {
            font-size: 0.8rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Callouts */
        .callout {
            padding: 20px 24px;
            border-radius: 12px;
            margin: 24px 0;
            border-left: 4px solid;
        }

        .callout-info {
            background: rgba(56, 189, 248, 0.1);
            border-color: var(--sky);
        }

        .callout-warning {
            background: rgba(251, 191, 36, 0.1);
            border-color: var(--amber);
        }

        .callout-danger {
            background: rgba(251, 113, 133, 0.1);
            border-color: var(--rose);
        }

        .callout-success {
            background: rgba(52, 211, 153, 0.1);
            border-color: var(--emerald);
        }

        .callout-title {
            font-weight: 600;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .callout-info .callout-title { color: var(--sky); }
        .callout-warning .callout-title { color: var(--amber); }
        .callout-danger .callout-title { color: var(--rose); }
        .callout-success .callout-title { color: var(--emerald); }

        .callout p:last-child {
            margin-bottom: 0;
        }

        /* Tables */
        .docs-content table {
            width: 100%;
            border-collapse: collapse;
            margin: 24px 0;
        }

        .docs-content th, .docs-content td {
            text-align: left;
            padding: 12px 16px;
            border-bottom: 1px solid var(--border-subtle);
        }

        .docs-content th {
            font-weight: 600;
            color: var(--text-primary);
            background: var(--bg-elevated);
        }

        .docs-content tr:first-child th:first-child {
            border-radius: 8px 0 0 0;
        }

        .docs-content tr:first-child th:last-child {
            border-radius: 0 8px 0 0;
        }

        .docs-content td {
            color: var(--text-secondary);
        }

        /* Feature grid */
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin: 24px 0;
        }

        .feature-card {
            background: var(--bg-elevated);
            border: 1px solid var(--border-subtle);
            border-radius: 12px;
            padding: 24px;
        }

        .feature-card h4 {
            margin: 0 0 8px;
            color: var(--text-primary);
        }

        .feature-card p {
            margin: 0;
            font-size: 0.95rem;
        }

        /* Steps */
        .steps {
            counter-reset: step-counter;
            margin: 24px 0;
        }

        .step {
            position: relative;
            padding-left: 48px;
            padding-bottom: 32px;
            border-left: 2px solid var(--border-subtle);
            margin-left: 16px;
        }

        .step:last-child {
            border-left-color: transparent;
            padding-bottom: 0;
        }

        .step::before {
            counter-increment: step-counter;
            content: counter(step-counter);
            position: absolute;
            left: -17px;
            width: 32px;
            height: 32px;
            background: var(--accent);
            color: var(--bg-deep);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .step h4 {
            margin: 0 0 12px;
        }

        .step p {
            margin-bottom: 12px;
        }

        /* Footer nav */
        .docs-footer-nav {
            display: flex;
            justify-content: space-between;
            margin-top: 64px;
            padding-top: 32px;
            border-top: 1px solid var(--border-subtle);
        }

        .footer-nav-link {
            display: flex;
            flex-direction: column;
            gap: 4px;
            padding: 16px 24px;
            background: var(--bg-elevated);
            border: 1px solid var(--border-subtle);
            border-radius: 12px;
            text-decoration: none;
            transition: all 0.2s;
            max-width: 45%;
        }

        .footer-nav-link:hover {
            border-color: var(--accent);
            transform: translateY(-2px);
        }

        .footer-nav-link.prev {
            align-items: flex-start;
        }

        .footer-nav-link.next {
            align-items: flex-end;
            margin-left: auto;
        }

        .footer-nav-label {
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        .footer-nav-title {
            color: var(--text-primary);
            font-weight: 500;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .docs-sidebar {
                transform: translateX(-100%);
                z-index: 200;
            }

            .docs-main {
                margin-left: 0;
            }

            .docs-content {
                padding: 32px 24px;
            }

            .feature-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="docs-layout">
        <!-- Sidebar -->
        <aside class="docs-sidebar">
            <div class="sidebar-logo">
                <a href="/">
                    <svg viewBox="0 0 32 32" fill="none">
                        <circle cx="16" cy="16" r="14" stroke="url(#logo-gradient)" stroke-width="2"/>
                        <circle cx="16" cy="12" r="4" fill="url(#logo-gradient)"/>
                        <path d="M8 24c0-4.4 3.6-8 8-8s8 3.6 8 8" stroke="url(#logo-gradient)" stroke-width="2" stroke-linecap="round"/>
                        <defs>
                            <linearGradient id="logo-gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#a78bfa"/>
                                <stop offset="100%" stop-color="#38bdf8"/>
                            </linearGradient>
                        </defs>
                    </svg>
                    <span>SocialApparatus</span>
                </a>
            </div>

            <nav class="sidebar-nav">
                <div class="nav-section">
                    <div class="nav-section-title">Getting Started</div>
                    <a href="/docs" class="nav-link {{ request()->is('docs') ? 'active' : '' }}">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        Introduction
                    </a>
                    <a href="/docs/installation" class="nav-link {{ request()->is('docs/installation') ? 'active' : '' }}">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        Installation
                    </a>
                    <a href="/docs/configuration" class="nav-link {{ request()->is('docs/configuration') ? 'active' : '' }}">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Configuration
                    </a>
                </div>

                <div class="nav-section">
                    <div class="nav-section-title">Core Concepts</div>
                    <a href="/docs/features" class="nav-link {{ request()->is('docs/features') ? 'active' : '' }}">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                        Features
                    </a>
                    <a href="/docs/admin" class="nav-link {{ request()->is('docs/admin') ? 'active' : '' }}">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        Admin Panel
                    </a>
                    <a href="/docs/theming" class="nav-link {{ request()->is('docs/theming') ? 'active' : '' }}">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>
                        Theming
                    </a>
                </div>

                <div class="nav-section">
                    <div class="nav-section-title">Advanced</div>
                    <a href="/docs/api" class="nav-link {{ request()->is('docs/api') ? 'active' : '' }}">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                        API Reference
                    </a>
                    <a href="/docs/deployment" class="nav-link {{ request()->is('docs/deployment') ? 'active' : '' }}">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/></svg>
                        Deployment
                    </a>
                    <a href="/docs/contributing" class="nav-link {{ request()->is('docs/contributing') ? 'active' : '' }}">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        Contributing
                    </a>
                </div>

                <div class="nav-section">
                    <div class="nav-section-title">Resources</div>
                    <a href="https://community.socialapparatus.com" target="_blank" class="nav-link">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                        Live Demo
                    </a>
                    <a href="https://github.com/mrshanebarron/socialapparatus" target="_blank" class="nav-link">
                        <svg fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                        GitHub
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="docs-main">
            <header class="docs-header">
                <div class="docs-header-left">
                    <span class="version-badge">v1.0.0-beta</span>
                </div>
                <div class="docs-header-right">
                    <a href="https://github.com/mrshanebarron/socialapparatus" target="_blank" class="github-link">
                        <svg fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                        Star on GitHub
                    </a>
                </div>
            </header>

            <article class="docs-content">
                @yield('content')
            </article>
        </main>
    </div>
</body>
</html>
