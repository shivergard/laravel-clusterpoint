<?php namespace shivergard\Clusterpoint;

use Illuminate\Database\Connection;
use shivergard\Clusterpoint\ClusterPoint\Cluster as Cluster;

class ClusterpointConnection extends Connection {

    protected $db;
    protected $connection;

	/**
	 * @param array $config
	 */
	public function __construct(array $config = [])
	{
		$this->connection = $this->createConnection($config);
        $this->db = $this->connection->{$config['database']};
        $this->useDefaultPostProcessor();
	}

	/**
	 * @return Processor
	 */
	protected function getDefaultPostProcessor()
	{
		return new Processor;
	}


    protected function createConnection(array $config)
    {
        // Add credentials as options, this makes sure the connection will not fail if
        // the username or password contains strange characters.
        //connection
	    $connectionStrings = array(	
	      'tcp://78.154.146.20:9007',	
	      'tcp://78.154.146.21:9007',	
	      'tcp://78.154.146.22:9007',	
	      'tcp://78.154.146.23:9007',	
	    );	

        $cpsConn = new \CPS_Connection(
        	new \CPS_LoadBalancer($connectionStrings), 
        	$config['database'], 
        	$config['username'], 
        	$config['password'], 
        	'document', 
        	'//document/id', 
        	array('account' => $config['account_id'])
        );

        return $cpsConn;
    }



}
