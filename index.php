<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>

        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
                crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="script.js"></script>
    </head>
    <body>
        <div class="min-vh-100 mx-5"> <!-- поправить mx-5 на нужное-->
            <div class="row min-vh-100 justify-content-center align-items-center">
                <form class="myForm border rounded">
                    <div class="row">
                        <div class="col-md-6 last_name">
                            <label for="last_name">Фамилия</label>
                            <input type="text" class="form-control" placeholder="Фамилия (не менее 3 букв)" name="last_name">
                        </div>
                        <div class="col-md-6 first_name">
                            <label for="first_name">Имя</label>
                            <input type="text" class="form-control" placeholder="Имя (не менее 3 букв)" name="first_name">
                        </div>
                    </div>
                    <div class="form-group email">
                        <label for="inputEmail">Email</label>
                        <input type="text" class="form-control" placeholder="Email" name="email">
                    </div>
                    <div class="form-group col-md-4 country">
                        <label for="inputState">Страна</label>
                        <select id="inputState" class="form-control" name="country">
                            <option selected></option>
                            <?php
                            $listJson = file_get_contents('https://namaztimes.kz/ru/api/country');
                            $listArr = json_decode($listJson, true);
                            foreach ($listArr as $item) {
                                echo "<option>$item</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male">
                        <label class="form-check-label" for="inlineRadio1">Мужчина</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
                        <label class="form-check-label" for="inlineRadio2">Женщина</label>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 birth_date">
                            <label for="inputCity">Дата рождения</label>
                            <input type="date" class="form-control" name="birth_date">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label agreement">
                                <input class="form-check-input agreement" type="checkbox" name="agreement">Согласие с условиями
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Создать аккаунт</button>
                    <div class="msg">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>