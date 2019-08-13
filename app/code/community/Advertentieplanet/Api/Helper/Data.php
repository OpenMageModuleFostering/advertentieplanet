<?php
class Advertentieplanet_Api_Helper_Data extends Mage_Core_Helper_Data
{
	public function getExtensionVersion()
	{
		return (string) Mage::getConfig()->getNode()->modules->Advertentieplanet_Api->version;
	}
}