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
                <label for="inputEmail" class="sr-only">Email</label>
                <input type="email" id="inputEmailLogin" name="email" class="form-control" placeholder="Эл. почта" required="" autofocus="" maxlength="50">
                <label for="inputPassword" class="sr-only">Пароль</label>
                <input type="password" id="inputPasswordLogin" name="password" class="form-control" placeholder="Пароль" required="" maxlength="50">
            </div>
            <div class="modal-footer">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
            </div>
        </form>
      </div>
    </div>
  </div>