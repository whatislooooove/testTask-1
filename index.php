<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
                crossorigin="anonymous"></script>
        <link rel="stylesheet" href="daterangepicker/daterangepicker.css">
        <script src="daterangepicker/moment.js"></script>
        <script src="daterangepicker/daterangepicker.js"></script>
    </head>
    <body>
        <div class="min-vh-100 mx-5"> <!-- поправить mx-5 на нужное-->
            <div class="row min-vh-100 justify-content-center align-items-center">
                <form class="myForm border rounded">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Имя</label>
                            <input type="text" class="form-control" placeholder="Имя">
                        </div>
                        <div class="col-md-6">
                            <label for="surname">Фамилия</label>
                            <input type="text" class="form-control" placeholder="Фамилия">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input type="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Страна</label>
                        <select id="inputState" class="form-control">
                            <option selected>Выберите вашу страну</option>
                            <option>Россия?</option>
                        </select>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Мужчина</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">Женщина</label>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">Дата рождения</label>
                            <input type="date" class="form-control" id="birth">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox">Согласие с условиями
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Создать аккаунт</button>
                </form>
            </div>
        </div>
    </body>
</html>