<<<<<<< HEAD
#############################
Upgrading from 2.1.4 to 2.2.x
#############################

.. note:: The :doc:`Encrypt Class </libraries/encrypt>` now requires the
	Mcrypt extension. If you were previously using the Encrypt Class
	without Mcrypt, then this is a breaking change.  You must install
	the Mcrypt extension in order to upgrade. For information on
	installing Mcrypt please see the PHP `documentation
	<https://secure.php.net/manual/en/mcrypt.setup.php>`.

Before performing an update you should take your site offline by
replacing the index.php file with a static one.

Step 1: Update your CodeIgniter files
=====================================

Replace all files and directories in your "system" folder.

.. note:: If you have any custom developed files in these folders please
=======
#############################
Upgrading from 2.1.4 to 2.2.x
#############################

.. note:: The :doc:`Encrypt Class </libraries/encrypt>` now requires the
	Mcrypt extension. If you were previously using the Encrypt Class
	without Mcrypt, then this is a breaking change.  You must install
	the Mcrypt extension in order to upgrade. For information on
	installing Mcrypt please see the PHP `documentation
	<https://secure.php.net/manual/en/mcrypt.setup.php>`.

Before performing an update you should take your site offline by
replacing the index.php file with a static one.

Step 1: Update your CodeIgniter files
=====================================

Replace all files and directories in your "system" folder.

.. note:: If you have any custom developed files in these folders please
>>>>>>> b3f1f4d90d1eabdebbe8975d147371d3590c4858
	make copies of them first.