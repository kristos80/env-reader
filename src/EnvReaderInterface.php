<?php
declare(strict_types=1);

namespace Kristos80\EnvReader;

interface EnvReaderInterface {

	/**
	 * @SuppressWarnings("BooleanArgumentFlag")
	 * @param string|array $possibleEnvNames
	 * @param array $possibleEnvValues
	 * @param bool $strict
	 * @return bool
	 */
	public function equals(string|array $possibleEnvNames, mixed $possibleEnvValues, bool $strict = FALSE): bool;

	/**
	 * @SuppressWarnings("BooleanArgumentFlag")
	 * @param string|string[] $possibleEnvNames
	 * @param mixed|null $default
	 * @param bool $strict
	 * @return mixed
	 */
	public function get(string|array $possibleEnvNames, mixed $default = NULL, bool $strict = FALSE): mixed;
}