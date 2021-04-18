<div class="row link-wrapper" id="link-wrapper">

    <?php
        $id = 0;
        //If user is logged in show add new link button
        if (isset($_SESSION['username'])) {
            $id = $_SESSION['id'];
    ?>

    <div class="col-6 col-sm-6 col-md-3" id="addItem">
        <div class="offset-1 offset-sm-1 offset-md-1 col-10 col-sm-10 col-md-10 item">
            <div class="row">
                <div class="col-md-12 bc">
                    <p class="addItem">+</p>
                </div>

                <div class="col-md-12 linktext">
                    <span>Add page</span>
                </div>
            </div>
        </div>
    </div>
    <?php 
        }
        
        foreach ($dao_obj->getLinks($id) as $row) { 
            
            
    ?>
        
    <a href="<?php echo $row[0]?>" class="col-6 col-sm-6 col-md-3 remove-style-link " >
        <div class="offset-1 offset-sm-1 offset-md-1 col-10 col-sm-10 col-md-10 item">
            <div class="row">
                <div class="col-md-12 bc">
                    <p class="item-p" style="word-wrap: break-word;">
                        <?php 
                            //Remove https:// , http:// and www. From the string so it looks nicer.
                            //echo str_replace(array('https://', 'http://','www.'),"",$row[0])
                            echo $row['1'];
                        
                        ?>
                    </p>
                </div>

                <div class="col-md-12 linktext">
                    <span><?php echo $row[0]?></span>
                </div>
            </div>
        </div>
    </a>

    <?php }?>
</div>