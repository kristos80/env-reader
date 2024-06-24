# 🔍 | env-reader

The env-reader PHP package provides a robust solution for reading environment variables from the `$_ENV` superglobal. At its core is the `EnvReader` class, which implements the `EnvReaderInterface` to deliver essential methods for fetching and comparing environment variable values.

---

[![Coverage Status](https://coveralls.io/repos/github/kristos80/env-reader/badge.svg?branch=master)](https://coveralls.io/github/kristos80/env-reader?branch=master)

---

## Work in Progress (WIP) — Do not use in production yet: ##

- It has not undergone extensive testing.
- Primarily intended for internal projects, subject to potential breaking changes without prior notice.
- There are likely many missing features.

---

Key functionalities include:

`equals()` Method: This method checks if the value of a specified environment variable (or variables) matches a provided value (or values). It supports both scalar and array inputs for variable names and values, and offers an optional strict mode for case-sensitive comparison.

`get()` Method: This method retrieves the value of a specified environment variable, with support for multiple possible names. It allows for default values if the environment variable is not found, and includes an optional strict mode for case-sensitive key matching.

The package's design ensures flexibility and ease of use, making it a valuable tool for managing environment variables in PHP applications.
