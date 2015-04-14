<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_survey extends CI_Migration {
    
    public function up()
    {
            $this->dbforge->add_field(array(
                    'survey_id' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                    ),
                    'survey_name' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '100',
                    ),
                    'created_date' => array(
                            'type' => 'DATE',
                            'null' => FALSE,
                    ),
                    'issued_date' => array(
                            'type' => 'DATE',            
                            'null' => TRUE,
                    ),
                    'status' => array(
                            'type' => 'ENUM("av","ac","un")',
                            'default' => 'av',
                            'null' => FALSE,
                    ),
            ));
            $this->dbforge->add_key('survey_id', TRUE);
            $this->dbforge->create_table('survey');
    }

        public function down()
        {
                $this->dbforge->drop_table('survey');
        }
}