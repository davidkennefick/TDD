<?php
/**
 * David Kennefick
 * C08098336
 * Lab 1 - WAA - BankAccountTest.php
 */
require_once("../SimpleTest/autorun.php");
class BankAccountTest extends UnitTestCase
{
	public $ba;
    public function setUp()
    {
    require_once("../app/BankAccount.php");
        $this -> ba = new BankAccount(); //create new instance based on BankAccount.php
    }
	public function tearDown()
    {
        $this -> ba = 0.00; //reset value back to 0.00
    }

    /**
     * @covers BankAccount::getBalance
     * As with BankAccount.php, build in modular format to allow reproducibility.
     */
    public function testBalance()
    {
    	$equals = $this -> ba -> getBalance();
    	$this -> assertEqual(0.00, $equals);
    	$this -> ba -> setBalance(10000);
    	$equals = $this -> ba -> getBalance();
    	$this -> assertEqual(10000.00, $equals);
    }

    /**
     * @covers BankAccount::withdrawMoney
     * @covers BankAccount::withdrawMoney
     */
    public function testsetBalance()
    {
        $equals = $this -> ba -> setBalance(500);
 		$this -> assertEqual(500, $equals);
 		$equals = $this -> ba -> setBalance(888.88);
 		$this -> assertEqual(888.88, $equals);
 		$equals = $this -> ba -> setBalance("100"); //treat string as the same. Allows for 10,000.00 instead of 10000.00
 		$this -> assertEqual(100, $equals);
 		$this -> assertFalse($this -> ba -> setBalance(-9));
		$this -> assertFalse($this -> ba -> setBalance("yvanehtnoij"));
    }

    /**
     * @covers BankAccount::depositMoney
     */
    public function testDeposit()
	{
        $equals = $this -> ba -> depositMoney(500);
 		$this -> assertEqual(500.00, $equals);
 		$equals = $this -> ba -> depositMoney(888.88);
 		$this -> assertEqual(888.88, $equals);
 		$equals = $this -> ba -> depositMoney("100");
 		$this -> assertEqual(100, $equals);
 		$this -> assertFalse($this -> ba -> depositMoney(-9));
		$this -> assertFalse($this -> ba -> depositMoney("yvanehtnoij"));
    }

    /**
     * @covers BankAccount::getBalance
     * @covers BankAccount::depositMoney
     * @covers BankAccount::withdrawMoney
     */
    public function testWithdraw()
    {
		$this -> assertFalse($this -> ba -> withdrawMoney(1));
		$this -> ba -> setBalance(1000); 
		$equals = $this -> ba -> withdrawMoney(400);
		$this -> assertEqual(600.00, $equals);
		$equals = $this -> ba -> withdrawMoney("400");
		$this -> assertEqual(200.00, $equals);
		$this -> assertFalse($this -> ba -> withdrawMoney(-9000));
		$this -> assertFalse($this -> ba -> withdrawMoney(1001));//more than the current value
		$this -> assertFalse($this -> ba -> withdrawMoney("yvanehtnoij"));
    }
}
?>