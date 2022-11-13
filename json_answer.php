<?php 

class JSON_Answer {

	public $status; 
	public $message; 


	function __construct($status, $message = '')
	{
		$count_parameters = func_num_args();

		$this->status = $status; 
		$this->message = $message;

		switch($count_parameters)
		{
			case 1:
				$response = [
						'status' => $this->status,
						'message'=> ''
					];
				
			case 2: 
				$response = [
						'status' => $this->status,
						'message'=> $this->message = $message
					];
		}
		echo json_encode($response);
	}
}