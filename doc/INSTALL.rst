========================
 Installing Trustr H5
========================

:Contact: foo@example.com

.. contents:: Contents
.. section-numbering::

This document contains instructions for installing the Trustr ...

For information on the capabilities and features of Trustr, see the file
README_ in the top-level directory of the Trustr distribution.


Prerequisites
=============

To function properly, Trustr **requires** the following:

1. A working Horde installation.

   Trustr runs within the `Horde Application Framework`_, a set of common
   tools for web applications written in PHP.  You must install Horde before
   installing Trustr.

   .. Important:: Trustr H5 requires version 5.0+ of the Horde Framework -
                  earlier versions of Horde will **not** work.

   .. Important:: Be sure to have completed all of the steps in the
                  `horde/doc/INSTALL`_ file for the Horde Framework before
                  installing Trustr. Many of Trustr's prerequisites are
                  also Horde prerequisites. Additionally, many of Trustr's
                  optional features are configured via the Horde install.

   .. _`Horde Application Framework`: http://www.horde.org/apps/horde

2. The following PHP capabilities:

   a. FOO support ``--with-foo`` [OPTIONAL]

      Description of Foo and what it is used for.

3. The following PEAR packages:
   (See `horde/doc/INSTALL`_ for instructions on installing PEAR packages)

   .. Important:: If you are going to install Trustr the recommended way,
                  i.e. using the PEAR installer, you can skip the remainder of
                  this section. Installing Trustr through PEAR will
                  automatically download and install all required PEAR modules.

   a. PEAR_Package x.x.x [OPTIONAL]

      Trustr uses the Foo_Bar class for...

4. The following PECL modules:
   (See `horde/doc/INSTALL`_ for instructions on installing PECL modules)

   a. pecl_package x.x.x [OPTIONAL]

      pecl_package is required to...


The following items are not required, but are strongly **RECOMMENDED**:

1. Yet something else.


Installing Trustr
===================

The **RECOMMENDED** way to install Trustr is using the PEAR installer.
Alternatively, if you want to run the latest development code or get the latest
not yet released fixes, you can install Trustr from Git.

Installing with PEAR
~~~~~~~~~~~~~~~~~~~~

First follow the instructions in `horde/doc/INSTALL`_ to prepare a PEAR
environment for Horde and install the Horde Framework.

When installing Trustr through PEAR now, the installer will automatically
install any dependencies of Trustr too. If you want to install Trustr with
all optional dependencies, but without the binary PECL packages that need to be
compiled, specify both the ``-a`` and the ``-B`` flag::

   pear install -a -B horde/trustr

By default, only the required dependencies will be installed::

   pear install horde/trustr

If you want to install Trustr even with all binary dependencies, you need to
remove the ``-B`` flag. Please note that this might also try to install PHP
extensions through PECL that might need further configuration or activation in
your PHP configuration::

   pear install -a horde/trustr

Installing from Release Tarballs
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

.. Important:: As of today, there are no tarballs released for Trustr 1
               yet. Please use the `Installing with PEAR`_ method to install
               Trustr 1.

Trustr can be obtained from the Horde website and FTP server, at

   http://www.horde.org/apps/trustr

   ftp://ftp.horde.org/pub/trustr/

Or use the mirror closest to you:

   http://www.horde.org/mirrors.php

Trustr is written in PHP, and must be installed in a web-accessible
directory. The precise location of this directory will differ from system to
system. Conventionally, Trustr is installed directly underneath Horde in the
web server's document tree.

Since Trustr is written in PHP, there is no compilation necessary; simply
expand the distribution where you want it to reside and rename the root
directory of the distribution to whatever you wish to appear in the URL. For
example, with the Apache web server's default document root of
``/usr/local/apache/htdocs``, you would type::

   cd /usr/local/apache/htdocs/horde
   tar zxvf /path/to/trustr-h3-x.y.z.tar.gz
   mv trustr-h3-x.y.z trustr

and would then find Trustr at the URL::

   http://your-server/horde/trustr/

Installing from Git
~~~~~~~~~~~~~~~~~~~

See http://www.horde.org/source/git.php


Configuring Trustr
====================

1. Configuring Trustr

   You must login to Horde as a Horde Administrator to finish the
   configuration of Trustr. Use the Horde ``Administration`` menu item to
   get to the administration page, and then click on the ``Configuration``
   icon to get the configuration page. Select ``Trustr Name`` from the
   selection list of applications. Fill in or change any configuration values
   as needed. When done click on ``Generate Trustr Name Configuration`` to
   generate the ``conf.php`` file. If your web server doesn't have write
   permissions to the Trustr configuration directory or file, it will not be
   able to write the file. In this case, go back to ``Configuration`` and
   choose one of the other methods to create the configuration file
   ``trustr/config/conf.php``.

   Documentation on the format and purpose of the other configuration files in
   the ``config/`` directory can be found in each file. You may create
   ``*.local.php`` versions of these files if you wish to customize Trustr's
   appearance and behavior. See the header of the configuration files for
   details and examples. The defaults will be correct for most sites.

2. Creating the database tables

   Once you finished the configuration in the previous step, you can create all
   database tables by clicking the ``DB schema is out of date.`` link in the
   Trustr row of the configuration screen.

   Alternatively creating the Trustr database tables can be accomplished with
   Horde's ``horde-db-migrate`` utility.  If your database is properly setup in
   the Horde configuration, just run the following::

      horde-db-migrate trustr

3. More instructions, upgrading, securing, etc.

4. Testing Trustr

   Once you have configured Trustr, bring up the included test page in your
   Web browser to ensure that all necessary prerequisites have been met. See
   the `horde/doc/INSTALL`_ document for further details on the Horde test
   script.

   The test script will also allow you to test...

   Next, use Trustr to.... Test at least the following:

   - Foo
   - Bar


Known Problems
==============

...


Obtaining Support
=================

If you encounter problems with Trustr, help is available!

The Horde Frequently Asked Questions List (FAQ), available on the Web at

  http://wiki.horde.org/FAQ

The Horde Project runs a number of mailing lists, for individual applications
and for issues relating to the project as a whole. Information, archives, and
subscription information can be found at

  http://www.horde.org/community/mail

Lastly, Horde developers, contributors and users may also be found on IRC,
on the channel #horde on the Freenode Network (irc.freenode.net).

Please keep in mind that Trustr is free software written by volunteers.
For information on reasonable support expectations, please read

  http://www.horde.org/community/support

Thanks for using Trustr!

The Trustr team


.. _README: README
.. _`horde/doc/INSTALL`: ../../horde/doc/INSTALL
.. _`horde/doc/TRANSLATIONS`: ../../horde/doc/TRANSLATIONS
