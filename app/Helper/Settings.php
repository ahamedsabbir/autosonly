<?php
namespace App\Helper;
use App\Models\Setting;
class Settings{


  public static function get(){
    return Setting::latest( 'id' )->first();
  }
}