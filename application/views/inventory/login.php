      <h1 class="text-center">Silakan login terlebih dahulu!</h1>
      <div class="d-flex text-center align-items-center justify-content-center">
          <form action="<?php echo base_url('auth/auth_login'); ?>" method="post">
              <table>
                  <tr>
                      <td>Username</td>
                      <td><input class="form-control" type="text" name="username"></td>
                  </tr>
                  <tr>
                      <td>Password</td>
                      <td><input class="form-control" type="password" name="password"></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td><input class="btn btn-primary form-control " type="submit" value="Login"></td>
                  </tr>
              </table>
          </form>
      </div>
      </body>

      </html>