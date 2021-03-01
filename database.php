<?php

class database
{
  private $host = "localhost";
  private $user = "root";
  private $pass = "";
  private $name = "odev5";
  private $char = "utf8";
  private $table;
  protected $db = null;
  protected $sql;

  function __construct()
  {
    try {
         $this->db = new PDO(
           "mysql:host=$this->host;dbname=$this->name;charset=$this->char", $this->user, $this->pass
         );
    } catch ( PDOException $e ){
         print_r($e->getMessage());
    		 exit;
    }
  }

  public function __destruct()
  {
    $this->db = null;
    $this->query = '';
  }

  public function table($name)
  {
    $this->table = $name;
    return $this;
  }

  private function implode_keys($ayrac, array $array)
  {
  	return implode($ayrac, array_keys($array));
  }

  public function insert(array $data)
  {
    $this->sql = $this->db->prepare(
      'INSERT INTO ' . $this->table . ' (' . $this->implode_keys(',', $data) . ') VALUES (:' . $this->implode_keys(',:', $data) . ')'
    );
    return $this->sql->execute($data);
  }

  public function update(array $data, $wheres = null)
  {
    $sql = 'UPDATE ' . $this->table . ' SET ';
    foreach ($data as $key => $value) {
      $sql .= $key .'= :'. $key . ',';
    }
    $sql = substr_replace($sql, '', -1);

    $whereList = [];
    if ($wheres) {
      foreach ($wheres as $key => $value)
        $whereList[] = $key .' = :'. $key;
      $sql .= ' WHERE ' . implode(' AND ', $whereList);
      $data = array_merge($data, $wheres);
    }

    $this->sql = $this->db->prepare($sql);
    return $this->sql->execute($data);
  }

  public function select($wheres = [])
  {
    $whereList = [];
    foreach ($wheres as $key => $value)
      $whereList[] = $key .'='. $value;

    $where = '';
    if ($whereList)
      $where .= "WHERE " . implode(' AND ', $whereList);

    $this->sql = $this->db->query("SELECT * FROM $this->table $where");
    return $this;
  }

  public function single()
  {
    return $this->sql->fetch(PDO::FETCH_OBJ);
  }

  public function all()
  {
    return $this->sql->fetchAll(PDO::FETCH_OBJ);
  }

  public function count()
  {
    return count($this->sql->fetchAll(PDO::FETCH_OBJ));
  }

}
?>
