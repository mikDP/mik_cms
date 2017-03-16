<!DOCTYPE html>
<html lang='it'>
  <head>
    <title>Accedi | mik_cms</title>
    <?php require("../template/head.php"); ?>
  </head>
  <body class='contrast-red login contrast-background'>
    <div class='middle-container'>
      <div class='middle-row'>
        <div class='middle-wrapper'>
          <div class='login-container-header'>
            <div class='container'>
              <div class='row'>
                <div class='col-sm-12'>
                  <div class='text-center'>
                    <img height="100" src="../../assets/images/mik_logo_small.png" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class='login-container'>
            <div class='container'>
              <div class='row'>
                <div class='col-sm-4 col-sm-offset-4'>
                  <h1 class='text-center title'>Accedi</h1>
                  <h5 class='text-center'><?php echo($_GET["errore"]);?></h5>
                  <form action='../../../controller/login.php' class='validate-form' method='POST'>
                    <div class='form-group'>
                      <div class='controls with-icon-over-input'>
                        <input type="text" name="user" value="" placeholder="Username" class="form-control" data-rule-required="true" />
                        <i class='fa fa-user text-muted'></i>
                      </div>
                    </div>
                    <div class='form-group'>
                      <div class='controls with-icon-over-input'>
                        <input type="password" name="password" value="" placeholder="Password" class="form-control" data-rule-required="true" />
                        <i class='fa fa-lock text-muted'></i>
                      </div>
                    </div>
<!--                    <div class='checkbox'>
                      <label for='remember_me'>
                        <input id='remember_me' name='remember_me' type='checkbox' value='1'>
                        Ricordami
                      </label>
                    </div>-->
                    <button class='btn btn-block'>Accedi</button>
                  </form>
<!--                  <div class='text-center'>
                    <hr class='hr-normal'>
                    <a href='forgot_password.php'>Hai dimenticato la password?</a>
                  </div>-->
                </div>
              </div>
            </div>
          </div>
          <div class='login-container-footer'>
            <div class='container'>
              <div class='row'>
                <div class='col-sm-12'>
                  <div class='text-center'>
                    <a href='registrati.php'>
                      <i class='fa fa-user'></i>
                      Nuovo utente?
                      <strong>Registrati!</strong>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
