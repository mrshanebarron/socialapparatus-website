@extends('docs.layout')

@section('title', 'Contributing')

@section('docs-content')
<h1>Contributing</h1>

<p class="lead">Thank you for your interest in contributing to SocialApparatus! This guide will help you get started with development and submitting contributions.</p>

<h2>Code of Conduct</h2>

<p>By participating in this project, you agree to abide by our Code of Conduct:</p>

<ul>
    <li><strong>Be respectful</strong> - Treat all contributors with respect</li>
    <li><strong>Be constructive</strong> - Offer helpful feedback</li>
    <li><strong>Be inclusive</strong> - Welcome people of all backgrounds</li>
    <li><strong>Be patient</strong> - Maintainers are volunteers</li>
</ul>

<h2>Getting Started</h2>

<h3>Development Setup</h3>

<div class="steps">
    <div class="step">
        <div class="step-number">1</div>
        <div class="step-content">
            <h4>Fork the Repository</h4>
            <p>Fork <a href="https://github.com/mrshanebarron/socialapparatus" target="_blank">mrshanebarron/socialapparatus</a> to your GitHub account.</p>
        </div>
    </div>
    <div class="step">
        <div class="step-number">2</div>
        <div class="step-content">
            <h4>Clone Your Fork</h4>
            <pre><code>git clone https://github.com/YOUR-USERNAME/socialapparatus.git
cd socialapparatus</code></pre>
        </div>
    </div>
    <div class="step">
        <div class="step-number">3</div>
        <div class="step-content">
            <h4>Add Upstream Remote</h4>
            <pre><code>git remote add upstream https://github.com/mrshanebarron/socialapparatus.git</code></pre>
        </div>
    </div>
    <div class="step">
        <div class="step-number">4</div>
        <div class="step-content">
            <h4>Install Dependencies</h4>
            <pre><code>composer install
npm install</code></pre>
        </div>
    </div>
    <div class="step">
        <div class="step-number">5</div>
        <div class="step-content">
            <h4>Set Up Environment</h4>
            <pre><code>cp .env.example .env
php artisan key:generate
php artisan migrate --seed</code></pre>
        </div>
    </div>
    <div class="step">
        <div class="step-number">6</div>
        <div class="step-content">
            <h4>Start Development Server</h4>
            <pre><code>php artisan serve
npm run dev</code></pre>
        </div>
    </div>
</div>

<h2>Making Changes</h2>

<h3>Branch Naming</h3>

<p>Create a descriptive branch for your changes:</p>

<pre><code># Feature branches
git checkout -b feature/add-user-mentions

# Bug fix branches
git checkout -b fix/avatar-upload-error

# Documentation branches
git checkout -b docs/update-api-reference</code></pre>

<h3>Coding Standards</h3>

<p>We follow these coding standards:</p>

<h4>PHP (PSR-12)</h4>

<pre><code># Format code with Laravel Pint
./vendor/bin/pint

# Check for issues
./vendor/bin/pint --test</code></pre>

<h4>JavaScript (ESLint + Prettier)</h4>

<pre><code># Format code
npm run format

# Check for issues
npm run lint</code></pre>

<h4>General Guidelines</h4>

<ul>
    <li>Use meaningful variable and function names</li>
    <li>Write self-documenting code; add comments only when necessary</li>
    <li>Keep functions small and focused</li>
    <li>Follow existing patterns in the codebase</li>
    <li>Use strict typing where possible</li>
</ul>

<h3>Commit Messages</h3>

<p>Follow the Conventional Commits specification:</p>

<pre><code># Format
&lt;type&gt;(&lt;scope&gt;): &lt;description&gt;

# Types
feat:     New feature
fix:      Bug fix
docs:     Documentation changes
style:    Code style changes (formatting, etc.)
refactor: Code refactoring
test:     Adding or updating tests
chore:    Maintenance tasks

# Examples
feat(comments): add threaded replies support
fix(auth): resolve login redirect issue
docs(api): update authentication examples
refactor(posts): extract validation logic
test(groups): add membership tests</code></pre>

<h2>Testing</h2>

<h3>Running Tests</h3>

<pre><code># Run all tests
php artisan test

# Run specific test file
php artisan test tests/Feature/PostTest.php

# Run with coverage
php artisan test --coverage

# Run tests in parallel
php artisan test --parallel</code></pre>

<h3>Writing Tests</h3>

<pre><code>&lt;?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_post(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/posts', [
            'title' => 'My First Post',
            'content' => 'This is the post content.',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('posts', [
            'title' => 'My First Post',
            'user_id' => $user->id,
        ]);
    }

    public function test_guest_cannot_create_post(): void
    {
        $response = $this->post('/posts', [
            'title' => 'Test Post',
            'content' => 'Content here.',
        ]);

        $response->assertRedirect('/login');
    }
}</code></pre>

<h3>Test Coverage</h3>

<p>We aim for at least 80% code coverage. All new features should include tests.</p>

<h2>Pull Requests</h2>

<h3>Before Submitting</h3>

<ul>
    <li>Run all tests and ensure they pass</li>
    <li>Run code formatters (Pint, ESLint)</li>
    <li>Update documentation if needed</li>
    <li>Add tests for new functionality</li>
    <li>Rebase on latest <code>main</code> branch</li>
</ul>

<pre><code># Sync with upstream
git fetch upstream
git rebase upstream/main

# Push to your fork
git push origin feature/your-feature</code></pre>

<h3>PR Template</h3>

<p>When creating a PR, include:</p>

<pre><code>## Description
Brief description of changes.

## Type of Change
- [ ] Bug fix
- [ ] New feature
- [ ] Breaking change
- [ ] Documentation update

## Testing
Describe how you tested the changes.

