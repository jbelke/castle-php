<?php

abstract class Castle
{
  public static $apiKey;

  public static $apiBase = 'https://api.castle.io';

  public static $apiVersion = 'v1';

  public static $tokenStore = 'Castle_TokenStore';

  public static $cookieStore = 'Castle_CookieStore';

  public static $scrubHeaders = array('Cookie');

  const VERSION = '1.4.0';

  public static function getApiKey()
  {
    return self::$apiKey;
  }

  public static function setApiKey($apiKey)
  {
    self::$apiKey = $apiKey;
  }

  public static function getApiVersion()
  {
    return self::$apiVersion;
  }

  public static function setApiVersion($apiVersion)
  {
    self::$apiVersion = $apiVersion;
  }

  public static function getCookieStore()
  {
    return new self::$cookieStore;
  }

  public static function getTokenStore()
  {
    return new self::$tokenStore(self::getCookieStore());
  }

  public static function setTokenStore($serializerClass)
  {
    self::$tokenStore = $serializerClass;
  }


  /**
   * Authenticate an action
   * @param  String $attributes 'user_id' and 'name' are required
   * @return Castle_Authenticate
   */
  public static function authenticate(Array $attributes)
  {
    $auth = new Castle_Authenticate($attributes);
    $auth->save();
    return $auth;
  }

  /**
   * Authenticate an action
   * @param  String $attributes 'user_id' and 'name' are required
   * @return Castle_Authenticate
   */
  public static function fetchReview($id)
  {
    return Castle_Review::find($id);
  }

   /**
   * Updates user information. Call when a user logs in or updates their information.
   * @param  String $user_id  Id of the user
   * @param  Array  $traits   Additional user properties
   * @return  None
   */
  public static function identify($user_id, Array $traits)
  {
    $request = new Castle_Request();
    $request->send('post', '/identify', Array(
      'user_id' => $user_id,
      'traits' => $traits
    ));
  }

  /**
   * Track a security event
   * @param  Array  $attributes An array of attributes to track. The 'name' key
   *                            is required
   * @return None
   */
  public static function track(Array $attributes)
  {
    $request = new Castle_Request();
    $request->send('post', '/track', $attributes);
  }
}
