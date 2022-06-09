<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('remove_space')) {

    function remove_space($var = '') {
        $string = str_replace(' ', '-', $var);
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
    }

}

if (!function_exists('dd')) {

    function dd($data = '') {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        exit();
    }

}
if (!function_exists('d')) {

    function d($data = '') {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    if (!function_exists('get_appsettings')) {

        function get_appsettings() {
            $ci = & get_instance();
            $ci->db->select('*');
            $ci->db->from('setting');
            $query = $ci->db->get();
            return $query->row();
        }

    }
    if (!function_exists('get_activethemes')) {

        function get_activethemes() {
            $ci = & get_instance();
            $ci->db->select('*');
            $ci->db->from('themes_tbl');
            $ci->db->where('status', 1);
            $query = $ci->db->get();
            return $query->row();
        }

    }
    if (!function_exists('get_currencyiconposition')) {

        function get_currencyiconposition($currency, $position, $amount) {
            $format = (($position == 1) ? "$currency $amount" : "$amount $currency");
            return $format;
        }

    }
}