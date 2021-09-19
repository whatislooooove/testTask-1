$(document).ready(function (e) {
    function closeMsg(e) {
        $('.msg').empty();
    }

    $('.myForm').submit(function (e) {
        e.preventDefault();
        let form = $(this).serializeArray();
        $.ajax({
            type: 'POST',
            url: 'ajax.php',
            data: form,
            dataType: 'json',
            success: function (data) {
                $('.invalid-feedback').remove();
                $('.is-invalid').removeClass('is-invalid');

                if (data.success === false) {
                    let errorClasses = data.error;
                    errorClasses.forEach(function(item, i, errorClasses) {
                        let field;
                        if (item === 'agreement') {
                            field = 'Согласитесь с условиями';
                        }
                        else if (item === 'birth_date') {
                            field = 'Дата рождения не может быть больше текущей даты';
                        }
                        else {
                            field = 'Корректно заполните поле';
                        }
                        $('.' + item).append('' +
                            '<div class="invalid-feedback">\n' +
                            field +
                            '        </div>');
                        $('.' + item + ' input').addClass('is-invalid');
                        $('.' + item + ' select').addClass('is-invalid');
                    });
                }
                else if (data.curlResult === 'success'){
                    let el = document.createElement('div');
                    $('.myForm')[0].reset();
                    $('.msg').empty()
                    el.className  = 'alert alert-success alert-dismissible mr-2';
                    el.innerHTML = `Данные успешно отправлены
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                    `;
                    $('.msg').append(el);
                }
                else {
                    let el = document.createElement('div');
                    $('.msg').empty();
                    el.className  = 'alert alert-danger alert-dismissible mr-2 fade show';
                    el.innerHTML = `Ошибка отправки данных
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                    `;
                    $('.msg').append(el);
                }
                $('.close').on('click', closeMsg);
            }
        });
    });
});