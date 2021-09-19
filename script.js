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

                let el = document.createElement('div');
                if (data.success === false) {
                    let errorClasses = data.error;
                    errorClasses.forEach(function(item, i, errorClasses) {
                        if (item === 'agreement') {
                            $('.' + item).append('' +
                                '<div class="invalid-feedback">\n' +
                                '          Согласитесь с условиями\n' +
                                '        </div>');
                            $('.' + item + ' input').addClass('is-invalid');
                        }
                        else if (item === 'birth_date') {
                            $('.' + item).append('' +
                                '<div class="invalid-feedback">\n' +
                                '          Дата рождения не может быть больше текущей даты\n' +
                                '        </div>');
                            $('.' + item + ' input').addClass('is-invalid');
                        }
                        else {
                            $('.' + item).append('' +
                                '<div class="invalid-feedback">\n' +
                                '          Корректно заполните поле\n' +
                                '        </div>');
                            $('.' + item + ' input').addClass('is-invalid');
                            $('.' + item + ' select').addClass('is-invalid');
                        }
                    });
                }
                else if (data.curlResult === 'success'){
                    $('.myForm')[0].reset();
                    el.className  = 'alert alert-success mr-2';
                    el.innerHTML = `Данные успешно отправлены
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                    </button>
                    `;
                    $('.msg').append(el);

                }
                else {
                    el.className  = 'alert alert-danger mr-2';
                    el.innerHTML = `Ошибка отправки данных
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                    </button>
                    `;
                    $('.msg').append(el);
                }
                $('.close').on('click', closeMsg);
            }
        });
    });
});