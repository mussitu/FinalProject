<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class todo extends model {
    public $id;
    public $owneremail;
    public $ownerid;
    public $createddate;
    public $duedate;
    public $message;
    public $isdone;

    public function __construct()
    {
        $this->tableName = 'todos';
	
    }
    
    protected static function format_to_html_table_header() {
        return "<tr><th>id</th><th>owneremail</th>"
                . "<th>ownerid</th><th>createddate</th>"
                . "<th>duedate</th><th>message</th>"
                . "<th>isdone</th><th></th><th></th></tr>";
    }
    
    protected function format_to_html_table_row() {
        return "<tr><td>$this->id</td><td>$this->owneremail</td>"
                . "<td>$this->ownerid</td><td>$this->createddate</td>"
                . "<td>$this->duedate</td><td>$this->message</td>"
                . "<td>$this->isdone</td>"
                . "<td><a href='edit.php?id=$this->id'>Edit</a></td>"
                . "<td><a href='delete.php?id=$this->id'>Delete</a></td>"
                . "</tr>";
    }
    
    public static function format_to_html($something) {
        $result = '<table>' . todo::format_to_html_table_header();
        
        if (is_a($something, 'todo')) {
            $result .= $something->format_to_html_table_row();
        } elseif ($something != NULL) {
            foreach ($something as $row) {
                $result .= $row->format_to_html_table_row();
            }
        }
        
        $result .= '</table>';
        
        return $result;
    }

    public function insert() {
        $record = todos::insertOne(array('owneremail' => $this->owneremail,
                       'ownerid' => $this->ownerid,
                       'createddate' => $this->createdate,
                       'duedate' => $this->duedate,
                       'message' => $this->message,
                       'isdone' => $this->isdone));
        return $record;
    }

    public function update() {
        todos::updateOne($this->id,
                array('owneremail' => $this->owneremail,
                      'ownerid' => $this->ownerid,
                      'createddate' => $this->createdate,
                      'duedate' => $this->duedate,
                      'message' => $this->message,
                      'isdone' => $this->isdone));
        return $this;
    }

    public function delete() {
       todos::deleteOne($this->id);
    }
}
?>
