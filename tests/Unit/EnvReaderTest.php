<?php
declare(strict_types=1);

namespace Kristos80\EnvReader\Tests\Unit;

use Kristos80\EnvReader\EnvReader;
use Kristos80\EnvReader\Tests\TestBase;

final class EnvReaderTest extends TestBase {

	/**
	 * @var EnvReader
	 */
	private EnvReader $envReader;

	/**
	 * @return void
	 */
	public function testEqualityArrayToArray(): void {
		$true = $this->envReader->equals(["TEST_VARIABLE"], ["test_value"], TRUE);
		$this->assertTrue($true);

		$false = $this->envReader->equals(["test_variable"], ["test_value"], TRUE);
		$this->assertFalse($false);

		$true = $this->envReader->equals(["TEST_VARIABLE"], ["test_value"]);
		$this->assertTrue($true);

		$true = $this->envReader->equals(["test_variable"], ["test_value"]);
		$this->assertTrue($true);

		$false = $this->envReader->equals(["TEST_VARIABLE"], ["no_value"], TRUE);
		$this->assertFalse($false);

		$false = $this->envReader->equals(["test_variable"], ["no_value"], TRUE);
		$this->assertFalse($false);

		$false = $this->envReader->equals(["TEST_VARIABLE"], ["no_value"]);
		$this->assertFalse($false);

		$false = $this->envReader->equals(["test_variable"], ["no_value"]);
		$this->assertFalse($false);
	}

	/**
	 * @return void
	 */
	public function testEqualityArrayToString(): void {
		$true = $this->envReader->equals(["TEST_VARIABLE"], "test_value", TRUE);
		$this->assertTrue($true);

		$false = $this->envReader->equals(["test_variable"], "test_value", TRUE);
		$this->assertFalse($false);

		$true = $this->envReader->equals(["TEST_VARIABLE"], "test_value");
		$this->assertTrue($true);

		$true = $this->envReader->equals(["test_variable"], "test_value");
		$this->assertTrue($true);

		$false = $this->envReader->equals(["TEST_VARIABLE"], "no_value", TRUE);
		$this->assertFalse($false);

		$false = $this->envReader->equals(["test_variable"], "no_value", TRUE);
		$this->assertFalse($false);

		$false = $this->envReader->equals(["TEST_VARIABLE"], "no_value");
		$this->assertFalse($false);

		$false = $this->envReader->equals(["test_variable"], "no_value");
		$this->assertFalse($false);
	}

	/**
	 * @return void
	 */
	public function testEqualityStringToArray(): void {
		$true = $this->envReader->equals("TEST_VARIABLE", ["test_value"], TRUE);
		$this->assertTrue($true);

		$false = $this->envReader->equals("test_variable", ["test_value"], TRUE);
		$this->assertFalse($false);

		$true = $this->envReader->equals("TEST_VARIABLE", ["test_value"]);
		$this->assertTrue($true);

		$true = $this->envReader->equals("test_variable", ["test_value"]);
		$this->assertTrue($true);

		$false = $this->envReader->equals("TEST_VARIABLE", ["no_value"], TRUE);
		$this->assertFalse($false);

		$false = $this->envReader->equals("test_variable", ["no_value"], TRUE);
		$this->assertFalse($false);

		$false = $this->envReader->equals("TEST_VARIABLE", ["no_value"]);
		$this->assertFalse($false);

		$false = $this->envReader->equals("test_variable", ["no_value"]);
		$this->assertFalse($false);
	}

	/**
	 * @return void
	 */
	public function testEqualityStringToString(): void {
		$true = $this->envReader->equals("TEST_VARIABLE", "test_value", TRUE);
		$this->assertTrue($true);

		$false = $this->envReader->equals("test_variable", "test_value", TRUE);
		$this->assertFalse($false);

		$true = $this->envReader->equals("TEST_VARIABLE", "test_value");
		$this->assertTrue($true);

		$true = $this->envReader->equals("test_variable", "test_value");
		$this->assertTrue($true);

		$false = $this->envReader->equals("TEST_VARIABLE", "no_value", TRUE);
		$this->assertFalse($false);

		$false = $this->envReader->equals("test_variable", "no_value", TRUE);
		$this->assertFalse($false);

		$false = $this->envReader->equals("TEST_VARIABLE", "no_value");
		$this->assertFalse($false);

		$false = $this->envReader->equals("test_variable", "no_value");
		$this->assertFalse($false);
	}

	/**
	 * @return void
	 */
	public function testGetString(): void {
		$value = $this->envReader->get("TEST_VARIABLE", NULL, TRUE);
		$this->assertEquals("test_value", $value);

		$value = $this->envReader->get("test_variable", NULL, TRUE);
		$this->assertNotEquals("test_value", $value);

		$value = $this->envReader->get("TEST_VARIABLE");
		$this->assertEquals("test_value", $value);

		$value = $this->envReader->get("test_variable");
		$this->assertEquals("test_value", $value);
	}

	/**
	 * @return void
	 */
	public function testGetArray(): void {
		$value = $this->envReader->get(["TEST_VARIABLE"], NULL, TRUE);
		$this->assertEquals("test_value", $value);

		$value = $this->envReader->get(["test_variable"], NULL, TRUE);
		$this->assertNotEquals("test_value", $value);

		$value = $this->envReader->get(["TEST_VARIABLE"]);
		$this->assertEquals("test_value", $value);

		$value = $this->envReader->get(["test_variable"]);
		$this->assertEquals("test_value", $value);
	}

	/**
	 * @return void
	 */
	public function testFallbackValue(): void {
		$fallbackValue = $this->envReader->get("NON_EXISTING", NULL, TRUE);
		$this->assertNull($fallbackValue);

		$fallbackValue = $this->envReader->get(["NON_EXISTING"], NULL, TRUE);
		$this->assertNull($fallbackValue);

		$fallbackValue = $this->envReader->get("NON_EXISTING");
		$this->assertNull($fallbackValue);

		$fallbackValue = $this->envReader->get(["NON_EXISTING"]);
		$this->assertNull($fallbackValue);

		$fallbackValue = $this->envReader->get("NON_EXISTING", "A", TRUE);
		$this->assertEquals("A", $fallbackValue);

		$fallbackValue = $this->envReader->get(["NON_EXISTING"], "A", TRUE);
		$this->assertEquals("A", $fallbackValue);

		$fallbackValue = $this->envReader->get("NON_EXISTING", "A");
		$this->assertEquals("A", $fallbackValue);

		$fallbackValue = $this->envReader->get(["NON_EXISTING"], "A");
		$this->assertEquals("A", $fallbackValue);
	}

	/**
	 * @return void
	 */
	protected function setUp(): void {
		parent::setUp();
		$this->envReader = new EnvReader();
	}
}