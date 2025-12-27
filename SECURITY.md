# Security Policy

## Supported Versions

We release patches for security vulnerabilities for the following versions:

| Version | Supported          |
| ------- | ------------------ |
| 1.x.x   | :white_check_mark: |

## Reporting a Vulnerability

**Please do not report security vulnerabilities through public GitHub issues.**

If you discover a security vulnerability within SocialApparatus, please send an email to [security@socialapparatus.com](mailto:security@socialapparatus.com).

Please include the following information:

- Type of vulnerability (e.g., SQL injection, XSS, CSRF, etc.)
- Full paths of source file(s) related to the vulnerability
- Location of the affected source code (tag/branch/commit or direct URL)
- Step-by-step instructions to reproduce the issue
- Proof-of-concept or exploit code (if possible)
- Impact of the issue, including how an attacker might exploit it

### Response Timeline

- **Initial Response**: Within 48 hours
- **Status Update**: Within 5 business days
- **Resolution Target**: Within 30 days (depending on complexity)

### Disclosure Policy

- We will confirm receipt of your vulnerability report within 48 hours
- We will send you regular updates about our progress
- We will notify you when the vulnerability is fixed
- We will publicly acknowledge your responsible disclosure (unless you prefer to remain anonymous)

## Security Best Practices

When deploying SocialApparatus, please ensure:

### Server Configuration

- Always use HTTPS in production
- Keep PHP and all dependencies up to date
- Use strong database passwords
- Configure proper file permissions
- Enable firewall and fail2ban

### Application Configuration

- Set `APP_DEBUG=false` in production
- Use strong `APP_KEY` (auto-generated)
- Configure proper CORS settings
- Enable rate limiting
- Use secure session configuration

### Database Security

- Use separate database users with minimal privileges
- Enable SSL for database connections
- Regular backups with encryption
- Never expose database ports publicly

### File Uploads

- Validate file types and sizes
- Store uploads outside web root when possible
- Use virus scanning for uploaded files
- Implement proper access controls

## Security Features

SocialApparatus includes several built-in security features:

- **CSRF Protection**: All forms include CSRF tokens
- **XSS Prevention**: Blade templates auto-escape output
- **SQL Injection Prevention**: Eloquent ORM uses parameterized queries
- **Password Hashing**: Bcrypt hashing with configurable rounds
- **Two-Factor Authentication**: TOTP-based 2FA support
- **Rate Limiting**: Configurable API and login rate limits
- **Session Security**: Secure session handling with encryption
- **Input Validation**: Request validation on all user input

## Security Updates

Security updates are released as patch versions and announced via:

- GitHub Security Advisories
- Release notes in CHANGELOG.md
- Email to registered administrators (if configured)

We recommend enabling GitHub notifications for security advisories on this repository.

## Hall of Fame

We appreciate the security researchers who have responsibly disclosed vulnerabilities:

*No submissions yet - be the first!*

---

Thank you for helping keep SocialApparatus and its users safe!
