<?php

namespace InternetRepublic\HtmlPrinter;

class HtmlPrinter {

    /**
     * 
     * @param array         $data array of all rows in table. First row is the 
     *                      table header
     * @param bool          $action true to return the table as string, false to
     *                      print the table
     * @return void|string  return table or string formed with html tags.
     */
    public function arrayToTable(array $data, bool $action = false) {

        $r = '<table>';

        foreach ($data as $k => $v) {
            if ($k == 0) {
                $r .= $this->printHeader($v);
            } else {
                $r .= $this->printBody($v);
            }
        }
        $r .= '</table>';

        if ($action) {
            echo $r;
        } else {
            return $r;
        }
    }

    /**
     * 
     * @param array      $val array of table header
     * @return string   html formatted header table row
     */
    private function printHeader($val):string {
        $r = '<thead>';
        $r .= '<tr>';
        
        foreach($val as $v){
            $r.= '<td>'.$v.'</td>';
        }
        $r .= '</tr>';
        $r .= '</thead>';
        
        return $r;
    }

    /**
     * 
     * @param array      $val array of table body
     * @return string   html formatted body table row
     */
    private function printBody($val):string {
        $r = '<tr>';
        
        foreach($val as $v){
            $r.= '<td>'.$v.'</td>';
        }
        $r .= '</tr>';
        
        return $r;
    }

}
