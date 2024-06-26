<?php
declare(strict_types=1);

namespace Kristos80\EnvReader;

final readonly class EnvReader implements EnvReaderInterface {

	/**
	 * @SuppressWarnings("BooleanArgumentFlag")
	 * @param string|array $possibleEnvNames
	 * @param array $possibleEnvValues
	 * @param bool $strict
	 * @param string|null $cast
	 * @return bool
	 */
	public function equals(string|array $possibleEnvNames,
		mixed $possibleEnvValues,
		bool $strict = FALSE,
		?string $cast = NULL): bool {
		$envValue = $this->get($possibleEnvNames, NULL, $strict);

		if(is_scalar($possibleEnvValues) === TRUE) {
			$possibleEnvValues = [$possibleEnvValues];
		}

		return in_array($envValue, $possibleEnvValues);
	}

	/**
	 * @SuppressWarnings("BooleanArgumentFlag")
	 * @SuppressWarnings("Superglobals)
	 * @param string[] $possibleEnvNames
	 * @param mixed|null $default
	 * @param bool $strict
	 * @param string|null $cast
	 * @return mixed
	 */
	public function get(string|array $possibleEnvNames,
		mixed $default = NULL,
		bool $strict = FALSE,
		?string $cast = NULL): mixed {
		if(is_scalar($possibleEnvNames) === TRUE) {
			$possibleEnvNames = [$possibleEnvNames];
		}

		$manipulationFn = $strict ? function(string $key) {
			return $key;
		} : function(string $key) {
			return strtolower($key);
		};

		foreach($possibleEnvNames as $possibleEnvName) {
			foreach($_ENV as $envName => $envValue) {
				if($manipulationFn($possibleEnvName) === $manipulationFn($envName)) {
					$default = $envValue;
				}
			}
		}

		if($cast === "array") {
			$default = json_decode($default, TRUE);
			$cast = NULL;
		}

		if($cast === "object") {
			$default = (object) json_decode($default, TRUE);
			$cast = NULL;
		}

		if($cast) {
			settype($default, $cast);
		}

		return $default;
	}

}