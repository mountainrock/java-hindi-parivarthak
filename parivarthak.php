<!DOCTYPE html>
<html>
<head>
    <title>Hindi parivarthak</title>
    <center><h1><span style='color:#ca0a06;font-weight:600'>हिन्दी</span> <span style='color:#d36806;'>parivarthak</span></h1></center>
    <link href="css/application.min.css" rel="stylesheet"/>
    <link href="css/styles1.css" rel="stylesheet"/>
    
</head>
<body>
<?php
$input = isset($_POST['input']) ? $_POST['input']: null;
$templateName = isset($_POST['templateName']) ? $_POST['templateName']: "hellow-world.txt";;
$dir    = './examples';

$templateFiles = array_diff(scandir($dir), array('..', '.'));
if($input == null){
    $templateName="hello-world.txt"; //default      
} 
if($templateName != 'textInput'){
    $input =  file_get_contents("$dir/$templateName");
}
 


$keywordFileContent = file_get_contents('hindi.json');
$langMap = json_decode($keywordFileContent, true);
$langFileContent = file_get_contents('hindi-full-dictionary.json');
$langMapFull = json_decode($langFileContent, true);

//echo "$input <br/><br/>";
$output =  str_replace(array_keys($langMap), $langMap, strtolower($input));
$output =  str_replace(array_keys($langMapFull), $langMapFull, strtolower($output));
//echo "$output";
?>

 <div class="">
           <main id="content" class="" role="main">
                 <div id="loader" class="loader-wrap hiding hide">
                 <i class="fa fa-circle-o-notch fa-spin-fast">Loading...</i>
        </div>

                 <div class="row clear_fix">

                    <div class="alert alert-danger alert-sm" hidden="" id="showerror"></div>
                     <div class="" hidden="" id="response"></div>
                    <form id="TripSheetForm" method="POST">

                       <div class="panel-group" id="accordion">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                        <a class="panelTitle"  data-toggle="collapse" data-parent="#accordion" href="#collapseOne">  Java to हिन्दी code parivarthak</a>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body" >
                                        <div class="row">
                                               <div class="form-group col-md-1"></div>
                                               <div class="form-group col-md-2">
                                                    <label class="label">Select java example </label>
                                                   <select name="templateName" class="form-control">
                                                    <option value="-">Examples </option>
                                                    <option value="textInput" <?php if($templateName =='textInput')
                                                           echo"selected"; ?>
                                                          >Manual text input </option>
                                                    <?php foreach($templateFiles as $file) {

                                                    if(is_dir($file) ==false){
                                                          $selected="";
                                                          if($templateName ==$file){
                                                            $selected="selected";
                                                          }
                                                    ?>
                                                                     <option value="<?php echo $file ?>" <?php echo $selected ?> ><?php echo $file ?></option>
                                                    <?php }
                                                     } ?>
                                                </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <div class="btn-group">
                                                      <button type="submit" class="btn btn-warning2" id="createTripSheet">परिवर्तन करें</button>
                                                    </div>
                                               </div>
                                        </div>
                                        <div class="row">
                                               <div class="form-group col-md-1"></div>
                                               <div class="form-group col-md-5">
                                                <label class="label">Input </label>
                                                
                                                <textarea class="form-control" rows="20" cols="100" name="input"><?php echo $input; ?></textarea>
                                               </div>
                                                
                                               <div class="form-group col-md-5">
                                                <label class="label">Output </label>
                                                <textarea class="form-control" rows="20" cols="100" name="output"><?php echo $output; ?></textarea>
                                               </div>
                                        </div>
                                       
                                        

                                        <div class="row">
                                             <div class="form-group col-md-1"></div>
                                             <div class="form-group col-md-11">
                                                <b> About </b>: This is a very basic java to hindi translation program written in PHP using word replacement but can be improved further by interested patriots of Bharatha. You can improve the source code by contributing for coding  <a href="https://github.com/mountainrock/java-hindi-parivarthak/" target="_blank">here on github</a> याद रखें भाषा ही हमारी पहचान है। अगर आप गुलामी से बाहर निकलना चाहते हैं तो अपनी भाषा मत खोइए 

                                             </div>
                                        </div>

                                         <div class="row">
                                                <div class="form-group col-md-1"></div>
                                                <div class="form-group col-md-3">
                                                 <label class="label">Java keyword translation </label>
                                                 <textarea class="form-control" rows="5" cols="100" name="output"><?php echo $keywordFileContent; ?></textarea>
                                                </div>
                                               <div class="form-group col-md-3">
                                                 <label class="label">Word translation </label>
                                                <textarea class="form-control" rows="5" cols="100" name="output"><?php echo $langFileContent; ?></textarea>
                                             </div>
                                        </div>

                                    </div>
                                </div>
                            </div>




                        </div>
                    </form>
            </div>

            </main>
</div>


</body>

</html>