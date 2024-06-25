# 🔍 env-reader

The `env-reader` package provides a robust solution for reading environment variables from the `$_ENV` superglobal. At its core is the `EnvReader` class, which implements the `EnvReaderInterface` to deliver essential methods for fetching and comparing environment variable values.

---

[![Coverage Status](https://coveralls.io/repos/github/kristos80/env-reader/badge.svg?branch=master)](https://coveralls.io/github/kristos80/env-reader?branch=master) 
[![Mutation testing badge](https://img.shields.io/endpoint?style=flat&url=https%3A%2F%2Fbadge-api.stryker-mutator.io%2Fgithub.com%2Fkristos80%2Fenv-reader%2Fmaster)](https://dashboard.stryker-mutator.io/reports/github.com/kristos80/env-reader/master)
[![Codacy Badge](https://app.codacy.com/project/badge/Grade/b1424ad661964816aee9fe8ef9e280c0)](https://app.codacy.com/gh/kristos80/env-reader/dashboard?utm_source=gh&utm_medium=referral&utm_content=&utm_campaign=Badge_grade)

---

## Work in Progress (WIP) — Do not use in production yet: ##

- It has not undergone extensive testing.
- Primarily intended for internal projects, subject to potential breaking changes without prior notice.
- There are likely many missing features.

---

Key functionalities include:

`equals()` Method: This method checks if the value of a specified environment variable (or variables) matches a provided value (or values). It supports both scalar and array inputs for variable names and values, and offers an optional strict mode for case-sensitive comparison.

`get()` Method: This method retrieves the value of a specified environment variable, with support for multiple possible names. It allows for default values if the environment variable is not found, and includes an optional strict mode for case-sensitive key matching.

The package's design ensures flexibility and ease of use, making it a valuable tool for managing environment variables in `PHP` applications.
