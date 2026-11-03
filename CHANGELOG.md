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

## 3.0.0

-   Dropped support for PHP 8.1 and added support for PHP 8.5.
-   Updated the minimum `laminas/laminas-diagnostics` version to 1.30.
-   Updated development dependencies.

## 2.10.0

-   Upgraded Psalm to 6.7 and updated its baseline.

## 2.9.0

-   Updated development dependencies.

## 2.8.0

-   Added support for PHP 8.4.
-   Removed the obsolete Travis CI configuration.

## 2.7.0

-   Added validation for path and size configuration in the directory-writable and disk-free factories.
-   Changed the default minimum CPU performance to `0.5` and the default label to an empty string.
-   Added return type declarations and renamed `BadStaticPsrContainerFactoryUsageException` to
    `BadStaticPsrContainerFactoryUsage`.

## 2.6.0

-   Added support for labels where applicable.

## 2.5.0

-   Added support for PHP 8.3.

## 2.4.0

-   Restored compatibility with both PSR Container 1 and 2, including compatibility with
    `laminas/laminas-servicemanager`.

## 2.3.0

-   Added support for PHP 8.2 and dropped support for PHP 7.4 and 8.0.
-   Added support for PSR Container 2.
-   Updated the development toolchain, including PHPUnit 10 and Rector.

## 2.2.1

-   Upgraded `laminas/laminas-diagnostics` to 1.13.

## 2.2.0

-   Added support for PHP 8.1.
-   Updated dependencies, including PHPUnit 9.5 and `laminas/laminas-diagnostics` 1.12.

## 2.1.1

-   Added PHP 8.0 to the build matrix.

## 2.1.0

-   Added support for PHP 8.0 and upgraded `laminas/laminas-diagnostics` to 1.7.

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
