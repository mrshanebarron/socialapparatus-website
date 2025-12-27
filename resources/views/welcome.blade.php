<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SocialApparatus - Self-Hosted Social Network Platform</title>
    <meta name="description" content="Build your own social network with SocialApparatus. A powerful, self-hosted platform with all the features of major social networks. Open source and customizable.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-deep: #0a0a0f;
            --bg-primary: #0f0f17;
            --bg-elevated: #16161f;
            --bg-surface: #1c1c28;
            --border-subtle: rgba(255,255,255,0.06);
            --border-medium: rgba(255,255,255,0.1);
            --text-primary: #ffffff;
            --text-secondary: #a0a0b0;
            --text-muted: #6b6b7b;
            --accent: #8b5cf6;
            --accent-light: #a78bfa;
            --emerald: #34d399;
            --sky: #38bdf8;
            --rose: #fb7185;
            --amber: #fbbf24;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--bg-deep);
            color: var(--text-primary);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Background Effects */
        .bg-gradient {
            position: fixed;
            inset: 0;
            background:
                radial-gradient(ellipse 80% 50% at 50% -20%, rgba(139, 92, 246, 0.15), transparent),
                radial-gradient(ellipse 60% 40% at 100% 50%, rgba(56, 189, 248, 0.08), transparent),
                radial-gradient(ellipse 60% 40% at 0% 80%, rgba(251, 113, 133, 0.08), transparent);
            pointer-events: none;
            z-index: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
            position: relative;
            z-index: 1;
        }

        /* Navigation */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            padding: 20px 0;
            background: rgba(10, 10, 15, 0.8);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border-subtle);
        }

        nav .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--accent), var(--sky));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-links {
            display: flex;
            gap: 40px;
            list-style: none;
        }

        .nav-links a {
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.95rem;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: var(--text-primary);
        }

        .nav-cta {
            display: flex;
            gap: 16px;
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            border-radius: 12px;
            font-size: 0.95rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s;
            cursor: pointer;
            border: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--accent), #7c3aed);
            color: white;
            box-shadow: 0 4px 20px rgba(139, 92, 246, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(139, 92, 246, 0.4);
        }

        .btn-outline {
            background: transparent;
            color: var(--text-primary);
            border: 1px solid var(--border-medium);
        }

        .btn-outline:hover {
            background: var(--bg-elevated);
            border-color: var(--accent);
        }

        .btn-lg {
            padding: 16px 32px;
            font-size: 1.05rem;
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 140px 0 100px;
            position: relative;
        }

        .hero-content {
            max-width: 800px;
            text-align: center;
            margin: 0 auto;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background: var(--bg-elevated);
            border: 1px solid var(--border-subtle);
            border-radius: 100px;
            font-size: 0.85rem;
            color: var(--text-secondary);
            margin-bottom: 32px;
        }

        .hero-badge .dot {
            width: 8px;
            height: 8px;
            background: var(--emerald);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(3rem, 8vw, 5rem);
            font-weight: 400;
            line-height: 1.1;
            margin-bottom: 24px;
            letter-spacing: -0.02em;
        }

        .hero h1 em {
            font-style: italic;
            background: linear-gradient(135deg, var(--accent), var(--sky));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero p {
            font-size: 1.25rem;
            color: var(--text-secondary);
            max-width: 600px;
            margin: 0 auto 40px;
            line-height: 1.8;
        }

        .hero-buttons {
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .hero-stats {
            display: flex;
            gap: 60px;
            justify-content: center;
            margin-top: 80px;
            padding-top: 40px;
            border-top: 1px solid var(--border-subtle);
        }

        .hero-stat {
            text-align: center;
        }

        .hero-stat-value {
            font-size: 2.5rem;
            font-weight: 600;
            background: linear-gradient(135deg, var(--text-primary), var(--text-secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-stat-label {
            font-size: 0.9rem;
            color: var(--text-muted);
            margin-top: 4px;
        }

        /* Section Styles */
        .section {
            padding: 120px 0;
            position: relative;
        }

        .section-label {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: var(--accent);
            margin-bottom: 16px;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 5vw, 3.5rem);
            font-weight: 400;
            margin-bottom: 20px;
            letter-spacing: -0.02em;
        }

        .section-title em {
            font-style: italic;
            color: var(--text-secondary);
        }

        .section-desc {
            font-size: 1.15rem;
            color: var(--text-secondary);
            max-width: 600px;
            line-height: 1.8;
        }

        .section-header {
            text-align: center;
            margin-bottom: 80px;
        }

        .section-header .section-desc {
            margin: 0 auto;
        }

        /* Features Grid */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .feature-card {
            background: var(--bg-elevated);
            border: 1px solid var(--border-subtle);
            border-radius: 20px;
            padding: 32px;
            transition: all 0.3s;
        }

        .feature-card:hover {
            border-color: var(--accent);
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
        }

        .feature-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, var(--accent), var(--sky));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .feature-icon svg {
            width: 24px;
            height: 24px;
            stroke: white;
            fill: none;
            stroke-width: 2;
        }

        .feature-card h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .feature-card p {
            color: var(--text-secondary);
            font-size: 0.95rem;
            line-height: 1.7;
        }

        /* Feature Categories */
        .feature-category {
            margin-bottom: 100px;
        }

        .feature-category:last-child {
            margin-bottom: 0;
        }

        .category-header {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 40px;
        }

        .category-icon {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .category-icon svg {
            width: 28px;
            height: 28px;
            stroke: white;
            fill: none;
            stroke-width: 2;
        }

        .category-icon.purple { background: linear-gradient(135deg, #8b5cf6, #7c3aed); }
        .category-icon.blue { background: linear-gradient(135deg, #38bdf8, #0ea5e9); }
        .category-icon.green { background: linear-gradient(135deg, #34d399, #10b981); }
        .category-icon.rose { background: linear-gradient(135deg, #fb7185, #f43f5e); }
        .category-icon.amber { background: linear-gradient(135deg, #fbbf24, #f59e0b); }

        .category-title {
            font-size: 1.5rem;
            font-weight: 600;
        }

        .category-subtitle {
            color: var(--text-muted);
            font-size: 0.95rem;
        }

        /* Comparison Section */
        .comparison {
            background: var(--bg-primary);
            border-radius: 24px;
            padding: 60px;
            border: 1px solid var(--border-subtle);
        }

        .comparison-grid {
            display: grid;
            grid-template-columns: 2fr repeat(3, 1fr);
            gap: 1px;
            background: var(--border-subtle);
            border-radius: 16px;
            overflow: hidden;
        }

        .comparison-cell {
            background: var(--bg-elevated);
            padding: 20px 24px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .comparison-cell.header {
            background: var(--bg-surface);
            font-weight: 600;
            font-size: 0.95rem;
        }

        .comparison-cell.feature {
            justify-content: flex-start;
            color: var(--text-secondary);
        }

        .comparison-cell.highlight {
            background: rgba(139, 92, 246, 0.1);
        }

        .check {
            width: 24px;
            height: 24px;
            background: var(--emerald);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .check svg {
            width: 14px;
            height: 14px;
            stroke: white;
            stroke-width: 3;
        }

        .cross {
            width: 24px;
            height: 24px;
            background: var(--bg-surface);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cross svg {
            width: 12px;
            height: 12px;
            stroke: var(--text-muted);
            stroke-width: 3;
        }

        /* Demo Section */
        .demo-section {
            text-align: center;
        }

        .demo-browser {
            max-width: 1000px;
            margin: 60px auto 0;
            background: var(--bg-elevated);
            border: 1px solid var(--border-subtle);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 40px 80px rgba(0,0,0,0.4);
        }

        .demo-browser-header {
            padding: 16px 20px;
            background: var(--bg-surface);
            border-bottom: 1px solid var(--border-subtle);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .demo-browser-dots {
            display: flex;
            gap: 8px;
        }

        .demo-browser-dots span {
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }

        .demo-browser-dots span:nth-child(1) { background: #ff5f57; }
        .demo-browser-dots span:nth-child(2) { background: #ffbd2e; }
        .demo-browser-dots span:nth-child(3) { background: #28ca42; }

        .demo-browser-url {
            flex: 1;
            background: var(--bg-elevated);
            border-radius: 8px;
            padding: 8px 16px;
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        .demo-browser-content {
            aspect-ratio: 16/9;
            background: linear-gradient(135deg, var(--bg-deep), var(--bg-primary));
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 20px;
        }

        .demo-browser-content p {
            color: var(--text-secondary);
        }

        /* CTA Section */
        .cta-section {
            text-align: center;
            padding: 160px 0;
        }

        .cta-box {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.1), rgba(56, 189, 248, 0.1));
            border: 1px solid var(--border-subtle);
            border-radius: 32px;
            padding: 80px;
        }

        .cta-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 400;
            margin-bottom: 20px;
        }

        .cta-title em {
            font-style: italic;
            color: var(--accent-light);
        }

        .cta-desc {
            font-size: 1.2rem;
            color: var(--text-secondary);
            max-width: 600px;
            margin: 0 auto 40px;
        }

        .cta-buttons {
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
        }

        /* Footer */
        footer {
            border-top: 1px solid var(--border-subtle);
            padding: 60px 0;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer-logo {
            font-size: 1.25rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--accent), var(--sky));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .footer-links {
            display: flex;
            gap: 32px;
            list-style: none;
        }

        .footer-links a {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: var(--text-primary);
        }

        .footer-copy {
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .features-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .comparison-grid {
                grid-template-columns: 1.5fr repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            .hero h1 {
                font-size: 2.5rem;
            }
            .hero-stats {
                flex-direction: column;
                gap: 30px;
            }
            .features-grid {
                grid-template-columns: 1fr;
            }
            .comparison {
                padding: 30px;
                overflow-x: auto;
            }
            .comparison-grid {
                min-width: 600px;
            }
            .cta-box {
                padding: 40px 24px;
            }
            .footer-content {
                flex-direction: column;
                gap: 24px;
                text-align: center;
            }
        }

        /* Documentation Section */
        .docs-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .doc-card {
            background: var(--bg-elevated);
            border: 1px solid var(--border-subtle);
            border-radius: 20px;
            padding: 32px;
            transition: all 0.3s;
        }

        .doc-card:hover {
            border-color: var(--accent);
            transform: translateY(-4px);
        }

        .doc-card-icon {
            width: 48px;
            height: 48px;
            background: var(--bg-surface);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .doc-card-icon svg {
            width: 24px;
            height: 24px;
            stroke: var(--accent);
            fill: none;
            stroke-width: 2;
        }

        .doc-card h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .doc-card p {
            color: var(--text-secondary);
            font-size: 0.95rem;
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .doc-card ul {
            list-style: none;
            margin-bottom: 24px;
        }

        .doc-card ul li {
            color: var(--text-muted);
            font-size: 0.9rem;
            padding: 8px 0;
            border-bottom: 1px solid var(--border-subtle);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .doc-card ul li:last-child {
            border-bottom: none;
        }

        .doc-card ul li svg {
            width: 16px;
            height: 16px;
            stroke: var(--emerald);
            flex-shrink: 0;
        }

        .doc-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--accent-light);
            font-size: 0.9rem;
            font-weight: 500;
            text-decoration: none;
            transition: gap 0.3s;
        }

        .doc-link:hover {
            gap: 12px;
        }

        .doc-link svg {
            width: 16px;
            height: 16px;
            stroke: currentColor;
        }

        /* Requirements List */
        .requirements-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-top: 60px;
            padding: 40px;
            background: var(--bg-elevated);
            border: 1px solid var(--border-subtle);
            border-radius: 20px;
        }

        .requirement-item {
            text-align: center;
            padding: 24px;
        }

        .requirement-icon {
            width: 56px;
            height: 56px;
            margin: 0 auto 16px;
            background: var(--bg-surface);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .requirement-icon svg {
            width: 28px;
            height: 28px;
        }

        .requirement-name {
            font-weight: 600;
            margin-bottom: 4px;
        }

        .requirement-version {
            color: var(--text-muted);
            font-size: 0.85rem;
        }

        /* Code Block */
        .code-block {
            background: var(--bg-surface);
            border: 1px solid var(--border-subtle);
            border-radius: 12px;
            padding: 24px;
            margin-top: 40px;
            overflow-x: auto;
        }

        .code-block pre {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.9rem;
            color: var(--text-secondary);
            margin: 0;
            line-height: 1.8;
        }

        .code-block .comment { color: var(--text-muted); }
        .code-block .command { color: var(--emerald); }
        .code-block .output { color: var(--text-muted); font-style: italic; }

        @media (max-width: 1024px) {
            .docs-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .requirements-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .docs-grid {
                grid-template-columns: 1fr;
            }
            .requirements-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Animations */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <div class="bg-gradient"></div>

    <!-- Navigation -->
    <nav>
        <div class="container">
            <div class="logo">SocialApparatus</div>
            <ul class="nav-links">
                <li><a href="#features">Features</a></li>
                <li><a href="#docs">Documentation</a></li>
                <li><a href="#comparison">Compare</a></li>
                <li><a href="#demo">Demo</a></li>
                <li><a href="https://github.com/mrshanebarron/socialapparatus" target="_blank">GitHub</a></li>
            </ul>
            <div class="nav-cta">
                <a href="https://community.socialapparatus.com" class="btn btn-outline" target="_blank">Live Demo</a>
                <a href="https://github.com/mrshanebarron/socialapparatus" class="btn btn-primary" target="_blank">Get Started</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content reveal">
                <div class="hero-badge">
                    <span class="dot"></span>
                    Open Source & Self-Hosted
                </div>
                <h1>Build your own <em>social network</em></h1>
                <p>A powerful, feature-complete social networking platform. Self-hosted, open source, and fully customizable. Everything you need to create the next big community.</p>
                <div class="hero-buttons">
                    <a href="https://community.socialapparatus.com" class="btn btn-primary btn-lg" target="_blank">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polygon points="10 8 16 12 10 16 10 8"/></svg>
                        Try Live Demo
                    </a>
                    <a href="https://github.com/mrshanebarron/socialapparatus" class="btn btn-outline btn-lg" target="_blank">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                        View on GitHub
                    </a>
                </div>
                <div class="hero-stats">
                    <div class="hero-stat">
                        <div class="hero-stat-value">140+</div>
                        <div class="hero-stat-label">Features</div>
                    </div>
                    <div class="hero-stat">
                        <div class="hero-stat-value">100%</div>
                        <div class="hero-stat-label">Open Source</div>
                    </div>
                    <div class="hero-stat">
                        <div class="hero-stat-value">$0</div>
                        <div class="hero-stat-label">License Cost</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="section" id="features">
        <div class="container">
            <div class="section-header reveal">
                <div class="section-label">Features</div>
                <h2 class="section-title">Everything you need to build a <em>thriving community</em></h2>
                <p class="section-desc">More features than Facebook, Instagram, and Twitter combined. All in one self-hosted package.</p>
            </div>

            <!-- Social & Feed -->
            <div class="feature-category reveal">
                <div class="category-header">
                    <div class="category-icon purple">
                        <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    </div>
                    <div>
                        <h3 class="category-title">Social & Feed</h3>
                        <p class="category-subtitle">The core social experience</p>
                    </div>
                </div>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/></svg>
                        </div>
                        <h3>Rich Post Types</h3>
                        <p>Text, photos, videos, polls, links with previews, location check-ins, feelings, and activities. Express yourself fully.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                        </div>
                        <h3>Threaded Comments</h3>
                        <p>Nested comment threads with reactions, likes, and replies. Full conversation support on every post.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>
                        </div>
                        <h3>Emoji Reactions</h3>
                        <p>Go beyond simple likes. React with a full range of emotions to posts, comments, and messages.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/></svg>
                        </div>
                        <h3>Post Sharing</h3>
                        <p>Share posts with your own commentary. Full resharing support with original post attribution.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        </div>
                        <h3>Stories</h3>
                        <p>24-hour ephemeral content with polls, quizzes, Q&A, and more. Create highlights to keep your best moments.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                        </div>
                        <h3>Saved Posts</h3>
                        <p>Bookmark posts to revisit later. Organize saves into collections for easy access.</p>
                    </div>
                </div>
            </div>

            <!-- Messaging -->
            <div class="feature-category reveal">
                <div class="category-header">
                    <div class="category-icon blue">
                        <svg viewBox="0 0 24 24"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                    </div>
                    <div>
                        <h3 class="category-title">Messaging</h3>
                        <p class="category-subtitle">Real-time communication</p>
                    </div>
                </div>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                        </div>
                        <h3>Direct Messages</h3>
                        <p>Private 1:1 conversations with message reactions and read receipts.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        </div>
                        <h3>Group Chats</h3>
                        <p>Create group conversations with multiple participants. Perfect for teams and friend groups.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
                        </div>
                        <h3>Real-time Updates</h3>
                        <p>Instant message delivery with live typing indicators and online status.</p>
                    </div>
                </div>
            </div>

            <!-- Groups & Communities -->
            <div class="feature-category reveal">
                <div class="category-header">
                    <div class="category-icon green">
                        <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    </div>
                    <div>
                        <h3 class="category-title">Groups & Communities</h3>
                        <p class="category-subtitle">Build and manage communities</p>
                    </div>
                </div>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        </div>
                        <h3>Privacy Options</h3>
                        <p>Public, private, or secret groups. Control who can find and join your community.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><polyline points="17 11 19 13 23 9"/></svg>
                        </div>
                        <h3>Role Management</h3>
                        <p>Admins, moderators, and members. Delegate responsibilities with granular permissions.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/></svg>
                        </div>
                        <h3>Group Feed</h3>
                        <p>Dedicated activity feed for each group. Keep discussions organized and on-topic.</p>
                    </div>
                </div>
            </div>

            <!-- Content Types -->
            <div class="feature-category reveal">
                <div class="category-header">
                    <div class="category-icon rose">
                        <svg viewBox="0 0 24 24"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2" ry="2"/></svg>
                    </div>
                    <div>
                        <h3 class="category-title">Content Types</h3>
                        <p class="category-subtitle">Beyond simple posts</p>
                    </div>
                </div>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        </div>
                        <h3>Events</h3>
                        <p>Create events with RSVP, tickets, waitlists, and reminders. Full event management system.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                        </div>
                        <h3>Marketplace</h3>
                        <p>Buy and sell within your community. Categories, conditions, pricing, and local listings.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                        </div>
                        <h3>Blog & Articles</h3>
                        <p>Long-form content publishing. Write articles, tutorials, and blog posts.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                        </div>
                        <h3>Fundraisers</h3>
                        <p>Create fundraising campaigns. Track donations and progress towards your goal.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                        </div>
                        <h3>Q&A / AMA</h3>
                        <p>Ask and answer questions. Support for anonymous questions and profile Q&A.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                        </div>
                        <h3>Watch Parties</h3>
                        <p>Watch videos together in sync. Real-time chat while watching with friends.</p>
                    </div>
                </div>
            </div>

            <!-- Monetization -->
            <div class="feature-category reveal">
                <div class="category-header">
                    <div class="category-icon amber">
                        <svg viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                    </div>
                    <div>
                        <h3 class="category-title">Monetization</h3>
                        <p class="category-subtitle">Generate revenue from your platform</p>
                    </div>
                </div>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        </div>
                        <h3>Virtual Coins</h3>
                        <p>Built-in virtual currency system. Users can purchase coins and spend them on features.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        </div>
                        <h3>Virtual Gifts</h3>
                        <p>Send gifts to creators and friends. A fun way to support community members.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        </div>
                        <h3>Verification</h3>
                        <p>User verification system with ID verification support. Build trust in your community.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Documentation Section -->
    <section class="section" id="docs">
        <div class="container">
            <div class="section-header reveal">
                <div class="section-label">Documentation</div>
                <h2 class="section-title">Everything you need to <em>get started</em></h2>
                <p class="section-desc">Comprehensive guides, API documentation, and tutorials to help you build your community.</p>
            </div>

            <div class="docs-grid reveal">
                <div class="doc-card">
                    <div class="doc-card-icon">
                        <svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                    </div>
                    <h3>Getting Started</h3>
                    <p>Quick start guide to get your community up and running in minutes.</p>
                    <ul>
                        <li><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Installation walkthrough</li>
                        <li><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Web-based installer wizard</li>
                        <li><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Database configuration</li>
                        <li><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Admin account setup</li>
                    </ul>
                    <a href="https://github.com/mrshanebarron/socialapparatus#installation" class="doc-link" target="_blank">
                        Read the guide
                        <svg viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </a>
                </div>

                <div class="doc-card">
                    <div class="doc-card-icon">
                        <svg viewBox="0 0 24 24"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                    </div>
                    <h3>Configuration</h3>
                    <p>Customize every aspect of your social network to match your vision.</p>
                    <ul>
                        <li><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Environment settings</li>
                        <li><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Feature toggles</li>
                        <li><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Mail & queue setup</li>
                        <li><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Storage configuration</li>
                    </ul>
                    <a href="https://github.com/mrshanebarron/socialapparatus#configuration" class="doc-link" target="_blank">
                        View options
                        <svg viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </a>
                </div>

                <div class="doc-card">
                    <div class="doc-card-icon">
                        <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/></svg>
                    </div>
                    <h3>Admin Panel</h3>
                    <p>Manage users, content, and settings from a powerful admin dashboard.</p>
                    <ul>
                        <li><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> User management</li>
                        <li><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Content moderation</li>
                        <li><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Analytics & reports</li>
                        <li><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Role permissions</li>
                    </ul>
                    <a href="https://github.com/mrshanebarron/socialapparatus#admin" class="doc-link" target="_blank">
                        Learn more
                        <svg viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </a>
                </div>

                <div class="doc-card">
                    <div class="doc-card-icon">
                        <svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    </div>
                    <h3>Security</h3>
                    <p>Built-in security features to protect your community and users.</p>
                    <ul>
                        <li><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Two-factor authentication</li>
                        <li><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Session management</li>
                        <li><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> API token security</li>
                        <li><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Privacy controls</li>
                    </ul>
                    <a href="https://github.com/mrshanebarron/socialapparatus#security" class="doc-link" target="_blank">
                        Security guide
                        <svg viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </a>
                </div>

                <div class="doc-card">
                    <div class="doc-card-icon">
                        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                    </div>
                    <h3>API Reference</h3>
                    <p>Build integrations with our RESTful API and webhook support.</p>
                    <ul>
                        <li><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> RESTful endpoints</li>
                        <li><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Token authentication</li>
                        <li><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Webhook events</li>
                        <li><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Rate limiting</li>
                    </ul>
                    <a href="https://github.com/mrshanebarron/socialapparatus#api" class="doc-link" target="_blank">
                        API docs
                        <svg viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </a>
                </div>

                <div class="doc-card">
                    <div class="doc-card-icon">
                        <svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg>
                    </div>
                    <h3>Deployment</h3>
                    <p>Production-ready deployment guides for any hosting environment.</p>
                    <ul>
                        <li><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Server requirements</li>
                        <li><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> SSL/HTTPS setup</li>
                        <li><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Queue workers</li>
                        <li><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Redis & caching</li>
                    </ul>
                    <a href="https://github.com/mrshanebarron/socialapparatus#deployment" class="doc-link" target="_blank">
                        Deploy now
                        <svg viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </a>
                </div>
            </div>

            <!-- System Requirements -->
            <div class="requirements-grid reveal">
                <div class="requirement-item">
                    <div class="requirement-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2">
                            <ellipse cx="12" cy="5" rx="9" ry="3"/>
                            <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/>
                            <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/>
                        </svg>
                    </div>
                    <div class="requirement-name">PHP</div>
                    <div class="requirement-version">8.2 or higher</div>
                </div>
                <div class="requirement-item">
                    <div class="requirement-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="var(--sky)" stroke-width="2">
                            <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                            <path d="M2 17l10 5 10-5"/>
                            <path d="M2 12l10 5 10-5"/>
                        </svg>
                    </div>
                    <div class="requirement-name">Laravel</div>
                    <div class="requirement-version">12.x</div>
                </div>
                <div class="requirement-item">
                    <div class="requirement-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="var(--emerald)" stroke-width="2">
                            <rect x="2" y="3" width="20" height="14" rx="2" ry="2"/>
                            <line x1="8" y1="21" x2="16" y2="21"/>
                            <line x1="12" y1="17" x2="12" y2="21"/>
                        </svg>
                    </div>
                    <div class="requirement-name">Database</div>
                    <div class="requirement-version">SQLite or MySQL</div>
                </div>
                <div class="requirement-item">
                    <div class="requirement-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="var(--rose)" stroke-width="2">
                            <polygon points="12 2 2 7 12 12 22 7 12 2"/>
                            <polyline points="2 17 12 22 22 17"/>
                            <polyline points="2 12 12 17 22 12"/>
                        </svg>
                    </div>
                    <div class="requirement-name">Node.js</div>
                    <div class="requirement-version">18.x or higher</div>
                </div>
            </div>

            <!-- Quick Install -->
            <div class="code-block reveal">
                <pre><span class="comment"># Clone the repository</span>
<span class="command">git clone https://github.com/mrshanebarron/socialapparatus.git</span>
<span class="command">cd socialapparatus</span>

<span class="comment"># Install dependencies</span>
<span class="command">composer install</span>
<span class="command">npm install && npm run build</span>

<span class="comment"># Start the server and visit /install</span>
<span class="command">php artisan serve</span>
<span class="output"># → Visit http://localhost:8000/install to begin setup</span></pre>
            </div>
        </div>
    </section>

    <!-- Comparison Section -->
    <section class="section" id="comparison">
        <div class="container">
            <div class="section-header reveal">
                <div class="section-label">Compare</div>
                <h2 class="section-title">Why choose <em>SocialApparatus?</em></h2>
                <p class="section-desc">See how we stack up against other social network solutions.</p>
            </div>

            <div class="comparison reveal">
                <div class="comparison-grid">
                    <div class="comparison-cell header">Feature</div>
                    <div class="comparison-cell header highlight">SocialApparatus</div>
                    <div class="comparison-cell header">BuddyPress</div>
                    <div class="comparison-cell header">Mastodon</div>

                    <div class="comparison-cell feature">Self-hosted</div>
                    <div class="comparison-cell highlight"><span class="check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span></div>
                    <div class="comparison-cell"><span class="check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span></div>
                    <div class="comparison-cell"><span class="check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span></div>

                    <div class="comparison-cell feature">Stories</div>
                    <div class="comparison-cell highlight"><span class="check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span></div>
                    <div class="comparison-cell"><span class="cross"><svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></span></div>
                    <div class="comparison-cell"><span class="cross"><svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></span></div>

                    <div class="comparison-cell feature">Marketplace</div>
                    <div class="comparison-cell highlight"><span class="check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span></div>
                    <div class="comparison-cell"><span class="cross"><svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></span></div>
                    <div class="comparison-cell"><span class="cross"><svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></span></div>

                    <div class="comparison-cell feature">Events & RSVP</div>
                    <div class="comparison-cell highlight"><span class="check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span></div>
                    <div class="comparison-cell"><span class="check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span></div>
                    <div class="comparison-cell"><span class="cross"><svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></span></div>

                    <div class="comparison-cell feature">Virtual Currency</div>
                    <div class="comparison-cell highlight"><span class="check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span></div>
                    <div class="comparison-cell"><span class="cross"><svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></span></div>
                    <div class="comparison-cell"><span class="cross"><svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></span></div>

                    <div class="comparison-cell feature">Modern UI</div>
                    <div class="comparison-cell highlight"><span class="check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span></div>
                    <div class="comparison-cell"><span class="cross"><svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></span></div>
                    <div class="comparison-cell"><span class="check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span></div>

                    <div class="comparison-cell feature">Fundraising</div>
                    <div class="comparison-cell highlight"><span class="check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span></div>
                    <div class="comparison-cell"><span class="cross"><svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></span></div>
                    <div class="comparison-cell"><span class="cross"><svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></span></div>

                    <div class="comparison-cell feature">Web Installer</div>
                    <div class="comparison-cell highlight"><span class="check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span></div>
                    <div class="comparison-cell"><span class="cross"><svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></span></div>
                    <div class="comparison-cell"><span class="cross"><svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></span></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Demo Section -->
    <section class="section demo-section" id="demo">
        <div class="container">
            <div class="section-header reveal">
                <div class="section-label">Live Demo</div>
                <h2 class="section-title">See it in <em>action</em></h2>
                <p class="section-desc">Try the full platform without installing anything. Create an account and explore all features.</p>
            </div>

            <div class="demo-browser reveal">
                <div class="demo-browser-header">
                    <div class="demo-browser-dots">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="demo-browser-url">community.socialapparatus.com</div>
                </div>
                <div class="demo-browser-content">
                    <a href="https://community.socialapparatus.com" class="btn btn-primary btn-lg" target="_blank">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polygon points="10 8 16 12 10 16 10 8"/></svg>
                        Launch Demo Site
                    </a>
                    <p>Free to explore. No credit card required.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-box reveal">
                <h2 class="cta-title">Ready to build your <em>community?</em></h2>
                <p class="cta-desc">Get started with SocialApparatus today. It's free, open source, and yours to customize.</p>
                <div class="cta-buttons">
                    <a href="https://github.com/mrshanebarron/socialapparatus" class="btn btn-primary btn-lg" target="_blank">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                        Download from GitHub
                    </a>
                    <a href="https://community.socialapparatus.com" class="btn btn-outline btn-lg" target="_blank">Try Demo First</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">SocialApparatus</div>
                <ul class="footer-links">
                    <li><a href="https://github.com/mrshanebarron/socialapparatus" target="_blank">GitHub</a></li>
                    <li><a href="https://community.socialapparatus.com" target="_blank">Demo</a></li>
                    <li><a href="#docs">Documentation</a></li>
                </ul>
                <p class="footer-copy">&copy; 2025 SocialApparatus. Open source under MIT License.</p>
            </div>
        </div>
    </footer>

    <script>
        // Reveal on scroll
        const reveals = document.querySelectorAll('.reveal');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.1 });

        reveals.forEach(el => observer.observe(el));

        // Trigger hero animation on load
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelector('.hero .reveal').classList.add('visible');
        });
    </script>
</body>
</html>
