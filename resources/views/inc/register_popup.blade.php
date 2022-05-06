<!-- Modal -->
<div class="modal fade" id="registerFormModal" tabindex="-1" role="dialog" aria-labelledby="registerFormModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('user.register')}}" method="post">
          @csrf
          <div class="modal-body text-center">
              <img src="/img/logo_black.svg" alt="">
              <h1 class="h3 mb-3 font-weight-normal">Регистрация</h1>
              <label for="inputName" class="sr-only">ФИО</label>
              <input type="text" id="inputName" name="name" class="form-control" placeholder="ФИО" required="" autofocus="">
              <label for="inputEmail" class="sr-only">Email</label>
              <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" required="" autofocus="">
              <label for="inputPassword" class="sr-only">Пароль</label>
              <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Пароль" required="">
              <label for="inputPassword" class="sr-only">Подтверждение пароля</label>
              <input type="password" id="inputPasswordConf" name="password_confirmation" class="form-control" placeholder="Подтверждение пароля" required="">
          </div>
          <div class="modal-footer">
              <button class="btn btn-lg btn-primary btn-block" type="submit">Зарегистрироваться</button>
          </div>
        </form>
      </div>
    </div>
  </div>