<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;
/**
 * ContactForm is the model behind the contact form.
 */
class EncrptionDecription extends Model
{

  function doEncrypt($string) {

    $key = "MAL_979805"; //key to encrypt and decrypts.
    $result = '';
    $test = "";
     for($i=0; $i<strlen($string); $i++) {
       $char = substr($string, $i, 1);
       $keychar = substr($key, ($i % strlen($key))-1, 1);
       $char = chr(ord($char)+ord($keychar));

       $test[$i] = ord($char)+ord($keychar);
       $result.=$char;
     }

     return urlencode(base64_encode($result));
    }

    function doDecrypt($string) {
      $key = "MAL_979805"; //key to encrypt and decrypts.
      $result = '';
      $string = base64_decode(urldecode($string));
     for($i=0; $i<strlen($string); $i++) {
       $char = substr($string, $i, 1);
       $keychar = substr($key, ($i % strlen($key))-1, 1);
       $char = chr(ord($char)-ord($keychar));
       $result.=$char;
     }
     return $result;
    }
}
