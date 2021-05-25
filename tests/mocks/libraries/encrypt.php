<<<<<<< HEAD
<?php

class Mock_Libraries_Encrypt extends CI_Encrypt {

	// Override inaccessible protected method
	public function __call($method, $params)
	{
		if (is_callable(array($this, '_'.$method)))
		{
			return call_user_func_array(array($this, '_'.$method), $params);
		}

		throw new BadMethodCallException('Method '.$method.' was not found');
	}

}
=======
<?php

class Mock_Libraries_Encrypt extends CI_Encrypt {

	// Override inaccessible protected method
	public function __call($method, $params)
	{
		if (is_callable(array($this, '_'.$method)))
		{
			return call_user_func_array(array($this, '_'.$method), $params);
		}

		throw new BadMethodCallException('Method '.$method.' was not found');
	}

}
>>>>>>> b3f1f4d90d1eabdebbe8975d147371d3590c4858
