<?php
/**
 * This file defines basic constants for the proper functionning of the
 * framework.
 * 
 * @author Jean-Philippe Collette
 */

define("PATH_CONFIG", dirname(__FILE__)."/");
define("PATH", PATH_CONFIG."../");

define("PATH_TPL", "tpl/");
define("PATH_TPL_COMMON", "tpl/common/");
define("PATH_PLUGIN", "plugin/");
define("PATH_UPLOAD", "upload/");

define("EOL", "\r\n");
define("TAB", "\t");

// Définit si le mode de debug est par défaut activé ou non
define("DEBUG", 0);
define("ALL_ACCESS", 0);

define("STRUCTURE_NAME", "transeo");

define("DEFAULT_LANGUAGE", 1);

define("TPL", PATH_TPL."default/");

define("URL_SITE", "http://www.itstudents.be/~jipe/transeo/dev/site/");
define("EMAIL", "no-reply@intranet.transeo-association.net");

define("DATE_FORMAT", "%d/%m/%Y");
define("TIME_FORMAT", "%H:%M");

define("CHATSERVER_IP", "127.0.0.1");
define("CHATSERVER_PORT", "4242");
define("CHATROOMSERVER_PORT", "4243");

define("CHATSERVER_FILE_STATUS", "server_chat/server.status");
define("CHATSERVER_FILE_COMMAND", "server_chat/server.command");
define("CHATSERVER_FILE_ERROR", "server_chat/server.error");

/*******************/
/* MySQL CONSTANTS */
/*******************/

define("FORCE_LOCAL", 0);

define("SQL_PREFIX", "");
define("CONSTANT_PREFIX", "TABLE_");
?>