<!DOCTYPE html>
<html lang='it'>
  <head>
    <title>Registrati | mik_cms</title>
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
                  <h1 class='text-center title'>Registrati</h1>
                  <form action='../../../controller/register.php' method='POST'>
                    <div class='form-group'>
                      <div class='controls with-icon-over-input'>
                        <input type="text" id ="user" name="user" value="" placeholder="Username" class="form-control" onBlur="checkAvailability()" />
                        <i class='fa fa-user text-muted'></i>
                      </div>
                        <span id="user-availability-status"></span> 
                    </div>
                    <div class='form-group'>
                      <div class='controls with-icon-over-input'>
                        <input type="password" name="password" value="" placeholder="Password" class="form-control" />
                        <i class='fa fa-lock text-muted'></i>
                      </div>
                    </div>
                    <div class='form-group'>
                      <div class='controls with-icon-over-input'>
                        <input type="password" name="password_confirmation" value="" placeholder="Ripeti Password" class="form-control" />
                        <i class='fa fa-lock text-muted'></i>
                      </div>
                    </div>
<!--                    <div class='checkbox'>
                      <label for='agreement'>
                        <input id='agreement' name='agreement' type='checkbox' value='1'>
                        I accept
                        <a class='text-contrast' href='#'>user agreements</a>
                      </label>
                    </div>-->
                    <button class='btn btn-block'>Registrati</button>
                  </form>
                  <div class='text-center'>
                    <hr class='hr-normal'>
                    <a href='accedi.php'>
                      <i class='fa fa-chevron-left'></i>
                      Ritorna alla pagina d'accesso
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class='login-container-footer'>
            <div class='container'>
              <div class='row'>
                <div class='col-sm-12'>
<!--                  <div class='text-center'>
                    <a href='forgot_password.php'>
                      <i class='fa fa-lock'></i>
                      Password dimenticata?
                    </a>
                  </div>-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
