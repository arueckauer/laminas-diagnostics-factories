# Contributing

Contributions are **welcome** and will be fully **credited**.

We accept contributions via Pull Requests on [Github](https://github.com/arueckauer/laminas-diagnostics-factories).

## Pull Requests

-   **[Laminas Coding Standard](https://github.com/laminas/laminas-coding-standard/)** - Follow the coding standard used by this project.
-   **Add tests!** - Patches without tests will not be accepted.
-   **Pass all CI checks** - Run the checks listed under [CI](#ci) locally before submitting.
-   **Document any change in behaviour** - Make sure the `README.md` and any other relevant documentation are up-to-date.
-   **Create feature branches** - Don't ask us to pull from your main branch.
-   **One pull request per feature** - If you want to do more than one thing, send multiple pull requests.
-   **Send coherent history** - Make sure each individual commit in your pull request is meaningful. If you had to make multiple intermediate commits while developing, please [squash them](https://www.git-scm.com/book/en/v2/Git-Tools-Rewriting-History#_changing_multiple) before submitting.

## CI

Continuous integration runs the following checks. Run them locally from the project root before
opening a pull request:

```bash
$ ./vendor/bin/phpunit
$ ./vendor/bin/phpcs
$ ./vendor/bin/psalm --no-cache
$ ./vendor/bin/structarmed analyse
```

CI runs the PHP checks on every supported PHP version with both the lowest and the latest dependencies.

**Happy coding**!
