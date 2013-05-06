<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TestCrudCat
 *
 * @author jason
 * Naming => test_Function_ClassName
 */


class TestCrudCat extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('GenericCRUD');
    }
    
    /**
     * Test create new item 
     */
    function test_craete_GenericCrud(){
        $payload = array(
          'name'=>'light pulps',
            'description'=>'Simple light pulps that uses the solar energy to light up your guarden in good way.'
        );
        
        if($this->GenericCRUD->create('categories',$payload)){
            echo "test success";
        }
        else{
            echo "test failed";
            }
    }
    /**
     * Test UPdate categories
     */
    function test_update_GenericCrud(){
         $payload = array(
           'id'=>1,
          'name'=>'light pulps_updated',
            'description'=>'Simple light pulps that uses the solar energy to light up your guarden in good way_updated.'
        );
        
         $test_result  = $this->GenericCRUD->update('categories',$payload);
         $this->assertTrue($test_result);
    }
    
    /**
     * Test Read categories
     */
    
    function test_read_genericCrud(){
       $payload = array(
           'id'=>1,
          'name'=>'light pulps_updated',
            'description'=>'Simple light pulps that uses the solar energy to light up your guarden in good way_updated.'
        );
       $return_object = $this->GenericCRUD->read('categories',$payload);
       $this->assertNotNull($return_object);
       foreach($return_object->result() as $row){
           echo $row->name;
           echo $row->description;
       }
    }
    /**
     * assertTrue function is a mirror for assertTrue in Junit
     * @param boolean $test_status result of the test
     * 
     */
    function assertTrue($test_status){
        if($test_status){
             echo 'Test success';
             
         }else{
             echo "Test Failed";
         } 
    }
    /**
     * assertNotNull Mirror function for Junit function 
     * checkes if the return of the test function is not null
     * @param Object $returnObject return object from the tested function
     */
    function assertNotNull($return_object){
        if(isset($return_object)){
            echo 'Test Success';
        }else{
            echo 'Test Failed';
        }
    }
}

?>
