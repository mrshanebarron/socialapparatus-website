# Contributing to SocialApparatus

Thank you for your interest in contributing to SocialApparatus! This guide will help you get started with development and submitting contributions.

## Code of Conduct

By participating in this project, you agree to abide by our Code of Conduct:

- **Be respectful** - Treat all contributors with respect
- **Be constructive** - Offer helpful feedback
- **Be inclusive** - Welcome people of all backgrounds
- **Be patient** - Maintainers are volunteers

## Getting Started

### Development Setup

1. **Fork the Repository**

   Fork [mrshanebarron/socialapparatus](https://github.com/mrshanebarron/socialapparatus) to your GitHub account.

2. **Clone Your Fork**

   ```bash
   git clone https://github.com/YOUR-USERNAME/socialapparatus.git
   cd socialapparatus
   ```

3. **Add Upstream Remote**

   ```bash
   git remote add upstream https://github.com/mrshanebarron/socialapparatus.git
   ```

4. **Install Dependencies**

   ```bash
   composer install
   npm install
   ```

5. **Set Up Environment**

   ```bash
   cp .env.example .env
   php artisan key:generate
   php artisan migrate --seed
   ```

6. **Start Development Server**

   ```bash
   php artisan serve
   npm run dev
   ```

## Making Changes

### Branch Naming

Create a descriptive branch for your changes:

```bash
# Feature branches
git checkout -b feature/add-user-mentions

# Bug fix branches
git checkout -b fix/avatar-upload-error

# Documentation branches
git checkout -b docs/update-api-reference
```

### Coding Standards

We follow these coding standards:

#### PHP (PSR-12)

```bash
# Format code with Laravel Pint
./vendor/bin/pint

# Check for issues
./vendor/bin/pint --test
```

#### JavaScript (ESLint + Prettier)

```bash
# Format code
npm run format

# Check for issues
npm run lint
```

#### General Guidelines

- Use meaningful variable and function names
- Write self-documenting code; add comments only when necessary
- Keep functions small and focused
- Follow existing patterns in the codebase
- Use strict typing where possible

### Commit Messages

Follow the Conventional Commits specification:

```
# Format
<type>(<scope>): <description>

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
test(groups): add membership tests
```

## Testing

### Running Tests

```bash
# Run all tests
php artisan test

# Run specific test file
php artisan test tests/Feature/PostTest.php

# Run with coverage
php artisan test --coverage

# Run tests in parallel
php artisan test --parallel
```

### Writing Tests

```php
<?php

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
}
```

### Test Coverage

We aim for at least 80% code coverage. All new features should include tests.

## Pull Requests

### Before Submitting

- [ ] Run all tests and ensure they pass
- [ ] Run code formatters (Pint, ESLint)
- [ ] Update documentation if needed
- [ ] Add tests for new functionality
- [ ] Rebase on latest `main` branch

```bash
# Sync with upstream
git fetch upstream
git rebase upstream/main

# Push to your fork
git push origin feature/your-feature
```

### PR Template

When creating a PR, include:

```markdown
## Description
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
- [ ] I have updated documentation as needed
```

### Review Process

1. Submit your PR
2. CI will run automated tests
3. A maintainer will review your code
4. Address any feedback
5. Once approved, your PR will be merged

## Types of Contributions

### Bug Reports

Found a bug? Open an issue with:

- Clear title describing the bug
- Steps to reproduce
- Expected behavior
- Actual behavior
- Environment details (PHP version, browser, etc.)
- Screenshots if applicable

### Feature Requests

Have an idea? Open a discussion with:

- Clear description of the feature
- Use case / problem it solves
- Proposed implementation (if any)
- Alternatives considered

### Documentation

Documentation improvements are always welcome:

- Fix typos and grammar
- Add missing examples
- Improve explanations
- Translate to other languages

### Themes & Plugins

Create and share:

- Custom theme presets
- Integration packages
- Feature extensions

## Development Guidelines

### Architecture Principles

- **Keep it simple** - Don't over-engineer solutions
- **Follow Laravel conventions** - Use framework features properly
- **Single responsibility** - Each class should have one job
- **Dependency injection** - Avoid static calls and facades in business logic
- **Database efficiency** - Avoid N+1 queries, use eager loading

### File Organization

```
app/
├── Actions/           # Single-purpose action classes
├── Http/
│   ├── Controllers/   # Thin controllers
│   ├── Livewire/      # Livewire components
│   ├── Middleware/
│   └── Requests/      # Form request validation
├── Models/            # Eloquent models
├── Policies/          # Authorization policies
├── Providers/
└── Services/          # Business logic

resources/
├── views/
│   ├── components/    # Blade components
│   ├── layouts/       # Page layouts
│   ├── livewire/      # Livewire views
│   └── pages/         # Page views
├── css/
└── js/

tests/
├── Feature/           # Integration tests
└── Unit/              # Unit tests
```

### Database Migrations

```php
<?php

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
}
```

### Livewire Components

```php
<?php

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
}
```

## Security

### Reporting Vulnerabilities

If you discover a security vulnerability, please:

1. **Do not** open a public issue
2. Email security@socialapparatus.com with details
3. Allow up to 48 hours for a response
4. Coordinate disclosure timing with maintainers

### Security Best Practices

- Always validate and sanitize input
- Use parameterized queries (Eloquent handles this)
- Escape output appropriately
- Use CSRF protection on all forms
- Implement proper authorization checks

## Getting Help

- **GitHub Discussions** - Ask questions and discuss ideas
- **GitHub Issues** - Report bugs and track features
- **Community Forum** - [community.socialapparatus.com](https://community.socialapparatus.com)

## Recognition

All contributors are recognized in:

- The CONTRIBUTORS.md file
- Release notes mentioning their contributions
- The GitHub contributors page

---

Thank you! Every contribution, no matter how small, helps make SocialApparatus better for everyone.
