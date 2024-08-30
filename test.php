<?php
$age = [
    'joe' => 25,
    'ken' => 20,
    'ray' => 10,
];
echo "Joe is " .$age['joe']." years old.<br>";
print_r($age) ;
foreach ($age as $key => $value){
    echo "<hr> I'm ".$key." and I am " .$value. " years. <hr>";
};
$keys = array_keys($age);
$values = array_values($age);
$arrsize = count($age);
for($i = 0; $i<$arrsize; $i++){
    echo "<br> my name is " .$keys[$i]. " and I'm " .$values[$i]. " years old.";
};
?>
<a href="#">Home Page</a>
<a href="#">Contacts Page</a> 
<style>
    a{
        display:list-item inline;
        list-style-type: " ♥ ";
    }
</style>

<p> hello</p>
<div>
    <div> one </div>
    <div id="div"> two <br /> two two </div>
</div>

<div class="div"> three <br /> three three <br /> three three three </div>
<div class="div"> four <br /> four four <br /> four four four <br />
    <span class="div"> four four four four </span>
</div>

<p> goodbye </p>

<style>
    p{
        border: 2px solid black;
        
    }
    div > div{
        background-color: cyan;
        text-align: right;
        margin-bottom: 10px;
    }
    div > span{
        border:4px solid black;
        background-color: white;
    }
    div{
        padding: 20px 20px 20px 20px;
        border: 2px dashed black;
    }
    body > div{
        float: right;
    }
    
    #div{
        text-decoration: underline;
        
    }    
    
</style>