<?php
/**
 * BaseModel model.
 *
 * Parent class for all models
 * @author Jaisen Mathai <jaisen@jmathai.com>
 */
class BaseModel
{
  /*
   * Constructor
   * Don't put any models in the constructor
   */
  public function __construct()
  {
    $this->api = getApi();
    $this->config = getConfig()->get();
    $this->logger = getLogger();
    $this->route = getRoute();
    $this->session = getSession();
    $this->cache = getCache();
    
    // really just for setup when the systems don't yet exist
    if(isset($this->config->systems))
    {
      $this->db = getDb();
      $this->fs = getFs();
    }
  }

  /*
   * Inject values for unit tests
   * returns void
   */
  public function inject($key, $value)
  {
    $this->$key = $value;
  }
}
