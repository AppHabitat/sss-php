<?php

class ScreenshotShark {

  const API_URL = 'http://www.screenshotshark.com/capture';

  protected $options;
  protected $key;
  protected $secret;

  /**
   * Create a new instance of this class.
   * @param string $key    The service API key
   * @param string $secret Your secret key
   */
  public function __construct($key, $secret) {
    $this->key = $key;
    $this->secret = $secret;
  }

  /**
   * Create a SHA1 HMAC token.
   * @param  array $opts The screenshot options
   * @return string      The hash string
   */
  public function createHash($opts) {
    $data = sprintf('%s:%s:%s', $opts['time'], $opts['url'], $opts['op']);
    return hash_hmac('sha1', $data, $this->secret);
  }

  /**
   * Return the final URL for this screenshot.
   * @param  array  $opts The screenshot options
   * @return string       The screenshot URL
   */
  public function buildUrl($opts) {
    $opts = $opts + array(
      'time'      => time(),
      'gravity'   => 'north',
      'viewport'  => '1024x768',
      'full'      => false,
      'url'       => 'http://www.google.com/',
      'op'        => 'r:200:120',
    );
    $opts['token'] = $this->createHash($opts);
    $query = http_build_query($opts, NULL, '&');
    return self::API_URL . '?' . $query;
  }
}
