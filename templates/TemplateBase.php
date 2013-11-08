<?php


function my_assert_handler($file, $line, $code){
    echo "<hr>Assertion Failed:
        File '$file'<br />
        Line '$line'<br />
        Code '$code'<br /><hr />";
}
assert_options(ASSERT_CALLBACK, 'my_assert_handler');

class TemplateBase{

      private $mName;
      private $mText;

      function TemplateBase( $name ){
      	       assert( !empty($name) );
	       $this->mName = $name;
      }

      function getText(){
      	       return $this->mText;
      }

      function getName(){
      	       return $this->mName;
      }

      function makeTextFromKeyValue( array $key_value_input ){
      	       assert( empty($this->mText) );

	       $this->mText = "{{";
	       $this->mText .= $this->mName;

	       foreach($key_value_input as $key => $value){
	         	assert( !empty($key) );
	       		if(empty($value)) {
				echo "TemplateBase::makeTextFromKeyValue:: Ignoring $key as value was empty\n";
				continue;
			}
	       		$this->mText .= '|';
	       		$this->mText .= $key;
	       		$this->mText .= '=';
	       		$this->mText .= $value;
	       }
	       $this->mText .= "}}";
      }
      
}
