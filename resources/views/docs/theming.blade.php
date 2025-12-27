@extends('docs.layout')

@section('title', 'Theming')

@section('docs-content')
<h1>Theming & Customization</h1>

<p class="lead">SocialApparatus is built with customization in mind. This guide covers how to customize colors, typography, layouts, and create entirely custom themes.</p>

<h2>Theme Architecture</h2>

<p>The theming system is built on:</p>

<ul>
    <li><strong>Tailwind CSS</strong> - Utility-first CSS framework</li>
    <li><strong>CSS Custom Properties</strong> - Dynamic color theming</li>
    <li><strong>Blade Components</strong> - Reusable UI elements</li>
    <li><strong>Laravel Asset Bundling</strong> - Vite for modern asset compilation</li>
</ul>

<h2>Quick Customization</h2>

<h3>Colors via CSS Variables</h3>

<p>The easiest way to customize colors is through CSS custom properties. Edit <code>resources/css/app.css</code>:</p>

<pre><code>:root {
    /* Primary Brand Colors */
    --color-primary: 59 130 246;      /* Blue */
    --color-primary-hover: 37 99 235;
    --color-primary-light: 219 234 254;

    /* Secondary Colors */
    --color-secondary: 100 116 139;   /* Slate */
    --color-accent: 168 85 247;       /* Purple */

    /* Semantic Colors */
    --color-success: 34 197 94;       /* Green */
    --color-warning: 234 179 8;       /* Yellow */
    --color-danger: 239 68 68;        /* Red */
    --color-info: 6 182 212;          /* Cyan */

    /* Background Colors */
    --color-bg-primary: 255 255 255;
    --color-bg-secondary: 248 250 252;
    --color-bg-tertiary: 241 245 249;

    /* Text Colors */
    --color-text-primary: 15 23 42;
    --color-text-secondary: 71 85 105;
    --color-text-muted: 148 163 184;

    /* Border Colors */
    --color-border: 226 232 240;
    --color-border-hover: 203 213 225;
}

/* Dark Mode */
[data-theme="dark"] {
    --color-bg-primary: 15 23 42;
    --color-bg-secondary: 30 41 59;
    --color-bg-tertiary: 51 65 85;

    --color-text-primary: 248 250 252;
    --color-text-secondary: 203 213 225;
    --color-text-muted: 100 116 139;

    --color-border: 51 65 85;
    --color-border-hover: 71 85 105;
}</code></pre>

<h3>Using Colors in Components</h3>

<pre><code>/* In your CSS */
.button-primary {
    background-color: rgb(var(--color-primary));
}

.button-primary:hover {
    background-color: rgb(var(--color-primary-hover));
}

/* Or with Tailwind's arbitrary values */
&lt;button class="bg-[rgb(var(--color-primary))]"&gt;
    Click me
&lt;/button&gt;</code></pre>

<h2>Tailwind Configuration</h2>

<h3>Extending the Theme</h3>

<p>Customize Tailwind in <code>tailwind.config.js</code>:</p>

