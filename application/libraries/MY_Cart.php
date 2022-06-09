<?php

if (!defined('BASEPATH'))
    exit('No direct access allowed.');

class MY_Cart extends CI_Cart {

    public $CI;

    function __construct() {
        parent::__construct();

        $this->CI = & get_instance();
    }

    function format_number($n = '') {
        if ($n == '') {
            return '';
        }

        // Remove anything that isn't a number or decimal point.
        $n = trim(preg_replace('/([^0-9\.])/i', '', $n));

        return number_format($n, 2, '.', '');
    }

    /**
     * Insert
     *
     * @access	private
     * @param	array
     * @return	bool
     */
    function _insert($items = array()) {
        // Was any cart data passed? No? Bah...
        if (!is_array($items) OR count($items) == 0) {
            log_message('error', 'The insert method must be passed an array containing data.');
            return FALSE;
        }

        // Does the $items array contain an id, quantity, price, and name?  These are required
        if (!isset($items['id']) OR ! isset($items['qty']) OR ! isset($items['price']) OR ! isset($items['name'])) {
            log_message('error', 'The cart array must contain a product ID, quantity, price, and name.');
            return FALSE;
        }

        // Prep the quantity. It can only be a number.  Duh...
        $items['qty'] = trim(preg_replace('/([^0-9])/i', '', $items['qty']));
        // Trim any leading zeros
        $items['qty'] = trim(preg_replace('/(^[0]+)/i', '', $items['qty']));

        // If the quantity is zero or blank there's nothing for us to do
        if (!is_numeric($items['qty']) OR $items['qty'] == 0) {
            return FALSE;
        }

        // Validate the product ID. It can only be alpha-numeric, dashes, underscores or periods
        // Not totally sure we should impose this rule, but it seems prudent to standardize IDs.
        // Note: These can be user-specified by setting the $this->product_id_rules variable.
        if (!preg_match("/^[" . $this->product_id_rules . "]+$/i", $items['id'])) {
            log_message('error', 'Invalid product ID.  The product ID can only contain alpha-numeric characters, dashes, and underscores');
            return FALSE;
        }

        // Validate the product name. It can only be alpha-numeric, dashes, underscores, colons or periods.
        // Note: These can be user-specified by setting the $this->product_name_rules variable.
       

        // Is the price a valid number?
        if (!is_numeric($items['price'])) {
            log_message('error', 'An invalid price was submitted for product ID: ' . $items['id']);
            return FALSE;
        }

        // --------------------------------------------------------------------
        // We now need to create a unique identifier for the item being inserted into the cart.
        // Every time something is added to the cart it is stored in the master cart array.
        // Each row in the cart array, however, must have a unique index that identifies not only
        // a particular product, but makes it possible to store identical products with different options.
        // For example, what if someone buys two identical t-shirts (same product ID), but in
        // different sizes?  The product ID (and other attributes, like the name) will be identical for
        // both sizes because it's the same shirt. The only difference will be the size.
        // Internally, we need to treat identical submissions, but with different options, as a unique product.
        // Our solution is to convert the options array to a string and MD5 it along with the product ID.
        // This becomes the unique "row ID"
        if (isset($items['options']) AND count($items['options']) > 0) {
            $rowid = md5($items['id'] . implode('', $items['options']));
        } else {
            // No options were submitted so we simply MD5 the product ID.
            // Technically, we don't need to MD5 the ID in this case, but it makes
            // sense to standardize the format of array indexes for both conditions
            $rowid = md5($items['id']);
        }

        // Now that we have our unique "row ID", we'll add our cart items to the master array
        // let's unset this first, just to make sure our index contains only the data from this submission
        unset($this->_cart_contents[$rowid]);

        // Create a new index with our new row ID
        $this->_cart_contents[$rowid]['rowid'] = $rowid;

        // And add the new items to the cart array
        foreach ($items as $key => $val) {
            $this->_cart_contents[$rowid][$key] = $val;
        }

        // Woot!
        return TRUE;
    }

}
