<?php


class DB
{
    protected $pdo;

    public function __construct($config)
    {
        // create PDO
        $this->pdo = new PDO(
            $config['connection'].';dbname='.$config['name'],
            $config['username'],
            $config['password'],
            $config['options']
        );
    }

    public function select($table, $select = '*', $where = '', $order = '',$limit ='')
    {
        $statement = $this->pdo->prepare("select {$select} from {$table} {$where} {$order} {$limit}");
        $statement -> execute();
        return json_decode(json_encode($statement->fetchAll(PDO::FETCH_CLASS)),true);
    }

    public function insert($table, $param){

        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($param)),
            ':' . implode(', :', array_keys($param))
        );

        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute($param);
        } catch (Exception $e) {
            var_dump($e);
        }
    }

    public function update($table, $param, $where){

        $keys = array();
        foreach ($param as $k=>$v){
            $keys[] = $k.' = :'.$k;
        }
        $newWhere = array();
        foreach ($where as $k=>$v){
            $newWhere[] = $k.' = :'.$k;
        }

        $sql = sprintf(
            'update %s set %s where %s',
            $table,
            implode(', ', $keys),
            implode(' and ', $newWhere)
        );

        $allParams = array_merge($param,$where);

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($allParams);
        } catch (Exception $e) {
            var_dump($e);
        }
    }

    public function delete($table, $where)
    {
        $newWhere = array();
        foreach ($where as $k=>$v){
            $newWhere[] = $k.' = :'.$k;
        }

        $sql = sprintf(
            'delete from %s where %s',
            $table,
            implode(' and ', $newWhere)
        );

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($where);
        } catch (Exception $e) {
            var_dump($e);
        }
    }
}