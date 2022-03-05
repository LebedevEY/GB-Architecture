<?php

class DataBase {
    protected DBConnectionInterface $DBConnection;
    protected DBRecordInterface $DBRecord;
    protected DBQueryBuilderInterface $DBQueryBuilder;

    public function __construct(FactoryInterface $factory){
        $this->DBConnection = $factory->createConnection();
        $this->DBQueryBuilder = $factory->createQueryBuilder();
        $this->DBRecord = $factory->createRecord();
    }
}

interface DBConnectionInterface {}
interface DBRecordInterface {}
interface DBQueryBuilderInterface {}

class MysqlConnection implements DBConnectionInterface {}
class MysqlRecord implements DBRecordInterface {}
class MysqlQueryBuilder implements DBQueryBuilderInterface {}

class PostgreSQLConnection implements DBConnectionInterface {}
class PostgreSQLRecord implements DBRecordInterface {}
class PostgreSQLQueryBuilder implements DBQueryBuilderInterface {}

class OracleConnection implements DBConnectionInterface {}
class OracleRecord implements DBRecordInterface {}
class OracleQueryBuilder implements DBQueryBuilderInterface {}

interface FactoryInterface {
    public function createConnection(): DBConnectionInterface;
    public function createRecord(): DBRecordInterface;
    public function createQueryBuilder(): DBQueryBuilderInterface;
}

class MysqlFactory implements FactoryInterface {
    public function createConnection(): DBConnectionInterface
    {
        return new MysqlConnection();
    }

    public function createRecord(): DBRecordInterface
    {
        return new MysqlRecord();
    }

    public function createQueryBuilder(): DBQueryBuilderInterface
    {
        return new MysqlQueryBuilder();
    }
}

class PostgreSQLFactory implements FactoryInterface {
    public function createConnection(): DBConnectionInterface
    {
        return new PostgreSQLConnection();
    }

    public function createRecord(): DBRecordInterface
    {
        return new PostgreSQLRecord();
    }

    public function createQueryBuilder(): DBQueryBuilderInterface
    {
        return new PostgreSQLQueryBuilder();
    }
}

class OracleFactory implements FactoryInterface {
    public function createConnection(): DBConnectionInterface
    {
        return new OracleConnection();
    }

    public function createRecord(): DBRecordInterface
    {
        return new OracleRecord();
    }

    public function createQueryBuilder(): DBQueryBuilderInterface
    {
        return new OracleQueryBuilder();
    }
}
