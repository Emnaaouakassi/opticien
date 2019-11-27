<?php require_once('header.php'); ?>


<div class="page-banner" style="background-color:#444;background-image: url(assets/uploads/">
    <div class="inner">
        <h1><?php echo LANG_VALUE_10; ?></h1>
    </div>
</div>

<div class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="user-content">

                    
                    <form action="Cores/LoginClient.php" method="post">
                                          
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="">Password *</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <div class="form-group">
                                    <label for=""></label>
                                    <input type="submit" class="btn btn-primary" value="Submit" name="form1">
                                </div>
                                <a href="forget-password.php" style="color:#e4144d;"></a>
                            </div>
                        </div>                        
                    </form>
                </div>                
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>