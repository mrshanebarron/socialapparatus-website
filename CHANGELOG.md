# Changelog

All notable changes to SocialApparatus will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added
- Initial public release preparation
- Comprehensive documentation site
- Community portal at community.socialapparatus.com

## [1.0.0] - 2025-12-26

### Added

#### Core Features
- User registration and authentication
- User profiles with avatars, cover photos, and custom fields
- News feed with algorithmic and chronological options
- Posts with text, images, videos, and links
- Comments with threaded replies
- Reactions system (like, love, laugh, etc.)
- Post sharing functionality

#### Communication
- Real-time private messaging
- Group messaging
- Notification system (in-app and email)
- @mentions in posts and comments
- Activity feed

#### Community Features
- Groups (public, private, secret)
- Events with RSVP functionality
- Pages for businesses and organizations
- Forums with categories and threads

#### Content Features
- Stories (24-hour ephemeral content)
- Photo and video albums
- Bookmarks
- Hashtag system

#### Administration
- Admin dashboard
- User management (roles, permissions, bans)
- Content moderation tools
- Report system
- Site settings and configuration
- Analytics dashboard

#### Security
- Two-factor authentication (TOTP)
- Granular privacy controls
- User blocking
- Login notifications
- Session management

#### Developer Features
- REST API with Sanctum authentication
- Webhook system
- CSS variable theming
- Extensible architecture
- Comprehensive documentation

### Technical Stack
- Laravel 12.x
- Livewire 3.x
- Tailwind CSS 3.x
- Alpine.js 3.x
- PHP 8.2+

---

## Version History

### Versioning

We use [Semantic Versioning](https://semver.org/):

- **MAJOR** version for incompatible API changes
- **MINOR** version for new functionality (backwards compatible)
- **PATCH** version for bug fixes (backwards compatible)

### Release Schedule

- **Major releases**: As needed for significant changes
- **Minor releases**: Monthly with new features
- **Patch releases**: As needed for bug fixes and security updates

### Upgrade Guides

Upgrade guides for major versions are available in the [documentation](https://socialapparatus.com/docs/upgrade).

---

[Unreleased]: https://github.com/mrshanebarron/socialapparatus/compare/v1.0.0...HEAD
[1.0.0]: https://github.com/mrshanebarron/socialapparatus/releases/tag/v1.0.0