## Checklist
- [ ] My code follows the project's style guidelines
- [ ] I have performed a self-review
- [ ] I have added tests that prove my fix/feature works
- [ ] New and existing unit tests pass locally
- [ ] I have updated documentation as needed</code></pre>

<h3>Review Process</h3>

<ol>
    <li>Submit your PR</li>
    <li>CI will run automated tests</li>
    <li>A maintainer will review your code</li>
    <li>Address any feedback</li>
    <li>Once approved, your PR will be merged</li>
</ol>

<h2>Types of Contributions</h2>

<h3>Bug Reports</h3>

<p>Found a bug? Open an issue with:</p>

<ul>
    <li>Clear title describing the bug</li>
    <li>Steps to reproduce</li>
    <li>Expected behavior</li>
    <li>Actual behavior</li>
    <li>Environment details (PHP version, browser, etc.)</li>
    <li>Screenshots if applicable</li>
</ul>

<h3>Feature Requests</h3>

<p>Have an idea? Open a discussion with:</p>

<ul>
    <li>Clear description of the feature</li>
    <li>Use case / problem it solves</li>
    <li>Proposed implementation (if any)</li>
    <li>Alternatives considered</li>
</ul>

<h3>Documentation</h3>

<p>Documentation improvements are always welcome:</p>

<ul>
    <li>Fix typos and grammar</li>
    <li>Add missing examples</li>
    <li>Improve explanations</li>
    <li>Translate to other languages</li>
</ul>

<h3>Themes & Plugins</h3>

<p>Create and share:</p>

<ul>
    <li>Custom theme presets</li>
    <li>Integration packages</li>
    <li>Feature extensions</li>
</ul>

<h2>Development Guidelines</h2>

<h3>Architecture Principles</h3>

<ul>
    <li><strong>Keep it simple</strong> - Don't over-engineer solutions</li>
    <li><strong>Follow Laravel conventions</strong> - Use framework features properly</li>
    <li><strong>Single responsibility</strong> - Each class should have one job</li>
    <li><strong>Dependency injection</strong> - Avoid static calls and facades in business logic</li>
    <li><strong>Database efficiency</strong> - Avoid N+1 queries, use eager loading</li>
</ul>

<h3>File Organization</h3>

<pre><code>app/
├── Actions/           # Single-purpose action classes
├── Http/
│   ├── Controllers/   # Thin controllers
│   ├── Livewire/     # Livewire components
│   ├── Middleware/
│   └── Requests/     # Form request validation
├── Models/            # Eloquent models
├── Policies/          # Authorization policies
├── Providers/
└── Services/          # Business logic

resources/
├── views/
│   ├── components/   # Blade components
│   ├── layouts/      # Page layouts
│   ├── livewire/     # Livewire views
│   └── pages/        # Page views
├── css/
└── js/

tests/
├── Feature/          # Integration tests
└── Unit/            # Unit tests</code></pre>

<h3>Database Migrations</h3>

<pre><code>&lt;?php

// Good: Descriptive, reversible
public function up(): void
{
    Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        $table->string('title');
        $table->text('content');
        $table->string('slug')->unique();
        $table->timestamp('published_at')->nullable();
        $table->timestamps();
        $table->softDeletes();

        $table->index(['user_id', 'published_at']);
    });
}

public function down(): void
{
    Schema::dropIfExists('posts');
}</code></pre>

<h3>Livewire Components</h3>

<pre><code>&lt;?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\Validate;

class CreatePost extends Component
{
    #[Validate('required|min:5|max:200')]
    public string $title = '';

    #[Validate('required|min:50')]
    public string $content = '';

    public function save(): void
    {
        $validated = $this->validate();

        $post = auth()->user()->posts()->create($validated);

        $this->redirect(route('posts.show', $post));
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}</code></pre>

<h2>Security</h2>

<h3>Reporting Vulnerabilities</h3>

<p>If you discover a security vulnerability, please:</p>

<ol>
    <li><strong>Do not</strong> open a public issue</li>
    <li>Email security@socialapparatus.com with details</li>
    <li>Allow up to 48 hours for a response</li>
    <li>Coordinate disclosure timing with maintainers</li>
</ol>

<h3>Security Best Practices</h3>

<ul>
    <li>Always validate and sanitize input</li>
    <li>Use parameterized queries (Eloquent handles this)</li>
    <li>Escape output appropriately</li>
    <li>Use CSRF protection on all forms</li>
    <li>Implement proper authorization checks</li>
</ul>

<h2>Getting Help</h2>

<ul>
    <li><strong>GitHub Discussions</strong> - Ask questions and discuss ideas</li>
    <li><strong>GitHub Issues</strong> - Report bugs and track features</li>
    <li><strong>Discord</strong> - Real-time chat with the community</li>
</ul>

<h2>Recognition</h2>

<p>All contributors are recognized in:</p>

<ul>
    <li>The CONTRIBUTORS.md file</li>
    <li>Release notes mentioning their contributions</li>
    <li>The GitHub contributors page</li>
</ul>

<div class="callout callout-success">
    <strong>Thank you!</strong> Every contribution, no matter how small, helps make SocialApparatus better for everyone.
</div>

<h2>Quick Links</h2>

<ul>
    <li><a href="https://github.com/mrshanebarron/socialapparatus" target="_blank">GitHub Repository</a></li>
    <li><a href="https://github.com/mrshanebarron/socialapparatus/issues" target="_blank">Issue Tracker</a></li>
    <li><a href="https://github.com/mrshanebarron/socialapparatus/discussions" target="_blank">Discussions</a></li>
    <li><a href="https://github.com/mrshanebarron/socialapparatus/blob/main/CHANGELOG.md" target="_blank">Changelog</a></li>
</ul>
@endsection
