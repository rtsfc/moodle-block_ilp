<?php
require_once($CFG->dirroot.'/blocks/ilp/classes/form_elements/ilp_element_plugin.php');

class ilp_element_plugin_free_html extends ilp_element_plugin {

	public $tablename;
	public $data_entry_tablename;

    function __construct() {
        //no specific tables necessary
/*
    	$this->tablename = "block_ilp_plu_fre";
    	$this->data_entry_tablename = "block_ilp_plu_fre_ent";
*/
    	parent::__construct();
    }

    /**
    * this function returns the mform elements taht will be added to a report form
	* inherited elements are enough - there will never be user input
    */
    public	function entry_form( &$mform ) {
    	
/*
    	$fieldname	=	"{$this->reportfield_id}_field";
        //no description necessary for this class imho (jfp)

    	//html field for element label
        $mform->addElement(
            'html',
            $this->value
        );

        if (!empty($this->req)) $mform->addRule($fieldname, null, 'required', null, 'client');
        $mform->setType($fieldname, PARAM_RAW);
*/
    }

    public function audit_type() {
        return get_string('ilp_element_plugin_free_html_type','block_ilp');
    }

    function language_strings(&$string) {
        $string['ilp_element_plugin_free_html_type'] 		= 'Free markup';
        $string['ilp_element_plugin_free_html_description']	= 'Free HTML';
        $string['ilp_element_plugin_free_html_contents']	= 'Contents (any valid HTML)';
        $string[ 'ilp_element_plugin_free_html_markup_required' ]	= 'You need to enter some markup in the contents field';
    }

	/**
     * create tables for this plugin
     * not necessary for this class - contents will just get stored in the entry description field
     */
    public function install() {
/*
        global $CFG, $DB;

        // create the table to store report fields
        $table = new $this->xmldb_table( $this->tablename );
        $set_attributes = method_exists($this->xmldb_key, 'set_attributes') ? 'set_attributes' : 'setAttributes';

        $table_id = new $this->xmldb_field('id');
        $table_id->$set_attributes(XMLDB_TYPE_INTEGER, 10, XMLDB_UNSIGNED, XMLDB_NOTNULL, XMLDB_SEQUENCE);
        $table->addField($table_id);
        
        $table_report = new $this->xmldb_field('reportfield_id');
        $table_report->$set_attributes(XMLDB_TYPE_INTEGER, 10, XMLDB_UNSIGNED, XMLDB_NOTNULL);
        $table->addField($table_report);
        
        $table_timemodified = new $this->xmldb_field('timemodified');
        $table_timemodified->$set_attributes(XMLDB_TYPE_INTEGER, 10, XMLDB_UNSIGNED, XMLDB_NOTNULL);
        $table->addField($table_timemodified);

        $table_timecreated = new $this->xmldb_field('timecreated');
        $table_timecreated->$set_attributes(XMLDB_TYPE_INTEGER, 10, XMLDB_UNSIGNED, XMLDB_NOTNULL);
        $table->addField($table_timecreated);

        $table_key = new $this->xmldb_key('primary');
        $table_key->$set_attributes(XMLDB_KEY_PRIMARY, array('id'));
        $table->addKey($table_key);

        $table_key = new $this->xmldb_key('textplugin_unique_reportfield');
        $table_key->$set_attributes(XMLDB_KEY_FOREIGN_UNIQUE, array('reportfield_id'),'block_ilp_report_field','id');
        $table->addKey($table_key);

        if(!$this->dbman->table_exists($table)) {
            $this->dbman->create_table($table);
        }
*/
    }

    public function uninstall() {
        $table = new $this->xmldb_table( $this->tablename );
        drop_table($table);
        
        $table = new $this->xmldb_table( $this->data_entry_tablename );
        drop_table($table);
    }
}