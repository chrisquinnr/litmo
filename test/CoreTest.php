<?php

include ('Core.php');

class CoreTest extends PHPUnit_Framework_TestCase {

	public function testCoreSources($passedArray = null){

		if(null == $passedArray){
			$core = new Core();
			$testArray = $core->sources;
		} else {
			$testArray = $passedArray;
		}


		foreach($testArray as $key => $sourceArray) {
			$this->assertInternalType( "int", $key );

		}

	}

	/**
	 * @depends testCoreSources
	 */
	public function testCoreSourcesTitle(){

		$core = new Core();

		foreach($core->sources as $key => $sourceArray) {

				// Title
			$this->assertArrayHasKey( 'title', $sourceArray );
			$this->assertNotEmpty( $sourceArray['title'] );
		}

	}


	/**
	 * @depends testCoreSources
	 */
	public function testCoreSourcesRealTitle(){

		$core = new Core();

		foreach($core->sources as $key => $sourceArray) {
			// Real title
			$this->assertArrayHasKey( 'real_title', $sourceArray );
			$this->assertNotEmpty( $sourceArray['real_title'] );
		}
	}

	/**
	 * @depends testCoreSources
	 */
	public function testCoreSourcesAnchor(){

		$core = new Core();

		foreach($core->sources as $key => $sourceArray) {
			// Anchor
			$this->assertArrayHasKey( 'anchor', $sourceArray );
			$this->assertNotEmpty( $sourceArray['anchor'] );
		}
	}

	/**
	 * @depends testCoreSources
	 */
	public function testCoreSourcesPath(){
		$core = new Core();

		foreach($core->sources as $key => $sourceArray) {
				// Source path
			$this->assertArrayHasKey( 'source', $sourceArray );
			$this->assertNotEmpty( $sourceArray['source'] );
		}
	}


	public function testGetDataFails(){
		$core = new Core();

		// Check fails
		$this->assertFalse($core->getData(false));

	}

	/**
	 * @depends testGetDataFails
	 */
	public function testGetDataReturnsAll(){
		$core = new Core();
		// Check array returned on 'all'
		$this->testCoreSources($core->getData('all'));
	}

	/**
	 * @depends testGetDataFails
	 */
	public function testGetDataReturnsSingle(){
		$core = new Core();

		$testArray = $core->getData(0);

		$this->assertArrayHasKey( 'title', $testArray );
		$this->assertNotEmpty( $testArray['title'] );

		$this->assertArrayHasKey( 'real_title', $testArray );
		$this->assertNotEmpty( $testArray['real_title'] );

		$this->assertArrayHasKey( 'anchor', $testArray );
		$this->assertNotEmpty( $testArray['anchor'] );

		$this->assertArrayHasKey( 'source', $testArray );
		$this->assertNotEmpty( $testArray['source'] );



	}
}