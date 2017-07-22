<?php
class Index extends WW_Controller{

    public function ww(){
        var_dump($this->input->get());exit();

        $this->load->view('index/ww',['a'=>111]);
    }
}