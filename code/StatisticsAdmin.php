<?php

class StatisticsAdmin extends LeftAndMain {
	static $tree_class = "SiteTree";
	static $subitem_class = "Member";
	var $charts = array();

	/**
	 * Initialisation method called before accessing any functionality that BulkLoaderAdmin has to offer
	 */
	public function init() {
		parent::init();

		//Get rid of prototype 1.4.x
		Requirements::clear();

		//Load prototype 1.5.x
		Requirements::javascript("jsparty/prototype15.js");

		//Restore needed requirements
		Requirements::javascript("jsparty/behaviour.js");
		Requirements::javascript("jsparty/prototype_improvements.js");
		Requirements::javascript("jsparty/loader.js");

		Requirements::javascript("jsparty/layout_helpers.js");
		Requirements::javascript("jsparty/tree/tree.js");
		Requirements::css("jsparty/tree/tree.css");
		Requirements::javascript("jsparty/scriptaculous/effects.js");
		Requirements::javascript("jsparty/scriptaculous/dragdrop.js");

		Requirements::javascript("jsparty/tabstrip/tabstrip.js");
		Requirements::css("jsparty/tabstrip/tabstrip.css");


		Requirements::css("jsparty/greybox/greybox.css");
		Requirements::javascript("jsparty/greybox/AmiJS.js");
		Requirements::javascript("jsparty/greybox/greybox.js");

		Requirements::javascript("cms/javascript/LeftAndMain.js");
		Requirements::javascript("cms/javascript/LeftAndMain_left.js");
		Requirements::javascript("cms/javascript/LeftAndMain_right.js");

		Requirements::javascript("jsparty/calendar/calendar.js");
		Requirements::javascript("jsparty/calendar/lang/calendar-en.js");
		Requirements::javascript("jsparty/calendar/calendar-setup.js");
		Requirements::css("sapphire/css/CalendarDateField.css");
		Requirements::css("jsparty/calendar/calendar-win2k-1.css");

		Requirements::javascript('sapphire/javascript/Validator.js');

		Requirements::css("sapphire/css/SubmittedFormReportField.css");

		Requirements::css('cms/css/TinyMCEImageEnhancement.css');
		Requirements::javascript("jsparty/SWFUpload/SWFUpload.js");
		Requirements::javascript("cms/javascript/Upload.js");
		Requirements::javascript("sapphire/javascript/Security_login.js");
		Requirements::javascript('cms/javascript/TinyMCEImageEnhancement.js');


		//Load statistics requirements
		Requirements::javascript("jsparty/plotr.js");
		Requirements::javascript("jsparty/tablesort.js");
		Requirements::javascript("cms/javascript/StatisticsAdmin.js");

		Requirements::css("cms/css/StatisticsAdmin.css");
	}

	public function Link($action=null) {
		return "admin/statistics/$action";
	}

	/**
	 * Form that will be shown when we open one of the items
	 */
	public function EditForm() {
		return $this->showAll();
	}


	function Trend() {
		return Statistics::TrendChart(array('Member', 'SiteTree', 'Group'), 'day', 'mchart', 'Line', 'red');
	}

	function BrowserPie() {
		return Statistics::BrowserChart();
	}

	function UserTable() {
		//Statistics::getBrowserChart();
		return Statistics::UserRecordTable();
	}

	function ViewTable() {
		return Statistics::getViews('all');
	}

	public function users($params) {
		return Statistics::UserRecordTable();
	}

	function showAll() {
		return $this->BrowserPie() .
		$this->Trend() .
		$this->UserTable() .
		$this->ViewTable();
	}

}

?>
