<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
// +----------------------------------------------------------------------+
// | PHP version 4                                                        |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2004 The PHP Group                                |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the PHP license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at                              |
// | http://www.php.net/license/2_02.txt.                                 |
// | If you did not receive a copy of the PHP license and are unable to   |
// | obtain it through the world-wide-web, please send a note to          |
// | license@php.net so we can mail you a copy immediately.               |
// +----------------------------------------------------------------------+
// | Author: Andrew Nagy <asnagy@webitecture.org>                         |
// +----------------------------------------------------------------------+
//
// $Id$

require_once 'Structures/DataGrid/Record.php';

/**
 * Structures_DataGrid_Record_DB Class
 *
 * @version  $Revision$
 * @author   Andrew S. Nagy <asnagy@webitecture.org>
 * @access   public
 * @package  Structures_DataGrid
 * @category Structures
 */
class Structures_DataGrid_Record_DB extends Structures_DataGrid_Record
{
    /**
     * Constructor
     *
     * Builds the record.  Accepts data as an DB_Result object.
     *
     * @access  public
     * @todo    Allow more data types.
     */
    function Structures_DataGrid_Record_DB($data = null)
    {
        $this->setRecord($data);
    }

    function setRecord($data)
    {
        if (get_class($data) == 'db_result') {
            parent::setRecord($data->fetchRow(DB_FETCHMODE_ASSOC));
        } else {
            return new PEAR_Error('Invalid data type. Data must be a DB_Result record');
        }
    }
}

?>
