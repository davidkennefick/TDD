<?php
/**
 * David Kennefick
 * C08098336
 * Lab 1 - WAA - BankAccount.php
 */
class BankAccount
{
    private $balance = 0.00; //balance set to 0.00 at the start. 0.00 is a baseline, can be 0.00001 in processing.

    /**
     * Set balance function. Function designed to be reusable with the logic being the editable part.
     */
    
    public function setBalance($newBalance)
    {
    	if (is_numeric($newBalance)){
	        if ($newBalance <= 0) {
	            return false;
	        } 
	        else
	        	$newBalance = round($newBalance, 2); //round function to set the balance to 2 decimal places. means we can accept values with more than 2 decimal points
	            return $this -> balance = $newBalance;;
	        }
    }
    
     /**
     * Get balance function
     */  
    
    public function getBalance()
    {
        return $this -> balance;
    }
    
     /**
     * Deposit function to add money coming in to existing balance
     */
    
    public function depositMoney($deposit)
    {
    	if (is_numeric($deposit)){
	        if ($deposit <= 0) {
	            return false;
	        } 
	        else
	        	$deposit = round($deposit, 2);
	            return $this -> balance + $deposit;
	        }
    }
    
     /**
     * Withdraw function to take money away from existing balance
     */
    
    public function withdrawMoney($withdraw)
    {
    	if (is_numeric($withdraw)){
	        if ($this -> balance < $withdraw){
	        	return false;
	        } 
    		if ($withdraw <= 0) {
	            return false;
	        }
	        else
	        	$withdraw = round($withdraw, 2);
				return $this -> balance -= $withdraw; //-= is a subtraction operand.
    	}
    }
}
?>