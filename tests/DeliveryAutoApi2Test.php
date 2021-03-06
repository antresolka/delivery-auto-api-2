<?php
namespace LisDev\Tests;
use LisDev\Delivery\DeliveryAutoApi2;
/**
 * phpUnit test class
 * 
 * @author lis-dev
 */
class DeliveryAutoApi2Test extends \PHPUnit_Framework_TestCase
{
	/**
	 * Instace of tested class
	 */
	private $da;
	
	/**
	 * Set up before class
	 */
	static function setUpBeforeClass() {
		// Disable notices
		error_reporting(E_ALL ^ E_NOTICE);
	}
	
	/**
	 * Set up before each test
	 */
	function setUp() {
		// Create new instance
		$this->da = new DeliveryAutoApi2();
	}
	
	/**
	 * Test GetRegionList result as json
	 */
	function testGetRegionListJson() {
		$result = $this
			->da
			->setFormat('json')
			->model('Public')
			->method('GetRegionList')
			// ->params()
			->execute();
		$this->assertTrue(is_string($result));
	}
	
	/**
	 * Test GetRegionList result as array
	 */
	function testGetRegionListArray() {
		$result = $this->da->getRegionList();
		$this->assertTrue($result['status']);
	}
	
	/**
	 * Test GetAreasList
	 */
	function testGetAreasList() {
		$result = $this->da->getAreasList();
		$this->assertTrue($result['status']);
	}
	
	/**
	 * Test GetWarehousesList
	 */
	function testGetWarehousesList() {
		// Random params, IDs from manual
		$result = $this->da->getWarehousesList(FALSE, '4fc948a7-3729-e311-8b0d-00155d037960', '');
		$this->assertTrue($result['status']);
	}
	
	/**
	 * Test GetWarehousesInfo
	 */
	function testGetWarehousesInfo() {
		// Random params, IDs from manual
		$result = $this->da->getWarehousesInfo('1c828aa6-70c8-e211-9902-00155d037919');
		$this->assertTrue($result['status']);
	}
	
	/**
	 * Test GetFindWarehouses
	 */
	function testGetFindWarehouses() {
		// Random params, get first 5 warehouses
		$result = $this->da->getFindWarehouses(5, 33.1150260000, 48.6727020000, TRUE);
		$this->assertTrue($result['status']);
	}
	
	/**
	 * Test GetWarehousesListInDetail
	 * TODO Uncomment when API method will be repeared (now is 404 error)
	function testGetWarehousesListInDetail() {
		// Random params
		$result = $this->da->getWarehousesListInDetail('c7ae6f68-3529-e311-8b0d-00155d037960');
		$this->assertTrue($result['status']);
	}
	*/
	
	/**
	 * Test GetReceiptDetails
	 */
	function testGetReceiptDetails() {
		// Random real TTN
		$result = $this->da->getReceiptDetails('2130071495');
		$this->assertTrue($result['status']);
	}
	
	/**
	 * Test GetDateArrival
	 */
	function testGetDateArrival() {
		// Random params, IDs from manual
		$result = $this->da->getDateArrival('4fc948a7-3729-e311-8b0d-00155d037960', '1e8e7257-a82a-e311-8b0d-00155d037960', '2014-12-28');
		$this->assertTrue($result['status']);
	}
	
	/**
	 * Test GetDopUslugiClassification
	 */
	function testGetDopUslugiClassification() {
		$result = $this->da->getDopUslugiClassification();
		$this->assertTrue($result['status']);
	}
	
	/**
	 * Test GetTariffCategory
	 */
	function testGetTariffCategory() {
		$result = $this->da->getTariffCategory();
		$this->assertTrue($result['status']);
	}
	
	/**
	 * Test GetDeliveryScheme
	 */
	function testGetDeliveryScheme() {
		$result = $this->da->getDeliveryScheme();
		$this->assertTrue($result['status']);
	}
	
	/**
	 * Test PostReceiptCalculateSimple
	 */
	function testPostReceiptCalculateSimple() {
		// Random params, IDs from manual
		$result = $this->da->postReceiptCalculateSimple(
			'4fc948a7-3729-e311-8b0d-00155d037960',
			'e3ac6f68-3529-e311-8b0d-00155d037960',
			'1c828aa6-70c8-e211-9902-00155d037919',
			'd908c5e1-b36b-e211-81e9-00155d012a15',
			1000000,
			'13.06.2014',
			3,
			1,
			1
		);
		$this->assertTrue($result['status']);
	}
}