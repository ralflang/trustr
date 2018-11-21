<?php
/**
 * Base class for PageOutput controllers
 * Provides similar functionality as the PageOutput tool, but outputs to a response object rather than the output buffer
 *
 */
abstract class Trustr_PageOutput_Controller extends Horde_Controller_Base
{
    function processRequest(Horde_Controller_Request $request, Horde_Controller_Response $response)
}