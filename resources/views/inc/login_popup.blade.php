<!-- Modal -->
<div class="modal fade" id="loginFormModal" tabindex="-1" role="dialog" aria-labelledby="loginFormModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('user.login')}}" method="post">
            @csrf
            <div class="modal-body text-center">
                <img src="/img/logo_black.svg" alt="">
                <h1 class="h3 mb-3 font-weight-normal">Авторизация</h1>
                <label for="inputLogin" class="sr-only">Логин</label>
                <input type="text" id="inputLogin" name="login" class="form-control" placeholder="Логин" required="" autofocus="">
                <label for="inputPassword" class="sr-only">Пароль</label>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Пароль" required="">
            </div>
            <div class="modal-footer">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </div>
        </form>
      </div>
    </div>
  </div>