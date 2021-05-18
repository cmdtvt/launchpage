<!--This is the popup modal that is shown when adding a link or modifying and old one.-->
<div class="container-fluid custom-modal" id="custom-modal" style="display: none;">
    <div class="row">
        <div class="offset-md-3 col-md-6 content">
            <div class="row">
                <span class="icon-close" style="text-align:right; font-size:16px;"></span>
            </div>
            <form class="row" action="index.php" method="post">
                <input type="hidden" name="id-holder" id="id-holder">
                
                <div class="col-md-12">
                    <input type="text" class="form-control form-control-lg" placeholder="Link display name" name="displayname" id="displayname">
                </div>

                <div class="col-md-12">
                    <input type="text" class="form-control form-control-lg" placeholder="Link" name="link" id="link">
                </div>

                <div class="offset-md-6 col-md-3">
                    <input class="form-control" type="color" value="#ffffff" name="color" id="color">
                </div>

                <div class="col-md-3">
                    <button class="btn btn-success btn-full" type="submit" id="modal-submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
