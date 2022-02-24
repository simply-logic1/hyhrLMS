<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

 
    function test()
    {
        $data=array(

            'encryption_key'=>1111111111111111,

           'iv'=>2456378494765434,

            'encryption_mechanism'=>'aes-256-cbc'
        );
        return $data;

    }
function encrypt_url($string) {

    $output = false;

    /*

     * read security.ini file & get encryption_key | iv | encryption_mechanism value for generating encryption code

     */

  

  
    $CI=&get_instance();
    $security=test();
   
    //print $encryption_key;

    $secret_key = $security['encryption_key'];

    $secret_iv = $security['iv'];

    $encrypt_method = $security['encryption_mechanism'];

   

    // hash

    $key = hash('sha256', $secret_key);

 

    // iv – encrypt method AES-256-CBC expects 16 bytes – else you will get a warning

    $iv = substr(hash('sha256', $secret_iv), 0, 16);

 

    //do the encryption given text/string/number

 

        $result = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);

        $ret = base64_encode($result);

          $output = strtr(
                    $ret,
                    array(
                        '+' => '.',
                        '=' => '-',
                        '/' => '~'
                    )
                );

    return $output;

}

 

function decrypt_url($string) {

    $output = false;

 

  /*

     * read security.ini file & get encryption_key | iv | encryption_mechanism value for generating encryption code

     */

 

    $security=test();
  

    $secret_key = $security['encryption_key'];

    $secret_iv = $security['iv'];

    $encrypt_method = $security['encryption_mechanism'];

  

// hash

    $key = hash('sha256', $secret_key);

 

    // iv – encrypt method AES-256-CBC expects 16 bytes – else you will get a warning

    $iv = substr(hash('sha256', $secret_iv), 0, 16);

 

    //do the decryption given text/string/number

  

      $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);

    return $output;

}