<pre><code>/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],

    theme: {
        extend: {
            colors: {
                primary: {
                    50: '#eff6ff',
                    100: '#dbeafe',
                    200: '#bfdbfe',
                    300: '#93c5fd',
                    400: '#60a5fa',
                    500: '#3b82f6',
                    600: '#2563eb',
                    700: '#1d4ed8',
                    800: '#1e40af',
                    900: '#1e3a8a',
                },
                // Add your brand colors
                brand: {
                    light: '#your-light-color',
                    DEFAULT: '#your-brand-color',
                    dark: '#your-dark-color',
                },
            },

            fontFamily: {
                sans: ['Inter', 'system-ui', 'sans-serif'],
                heading: ['Poppins', 'system-ui', 'sans-serif'],
                mono: ['JetBrains Mono', 'monospace'],
            },

            spacing: {
                '18': '4.5rem',
                '88': '22rem',
                '128': '32rem',
            },

            borderRadius: {
                '4xl': '2rem',
            },

            boxShadow: {
                'card': '0 2px 8px -2px rgba(0, 0, 0, 0.1)',
                'card-hover': '0 8px 24px -4px rgba(0, 0, 0, 0.15)',
            },
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}</code></pre>

<h2>Typography</h2>

<h3>Adding Custom Fonts</h3>

<p>Add fonts in <code>resources/views/layouts/app.blade.php</code>:</p>

<pre><code>&lt;head&gt;
    &lt;!-- Google Fonts --&gt;
    &lt;link rel="preconnect" href="https://fonts.googleapis.com"&gt;
    &lt;link rel="preconnect" href="https://fonts.gstatic.com" crossorigin&gt;
    &lt;link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700&display=swap" rel="stylesheet"&gt;
&lt;/head&gt;</code></pre>

<h3>Typography Scale</h3>

<pre><code>/* resources/css/typography.css */

.text-display {
    font-family: var(--font-heading);
    font-size: 3.5rem;
    font-weight: 700;
    line-height: 1.1;
    letter-spacing: -0.02em;
}

.text-h1 {
    font-family: var(--font-heading);
    font-size: 2.5rem;
    font-weight: 700;
    line-height: 1.2;
}

.text-h2 {
    font-family: var(--font-heading);
    font-size: 2rem;
    font-weight: 600;
    line-height: 1.25;
}

.text-h3 {
    font-family: var(--font-heading);
    font-size: 1.5rem;
    font-weight: 600;
    line-height: 1.3;
}

.text-body {
    font-family: var(--font-sans);
    font-size: 1rem;
    line-height: 1.6;
}

.text-small {
    font-size: 0.875rem;
    line-height: 1.5;
}

.text-caption {
    font-size: 0.75rem;
    line-height: 1.4;
    color: rgb(var(--color-text-muted));
}</code></pre>

<h2>Component Customization</h2>

<h3>Blade Components</h3>

<p>Override default components by publishing and editing them:</p>

<pre><code># Publish components
php artisan vendor:publish --tag=socialapparatus-components

# Components are now in resources/views/components/</code></pre>

<h3>Button Component Example</h3>

<pre><code>&lt;!-- resources/views/components/button.blade.php --&gt;

@props([
    'variant' => 'primary',
    'size' => 'md',
    'type' => 'button',
])

@php
    $baseClasses = 'inline-flex items-center justify-center font-medium rounded-lg
                    transition-all duration-200 focus:outline-none focus:ring-2
                    focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed';

    $variants = [
        'primary' => 'bg-primary-600 text-white hover:bg-primary-700 focus:ring-primary-500',
        'secondary' => 'bg-gray-100 text-gray-900 hover:bg-gray-200 focus:ring-gray-500',
        'outline' => 'border-2 border-gray-300 text-gray-700 hover:border-gray-400 focus:ring-gray-500',
        'ghost' => 'text-gray-600 hover:bg-gray-100 focus:ring-gray-500',
        'danger' => 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-500',
    ];

    $sizes = [
        'sm' => 'px-3 py-1.5 text-sm',
        'md' => 'px-4 py-2 text-base',
        'lg' => 'px-6 py-3 text-lg',
        'xl' => 'px-8 py-4 text-xl',
    ];

    $classes = $baseClasses . ' ' . $variants[$variant] . ' ' . $sizes[$size];
@endphp

&lt;button
    type="{{ $type }}"
    {{ $attributes->merge(['class' => $classes]) }}
&gt;
    {{ $slot }}
&lt;/button&gt;

&lt;!-- Usage --&gt;
&lt;x-button variant="primary" size="lg"&gt;Click me&lt;/x-button&gt;
&lt;x-button variant="outline"&gt;Cancel&lt;/x-button&gt;
&lt;x-button variant="danger"&gt;Delete&lt;/x-button&gt;</code></pre>

<h3>Card Component Example</h3>

<pre><code>&lt;!-- resources/views/components/card.blade.php --&gt;

@props([
    'padding' => 'md',
    'shadow' => true,
    'hover' => false,
])

@php
    $paddings = [
        'none' => '',
        'sm' => 'p-4',
        'md' => 'p-6',
        'lg' => 'p-8',
    ];

    $classes = 'bg-white rounded-xl border border-gray-200 ' . $paddings[$padding];

    if ($shadow) {
        $classes .= ' shadow-card';
    }

    if ($hover) {
        $classes .= ' hover:shadow-card-hover hover:-translate-y-0.5 transition-all duration-200';
    }
@endphp

&lt;div {{ $attributes->merge(['class' => $classes]) }}&gt;
    {{ $slot }}
&lt;/div&gt;</code></pre>

<h2>Layout Customization</h2>

<h3>Main Layout</h3>

<p>Edit <code>resources/views/layouts/app.blade.php</code>:</p>

<pre><code>&lt;!DOCTYPE html&gt;
&lt;html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light"&gt;
&lt;head&gt;
    &lt;meta charset="utf-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1"&gt;
    &lt;meta name="csrf-token" content="{{ csrf_token() }}"&gt;

    &lt;title&gt;{{ $title ?? config('app.name') }}&lt;/title&gt;

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
&lt;/head&gt;
&lt;body class="min-h-screen bg-gray-50 text-gray-900 antialiased"&gt;
    &lt;!-- Navigation --&gt;
    @include('partials.navigation')

    &lt;!-- Main Content --&gt;
    &lt;main class="pt-16"&gt;
        {{ $slot }}
    &lt;/main&gt;

    &lt;!-- Footer --&gt;
    @include('partials.footer')

    @stack('scripts')
&lt;/body&gt;
&lt;/html&gt;</code></pre>

<h3>Navigation Customization</h3>

<pre><code>&lt;!-- resources/views/partials/navigation.blade.php --&gt;

&lt;nav class="fixed top-0 inset-x-0 h-16 bg-white border-b border-gray-200 z-50"&gt;
    &lt;div class="container mx-auto px-4 h-full flex items-center justify-between"&gt;
        &lt;!-- Logo --&gt;
        &lt;a href="/" class="flex items-center gap-2"&gt;
            &lt;img src="{{ asset('images/logo.svg') }}" alt="" class="h-8"&gt;
            &lt;span class="font-heading font-bold text-xl"&gt;{{ config('app.name') }}&lt;/span&gt;
        &lt;/a&gt;

        &lt;!-- Navigation Links --&gt;
        &lt;div class="hidden md:flex items-center gap-6"&gt;
            &lt;a href="/explore" class="text-gray-600 hover:text-gray-900"&gt;Explore&lt;/a&gt;
            &lt;a href="/groups" class="text-gray-600 hover:text-gray-900"&gt;Groups&lt;/a&gt;
            &lt;a href="/members" class="text-gray-600 hover:text-gray-900"&gt;Members&lt;/a&gt;
        &lt;/div&gt;

        &lt;!-- User Menu --&gt;
        &lt;div class="flex items-center gap-4"&gt;
            @auth
                &lt;x-dropdown&gt;...&lt;/x-dropdown&gt;
            @else
                &lt;a href="/login" class="text-gray-600"&gt;Log in&lt;/a&gt;
                &lt;x-button href="/register"&gt;Sign up&lt;/x-button&gt;
            @endauth
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/nav&gt;</code></pre>

<h2>Dark Mode</h2>

<h3>Toggle Implementation</h3>

<pre><code>// resources/js/theme.js

function getTheme() {
    return localStorage.getItem('theme') ||
        (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
}

function setTheme(theme) {
    localStorage.setItem('theme', theme);
    document.documentElement.setAttribute('data-theme', theme);
}

// Initialize
setTheme(getTheme());

// Toggle button
document.getElementById('theme-toggle')?.addEventListener('click', () => {
    setTheme(getTheme() === 'dark' ? 'light' : 'dark');
});</code></pre>

<h3>Dark Mode Styles</h3>

<pre><code>/* Automatic dark mode based on data-theme attribute */
[data-theme="dark"] {
    color-scheme: dark;
}

[data-theme="dark"] body {
    @apply bg-slate-900 text-slate-100;
}

[data-theme="dark"] .card {
    @apply bg-slate-800 border-slate-700;
}

[data-theme="dark"] input,
[data-theme="dark"] textarea {
    @apply bg-slate-800 border-slate-600 text-white;
}</code></pre>

<h2>Logo & Branding</h2>

<h3>Replacing the Logo</h3>

<p>Place your logo files in <code>public/images/</code>:</p>

<ul>
    <li><code>logo.svg</code> - Main logo (recommended: SVG)</li>
    <li><code>logo-dark.svg</code> - Logo for dark backgrounds</li>
    <li><code>favicon.ico</code> - Browser favicon</li>
    <li><code>apple-touch-icon.png</code> - iOS home screen icon (180x180)</li>
</ul>

<h3>Open Graph Images</h3>

<pre><code>&lt;!-- resources/views/layouts/app.blade.php --&gt;
&lt;meta property="og:image" content="{{ asset('images/og-image.jpg') }}"&gt;
&lt;meta property="og:image:width" content="1200"&gt;
&lt;meta property="og:image:height" content="630"&gt;</code></pre>

<h2>Custom CSS</h2>

<h3>Adding Custom Styles</h3>

<p>Create a custom stylesheet:</p>

<pre><code>/* resources/css/custom.css */

/* Your custom styles */
.hero-gradient {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.glass-effect {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

/* Animation classes */
.animate-fade-in {
    animation: fadeIn 0.3s ease-out;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}</code></pre>

<p>Import in <code>resources/css/app.css</code>:</p>

<pre><code>@import 'tailwindcss/base';
@import 'tailwindcss/components';
@import 'tailwindcss/utilities';

@import 'custom.css';</code></pre>

<h2>Building Assets</h2>

<pre><code># Development (with hot reload)
npm run dev

# Production build
npm run build</code></pre>

<h2>Theme Presets</h2>

<p>SocialApparatus includes several pre-built theme presets:</p>

<table>
    <thead>
        <tr>
            <th>Preset</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><strong>Default</strong></td>
            <td>Clean, modern blue theme</td>
        </tr>
        <tr>
            <td><strong>Minimal</strong></td>
            <td>Black and white, typography-focused</td>
        </tr>
        <tr>
            <td><strong>Vibrant</strong></td>
            <td>Colorful gradients and bold colors</td>
        </tr>
        <tr>
            <td><strong>Corporate</strong></td>
            <td>Professional, enterprise-ready look</td>
        </tr>
    </tbody>
</table>

<pre><code># Switch theme presets
php artisan theme:use minimal

# List available presets
php artisan theme:list

# Create custom preset
php artisan theme:create my-custom-theme</code></pre>

<h2>Next Steps</h2>

<ul>
    <li><a href="{{ route('docs.features') }}">Explore features to customize</a></li>
    <li><a href="{{ route('docs.admin') }}">Configure theme in admin panel</a></li>
    <li><a href="{{ route('docs.contributing') }}">Contribute a theme preset</a></li>
</ul>
@endsection
