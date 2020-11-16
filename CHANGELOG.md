# Change Log

All notable changes to this publication will be documented in this file.

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
