# 🔍 env-reader

The EnvReader package provides a simple and flexible way to read and manipulate environment variables in PHP. It allows for easy retrieval and comparison of environment variable values using the $_ENV superglobal, with support for strict comparisons and type casting.

---

## Work in Progress (WIP) — Do not use in production yet: ##

- It has not undergone extensive testing.
- Primarily intended for internal projects, subject to potential breaking changes without prior notice.
- There are likely many missing features.

---

[![Coverage Status](https://coveralls.io/repos/github/kristos80/env-reader/badge.svg?branch=master)](https://coveralls.io/github/kristos80/env-reader?branch=master) 
[![Mutation testing badge](https://img.shields.io/endpoint?style=flat&url=https%3A%2F%2Fbadge-api.stryker-mutator.io%2Fgithub.com%2Fkristos80%2Fenv-reader%2Fmaster)](https://dashboard.stryker-mutator.io/reports/github.com/kristos80/env-reader/master)
[![Codacy Badge](https://app.codacy.com/project/badge/Grade/b1424ad661964816aee9fe8ef9e280c0)](https://app.codacy.com/gh/kristos80/env-reader/dashboard?utm_source=gh&utm_medium=referral&utm_content=&utm_campaign=Badge_grade)

---

## Features
- Retrieve Environment Variables: Access environment variables by name, with support for fallback default values.
- Strict Comparisons: Optionally perform case-sensitive checks on environment variable names.
- Type Casting: Automatically cast environment variable values to specified types (e.g., array, object, string, integer).
- Array and Object Support: Convert JSON-encoded environment variable values to arrays or objects.

---

## Example Usage

```PHP
use Kristos80\EnvReader;

$envReader = new EnvReader();

// Retrieve a variable with optional strict comparison and type casting
$databaseUrl = $envReader->get('DATABASE_URL', 'default_value', true, 'string');

// Check if an environment variable matches one of the possible values
$isProduction = $envReader->equals(['ENVIRONMENT', 'APP_ENV'], ['production', 'prod'], true);
```

## Class Reference

`EnvReader`

This final, read-only class implements the `EnvReaderInterface`.

## Methods

`equals`

```PHP
public function equals(
  string|array $possibleEnvNames,
  mixed $possibleEnvValues,
  bool $strict = FALSE,
  ?string $cast = NULL
): bool
```

### Parameters:

- $possibleEnvNames (string|array): The environment variable name(s) to check.
- $possibleEnvValues (mixed): The value(s) to compare against.
- $strict (bool): Whether to perform a case-sensitive comparison in variable name(s).
- $cast (string|null): Optional type to cast the environment variable value to (e.g., 'array', 'object', 'string').

Returns: (bool): True if the environment variable value matches one of the possible values; otherwise, false.

`get`

```PHP
public function get(
  string|array $possibleEnvNames,
  mixed $default = NULL,
  bool $strict = FALSE,
  ?string $cast = NULL
): mixed
```

### Parameters:

- $possibleEnvNames (string|array): The environment variable name(s) to retrieve.
- $default (mixed|null): The default value to return if the environment variable is not set.
- $strict (bool): Whether to perform a case-sensitive search in variable name(s).
- $cast (string|null): Optional type to cast the environment variable value to (e.g., 'array', 'object', 'string').
  
Returns: (mixed): The value of the environment variable, cast to the specified type if provided, or the default value.

## Contributing
Feel free to contribute by submitting issues or pull requests. Ensure your code adheres to the project's coding standards and includes appropriate tests.
