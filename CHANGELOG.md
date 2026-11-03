# Change Log

All notable changes to this publication will be documented in this file.

## 4.0.0 (Unreleased)

### Breaking changes

-   Removed `SecurityAdvisoryPsrContainerFactory` and its dependency on the unmaintained
    `enlightn/security-checker` package. Composer's built-in audit command supersedes the package.

### Migration

Remove imports and container registrations referencing `SecurityAdvisoryPsrContainerFactory`,
along with the associated diagnostic configuration (named `security_advisory` in the example).

Run `composer audit --locked` from your application project in CI and on a regular schedule instead.
Configure CI to fail when the command returns a non-zero exit code.
Add `--no-dev` if only production dependencies should be checked.

This replaces the dependency vulnerability scan, not the runtime diagnostic check.
If monitoring requires an audit status, report the result of a scheduled audit job rather than
running Composer on every health check.

## 2.0.0 (2020-11-16)

This release removes the restriction of allowing only one definition per check class.

[Monolog Factory](https://github.com/nikolaposa/monolog-factory) heavily inspired the new factory component. 🙏🏻

Multiple BC-breaks are introduced:

-   Check class factory classes are final, preventing extension.
-   Check class factory class names changed by added `PsrContainer` to better reflect functionality.
-   Change of namespace

## 1.0.0 (2020-11-14)

First stable release. Provides factories for:

-   CpuPerformance
-   DiskFree
-   DirWritable
-   ExtensionLoaded
-   GuzzleHttpService
-   PDOCheck
-   PhpVersion
-   SecurityAdvisory
