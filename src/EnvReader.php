<?php
declare(strict_types=1);

namespace Kristos80\EnvReader;

final readonly class EnvReader implements EnvReaderInterface {

	/**
	 * @SuppressWarnings("BooleanArgumentFlag")
	 * @param string|array $possibleEnvNames
	 * @param array $possibleEnvValues
	 * @param bool $strict
	 * @return bool
	 */
	public function equals(string|array $possibleEnvNames, mixed $possibleEnvValues, bool $strict = FALSE): bool {
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
	 * @return mixed
	 */
	public function get(string|array $possibleEnvNames, mixed $default = NULL, bool $strict = FALSE): mixed {
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
					return $envValue;
				}
			}
		}

		return $default;
	}

}