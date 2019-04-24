<?php
/**
 * Moolahgo Model
 */
class Moolahgo extends Model
{

    /**
     * Calculate function
     *
     * @param array $post
     * @return void
     */
    public function calculate($post){
        $percentage = isset($post['percentage']) ? $post['percentage'] : 0;
        $final_amount = $post['amount'] + (($percentage / 100) * $post['amount']);

        $session_data['date'] = $post['date'];
        $session_data['amount'] = $post['amount'];
        $session_data['percentage'] = $percentage;
        $session_data['final_amount'] = $final_amount;

        /**
         * For saving the transaction to database
         */
        //$this->store($session_data);
        
        $_SESSION['transactions'][] = $session_data;

        $_SESSION['success'] = 'Transaction has been saved.';
    }

/**
 * store function
 *
 * @param array $session_data
 * @return void
 */

/*
    public function store($session_data)
    {
        $sql = "INSERT INTO transactions (date, amount, percentage, final_amount) VALUES (:date, :amount, :percentage, :final_amount)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($session_data);
    }
*/


}
?>