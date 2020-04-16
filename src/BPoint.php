<?php

namespace Omnipay\BPOINT;

class BPoint {
  public const BASE_URL = 'https://www.bpoint.com.au/';
  public const BASE_URL_UAT = 'https://bpoint-uat.premier.com.au/';

  /**
   * Return base url for the given mode.
   *
   * @param bool $uatMode
   *   Is UAT?
   * @return string
   *   Base url.
   */
  public static function getBaseUrl(bool $uatMode = false) {
    return $uatMode ? self::BASE_URL_UAT : self::BASE_URL;
  }
}
