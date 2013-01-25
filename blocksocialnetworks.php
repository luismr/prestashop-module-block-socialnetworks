<?php
/*
 * Module ......: blocksocialnetworks
 * File ........: blocksocialnetworks.php
 * Description .: Simple Prestashop Module to publish Social Network links on template
 * Authot ......: Luis Machado Reis <luis.reis@singularideas.com.br>
 * Licence .....: GNU Lesser General Public License V3
 * Created .....: 01/09/2010
 */
class blocksocialnetworks extends Module {

	private $_html = '';
	private $linkTwitter = '';
	private $linkFacebook = '';
	private $linkFlickr = '';
	private $linkOrkut = '';
	private $linkPicasa = '';
	private $linkYoutube = '';

	function __construct() {
		$this->name = 'blocksocialnetworks';
		parent::__construct();

		$this->tab = 'SingularIdeas.com.br Modules';
		$this->version = '0.1';
		$this->displayName = $this->l('Social Networks Block');
		$this->description = $this->l('Links to your Social Networks Block');

		$this->_refresh();
	}

	function install() {
		if (parent::install() == false || $this->registerHook('leftColumn') == false) {
			return false;
		}
				
		return true;
	}

	public function getContent() {
		if (Tools::isSubmit('submit')) {
			$this->_update();
		}

		$this->_displayForm();
		return $this->_html;
	}
	
	public function _displayForm() {
		$this->_refresh();
		$this->_html .= '
			<form action="'.$_SERVER['REQUEST_URI'].'" method="post">
				<fieldset>
					<legend><img src="../modules/'.$this->name.'/logo.gif" />'.$this->l('Social Networks Links').'</legend>
					<label>'.$this->l('Twitter').'</label>
					<div class="margin-form">
						<input type="text" size="75" name="linkTwitter" value="'.$this->linkTwitter.'"/>
					</div>
					<label>'.$this->l('Facebook').'</label>
					<div class="margin-form">
						<input type="text" size="75" name="linkFacebook" value="'.$this->linkFacebook.'"/>
					</div>
					<label>'.$this->l('Flickr').'</label>
					<div class="margin-form">
						<input type="text" size="75" name="linkFlickr" value="'.$this->linkFlickr.'"/>
					</div>
					<label>'.$this->l('Orkut').'</label>
					<div class="margin-form">
						<input type="text" size="75" name="linkOrkut" value="'.$this->linkOrkut.'"/>
					</div>
					<label>'.$this->l('Youtube').'</label>
					<div class="margin-form">
						<input type="text" size="75" name="linkYoutube" value="'.$this->linkYoutube.'"/>
					</div>
					<label>'.$this->l('Picasa').'</label>
					<div class="margin-form">
						<input type="text" size="75" name="linkPicasa" value="'.$this->linkPicasa.'"/>
					</div>
					<input type="submit" name="submit" value="'.$this->l('Update').'" class="button" />
				</fieldset>
			</form>';	
	}

	/**
	* Returns module content for left column
	*
	* @param array $params Parameters
	* @return string Content
	*
	* @todo Links on tags (dedicated page or search ?)
	*/
	function hookLeftColumn($params) {
		global $smarty;

		$smarty->assign('linkTwitter', $this->linkTwitter);
		$smarty->assign('linkFacebook', $this->linkFacebook);
		$smarty->assign('linkFlickr', $this->linkFlickr);
		$smarty->assign('linkOrkut', $this->linkOrkut);
		$smarty->assign('linkYoutube', $this->linkYoutube);
		$smarty->assign('linkPicasa', $this->linkPicasa);
		$smarty->assign('linkPrefixImg', "/modules/blocksocialnetworks/img");
		

		return $this->display(__FILE__, 'blocksocialnetworks.tpl');
	}

	function hookRightColumn($params) {
		return $this->hookLeftColumn($params);
	}

	private function _refresh() {
		$this->linkTwitter = Configuration::get($this->name.'_linkTwitter');
		$this->linkFacebook = Configuration::get($this->name.'_linkFacebook');
		$this->linkFlickr = Configuration::get($this->name.'_linkFlickr');
		$this->linkYoutube = Configuration::get($this->name.'_linkYoutube');
		$this->linkOrkut = Configuration::get($this->name.'_linkOrkut');
		$this->linkPicasa = Configuration::get($this->name.'_linkPicasa');
	}
	
	private function _update() {
		Configuration::updateValue($this->name.'_linkTwitter', Tools::getValue('linkTwitter'));
		Configuration::updateValue($this->name.'_linkFacebook', Tools::getValue('linkFacebook'));
		Configuration::updateValue($this->name.'_linkFlickr', Tools::getValue('linkFlickr'));
		Configuration::updateValue($this->name.'_linkOrkut', Tools::getValue('linkOrkut'));
		Configuration::updateValue($this->name.'_linkPicasa', Tools::getValue('linkPicasa'));
		Configuration::updateValue($this->name.'_linkYoutube', Tools::getValue('linkYoutube'));
	}
}
