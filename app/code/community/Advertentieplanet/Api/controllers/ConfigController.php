<?php
class Advertentieplanet_Api_ConfigController extends Mage_Adminhtml_Controller_Action
{
    public function connectAction()
    {
		//create role
		Mage::getModel('easyads_api/access')->createRole();

		//create user
		$credentials = Mage::getModel('easyads_api/access')->createUser();

		$params = array();
		$params["username"] = $credentials["username"];
		$params["api_key"] = $credentials["api_key"];
		$params["mage_version"] = Mage::getVersion();
		$params["plugin_version"] = Mage::helper('easyads_api')->getExtensionVersion();
		$params["api"] = Mage::getBaseUrl() . "api/xmlrpc/";
		Mage::app()->cleanCache();

		$this->_redirectUrl("https://app.advertentieplanet.nl/link/magento?" . http_build_query($params,PHP_QUERY_RFC3986,'&'));
    }

	public function disconnectAction() {

		$params = array();
		$params["guid"] = Mage::getStoreConfig("advertentieplanet/api/register_guid", 0);
		Mage::app()->cleanCache();

		$this->_redirectUrl("https://app.advertentieplanet.nl/unlink/magento?" . http_build_query($params,PHP_QUERY_RFC3986,'&'));
	}
}