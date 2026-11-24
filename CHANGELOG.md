# Change Log

All notable changes to this publication will be documented in this file.

## 5.0.0 (unreleased)

### Other changes

-   Added support for PHP 8.6.
-   Marked the `__invoke()` methods of all factories with the `#[Override]` attribute.
-   Upgraded PHPUnit to 12 and updated the remaining development dependencies and quality-assurance tooling.
-   The `BadStaticPsrContainerFactoryUsage` message now names the factory class and check name
    (for example `CpuPerformancePsrContainerFactory::cpu_performance`) instead of only the check name.
-   Removed the Psalm baseline. The code base now passes Psalm without suppressed issues.

### Breaking changes

-   Dropped support for PHP 8.2. The minimum required PHP version is now 8.3.
-   `AbstractPsrContainerFactory::CONFIG_KEY` is now a typed class constant (`string`).
-   The constructor of `AbstractPsrContainerFactory` is now `final`.
-   Removed the `AbstractPsrContainerFactory::$container` property. `getParams()` now takes the
    `ContainerInterface` as its argument, so factories no longer keep state between invocations.
-   `Exception\InvalidConfiguration` is now `final`.

### Migration

Upgrade to PHP 8.3 or later before updating to 5.0.

If you extend `AbstractPsrContainerFactory` and redeclare `CONFIG_KEY`, add the `string` type
to the declaration. Otherwise, PHP fails with a fatal error when the subclass is loaded.
Redeclaring the constant does not change the configuration key, which is always `diagnostics`.

If you extend `AbstractPsrContainerFactory`, make these changes to your factory:

-   Remove any constructor override. The check name is always passed as the only constructor argument.
-   Replace `$this->container = $container;` followed by `$this->getParams()` with
    `$this->getParams($container)`, and pass the container explicitly wherever you read `$this->container`.

If you extend `Exception\InvalidConfiguration`, extend `InvalidArgumentException` instead,
or catch `InvalidConfiguration` directly.

Factories registered in container configuration need no changes.

## 4.1.0 (2026-11-24)

-   Added a security policy explaining how to report vulnerabilities privately.
-   Replaced the code of conduct with the Contributor Covenant 3.0.
-   Moved the community health files to `.github/` and replaced the issue template with issue forms.
-   Excluded `.github/` and the remaining quality-assurance configuration files from the Composer package.
-   Documented how to run all CI checks locally.
-   Updated development dependencies.

## 4.0.0 (2026-11-03)

### Other changes

-   Updated the minimum `laminas/laminas-diagnostics` version to 1.30.2.
-   Updated development dependencies and quality-assurance tooling.

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

## 3.0.0 (2025-12-30)

-   Dropped support for PHP 8.1 and added support for PHP 8.5.
-   Updated the minimum `laminas/laminas-diagnostics` version to 1.30.
-   Updated development dependencies.

## 2.10.0 (2025-02-17)

-   Upgraded Psalm to 6.7 and updated its baseline.

## 2.9.0 (2025-02-17)

-   Updated development dependencies.

## 2.8.0 (2025-02-06)

-   Added support for PHP 8.4.
-   Removed the obsolete Travis CI configuration.

## 2.7.0 (2024-11-25)

-   Added validation for path and size configuration in the directory-writable and disk-free factories.
-   Changed the default minimum CPU performance to `0.5` and the default label to an empty string.
-   Added return type declarations and renamed `BadStaticPsrContainerFactoryUsageException` to
    `BadStaticPsrContainerFactoryUsage`.

## 2.6.0 (2024-08-27)

-   Added support for labels where applicable.

## 2.5.0 (2024-02-14)

-   Added support for PHP 8.3.

## 2.4.0 (2024-01-11)

-   Restored compatibility with both PSR Container 1 and 2, including compatibility with
    `laminas/laminas-servicemanager`.

## 2.3.0 (2023-11-09)

-   Added support for PHP 8.2 and dropped support for PHP 7.4 and 8.0.
-   Added support for PSR Container 2.
-   Updated the development toolchain, including PHPUnit 10 and Rector.

## 2.2.1 (2021-12-15)

-   Upgraded `laminas/laminas-diagnostics` to 1.13.

## 2.2.0 (2021-12-14)

-   Added support for PHP 8.1.
-   Updated dependencies, including PHPUnit 9.5 and `laminas/laminas-diagnostics` 1.12.

## 2.1.1 (2021-08-20)

-   Added PHP 8.0 to the build matrix.

## 2.1.0 (2021-08-20)

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
